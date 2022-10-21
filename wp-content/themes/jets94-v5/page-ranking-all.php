<?php
/*
Template Name:page-ranking-all
*/
?>
<?php get_header();?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/list.css">
<div class="container">
  <div class="l-page">
    <div class="l-main">
    <section class="ad">
      <!-- google jets94-single-top -->
      <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-1827178535199750"
        data-ad-slot="2853022806"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <!-- //google -->
      </section>
      <section class="rss-all ">
        <h1>アクセスランキング</h1>
        <div class="tabs">
          <input type="radio" name="c-tab" checked id="all">
          <label class="tab_item" for="all">今日</label>
          <input id="programming" type="radio" name="c-tab">
          <label class="tab_item" for="programming">今週</label>
          <input id="design" type="radio" name="c-tab">
          <label class="tab_item" for="design">今月</label>
          <div class="tab_content lineup" id="all_content">
            
              <?php 
              $wpp = array (
            'range' => 'daily', /*集計期間の設定（daily,weekly,monthly）*/
            'limit' => 10, /*表示数はmax5記事*/
            'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
            'title_length' => '80', /*タイトル文字数上限*/
            'stats_comments' => '0', /*コメント数は非表示*/
            'stats_views' => '0', /*閲覧数を表示させる=1*/
            'thumbnail_width' => '90', /*画像のwidth（px）*/
            'thumbnail_height' => '90', /*画像のheight（px）*/
            'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
            ); ?>
					  <?php wpp_get_mostpopular($wpp); ?>
          
          </div>
          <div class="tab_content lineup" id="programming_content">
          
              <?php 
            $wpp = array (
            'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
            'limit' => 10, /*表示数はmax5記事*/
            'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
            'title_length' => '80', /*タイトル文字数上限*/
            'stats_comments' => '0', /*コメント数は非表示*/
            'stats_views' => '0', /*閲覧数を表示させる=1*/
            'thumbnail_width' => '90', /*画像のwidth（px）*/
            'thumbnail_height' => '90', /*画像のheight（px）*/
            'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
            ); ?>
					  <?php wpp_get_mostpopular($wpp); ?>
            
          </div>
          <div class="tab_content lineup" id="design_content">
          
              <?php 
            $wpp = array (
            'range' => 'monthly', /*集計期間の設定（daily,weekly,monthly）*/
            'limit' => 10, /*表示数はmax5記事*/
            'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
            'title_length' => '80', /*タイトル文字数上限*/
            'stats_comments' => '0', /*コメント数は非表示*/
            'stats_views' => '0', /*閲覧数を表示させる=1*/
            'thumbnail_width' => '90', /*画像のwidth（px）*/
            'thumbnail_height' => '90', /*画像のheight（px）*/
            'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
            ); ?>
					  <?php wpp_get_mostpopular($wpp); ?>
            
          </div>
        </div>
    </section>
    <section class="ad">
          <?php get_template_part( 'inc/ad-under_refer'); ?>
      </section>
    </div>
      <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();?>
<script type="text/javascript">
  //パラメタからtabのチェック
  var obj2 = document.getElementsByName("c-tab")[0]; //nameの存在
  if(obj2){
    var n = parseInt(window.location.search.substr(1));
    document.getElementsByName("c-tab")[n].checked = true;
  }
</script>