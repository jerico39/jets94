
<?php 
/*
Template Name:page-comment_end
*/
get_header();
$referer = $_SERVER['HTTP_REFERER'];
  ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<div class="container single">
  <div class="l-page">
    <div class="l-main">

      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article> 
        <div class="article-body"> 
          <?php the_content();?>
              <button type=“button” onclick="location.href='<?php echo $referer; ?>'">記事に戻る</button>
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
