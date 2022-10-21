<?php get_header(); ?>
<div class="container l-container">
<div class="row lr-row">
	<!-- main -->
	<div class="col-md-8 lc-box">
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
							<?php
if (have_posts()) : while (have_posts()) : the_post();?>
								<article id="post-<?php the_ID(); ?>" class="p-article p-article--wrapper" >
									<header>
										<div class="row lr-row lr-meta lr-meta--entry">

											<div class="col-md-2 lc-meta--update">
												<span class="p-meta_item p-meta_item--update "><i class="fas fa-calendar-alt"></i><?php echo get_the_date() ?></span>
											</div>
											<div class="col-md-10 lc-meta lc-meta--category">
												<span class="p-meta_item p-meta_item--category c-link_block"><?php the_category(' '); ?></span>
												<span class="p-meta_item p-meta_item--tag c-link_block c-link_block--blue"><?php the_tags('', ' ', ''); ?></span>
											</div>
										</div>
											<h1 ><?php the_title(); ?></h1>
										<?php include('inc/page-sns.php'); ?>
									</header>
									<!--items-->
				          <div class="p-article p-article--body">
										<?php if (get_query_var('page') == 0) { //最初のページは0、2ページ目は2 になる。
										if (has_post_thumbnail()) {
										$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
										echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" rel="lightbox">';
										the_post_thumbnail(array(800,800));
										echo '</a>';
										}
										}?>
										<div class="p-article p-article--content">
											<?php the_content();?>
										</div>
									</div>
									<!-- [ /.entry-body ] -->
									<div class="entry-footer">
										<?php
                        $args = array(
                            'before'           => '<nav class="pageer-links--single"><dl><dt>Pages :</dt><dd>',
                            'after'            => '</dd></dl></nav>',
                            'link_before'      => '<span class="page-numbers">',
                            'link_after'       => '</span>',
                            'echo'             => 1 );
                        wp_link_pages($args); ?>

									<?php get_template_part('inc/page-ad-under_content'); ?>
									<div class="option-footer"></div>
									<!--end.vs-social-buzz をページャーの下に移動させる-->

									</div>
									<!-- [ /.entry-footer ] -->
                        <nav>
                            <ul class="pager pager-onenext">
                            <li class="previous previous-onenext">
                            <?php //previous_post_link('%link', '%title');
														previous_post_link('%link', '前の記事へ');
														?>
                            </li>
                            <li class="next next-onenext">
                            <?php //next_post_link('%link', '%title');
														next_post_link('%link', '次の記事へ');
														?>
                            </li>
                            </ul>
                        </nav>
                     <!-- adsense recommend-->
										 	<?php get_template_part('inc/page-ad-under_refer'); ?>
                        <!-- //adsense recommend-->
									<?php comments_template('', true); ?>
								</article>
								<?php endwhile;endif;?>

						</div>
						<!-- [ /.mainSection ] -->

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
			<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/single.js'></script>
			<script>
			var CommonObj
			jQuery(document).ready(function () {
			  Obj = new single('<?php echo get_stylesheet_directory_uri(); ?>');
			});
			</script>
			<style>
			  /** CSS：Area */
			</style>
		</body>
		</html>
