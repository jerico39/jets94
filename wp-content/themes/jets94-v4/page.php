<?php get_header();
$setting = new setting(); //RSSのID等 headerでinclude?>
<div class="container l-container">
<div class="row lr-row">
	<!-- main -->
	<div class="col-md-8 lc-box">
<article id="post-<?php the_ID(); ?>" class="p-article p-article--wrapper" >
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div "p-article p-article--body">
		<?php the_content(); ?>
		</div>
	<?php
	$args = array(
  'before'           => '<nav class="pageer-links--single"><dl><dt>Pages :</dt><dd>',
		'after'            => '</dd></dl></nav>',
		'link_before'      => '<span class="page-numbers">',
		'link_after'       => '</span>',
		'echo'             => 1 );
	wp_link_pages( $args ); ?>

	<?php endwhile; ?>
		<!-- adsense recommend-->
	 <?php get_template_part('inc/page-ad-under_refer'); ?>
		 <!-- //adsense recommend-->
</article>
</div>
        <div class="col-md-4 lc-box lc-sidebar lc-sidebar--normal">
            <?php get_sidebar(); ?>
        </div>
        <!-- [ /.subSection ] -->

      </div>
      <!-- [ /.row ] -->
    </div>
    <!-- [ /.container ] -->
  </div>
  <!-- [ /.siteContent ] -->
  <?php get_footer(); ?>
</body>
</html>
