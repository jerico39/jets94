<?php 
//*2024/11/14 $place=single_under のみこの内部でulタグを付与する。
function amazon_box($place,$max=8){
  //検索条件
  $metaq[] = array('key' => 'az_place',	// キー：カスタムフィールド名（type）
          'value' => $place,			// 値：フォームで入力された値を配列で渡す
          'compare' => 'LIKE', );

  $args = array(
    'post_type' => 'amazon',    // 投稿
    'post_status' => 'publish', // 公開された投稿、または固定ページを表示(デフォルト)
    'posts_per_page' => $max,   // 表示する投稿数(-1を指定すると全投稿を表示)
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
    if($place=="single_under" && $cnt==0){
      $post_disp_sum = "<ul>";
    }
      $post_disp = "";
      $post_disp = get_field('az_tag1');


      $result = json_decode($post_disp);
      //json形式の判定jsonの場合作り替える
      if ($result !== null) {

        // $post_disp .= $result;
 
        //var_dump($result);
        $item_link ="<a class='paapi5-pa-product-image-link' target='_blank' title='N/A' href='".$result->ItemsResult->Items[0]->DetailPageURL ."'>";
        $post_disp = "";
        $post_disp .=$item_link; 
        $post_disp .="<img class='paapi5-pa-product-image-source' src='".$result->ItemsResult->Items[0]->Images->Primary->Large->URL."'>";
        $post_disp .="</a>";
        $post_disp .="<br/>";
        $post_disp .=$item_link; 
        $post_disp .=$result->ItemsResult->Items[0]->ItemInfo->Title->DisplayValue;
        $post_disp .="</a>";

     }
          if(!empty(get_field('az_tag2'))){
            $post_disp  .= "<br/>" . get_field('az_tag2');
          }
  
  
          $post_disp_sum .= "<li>".$post_disp."</li>";
          if($place=="single_under" && $cnt==3){
              $post_disp_sum .= "</ul><ul>";
          }
   
      $cnt ++;
    // if ($cnt % 2 == 0) $post_disp .= "<br/>";
  endwhile; endif; wp_reset_postdata();
  if($place=="single_under"){
    $post_disp_sum .= "</ul>";
  } 
  
  return $post_disp_sum;
}
?>