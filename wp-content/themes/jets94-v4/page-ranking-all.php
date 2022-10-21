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
		<div class="c-tabs c-tabs--ranking ">
			<input id="daily" type="radio" name="c-tab" checked>
			<label class="c-tab_item c-tab_item--3tab" for="daily">今日</label>
			<input id="weekly" type="radio" name="c-tab">
			<label class="c-tab_item c-tab_item--3tab" for="weekly">週間</label>
			<input id="monthly" type="radio" name="c-tab">
			<label class="c-tab_item c-tab_item--3tab" for="monthly">月間</label>
			<!-- daily-->
			<div class="c-tab_content" id="daily_content">
				<?php
					$wpp = array (
					'range' => 'daily', /*集計期間の設定（daily,weekly,monthly）*/
					'limit' => 10, /*表示数はmax5記事*/
					'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
					'title_length' => '80', /*タイトル文字数上限*/
					'stats_comments' => '0', /*コメント数は非表示*/
					'stats_views' => '0', /*閲覧数を表示させる=1*/
					'thumbnail_width' => '90', /*画像のwidth（px）*/
					'thumbnail_height' => '90', /*画像のheight（px）*/
					'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
					); ?>
					<?php wpp_get_mostpopular($wpp); ?>
				</div>
			<!-- //daily-->
			<!-- weekly-->
			<div class="c-tab_content" id="weekly_content">
				<?php
					$wpp = array (
					'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
					'limit' => 10, /*表示数はmax5記事*/
					'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
					'title_length' => '80', /*タイトル文字数上限*/
					'stats_comments' => '0', /*コメント数は非表示*/
					'stats_views' => '0', /*閲覧数を表示させる=1*/
					'thumbnail_width' => '90', /*画像のwidth（px）*/
					'thumbnail_height' => '90', /*画像のheight（px）*/
					'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
					); ?>
					<?php wpp_get_mostpopular($wpp); ?>
					</div>
			<!-- //weekly-->
			<!-- monthly-->
			<div class="c-tab_content" id="monthly_content">
				<?php
					$wpp = array (
					'range' => 'monthly', /*集計期間の設定（daily,weekly,monthly）*/
					'limit' => 10, /*表示数はmax5記事*/
					'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
					'title_length' => '80', /*タイトル文字数上限*/
					'stats_comments' => '0', /*コメント数は非表示*/
					'stats_views' => '0', /*閲覧数を表示させる=1*/
					'thumbnail_width' => '90', /*画像のwidth（px）*/
					'thumbnail_height' => '90', /*画像のheight（px）*/
					'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
					); ?>
					<?php wpp_get_mostpopular($wpp); ?>
			</div>

			<!-- //montly-->
		</div>
		<!-- adsense recommend-->
	 <?php get_template_part('inc/page-ad-under_refer'); ?>
		 <!-- //adsense recommend-->
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

		</body>
		</html>
