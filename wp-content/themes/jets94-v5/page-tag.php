<?php
/*
Template Name:page-tag
*/
get_header();
  ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
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
<div class="container single">
  <div class="l-page">
    <div class="l-main">
    <section class="ad">
          
    </section>
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
