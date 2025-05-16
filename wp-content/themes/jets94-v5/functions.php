<?php
/*-------------------------------------------*/
	/*  Title tag
	/*-------------------------------------------*/
	add_theme_support('title-tag');

	/*-------------------------------------------*/
	/*	Admin page _ Eye catch
	/*-------------------------------------------*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 320, 180, true );
	/*-------------------------------------------*/
	/*	Feed Links
	/*-------------------------------------------*/
	add_theme_support( 'automatic-feed-links' );

	//エラーレベル
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	//error_reporting(E_ALL);
	
//WP標準のブログカード停止(https://teratail.com/questions/55849)
//しかし4.8では停止せず
//WP REST API リンク <http://www.example.com/wp-json/>; rel=”https://api.w.org/”
remove_action('wp_head','rest_output_link_wp_head');
//oEmbed endpoint 検出用リンク停止（oEmbed サービス提供はしないが他のサイトの埋め込みは可能）
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//EditURIは外部の投稿ツールからWordPressに記事を投稿する際に必要なタグです。不必要ならば消しましょう。
remove_action('wp_head', 'rsd_link');
//Windows Live Writer  rel="wlwmanifest" のリンクを削除
remove_action('wp_head', 'wlwmanifest_link');
/* end.ブログカード*/

/*リンクを絶対パスに変更*/
function delete_hostname_from_attachment_url( $url ) {
	$regex = '/^http(s)?:\/\/[^\/\s]+(.*)$/';
	if ( preg_match( $regex, $url, $m ) ) {
		$url = $m[2];
	}
	return $url;
}
add_filter( 'wp_get_attachment_url', 'delete_hostname_from_attachment_url' );
add_filter( 'attachment_link', 'delete_hostname_from_attachment_url' );

/*TOPページのOG:images を書き換え */
function my_open_graph_image_default( $image ) {
    $image = get_home_url() . '/wp-content/uploads/art/jets94-logo.gif';
    return $image;
}
add_filter( 'jetpack_open_graph_image_default', 'my_open_graph_image_default' );


