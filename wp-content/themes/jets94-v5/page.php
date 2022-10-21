<?php get_header();
  ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<div class="container single">
  <div class="l-page">
    <div class="l-main">

      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article class="page"> 
        <div class="article-body"> 
          <?php the_content();?>
        </div>
      </article>
      <section class="pager">
     
      <?php wp_link_pages(array('before' => '<div class="page-links">','after' => '</div>','link_before' => '<span class="page-links_tp">','link_after' => '</span>','next_or_number' => 'next','nextpagelink' => __( '続きを読む &#9654;' ), 'previouspagelink' => __( '&#9664; 前のページ' ),) ); ?>
      <?php wp_link_pages(array('before' => '<div class="page-links">','after' => '</div>','link_before' => '<span class="page-links_t">','link_after' => '</span>', ) ); ?>
      
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
    <?php endwhile;endif;?>
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    
  </div>
</div>
<?php get_footer();?>
