<!--ad-->
<aside class="l-sidebar">
	<!-- jets94-sidebar-300_600 -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:600px"
	     data-ad-client="ca-pub-1827178535199750"
	     data-ad-slot="4979000108"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</aside>
<!--youtube-->
<aside class="l-sidebar">
	<a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank">
		<img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr/bnr-youtube.jpg" border="0" alt="youtube">
	</a>
	<?php include('inc/rss-youtube.php'); ?>
	<div class="u-left">
		<a class="c-btn c-botton--normal" target="_blank" href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" >JETS狂チャンネル</a>
	</div>
</aside>
<!--FB-->
<aside class="l-sidebar">
	<div class="fb-page" data-href="https://www.facebook.com/jets94" data-width="330" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="https://www.facebook.com/jets94"><a href="https://www.facebook.com/jets94">Jets狂の宴 -We Love NFL-</a></blockquote>
		</div>
	</div>
</aside>

<aside class="l-sidebar l-sidebar--latest">
<h3 class="c-ttl  c-ttl--contents">最新情報</h3>
<div class="l-sidebar l-sidebar--latest c-tabs c-tabs--morenews ">
	<input id="news" type="radio" name="c-tab--morenews" checked>
	<label class="c-tab_item c-tab_item--morenews" for="news">NEWS</label>
	<input id="topics" type="radio" name="c-tab--morenews">
	<label class="c-tab_item c-tab_item--morenews" for="topics">TOPICS</label>
	<div class="c-tab_content" id="news_content">
		<ul class="c-list c-list--morenews">
			<?php //▼latest ?>
			<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$ppp = get_option('posts_per_page');
			$ppp=5; //出力ページ指定
			$cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る
			//query_posts("caller_get_posts=1&paged=$page&showposts=$ppp&cat=-3,-12&offset=1");
			query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat='.-$cat_slug->cat_ID.'");
			if(have_posts()) : while(have_posts()) : the_post(); ?>
									<?php $words = 10;
					//mb_substr(元の文字列, 開始位置, 文字数)
					$content = mb_substr(get_the_excerpt(), 80, 80);
					$excerpt = explode(' ',$content);
					get_template_part( 'inc/home-list');
					?>
										<?php endwhile; endif ?>
		</ul>
		<div class="u-left">
			<a class="c-btn c-botton--normal" href="/article-all/" >NEWS一覧</a>
		</div>
	</div>
	<!-- //news-->
	<!-- topics-->
	<div class="c-tab_content" id="topics_content">

		<ul class="c-list c-list--morenews">
			<?php //▼latest ?>
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$ppp = get_option('posts_per_page');
				$ppp=5; //出力ページ指定
				$cat_slug = get_category_by_slug('topics'); //カテゴリ取得
				query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat='.$cat_slug->cat_ID.'");
				?>
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php $words = 10;
				//mb_substr(元の文字列, 開始位置, 文字数)
				$content = mb_substr(get_the_excerpt(), 80, 80);
				$excerpt = explode(' ',$content);
				get_template_part( 'inc/home-list');
				?>
			<?php endwhile; endif ?>
		</ul>
		<div class="u-left">
			<a class="c-btn c-botton--normal" href="/category/topics/" >TOPICS一覧</a>
		</div>
	</div>
	<!-- //topics-->
</div>
</aside>
<!-- //Latest -->

<!-- ranking -->
<aside class="l-sidebar l-sidebar--ranking">
<h3 class="c-ttl  c-ttl--contents">アクセスランキング</h3>
<div class="c-tabs c-tabs--ranking">
	<input id="weekly" type="radio" name="c-tab--ranking" checked>
	<label class="c-tab_item c-tab_item--morenews" for="weekly">週間</label>
	<input id="monthly" type="radio" name="c-tab--ranking">
	<label class="c-tab_item c-tab_item--morenews" for="monthly">月間</label>

	<!-- ranking weekly-->
	<div class="c-tab_content" id="weekly_content">
		<?php
			$wpp = array (
			'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
			'limit' => 5, /*表示数はmax5記事*/
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
	<!-- ranking month-->
	<div class="c-tab_content" id="monthly_content">
		<?php
			$wpp = array (
			'range' => 'monthly', /*集計期間の設定（daily,weekly,monthly）*/
			'limit' => 5, /*表示数はmax5記事*/
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
	<!-- //ranking month -->
</div>
<div class="u-left">
	<a class="c-btn c-botton--normal" href="/ranking-all/" >ランキング一覧</a>
</div>
</aside>
<!-- //ranking -->

<!-- sidebar-ad-under -->
<aside class="l-sidebar">
<?php get_template_part( 'inc/sidebar-ad-under'); ?>
</aside>
<!-- // sidebar-ad-under -->
