<?php
/*
Template Name:page-tagcloud
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

        <section class="row-slider" id="amz">
            <div class="ttl"><h3>Amazonのオススメ[※ここから購入するとブログ継続・強化への寄付になります※]</h3></div>
            <div class="inner">
              <div class="">
                <ul class="lineup-carousel ">
                  <?php echo amazon_box("top_clm") ?>
                </ul>
              </div>
            </div>
        </section>

        <h1>タグクラウド</h1>
        <section class="tag_cloud">
          <?php wp_tag_cloud('smallest=7 & largest=24 & number=80'); ?>
        </section>
        <section class="ad">
            <?php get_template_part( 'inc/ad-under_refer'); ?>
        </section>

    </div>
    
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer();?>
