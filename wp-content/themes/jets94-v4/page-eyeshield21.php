<?php
/*
Template Name:page-eyeshield21
*/
?>
<?php get_header();?>

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
	wp_link_pages( $args );
 endwhile;

	?>
</article>
	<!-- //adsense -->

				<!--list-->
				<?php
				$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$ppp = get_option('posts_per_page');
				$cat_slug = get_category_by_slug('ic21'); //スラッグのIDを得る
				query_posts("ignore_sticky_posts=1&paged=$page&showposts=50&cat='.$cat_slug->cat_ID.'");

				if (have_posts()) :
			    $i=0
			    ?>
			     <?php while (have_posts()) : the_post();?>
			     <?php get_template_part('inc/loop-post');
			     $i++;
			     //広告
			     if ($i == 3 || $i == 6) {
			       get_template_part('inc/loop-ad'); //adwar
			     }
			     endwhile;

			   the_posts_pagination(array(
			                           'mid_size'  => 1,
			                           'prev_text' => '&laquo;',
			                           'next_text' => '&raquo;',
			                           'type'      => 'list',
			                           'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', '') . ' </span>'
			                       ));
			  endif; // have_post()?>
        <!-- adsense recommend-->
         <?php get_template_part('inc/page-ad-under_refer'); ?>
           <!-- //adsense recommend-->
			</div>
			<div class="col-md-4 subSection">
				<?php get_sidebar(); ?>

			</div><!-- [ /.subSection ] -->

		</div><!-- [ /.row ] -->
	</div><!-- [ /.container ] -->
<?php get_footer(); ?>
</body>
</html>
