
<?php
/*
Template Name:RSS_TOP_INCLUDE
*/
?>
<?php include_once(ABSPATH . WPINC . '/feed.php');
$rss_nfl = fetch_feed(array(
'https://www.youtube.com/feeds/videos.xml?channel_id=UCJ5v_MCY6GNUBTO8-D3XoAg'
	));
	if (!is_wp_error( $rss_nfl ) ) :
	    $rss_nfl->set_cache_duration(3600);
		$rss_nfl->set_item_limit(6); //1ブログ最新の~つのみ表示
	    $rss_nfl->init();
	    $maxitems_nfl = $rss_nfl->get_item_quantity(10);
	    $rss_items_nfl = $rss_nfl->get_items(0, $maxitems_nfl);
	    date_default_timezone_set('Asia/Tokyo');
	endif;
	?>
	<ul class="c-list c-list--youtube">
	    <?php if ($maxitems_nfl == 0) echo '<li>No items.</li>';
	    else
	    foreach ( $rss_items_nfl as $item ) :
	    $title = $item->get_title(); //タイトル
	    if (strstr($title,"PR:")) { continue; } // PRならSkip

		/*youtubeの動画IDからサムネイルを取得*/
		$url = parse_url($item->get_permalink());
		parse_str($url['query'],$parameters);
		$parameters = str_replace("v=", "", $parameters);

	    ?>
		<li >
			<a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $title."(".$item->get_feed()->get_title().")"; ?>' target="_blank">
				<img alt="youtube_samnail" class="c-thumbnail c-thumbnail--youtube" width="120" src="https://i.ytimg.com/vi/<?php echo $parameters['v']; ?>/0.jpg">
			</a>
				<p>
					<a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $title."(".$item->get_feed()->get_title().")"; ?>' target="_blank"><?php echo mb_strimwidth($title, 0, 60, "…","utf8"); ?></a><br />(<?php echo $item->get_date("Y/n/j"); ?>)
				</p>
				 </li>

	    <?php endforeach; ?>
	</ul>
