<?php
/*
Template Name:page-eyeshield21
*/
 get_header();
  ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/list.css">
<div class="container single">
  <div class="l-page">
    <div class="l-main">
      <section class="ad">
        
      </section>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article> 
  <!--
        <h1><?php the_title(); ?></h1>
        <?php include('inc/page-sns.php'); ?>
        -->
        <div class="article-eyecatch">
          <?php if (get_query_var('page') == 0) { //最初のページは0、2ページ目は2 になる。
										the_post_thumbnail(array(800,800));
										}?>
        </div>
        <div class="article-body"> 
          <?php the_content();?>
        </div>
      </article>
      <?php endwhile;endif;?>
      
      <section class="list">
      <ul class="result-list">
        <?php 
         query_posts('ignore_sticky_posts=1&showposts=50&category_name=ic21'); $i = 1; //カテゴリ名指定
        if (have_posts()) :
        $i=0
        ?>
          <?php while (have_posts()) : the_post();?>
          <?php get_template_part('inc/loop-post');
          $i++;
          //広告
          if ($i == 4 || $i == 8) {
          get_template_part('inc/loop-ad'); //adwar
          }
          endwhile;
        else: ?>
          <div class="noresult"><p>該当する記事はありませんでした。</p></div>
        <?php endif; // have_post()?>
      </ul>
      </section>
      


    </div>
    


    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    
  </div>
</div>
<?php get_footer();?>
