<?php
/*
Template Name:Single-sns
*/
?>
<?php //SNS
$article_url = get_permalink(); // 記事のURL
$article_title = wp_title( ' | ', false, 'right' ) . get_bloginfo('name'); // 記事のタイトル
$article_url_encode = urlencode($article_url); // 記事URLエンコード
$article_title_encode = urlencode($article_title." #nfljapan #dazn #nfl"); // 記事タイトルエンコード
$url_encode=urlencode(get_permalink());
$title_encode=urlencode(get_the_title());
$tw_title_encode=urlencode(get_the_title()." #nfljapan #dazn #nfl\n※記事へは画像orURLをクリック\n");
?>
<ul class="snsbtn">
  <li>
  <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" target="_blank"><i class="fab fa-facebook-square fa-2x"></i> </a>
  </li>
  <li>
  <a href="https://x.com/intent/post?url=<?php echo $url_encode ?>&text=<?php echo $tw_title_encode ?>" target="_blank"><i class="fab fab fa-twitter-square fa-2x"></i> </a>
  </li>
  <li>
  <a href="https://feedly.com/i/discover/sources/search/feed/https%3A%2F%2Fjets94.com%2F" target="_blank" class=""><i class="fas fa-rss-square fa-2x"></i></a>
  </li>
  <!--
  <li>
  <a href="/pushnews/"><i class="fa-solid fa-toggle-off fa-2x"><span class="txt">通知</span></i></a>
  </li>
-->
</ul>
<?php //sns?>