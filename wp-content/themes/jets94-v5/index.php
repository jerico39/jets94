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


      $taxonomy = $cat -> taxonomy;
      $cat_id = $cat -> term_id;
      $slug = $cat -> slug;
   

      if(!empty($cat_id) && $taxonomy == 'category') $query_string .= "&cat=".$cat_id;
      if(!empty($slug) && $taxonomy == 'post_tag') $query_string .= "&tag=".$slug;

      $utilHtml = new utilHtmlClass();
    
      if($query_string)
      $ary_name=array();
      $ary_name=['cat1','cat2'];
      $query_string = $utilHtml->get_query_union($query_string,'cat',$ary_name);
     
      $ary_name=['tag1','tag2'];
      $query_string = $utilHtml->get_query_union($query_string,'tag',$ary_name);
    
      parse_str($query_string, $queries); //検索条件の配列化($query_string はWP変数)
      
      //最終的には　$query_string で検索を行う。
      $selectlist = "";   
      $utilHtml->set_querys($queries);
    
      $utilHtml->set_category_name('NEWS','cat1','cat') ;
      $utilHtml->selectListCategory();
      $NewsList = $utilHtml->get_selectList();
    

      $utilHtml->set_category_name('試合結果','cat2','cat') ;
      $utilHtml->selectListCategory();
      $resultList = $utilHtml->get_selectList();
    

      $tagList = $utilHtml->selectListTeamtag('tag1','tag');
    
      $raundList = $utilHtml->selectListRaundtag('tag2','tag');
    
    
    ?>
    <h1>検索結果</h1>
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

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

<section class="list-search">
      <div><span class="search">ワード  
      <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" >
        </span>
      </div>
    </section>
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
        <div><span class="search">主なタグ</span>
          <? echo $raundList;?>
          <p>
            <a href="/tagcloud/">【全てのタグ一覧へ】</a>
          </p>
        </div>
      </section>
      <section class="list-search">
      <div id="search">
        <input type=submit value="検索する" class="u-button-search">
      </div>
    </section>
  <!--↑ select search-->
  <section class="list">
  </form >

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
