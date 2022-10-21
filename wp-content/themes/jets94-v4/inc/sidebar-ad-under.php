
<?php
/*
Template Name:sidebar-ad-under
*/
?>
<?php 
//検索条件
$metaq[] = array('key' => 'az_place',	// キー：カスタムフィールド名（type）
        'value' => 'sidebar',			// 値：フォームで入力された値を配列で渡す
        'compare' => 'LIKE', );

$args = array(
  'post_type' => 'amazon',    // 投稿
  'post_status' => 'publish', // 公開された投稿、または固定ページを表示(デフォルト)
  'posts_per_page' => -1,   // 表示する投稿数(-1を指定すると全投稿を表示)
  'meta_query' => $metaq,	//検索条件
  'meta_key' => 'az_sort',// ソートキー
  'orderby' => 'meta_value_num', //ソートキーの扱い(数値型)
  'order' => 'ASC' //ソートキーの昇順
  );
  $my_query = new WP_Query($args);
  $cnt = 0;
  $post_disp = "";
if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
    $post_disp  .= get_field('az_tag1');
    $post_disp  .= get_field('az_tag2');
    $cnt ++;

endwhile; endif; wp_reset_postdata(); 
?>
<aside  class="l-sidebar l-ad">
<?php echo $post_disp ?>

</aside>
<aside class="l-sidebar l-ad">
	<!-- jets94-sidebar-300_600 -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:600px"
	     data-ad-client="ca-pub-1827178535199750"
	     data-ad-slot="4979000108"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</aside>
<?php
get_template_part( 'inc/home-bnrs');
get_template_part( 'inc/home-bnrs-2');
?>
<script type="text/javascript" src="https://creative.prf.hn/creative/camref:1101l4sPt/creativeref:1011l28652"></script>
