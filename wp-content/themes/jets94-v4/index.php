<?php get_header(); ?>
<!--content-->
<div class="container l-container">

  <div class="row lr-row">
    <div class="col-md-8 lc-box ">
      <!-- main -->
 <?php
/*-------------------------------------------*/
/*  Archive title
/*-------------------------------------------*/
// Use post top page（ Archive title wrap to div ）
if (get_post_type() != 'post') {
    if (is_year() || is_month() || is_day() || is_tag() || is_author() || is_tax() || is_category()) {
        $archiveTitle = get_the_archive_title();
        $archiveTitle_html = '<header><h1>'. $archiveTitle .'</h1></header>';
          echo $archiveTitle_html;
    }
}

/*-------------------------------------------*/
/*  Archive description
/*-------------------------------------------*/
  if (is_category() || is_tax() || is_tag()) {
      $category_description = term_description();
      $page = get_query_var('paged', 0);
      if (! empty($category_description) && $page == 0) {
          $archiveDescription_html = '<div >' . $category_description . '</div>';
         echo $archiveDescription_html;
      }
  }

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

/*
  the_posts_pagination(array(
                          'mid_size'  => 1,
                          'prev_text' => '&laquo;',
                          'next_text' => '&raquo;',
                          'type'      => 'list',
                          'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', '') . ' </span>'
                      ));

*/
 endif; // have_post()?>

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

<div class="col-md-4 lc-box lc-sidebar lc-sidebar--normal">
	<?php get_sidebar(); ?>

</div><!-- [ /.subSection ] -->

</div><!-- [ /.row ] -->
</div><!-- [ /.container ] -->
</div><!-- [ /.siteContent ] -->
 <?php get_footer(); ?>
</body>
</html>
