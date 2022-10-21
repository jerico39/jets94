
<?php 
/*
Template Name:page-push_demo
*/
get_header();
$referer = $_SERVER['HTTP_REFERER'];
  ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<!-- push7 -->
<script src="https://sdk.push7.jp/v2/p7sdk.js"></script>
<script>
p7.init("3bd362ab4f7e4826aa4856b12b249cb1");
</script>
<!-- //end push7-->
<div class="container single">
  <div class="l-page">
    <div class="l-main">

      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article> 
        <div class="article-body"> 
          <?php the_content();?>
        </div>
      </article>

      <section class="ad">
          <?php get_template_part( 'inc/ad-under_refer'); ?>
      </section>
      <section class="amz">
        <ul>
          <?php get_template_part( 'inc/amazon-box4'); ?>
        </ul>
      </section>

    </div>
    <?php endwhile;endif;?>
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    
  </div>
</div>
<?php get_footer();?>
