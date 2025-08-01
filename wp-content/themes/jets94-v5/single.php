<?php get_header();
  ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/single.js?s=250801"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<div class="container single">
  <div class="l-page">
    <div class="l-main">
      <section class="ad">
       
      </section>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article> 
        <div class="meta">
          <span class="date">更新日：<?php echo the_modified_date() ?> / 公開日：<?php echo get_the_date() ?></span>
          <div class="link"><span class="cate"><?php the_category(' '); ?></span><span class="tag"><?php the_tags('', ' ', ''); ?></span></div>
        </div>
        <h1><?php the_title(); ?></h1>
        <?php include('inc/page-sns.php'); ?>
        <div class="article-eyecatch">
          <?php if (get_query_var('page') == 0) { //最初のページは0、2ページ目は2 になる。
										the_post_thumbnail(array(800,800));
										}?>
        </div>
        <div class="article-body"> 
          <?php the_content();?>
        </div>
      </article>
      <section class="pager">
     
        <?php wp_link_pages(array('before' => '<div class="page-links">','after' => '</div>','link_before' => '<span class="page-links_tp">','link_after' => '</span>','next_or_number' => 'next','nextpagelink' => __( '続きを読む &#9654;' ), 'previouspagelink' => __( '&#9664; 前のページ' ),) ); ?>
        <?php wp_link_pages(array('before' => '<div class="page-links">','after' => '</div>','link_before' => '<span class="page-links_t">','link_after' => '</span>', ) ); ?>
        
      </section>              
      <section class="nextpage">
        <?php
          $max_length   = 30;
          $trim_marker  = '...';
          $html         = '';
          ?>
      
        <ul>
        <?php if ( $prevPost = get_previous_post() ) { // 前の記事を取得 
            $prev_post = get_previous_post();
            $title =  $prev_post->post_title;
            $title_cut = mb_strlen($title)  > $max_length ? mb_substr($title, 0, $max_length) .".." : $title;
          ?>
          <li class="prev" >
          <?php 
          echo '<p>';
          previous_post_link('%link', '<<前の記事');
          echo '</p>';
          previous_post_link('%link', $title_cut );
          echo '<a href="' . get_permalink($prevPost->ID) . '" rel="prev">'; // 前の記事のリンク
          echo get_the_post_thumbnail($prevPost->ID);
          echo '</a>';
          ?>
        </li>
        <?php } ?>
        <?php if ( $nextPost = get_next_post() ) { // 次の記事を取得 
            $nextPost = get_next_post();
            $title =  $nextPost->post_title;
            $title_cut = mb_strlen($title)  > $max_length ? mb_substr($title, 0, $max_length) .".." : $title;
                  ?>
        <li class="next" >
        <?php 
          echo '<p>';
          next_post_link('%link', '次の記事>>');
          echo '</p>';
          next_post_link('%link', $title_cut);
          echo '<a href="' . get_permalink($nextPost->ID) . '" rel="next">'; // 次の記事のリンク
          echo get_the_post_thumbnail($nextPost->ID);
          echo '</a>';
        ?>
        </li>
        <?php } ?>
        </ul>
      </section>
      <?php endwhile;endif;?>

        <!-- rand tag-->
      <section class="row-slider">
        <?php 
        $ary = array("そうだったのか！", "マンガ","アイシールド21", "スーパーボウル", "プレビュー","がっかり・オブ・ザ・イヤー");
        $key = array_rand($ary, 1);
        ?>
          <div class="u-ttl">
            <h3>注目のタグ[<?php echo $ary[$key] ?>]</h3>
          </div>
          <div class="inner">
            <div class="lineup">
              <ul class="lineup-carousel">
                <?php //▼latest ?>
                <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $ppp = get_option('posts_per_page');
                $ppp=5; //出力ページ指定

                $ary_qu = array(
                  'posts_per_page' => $ppp,
                  'orderby' => 'rand',
                  'tax_query' => array( 
                    array(
                      'taxonomy'=>'post_tag',
                      'terms'=>array($ary[$key]),
                      'include_children'=>true,
                      'field'=>'slug',
                      'operator'=>'IN'
                      ),
                    )
                    );

                $set_query = new WP_Query($ary_qu);
                if ($set_query->have_posts()) : while ($set_query->have_posts()) : $set_query->the_post();
                //mb_substr(元の文字列, 開始位置, 文字数)
                $content = mb_substr(get_the_excerpt(), 80, 80);
                $excerpt = explode(' ',$content);
                $post->post_title = mb_substr( $post->post_title, 0, '20'). '...'; //Title調整
                get_template_part( 'inc/news-list');
               endwhile; endif ;wp_reset_postdata();  ?>
              </ul>
            </div>
          </div>
      </section>
        <!-- //rand tag-->

      <section class="amz">
        <b>※ここから購入するとブログ継続・強化への寄付になります※</b>
        <?php echo amazon_box("single_under") ?>
      </section>
    <section class="recommend">
      <!--money box RECOMMENDED CONTENT-->
      <div class="outbrain-tm" id="132522-16"><script src="//ads.themoneytizer.com/s/gen.js?type=16"></script><script src="//ads.themoneytizer.com/s/requestform.js?siteId=132522&formatId=16"></script></div>
    </section>             
    <section class="dazn">
      <a href="https://prf.hn/click/camref:1101l4sPt/creativeref:1011l20497" target="_blank" rel="sponsored">
      <img class="max-width" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr/dazn_nfl-500_100-02.jpg">
      </a>
    </section>
    <section class="dazn">
      <a href="https://a.r10.to/hUqfaE" target="_blank" rel="sponsored">
      <img class="max-width" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr/bnr_fanatics_500_100.jpg">
      </a>
    </section>
    <section class="recommend">
        <?php /*Adwards関連記事(GoogleADのJSへのリンクはヘッダーに統一)*/ ?>
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-format="autorelaxed"
        data-ad-client="ca-pub-1827178535199750"
        data-ad-slot="7337777787"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </section>

      <section class="comment"> 
        <?php comments_template('', true); ?>
    </section>

  </div>
    
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
    
  </div>
</div>
<?php get_footer();?>
