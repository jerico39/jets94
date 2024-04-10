
<?php
/*
Template Name:RSS_TOP_INCLUDE
*/
?>
<?php include_once(ABSPATH . WPINC . '/feed.php');
$youtube_feed_base = 'https://www.youtube.com/feeds/videos.xml?channel_id=';


$set_code = get_ini('rss.ini','NFL_YOUTUBE_C_ID'); //Youtube チャンネルID取得

if(empty($set_code)) exit;
$arrayLine = explode (',', $set_code);
$youtube_urls = array();
for($i = 0; $i < count($arrayLine); $i++)
{
	$youtube_urls[] =  $youtube_feed_base.$arrayLine[$i];
}
$rss_nfl = fetch_feed($youtube_urls);

	if (!is_wp_error( $rss_nfl ) ) :
	    $rss_nfl->set_cache_duration(3600);
		$rss_nfl->set_item_limit(3); //1ブログ最新の~つのみ表示
	    $rss_nfl->init();
		$max_item = 8; //実際に表示したい数
	    $maxitems_nfl = $rss_nfl->get_item_quantity(12); //SKIPを考慮して多めに取得
	    $rss_items_nfl = $rss_nfl->get_items(0, $maxitems_nfl);
	    date_default_timezone_set('Asia/Tokyo');
	endif;
	?>
	
	    <?php if ($maxitems_nfl == 0) echo '<li>No items.</li>';
	    else
	    foreach ( $rss_items_nfl as $item ) :
	    $title = $item->get_title(); //タイトル
		$title_cut = mb_substr($title, 0, 15) ."..";
	    if (strstr($title,"PR:")) { continue; } // PRならSkip
		if (strstr($title,"JAPAN FLAG")) { continue; } // PRならSkip
				
		/*youtubeの動画IDからサムネイルを取得*/
		$url = parse_url($item->get_permalink());
		parse_str($url['query'],$parameters);
		$parameters = str_replace("v=", "", $parameters);
		
	    ?>
		<li><a target="_blank" rel="nofollow" href="<?php echo $item->get_permalink(); ?>" title='<?php echo $title_cut."(".$item->get_feed()->get_title().")"; ?>'><img class="lazyload" data-src="https://i.ytimg.com/vi/<?php echo $parameters['v']; ?>/0.jpg" alt=""></a><a target="_blank" rel="/1" href="<?php echo $item->get_permalink(); ?>" title="<?php echo $title."(".$item->get_feed()->get_title().")"; ?>">
        <p><?php echo $title_cut."(".$item->get_feed()->get_title().")"; ?></p></a></li>
	    <?php 
		$cnt += 1;
			if($cnt ==  $max_item) break;
		endforeach; ?>

