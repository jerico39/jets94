<?php
/*
Template Name:page-tag
*/
get_header();
  ?>
<style>
  .tag_cloud>a {
	display: inline-block;
	margin: 0 .1em .6em 0;
	padding: .6em;
	line-height: 1;
	text-decoration: none;
	color: #0000ee;
	background-color: #fff;
	border: 1px solid #0000ee;
	border-radius: 2em;
}
</style>
  <!--↓Access ranking-->
  <section class="row-slider ranking">
    <div class="ttl">
      <h3>今日のアクセスランキング</h3>
      <a href="/ranking-all/">【ランキング一覧へ】</a>
    </div>
    <div class="inner">
      <div class="lineup">
        <?php
                $wpp = array (
                'range' => 'daily', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '20', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '150', /*画像のwidth（px）*/
                'thumbnail_height' => '150', /*画像のheight（px）*/
                'wpp_start' => '<ul class="lineup-carousel number">',
	              'wpp_end' => '</ul>',
                'post_html' => '<li>{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
      </div>
    </div>
  </section>
  <!--↑Access ranking-->
<div class="container single">
  <div class="l-page">
    <div class="l-main">
  
    <h1>タグ一覧</h1>
    <section class="tag_cloud">
      <?php wp_tag_cloud('smallest=7 & largest=24 & number=80'); ?>
    </section>
    <section class="ad">
        <?php get_template_part( 'inc/ad-under_refer'); ?>
    </section>
    <section class="amz">
      <ul>
        <?php get_template_part( 'inc/amazon-box4'); ?>
      </ul>
    </section>

    </div>
    
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    
  </div>
</div>
<?php get_footer();?>
