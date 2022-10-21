
<?php
/*
Template Name:RSS_TOP_INCLUDE
*/
?>
<?php include_once(ABSPATH . WPINC . '/feed.php');
$rss_nfl = fetch_feed(array(
'https://www.tvkingdom.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=NFL&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42', //Ｇガイドテレビ王国NFL
'http://tv.so-net.ne.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=%E3%82%A2%E3%83%A1%E3%83%AA%E3%82%AB%E3%83%B3%E3%83%95%E3%83%83%E3%83%88%E3%83%9C%E3%83%BC%E3%83%AB&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42',//アメリカンフットボール
'http://tv.so-net.ne.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=%E3%82%A2%E3%83%A1%E3%83%95%E3%83%88&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42', //アメフト
'https://www.tvkingdom.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=NFL%E5%80%B6%E6%A5%BD%E9%83%A8&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42', //NFL倶楽部
'http://tv.so-net.ne.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=%E3%82%AB%E3%83%AC%E3%83%83%E3%82%B8%E3%83%95%E3%83%83%E3%83%88%E3%83%9C%E3%83%BC%E3%83%AB&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42', //カレッジフットボール
'http://tv.so-net.ne.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=%E3%82%B9%E3%83%BC%E3%83%91%E3%83%BC%E3%83%9C%E3%82%A6%E3%83%AB&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42' //スーパーボウル
	));
	$old_w_date = "";
	$old_w_title = "";
	$old2_w_title = "";
	if (!is_wp_error( $rss_nfl ) ) :
	    $rss_nfl->set_cache_duration(6000);
		$rss_nfl->set_item_limit(6); //1ブログ最新の~つのみ表示
	    $rss_nfl->init();
	    $maxitems_nfl = $rss_nfl->get_item_quantity(200);
	    $rss_items_nfl = $rss_nfl->get_items(0, $maxitems_nfl);
	    $rss_items_nfl = array_reverse( $rss_items_nfl ); //並びを逆にする(昇順)
	    date_default_timezone_set('Asia/Tokyo');
	endif;
	?>
	    <?php if ($maxitems_nfl == 0) echo '<li>No items.</li>';
	    else
		$cnt = 0;
	    foreach ( $rss_items_nfl as $item ) :
	   	if ($cnt >= 11)break; //表示件数
	    $title = $item->get_title(); //タイトル
	    $w_title = mb_strimwidth($title, 0, 80, "…","utf8"); //表示タイトル
		$w_description = $item->get_description();// コンテンツ
	    $w_date = $item->get_date("Y/n/j H:i"); //表示二付け
	    if (strstr($title,"PR:")) { continue; } // PRならSkip
	    if (strstr($title,"World Sport")) { continue; } // Skip
		if (strstr($title,"Gベスト!")) { continue; } // Skip
	    if(($old_w_title == $w_title && $w_date == $old_w_date) || ($old2_w_title == $w_title && $w_date == $old2_w_date)) { continue; } // Skip
			$cnt++;
			$old2_w_title = $old_w_title;
			$old2_w_date = $old_w_date;
			$old_w_title = $w_title;
			$old_w_date = $w_date;
	    ?>
			<li>
	        <a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $title."(".$item->get_feed()->get_title().")"; ?>' target="_blank">
				<?php echo $w_title ; ?>
				<br/><?php echo $w_description ;?>
			</a><br />
	       </li>
	    <?php endforeach; ?>