/* 記事ページ分割した時に、タイトルにページ数を追加（実行されない、、プラグインのせい？） */
function theme_name_wp_title( $title ) {
global $page, $paged;
if ( ( $paged >= 2 || $page >= 2 ) ) {
$title .= "$sep" . sprintf( __( '(ページ%s)' ), max( $paged, $page ) );
}
return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title');



//more後に広告
add_filter('the_content', 'adMoreReplace');
function adMoreReplace($contentData) {
	$adTags = <<< EOF
	<span class="c-adtxt c-adtxt-article">[SPONSORED LINK]</span>
	<div class="l-ad l-ad-article_middle">
	<!-- ad jets94-single-more -->
	<ins class="adsbygoogle"
		 style="display:block"
		 data-ad-client="ca-pub-1827178535199750"
		 data-ad-slot="3752614732"
		 data-ad-format="auto"
		 data-full-width-responsive="true"></ins>
	<script>
		 (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<!--//ad-->
	</div>
EOF;
	$contentData = preg_replace('/<span id="more-[0-9]+"><\/span>/', $adTags, $contentData);
	return $contentData;
}
//end-more

/*adseseを記事途中にいれるショートコード*/
function showads() {
	$adTags = <<< EOF
	<div class="l-ad l-ad-article_middle">
	<!-- ad jets94-single-more -->
	<ins class="adsbygoogle"
		 style="display:block"
		 data-ad-client="ca-pub-1827178535199750"
		 data-ad-slot="3752614732"
		 data-ad-format="auto"
		 data-full-width-responsive="true"></ins>
	<script>
		 (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<!--//ad-->
	</div>
EOF;
	return $adTags;
}
add_shortcode('adsense', 'showads');
//CSVファイルキャッシュバスター作成
function get_cashbaster($filename){//キャッシュバスターを作成、ファイルが存在しなければ何も返さない
	if(file_exists( __DIR__.$filename )){
	  return filemtime(__DIR__.$filename);
	}else {
		return null;
	}
  }
/*iniファイルから設定取得*/
function get_ini($ini_file,$ini_key,$section = false){
	$ini_pass =  dirname(__DIR__)  . "\\" .  esc_html( get_stylesheet() ) ."\\ini\\". $ini_file;  //Xampp
	if (!file_exists($ini_pass)) {
		$ini_pass = "ini/" . $ini_file;  //iniファイル(Linuxだとパスが変わる)
	}
	$fo = parse_ini_file($ini_pass,$section);
	foreach($fo as $key=> $var){
		if($key == $ini_key){
			return $var;
			exit;
		}
	}

	exit;
}
/*はてぶメール投稿*/
/*
function send_hatena($post_id) {
	$post = get_post($post_id);
	$url = get_permalink($post);
	$send_title = $post->post_title;
	wp_mail('tqouic6saj@b.hatena.ne.jp',$send_title,$url,'From:wakai39@gmail.com' );
	return;
}
add_action( 'publish_post', 'send_hatena', 1 ,6);
*/
/*　end はてぶ*/

// コメント欄の変更
//メルアドとURL入力の削除
// オリジナル comment_form in wp-includes/comment-template.php
function my_comment_form_fields( $fields){
    unset( $fields['email']);   // 「メールアドレス」を非表示にする場合
    unset( $fields['url']);     // 「ウェブサイト」を非表示にする場合
    return $fields;
}
add_filter( 'comment_form_default_fields', 'my_comment_form_fields');

//メールアドレスが公開されることはありまえせんの削除
// オリジナル comment_form in wp-includes/comment-template.php
add_filter( "comment_form_defaults", "my_comment_notes_before");
function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';
    return $defaults;
}

/*コメント投降後に「完了ダイアログ」 */
add_filter('comment_post_redirect', 'comment_redirect');
function comment_redirect(){
wp_redirect('/comment_end/');
exit();
}
//コメントは承認待ちメッセージの表示//使用していない？
/*
function my_comments_message($args) {
$args['comment_notes_before'] = '<p class="comment-notes">いただいたコメントは承認後サイトに反映されます。また承認には数日かかる場合があります。</p>';
return $args;
}
add_filter('comment_form_defaults', 'my_comments_message');
*/

/*
functions.php
 旧パーマリンクからのリダイレクト
%year%/%monthnum%/%post_id%.html
↓
/%post_id%/
*/
add_action( 'wp', 'redirect404' );
function redirect404() {
	global $wp_query;
	if ( is_404() ) {
		// リクエスト情報から記事IDを取得、数値なら現在のURLにリダイレクト
		$pathData = pathinfo( $_SERVER["REQUEST_URI"]);
		$id = $pathData["filename"];
		if ( preg_match( '/^\d+$/', $id ) && $id != 0 ) {
			wp_redirect( get_permalink( $id ), 301 );
			exit;
		}
	}
}
/*ブログカード
参考：https://nelog.jp/wordpress-blog-card*/
//100×100pxのサムネイルを作成
//add_image_size('thumb100', 100, 100, true);

//サイトドメインを取得
function get_this_site_domain(){
  //ドメイン情報を$results[1]に取得する
  preg_match( '/https?:\/\/(.+?)\//i', admin_url(), $results );
  return $results[1];
}

//本文抜粋を取得する関数（綺麗な抜粋文を作成するため）
//使用方法：http://nelog.jp/get_the_custom_excerpt
function get_the_custom_excerpt($content, $length) {
  $length = ($length ? $length : 70);//デフォルトの長さを指定する
  $content =  preg_replace('/<!--more-->.+/is',"",$content); //moreタグ以降削除
  $content =  strip_shortcodes($content);//ショートコード削除
  $content =  strip_tags($content);//タグの除去
  $content =  str_replace("&nbsp;","",$content);//特殊文字の削除（今回はスペースのみ）
  $content =  mb_substr($content,0,$length);//文字列を指定した長さで切り取る
  return $content;
}

//本文中のURLをブログカードタグに変更する
function url_to_blog_card($the_content) {
  if ( is_singular() ) {//投稿ページもしくは固定ページのとき
    //1行にURLのみが期待されている行（URL）を全て$mに取得
    $res = preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/'.preg_quote(get_this_site_domain()).'\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);
    //マッチしたURL一つ一つをループしてカードを作成
    foreach ($m[0] as $match) {
      $url = strip_tags($match);//URL
      $id = url_to_postid( $url );//IDを取得（URLから投稿ID変換）
      if ( !$id ) continue;//IDを取得できない場合はループを飛ばす
      $post = get_post($id);//IDから投稿情報の取得
      $title = $post->post_title;//タイトルの取得
      $date = mysql2date('Y-m-d H:i', $post->post_date);//投稿日の取得
      $excerpt = get_the_custom_excerpt($post->post_content, 90);//抜粋の取得
    //  $thumbnail = get_the_post_thumbnail($id, 'thumb100', array('style' => '', 'class' => 'blog-card-thumb-image'));//サムネイルの取得（要100×100のサムネイル設定）
		$thumbnail = get_the_post_thumbnail($id, 'thumbnail', array('style' => '', 'class' => 'blog-card-thumb-image'));//サムネイルの取得（要100×100のサムネイル設定）

			if ( !$thumbnail ) {//サムネイルが存在しない場合
        $thumbnail = '<img src="'.get_template_directory_uri().'/images/no-image.png" style="width:100px;height:100px;" >';
      }
      //取得した情報からブログカードのHTMLタグを作成
      $tag = '<div class="blog-card"><div class="blog-card-thumbnail"><a href="'.$url.'" target="_blank" class="blog-card-thumbnail-link">'.$thumbnail.'</a></div><div class="blog-card-content"><div class="blog-card-title"><a href="'.$url.'" target="_blank" class="blog-card-title-link">'.$title.'</a></div><div class="blog-card-excerpt">'.$excerpt.'</div></div><div class="blog-card-footer clear"><span class="blog-card-date">'.$date.'</span></div></div>';
      //本文中のURLをブログカードタグで置換
      $the_content = preg_replace('{'.preg_quote($match).'}', $tag , $the_content, 1);
    }
  }
  return $the_content;//置換後のコンテンツを返す
}
add_filter('the_content','url_to_blog_card');//本文表示をフック

/*ショートコード：シェアリンク
[sharelink]
と記載すると、シェアボタンを表示*/
    function sharelinkFunc() {
      $article_url = get_permalink(); // 記事のURL
      $article_title = wp_title( ' | ', false, 'right' ) . get_bloginfo('name'); // 記事のタイトル
      $article_url_encode = urlencode($article_url); // 記事URLエンコード
      $article_title_encode = urlencode($article_title." #nfljapan #dazn #nfl"); // 記事タイトルエンコード

      $url_encode=urlencode(get_permalink());
      $title_encode=urlencode(get_the_title());
      $tw_title_encode=urlencode(get_the_title()." #nfljapan #dazn #nfl");

//$the_content = <<<EOT
//EOT;
//ヒアファイルからインクルードを変数に入れる方法に変更
ob_start();
include('inc/page-sns.php');
$the_content = ob_get_contents();
ob_end_clean();

return $the_content;
    		}
    		add_shortcode('sharelink', 'sharelinkFunc');
      /* end.シェアリンク*/

//固定ページでタグ設定欄を表示
function add_tag_to_page() {
  register_taxonomy_for_object_type('post_tag', 'page'); }
add_action('init', 'add_tag_to_page');

//固定ページで設定したタグをタグクラウドに含める
function add_page_to_tag_archive( $obj ) {
  if ( is_tag() ) {
    $obj->query_vars['post_type'] = array( 'post', 'page' );
  }
}
add_action( 'pre_get_posts', 'add_page_to_tag_archive' );

//検索結果の表示順を日付降順にする
add_filter('posts_search_orderby', 'custom_posts_search_orderby');
function custom_posts_search_orderby() {
return ' post_date desc ';
}

// Youtubeレスポンシブ対応(CSSも必要)Customize YouTube oEmbed Code
function custom_youtube_oembed($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
    $html = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0", $code);
    $html = preg_replace('/ width="\d+"/', '', $html);
    $html = preg_replace('/ height="\d+"/', '', $html);
    $html = '<div class="youtube_container">' . $html . '</div>';
    return $html;
  }
  return $code;
}

