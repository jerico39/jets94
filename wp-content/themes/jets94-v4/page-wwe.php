<?php
/*
Template Name:page-wwe
*/
?>
  <?php get_header();
  $setting = new setting(); //RSSのID等 headerでinclude
  ?>
  <div class="container l-container">  

  <div class="row">
      <div class="col-md-8 lc-box lc-box--topleft" <?php post_class(); ?>>
      <img src="/wp-content/themes/jets94-v4/img/wweforest_01.jpg" class="c-trimimg c-trimimg--headline wp-post-image" alt="" >
      </div>
      <div class="col-md-4 lc-box lc-box--topright">
        <div class="row">
          <div class="col-md-12 lc-img--topics">
          <?php 
          //WP_Queryでタグを指定しないと、なぜかRSSが全て取得できなくなる。
          $query = new WP_Query( array( 'showposts' => 1,'tag' => 'wwe','posts_per_page' => 1 ) ); 
          if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 
          get_template_part( 'inc/wwe-topics' );
          endwhile;
          endif; 
          ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 lc-txt--nextevent">
            <div class=" p-nextevent--home">
            <a class="twitter-timeline" data-width="389" data-height="220" data-theme="dark" href="https://twitter.com/WWEJapan?ref_src=twsrc%5Etfw">Tweets by WWEJapan</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-3">
      <div class="col-md-6 lc-box">
        <div class="l-box js-height_02">
          <h3 class="c-ttl  c-ttl--contents">WWE JAPAN/青空プロレス RSS</h3>
          <?php
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="c-list c-list--rss">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '7',
      'source' =>$setting->getRssId_wwe_jp()
      ));
      ?>
        </div>
      </div>
      <div class="col-md-6 lc-box">
        <div class="l-box js-height_02">
          <h3 class="c-ttl  c-ttl--contents">WWEブログ RSS</h3>
            <?php
            wprss_display_feed_items( $args = array(
              'links_before' => '<ul class="c-list c-list--rss">',
              'links_after' => '</ul>',
              'link_before' => '<li>',
              'link_after' => '</li>',
              'limit' => '8',
              'source' =>$setting->getRssId_wwe_blog()
            ));
            ?>
        </div>
      </div>
    </div>
      <!-- jets94-wwe-row01 -->
      <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-1827178535199750"
      data-ad-slot="4107144390"
      data-ad-format="auto"
      data-full-width-responsive="true"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
      <!--// -->
  <div class="row row-3">
	<div class="col-md-4 lc-box">
        <div class="l-box js-height_01">
		      <h3 class="c-ttl  c-ttl--contents"><a  target="_blank" href="https://www.youtube.com/channel/UCJ5v_MCY6GNUBTO8-D3XoAg" >WWE Youtube</a></h3>
          <?php include('inc/wwe-rss-youtube.php'); ?>
          <div class="u-left">
            <a class="c-btn c-botton--normal" target="_blank" href="https://www.youtube.com/channel/UCJ5v_MCY6GNUBTO8-D3XoAg" >WWEチャンネルへ</a>
          </div>
        </div>
      </div>
  <div class="col-md-4 lc-box">
        <div class="l-box js-height_02">
          <h3 class="c-ttl  c-ttl--contents">海外WWEブログ RSS</h3>
				<?php
				wprss_display_feed_items( $args = array(
				'links_before' => '<ul class="c-list c-list--rss">',
				'links_after' => '</ul>',
				'link_before' => '<li>',
				'link_after' => '</li>',
				'limit' => '9',
				'source' =>$setting->getRssId_wwe_us()
				));
				?>
        </div>
      </div>
      <div class="col-md-4 lc-box">
        <div class="l-box js-height_04">
              <h3 class="c-ttl  c-ttl--contents">関連TVスケジュール</h3>
              <?php include('inc/wwe-tv.php'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /container -->
<?php get_footer();?>
<script async type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/front-page.js'></script>
<script>
var CommonObj
jQuery(document).ready(function () {
  Obj = new front_page('<?php echo get_stylesheet_directory_uri(); ?>');
});
</script>
<style>
  /** CSS：Area */
</style>
</body>
</html>
