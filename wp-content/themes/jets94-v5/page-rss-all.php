<?php
/*
Template Name:page-rss-all
*/
?>
<?php get_header();?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/list.css">
<div class="container">
  <div class="l-page">
    <div class="l-main">
    <section class="ad">
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
      </section>

        <section class="row-slider" id="amz">
          <div class="ttl"><h3>Amazonのオススメ[※ここから購入するとブログ継続・強化への寄付になります※]</h3></div>
          <div class="inner">
            <div class="">
              <ul class="lineup-carousel ">
                <?php echo amazon_box("top_clm") ?>
              </ul>
            </div>
          </div>
      </section>

      <section class="rss-all">
        <h1>NFL RSS</h1>
        <p><a href="/youtube-all/">【NFL・アメフト系Youtube更新一覧】はこちら</a></p>
        <div class="tabs">
          <input type="radio" name="c-tab" checked id="all">
          <label class="tab_item" for="all">NFL JAPAN</label>
          <input id="programming" type="radio" name="c-tab">
          <label class="tab_item" for="programming">ファンブログ</label>
          <input id="design" type="radio" name="c-tab">
          <label class="tab_item" for="design">海外NEWS</label>
          <div class="tab_content" id="all_content">
          <?php
            $set_rss_code = "";
            $set_rss_code = get_ini('rss.ini','NEWS_JP');
            wprss_display_feed_items( $args = array(
            'links_before' => '<ul class="list">',
            'links_after' => '</ul>',
            'link_before' => '<li>',
            'link_after' => '</li>',
            'limit' => '30',
            'source' => $set_rss_code
        ));
        ?>
          </div>
          <div class="tab_content" id="programming_content">
          <?php
            $set_rss_code = "";
            $set_rss_code = get_ini('rss.ini','BLOG_JP');
            wprss_display_feed_items( $args = array(
            'links_before' => '<ul class="list">',
            'links_after' => '</ul>',
            'link_before' => '<li>',
            'link_after' => '</li>',
            'limit' => '35',
            'source' => $set_rss_code
            ));
            ?>
          </div>
          <div class="tab_content" id="design_content">
          <?php
        $set_rss_code = "";
        $set_rss_code = get_ini('rss.ini','NEWS_US');
        wprss_display_feed_items( $args = array(
        'links_before' => '<ul class="list">',
        'links_after' => '</ul>',
        'link_before' => '<li>',
        'link_after' => '</li>',
        'limit' => '35',
        'source' => $set_rss_code
        ));
        ?>
          </div>
        </div>
    </section>
    <section class="ad">
          <?php get_template_part( 'inc/ad-under_refer'); ?>
      </section>
    </div>
      <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();?>
<script type="text/javascript">
  //パラメタからtabのチェック
  var obj2 = document.getElementsByName("c-tab")[0]; //nameの存在
  if(obj2){
    var n = parseInt(window.location.search.substr(1));
    document.getElementsByName("c-tab")[n].checked = true;
  }
</script>