add_filter('embed_handler_html', 'custom_youtube_oembed');
add_filter('embed_oembed_html', 'custom_youtube_oembed');

//メニューの追加
register_nav_menus( array( 'header01' => 'Header01 Navigation', ) );
register_nav_menus( array( 'header02' => 'Header02 Navigation', ) );
register_nav_menus( array( 'footer' => 'Footer Navigation', ) );

//4.9.6から追加されるコメント欄に追加される「Save my name, email, and website in this browser for the next time I comment.」の削除
function comment_remove_cookiescheck($arg) {
 $arg['cookies'] = '';
 return $arg;
}
 add_filter('comment_form_default_fields', 'comment_remove_cookiescheck');

 /*---------------------------------------------------------------------------
 * ライン風の吹き出しショートコード(_blogparts.sass にCSSを記載)
 *参考：https://thk.kanzae.net/net/wordpress/t6908/
 *ショートコード実装例
 <p>[baloon-line-left img="/wp-content/themes/jets94-v4/img/jetskyou.png" caption="サンチェス"]右に顔です。[/baloon-line-left]</p>
<p>[baloon-line-right img="/wp-content/themes/jets94-v4/img/jetskyou.png" caption="サンチェス２"]左に顔です (｀・ω・´)ｂ[/baloon-line-right]</p>
 *---------------------------------------------------------------------------*/
