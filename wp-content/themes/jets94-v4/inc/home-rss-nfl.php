
<?php
/*
Template Name:RSS_TOP_INCLUDE
*/
?>
<?php include_once(ABSPATH . WPINC . '/feed.php');
$rss_nfl = fetch_feed(array(
'http://www.nfljapan.com/rss/headlines.xml', //NFL JAPAN ニュース
'http://www.nfljapan.com/rss/column.xml', //NFL JAPAN コラム
'http://www.afnjapan.com/feed' //アメフトニュース
	));
	if (!is_wp_error( $rss_nfl ) ) :
	    $rss_nfl->set_cache_duration(3600);
		//$rss_nfl->set_item_limit(5); //1ブログ最新の~つのみ表示
	    $rss_nfl->init();
	    $maxitems_nfl = $rss_nfl->get_item_quantity(10);
	    $rss_items_nfl = $rss_nfl->get_items(0, $maxitems_nfl);
	    date_default_timezone_set('Asia/Tokyo');
	endif;
	?>
	<dl class="home-rss-list-item">
	    <?php if ($maxitems_nfl == 0) echo '<dt>No items.</dt>';
	    else
	    foreach ( $rss_items_nfl as $item ) :
	    $title = $item->get_title(); //タイトル
	    if (strstr($title,"PR:")) { continue; } // PRならSkip
	    ?>
            <dt>
	        <a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $title."(".$item->get_feed()->get_title().")"; ?>' target="_blank"><?php echo mb_strimwidth($title, 0, 60, "…",utf8); ?></a><br />
	       </dt>
               <dd>
		 (<?php echo mb_strimwidth($item->get_feed()->get_title(), 0, 30, "…",utf8); ?>：<?php echo $item->get_date("Y/n/j"); ?>)
                 </dd>
                 <hr>
	    <?php endforeach; ?>
	</dl>


