<?php
/*
Template Name:page-article-all
*/
?>
<?php get_header(); ?>
<div class="container l-container">

  <div class="row lr-row">
    <div class="col-md-8 lc-box ">
      <!-- adsense -->
  		<div class="l-ad l-ad-pagemax">
  		<?php get_template_part('inc/page-ad-top'); ?>
  		</div>
  	<!-- //adsense -->
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$ppp = get_option('posts_per_page');
				$cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る
				query_posts("ignore_sticky_posts=1&paged=$page&showposts=40&cat='.-$cat_slug->cat_ID.'");


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
														endif; // loop()
														?>


                            <!-- pager-index-->
                             <div class="pager-index">
                                 <?php global $wp_rewrite; $paginate_base = get_pagenum_link(1); if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                                     $paginate_format = '';
                                     $paginate_base = add_query_arg('paged','%#%');
                                 }
                                 else{
                                     $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                                     user_trailingslashit('page/%#%/','paged');;
                                     $paginate_base .= '%_%';
                                 }
                                 echo paginate_links(array(
                                     'base' => $paginate_base,
                                     'format' => $paginate_format,
                                     'total' => $wp_query->max_num_pages,
                                     'mid_size' => 5,
                                     'current' => ($paged ? $paged : 1),
                                     'prev_text' => '«',
                                     'next_text' => '»',
                                 )); ?></div>
                            <!-- //pager-index-->
			</div><!-- [ /.mainSection ] -->

			<div class="col-md-4 subSection">
				<?php get_sidebar(); ?>

			</div><!-- [ /.subSection ] -->

		</div><!-- [ /.row ] -->
	</div><!-- [ /.container ] -->

<?php get_footer(); ?>
</body>
</html>
