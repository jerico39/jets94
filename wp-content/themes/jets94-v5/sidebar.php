
<!--sidebar-->
<section class="amz-sidebar">
  <ul>
    <?php echo amazon_box("side_01",2) ?>
  </ul>
</section>  
<!-- moneybox-300_600
<section class="ad">
    <div id="132522-3"><script src="//ads.themoneytizer.com/s/gen.js?type=3"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=132522&formatId=3"></script></div>
</section>
-->
<section class="ad">
  	<!-- jets94-sidebar-300_600 -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:600px"
	     data-ad-client="ca-pub-1827178535199750"
	     data-ad-slot="4979000108"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</section>
<section class="side-list"> 
  <div class="ttl">
    <h3>最新NEWS</h3>
    <p><a href="/?s=">【一覧へ】</a></p>
  </div>
  <ul>
    <?php //▼latest ?>
    <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $ppp = get_option('posts_per_page');
    $ppp=5; //出力ページ指定
    //$cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る
    //query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat='.-$cat_slug->cat_ID.'");
    query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp");
    if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php $words = 10;
    //mb_substr(元の文字列, 開始位置, 文字数)
    $content = mb_substr(get_the_excerpt(), 80, 80);
    $excerpt = explode(' ',$content);
    get_template_part( 'inc/news-list');
    ?>
    <?php endwhile; endif ?>
  </ul>
</section>
<section class="side-list"> 
  <div class="ttl">
    <h3>週間アクセスランキング</h3>
    <p><a href="/ranking-all/">【一覧へ】</a></p>
  </div>
  <ul>
    <?php
        $wpp = array (
                'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '80', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '100', /*画像のwidth（px）*/
                'thumbnail_height' => '100', /*画像のheight（px）*/
               // 'wpp_start' => '<ul class="lineup-carousel number">',
	             // 'wpp_end' => '</ul>',
                'post_html' => '<li>{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
  </ul>
</section>
<section class="amz-sidebar">
  <ul>
    <?php echo amazon_box("side_02",12) ?>
  </ul>
</section>
<section class="ad">
	<!-- jets94-sidebar-300_600 -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:600px"
	     data-ad-client="ca-pub-1827178535199750"
	     data-ad-slot="4979000108"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</section>
<!-- end sidebar-->