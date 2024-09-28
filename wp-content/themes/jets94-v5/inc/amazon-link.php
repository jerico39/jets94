<?php 
function amazon_box($place){
  //検索条件
  $metaq[] = array('key' => 'az_place',	// キー：カスタムフィールド名（type）
          'value' => $place,			// 値：フォームで入力された値を配列で渡す
          'compare' => 'LIKE', );

  $args = array(
    'post_type' => 'amazon',    // 投稿
    'post_status' => 'publish', // 公開された投稿、または固定ページを表示(デフォルト)
    'posts_per_page' => 6,   // 表示する投稿数(-1を指定すると全投稿を表示)
    'meta_query' => $metaq,	//検索条件
    'meta_key' => 'az_sort',// ソートキー
    'orderby' => 'meta_value_num', //ソートキーの扱い(数値型)
    'order' => 'ASC' //ソートキーの昇順
    );
    $my_query = new WP_Query($args);
    $cnt = 0;
    $post_disp = "";
    $post_disp_sum = "";
  if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
      $post_disp = "";
      $post_disp  = get_field('az_tag1');
      if(!empty(get_field('az_tag2'))){
        $post_disp  .= "<br/>" . get_field('az_tag2');
      }

      $post_disp_sum .= "<li>".$post_disp."</li>";
      $cnt ++;
    // if ($cnt % 2 == 0) $post_disp .= "<br/>";
  endwhile; endif; wp_reset_postdata(); 
  return $post_disp_sum;
}
?>