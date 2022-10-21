<?php
/*
Template Name:page-rss-all
*/
?>
<?php get_header();
$setting = new setting(); //RSSのID等 headerでinclude?>
<div class="container l-container">
<div class="row lr-row">
	<!-- main -->
	<div class="col-md-8 lc-box">
		<!-- adsense -->
		<div class="l-ad l-ad-pagemax">
		<?php get_template_part('inc/page-ad-top'); ?>
		</div>
	<!-- //adsense -->
	<!-- //adsense -->
		<div class="c-tabs c-tabs--morenews ">
			<input id="rss-japan" type="radio" name="c-tab" checked>
			<label class="c-tab_item c-tab_item--3tab" for="rss-japan">日本ニュース</label>
			<input id="rss-blog" type="radio" name="c-tab">
			<label class="c-tab_item c-tab_item--3tab" for="rss-blog">応援ブログ</label>
			<input id="rss-us" type="radio" name="c-tab">
			<label class="c-tab_item c-tab_item--3tab" for="rss-us">海外ニュース</label>
			<!-- japan-->
			<div class="c-tab_content" id="rss-japan_content">
							<?php
					wprss_display_feed_items( $args = array(
						'links_before' => '<ul class="c-list c-list--rss_all">',
						'links_after' => '</ul>',
						'link_before' => '<li>',
						'link_after' => '</li>',
						'limit' => '40',
						'source' =>$setting->getRssId_news_jp()
					));
					?>
				</div>
			<!-- //japan-->
			<!-- blog-->
			<div class="c-tab_content" id="rss-blog_content">

				<?php
				wprss_display_feed_items( $args = array(
					'links_before' => '<ul class="c-list c-list--rss_all">',
					'links_after' => '</ul>',
					'link_before' => '<li>',
					'link_after' => '</li>',
					'limit' => '40',
					'source' =>$setting->getRssId_blog()
				));
				?>
			</div>

			<!-- //blog-->
			<!-- blog-->
			<div class="c-tab_content" id="rss-us_content">
				<?php
				wprss_display_feed_items( $args = array(
					'links_before' => '<ul class="c-list c-list--rss_all">',
					'links_after' => '</ul>',
					'link_before' => '<li>',
					'link_after' => '</li>',
					'limit' => '60',
					'source' =>$setting->getRssId_news_us()
				));
				?>
			</div>

			<!-- //blog-->
		</div>


			<!-- //main -->
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
			<script type="text/javascript">
			window.onload = function(){
			    var n = parseInt(window.location.search.substr(1));
			    document.getElementsByName("c-tab")[n].checked = true;
			};
			</script>
		</body>
		</html>
