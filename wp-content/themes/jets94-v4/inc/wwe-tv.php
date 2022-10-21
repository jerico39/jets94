
<?php
/*
Template Name:RSS_TOP_INCLUDE
*/
?>
<?php include_once(ABSPATH . WPINC . '/feed.php');
$rss_nfl = fetch_feed(array(
'http://tv.so-net.ne.jp/rss/schedulesBySearch.action?stationPlatformId=0&condition.keyword=WWE&submit=%E6%A4%9C%E7%B4%A2&stationAreaId=42' //WWE
	));
	$old_w_date = "";
	$old_w_title = "";
	$old2_w_title = "";
	if (!is_wp_error( $rss_nfl ) ) :
	    $rss_nfl->set_cache_duration(6000);
		//$rss_nfl->set_item_limit(5); //1ブログ最新の~つのみ表示
	    $rss_nfl->init();
	    $maxitems_nfl = $rss_nfl->get_item_quantity(200);
	    $rss_items_nfl = $rss_nfl->get_items(0, $maxitems_nfl);
	    $rss_items_nfl = array_reverse( $rss_items_nfl ); //並びを逆にする(昇順)
	    date_default_timezone_set('Asia/Tokyo');
	endif;
	?>

<ul class="c-list c-list--tv ">
	    <?php if ($maxitems_nfl == 0) echo '<li>No items.</li>';
	    else
		$cnt = 0;
	    foreach ( $rss_items_nfl as $item ) :
	   	if ($cnt >= 13)break; //表示件数
	    $title = $item->get_title(); //タイトル
	    $w_title = mb_strimwidth($title, 0, 80, "…","utf8"); //表示タイトル
	    $w_date = $item->get_date("Y/n/j H:i"); //表示二付け
	    if (strstr($title,"PR:")) { continue; } // PRならSkip
	    if (strstr($title,"World Sport")) { continue; } // Skip
	    if(($old_w_title == $w_title && $w_date == $old_w_date) || ($old2_w_title == $w_title && $w_date == $old2_w_date)) { continue; } // Skip
	$cnt++;
	$old2_w_title = $old_w_title;
	$old2_w_date = $old_w_date;
	$old_w_title = $w_title;
	$old_w_date = $w_date;
	    ?>

           <li>
	        <a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $title."(".$item->get_feed()->get_title().")"; ?>' target="_blank"> <?php echo $w_date; ?>：<?php echo $w_title ; ?></a><br />
	       </li>
	    <?php endforeach; ?>
</ul>
