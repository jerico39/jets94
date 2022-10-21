<?php
/*
Template Name:page-wwe
*/
?>
  <?php get_header();?>
  <script>
  var CommonObj
  jQuery(document).ready(function () {
    Obj = new front_page('<?php echo get_stylesheet_directory_uri(); ?>');
  });
</script>

<div class="container">
  <section class="top" id="top">
    <div class="topleft">
      <div class="wwe"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wweforest_01.jpg"></div>
    </div>
    <div class="topright">
    <div class="wwe"> 
          <div class="name">
            <p class="line">WWE</p>
         <?php  $query = new WP_Query( array( 'showposts' => 1,'tag' => 'wwe','posts_per_page' => 1 ) ); 
          if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); 
          ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>
            <?php the_title_attribute(); ?>"><?php the_post_thumbnail('topics', array( 'class' => '' )); ?>
            </a>
          </div>
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>">
          <p class="ttl">
              <?php the_title(); ?>
          </p></a>
          <?php endwhile;
           endif; ?>
      </div>
      <div class="wwetweet"><a class="twitter-timeline" data-width="" data-height="220" data-theme="dark" href="https://twitter.com/WWEJapan?ref_src=twsrc%5Etfw">Tweets by WWEJapan</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> </div>
    </div>
  </section>


  <section class="ad" id="ad">
     <!-- ad jets94-top-row01 -->
    <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-1827178535199750"
    data-ad-slot="2449389938"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!--//ad -->
  </section>

  <section class="row-slider youtube">
    <div class="ttl"><h3>プロレス Youtube</h3></div>
    <div class="inner">
      <div class="lineup">
        <ul class="lineup-carousel top10">
        <?php include('inc/rss-youtube_wwe.php'); ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="l-clm2" id="rss_jp">
    <div class="sec">
      <div class="ttl">
        <h3>WWE JAPAN/青空プロレス RSS</h3>
      </div>
  
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','WWE_NEWS_JP');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
 
    </div>
    <div class="sec">
      <div class="ttl">
        <h3>WWEブログ</h3>
      </div>
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','WWE_BLOG');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
    </div>
  </section>


  <section class="ad" id="ad">
       <!-- ad jets94-top-row02 -->
       <ins class="adsbygoogle"
      style="display:block"
      data-ad-client="ca-pub-1827178535199750"
      data-ad-slot="8909464840"
      data-ad-format="auto"
      data-full-width-responsive="true"></ins>
      <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    <!--//ad -->
  </section>
  <section class="l-clm2">
    <div class="sec">
      <div class="ttl">
        <h3>海外ニュース RSS</h3>
      </div>
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','WWE_US');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
    </div>
    <div class="sec">
      <div class="ttl">
        <h3>関連TV    RSS</h3>
      </div>
      <ul class="list">
      <?php include('inc/rss-tv_wwe.php'); ?>
      </ul>
    </div>
  </section>
  
</div>
<?php get_footer();?>
