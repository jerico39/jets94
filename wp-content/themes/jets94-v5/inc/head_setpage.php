<?php 
  global $template; // テンプレートファイルのパスを取得
  $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
  //echo "tpname:".$temp_name;
  $search1 = '/front-page|wwe|index/';
  $search2 = '/front-page|wwe/';
  $search3 = '/index/';
  //if(strpos($temp_name,'front-page') !== false){ //TOP
if(preg_match($search1, $temp_name ) === 1){
 ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/slick/slick-theme.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/slick/slick.css">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/slick/slick.min.js"></script>
<?php
  }
if(preg_match($search2, $temp_name ) === 1){
 ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/index.css?d=0612">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/front-page.js"></script>
 <?php
  }
if(preg_match($search3, $temp_name ) === 1){
 ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/list.css?d=0612">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/list.js"></script>
 <?php
  }
?>