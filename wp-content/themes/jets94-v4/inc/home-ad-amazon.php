
<?php
/*
Template Name:home-ad-amazon
//参考：https://hyperts.net/20180203/amazon-ranking-tool/
*/
require_once('simple_html_dom.php'); //同ディレクトリに配置

$url = get_query_var('amazon_url'); //wp用変数受信関数(get_query_varにセット	)
if(empty($url)) {//set_query_varが空欄の場合のURL
$url = 'https://www.amazon.co.jp/gp/bestsellers/videogames'; //Amazonゲーム売れ筋
}

$html = file_get_html($url);
$topurl = 'https://www.amazon.co.jp';
$code = 'fvlink-22'
?>
<ul class="wpp-list">
<?php
$cnt = 0;
foreach ($html->find('.zg_itemRow') as $list) {
$cnt++;
if ($cnt >= 6)break; //表示件数
    //echo $list;

		//$title = $list->find('.p13n-sc-truncated',0);
		$a = $list->find('a',0);
		$href = $a->href;
		$title = $list->find('.p13n-sc-truncated',0);
		$img = $list->find('img',0);
		$title = $img->alt;
		?>
<li class="number">
	<a href="<?php echo $topurl.$href.'&tag='.$code; ?>" target="_blank"><?php echo  $img; ?></a>
	<p>
	<a href="<?php echo $topurl.$href.'&tag='.$code; ?>" target="_blank"><?php echo  $title; ?></a>
</p>
</li>
<?php
}
?>
</ul>
<div class="u-left">
	<a class="c-btn c-botton--normal" href="<?php echo $url.'?tag='.$code; ?>" target="_blank">一覧へ</a>
</div>
<?php
$html->clear(); //メモリ解放１
unset($html); //メモリ解放２
?>