// 左からの吹き出し
add_shortcode( 'baloon-line-left', function( $atts, $content = null ) {
	$before = '<div class="balloon"><div class="balloon-img-left">';

	if( isset( $atts['img'] ) ) {
		$before .= '<figure><img src="' . $atts['img'] . '" width="60" height="60" alt="';
		$before .= isset( $atts['caption'] ) ? $atts['caption'] : '';
		$before .= '" ></figure>';
	}
	if( isset( $atts['caption'] ) ) {
		$before .= '<span class="balloon-img-caption">' . $atts['caption'] .'</span>';
	}

	$before .= '</div><div class="balloon-left-line">';

	$after = '</div></div>';

	return $before . $content . $after;
});

// 右からの吹き出し
add_shortcode( 'baloon-line-right', function( $atts, $content = null ) {
	$before = '<div class="balloon"><div class="balloon-img-right">';

	if( isset( $atts['img'] ) ) {
		$before .= '<figure><img src="' . $atts['img'] . '" width="60" height="60" alt="';
		$before .= isset( $atts['caption'] ) ? $atts['caption'] : '';
		$before .= '" ></figure>';
	}
	if( isset( $atts['caption'] ) ) {
		$before .= '<span class="balloon-img-caption">' . $atts['caption'] .'</span>';
	}

	$before .= '</div><div class="balloon-right-line">';
	$after = '</div></div>';

	return $before . $content . $after;
});
//Amazonリンク用Function
include('inc/amazon-link.php');

//▼デフォルトのサイト内自動サムネイル サイト内リンクさせない
if ( isset( $GLOBALS['wp_embed'] ) ) {
	remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );

	function my_autoembed( $content ) {
		$content = wp_replace_in_html_tags( $content, array( "\n" => '<!-- wp-line-break -->' ) );
		if ( preg_match( '#(^|\s|>)https?://#i', $content ) ) {
			$content = preg_replace_callback( '|^(\s*)(https?://[^\s<>"]+)(\s*)$|im', 'my_autoembed_callback', $content );
			$content = preg_replace_callback( '|(<p(?: [^>]*)?>\s*)(https?://[^\s<>"]+)(\s*<\/p>)|i', 'my_autoembed_callback', $content );
		}
		return str_replace( '<!-- wp-line-break -->', "\n", $content );
	}

	add_filter( 'the_content', 'my_autoembed', 8 );

	function my_autoembed_callback( $match ) {
		$url = $match[2];
		$url_host = str_replace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
		$home_url_host = str_replace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
		if ( $url_host && $url_host == $home_url_host ) {
			return $url;
		}

		return $GLOBALS['wp_embed']->autoembed_callback( $match );
	}
}
//▲デフォルトのサイト内自動サムネイル サイト内リンクさせない
?>