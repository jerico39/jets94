<?php
/*
Template Name:page-ranking-all
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
      <section class="rss-all ">
        <h1>NFL・アメフト系Youtube更新一覧</h1>
        <p><a href="/rss-all/">【NFL関連RSS】はこちら</a></p>
        <div class="tabs">
          <input type="radio" name="c-tab" checked id="all">
          <label class="tab_item" for="all">NFL</label>
          <input id="programming" type="radio" name="c-tab">
          <label class="tab_item" for="programming">国内</label>
          <input id="design" type="radio" name="c-tab">
          <label class="tab_item" for="design">海外</label>
          <div class="tab_content lineimg" id="all_content">
          <ul class="result-list">
            <?php 
              $inccate = "NFL";
              include('inc/rss-youtube_all.php'); 
              ?>
          </ul>
          </div>
          <div class="tab_content" id="programming_content">
            <ul class="result-list">
              <?php 
                $inccate = "JP";
                include('inc/rss-youtube_all.php'); 
                ?>
            </ul>
          </div>
          <div class="tab_content" id="design_content">
          <ul class="result-list">
          <?php 
                $inccate = "US";
                include('inc/rss-youtube_all.php'); 
                ?>
          </ul>
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