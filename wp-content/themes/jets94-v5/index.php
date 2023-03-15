<?php get_header();?>
<?php get_template_part( 'inc/utilHtmlClass' ) ;?>
<div class="container list">
  <div class="l-page">
    <div class="l-main">
      <section class="ad">
      </section>
      <?php
      $name = "";
      $cat = get_queried_object(); //検索したカテゴリ、タグ名取得
      var_dump($cat);
      $name = $cat -> name;
      $cat_slug = $cat -> slug;
    //if(empty($name)):$name = get_search_query() ; //検索キーワード取得

    $name = (empty($name)) ? get_search_query() : $name;
    /*
    if(empty( $name) ) :  // 検索キーワードが無い時
     ?>
      <div class="noresult"><p>検索キーワードが未入力です。</p></div>
    <?php
    else : 
      */ 

      
    ?>
    <h1><?php echo  get_search_query(); ?></h1>
    <!--↓Access ranking-->
    <section class="row-slider ranking">
    <div class="ttl">
      <h3>月間アクセスランキング</h3>
      <a href="/ranking-all/">【ランキング一覧へ】</a>
    </div>
    <div class="inner">
      <div class="lineup">
        <?php
                $wpp = array (
                'range' => 'monthly', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '20', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '150', /*画像のwidth（px）*/
                'thumbnail_height' => '150', /*画像のheight（px）*/
                'wpp_start' => '<ul class="lineup-carousel number">',
	              'wpp_end' => '</ul>',
                'post_html' => '<li>{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
      </div>
    </div>
  </section>
  <!--↑Access ranking-->
  <!--↓ select search-->
  <?
  parse_str($query_string, $queries); //検索条件の配列化($query_string はWP変数)
  $selectCategory = new utilHtmlClass();
  $selectlist = "";   
  $selectCategory->set_querys($queries);
  $selectCategory->set_category_name('NEWS') ;
  $selectCategory->selectListCategory('category_name');
  $NewsList = $selectCategory->get_selectList();

  $selectCategory->set_category_name('試合結果') ;
  $selectCategory->selectListCategory('category_name');
  $resultList = $selectCategory->get_selectList();

  $tagList = $selectCategory->selectListTeamtag('tag');

  $raundList = $selectCategory->selectListRaundtag('tag');


  ?>
    <section class="list-search">
        <div><span class="search">NEWS</span>
          <? echo $NewsList;?>
        </div>
        <div><span class="search">試合結果</span>
          <? echo $resultList;?>
        </div>
        <div><span class="search">チーム</span>
          <? echo $tagList;?>
        </div>
        <div><span class="search">ラウンド</span>
          <? echo $raundList;?>
        </div>
      </section>
  <!--↑ select search-->
  <section class="list">


      <ul class="result-list">
        <?php 
        query_posts($query_string . "&post_type=post"); //検索結果は投稿のみ(ページ除外)
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
        else: ?>
          <div class="noresult"><p>該当する記事はありませんでした。</p></div>
        <?php endif; // have_post()?>
      </ul>
       
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
          )); ?>
      </div>
      <!-- //pager-index-->
    <?php //endif; //end  検索キーワードが無い時?>
    </section>
    </div>
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();?>
