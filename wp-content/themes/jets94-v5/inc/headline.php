

<div class="slider_thumb slider">
	<?php
	$cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る ?>
	<?php query_posts('ignore_sticky_posts=1&showposts=5&cat='.-$cat_slug->cat_ID.''); $i = 5; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		  <a rel="bookmark" title="<?php _e('Permanent Link to','cover-wp') ?>" href="<?php the_permalink(); ?>" title="">
		  	<?php the_post_thumbnail( 'large' ); ?>
          <p class="ttl"><?php the_title(); ?></p></a>
		  <?php
      $thumb .= get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
		endwhile;
	endif; ?>
</div>
<div class="thumb">
  <?php echo $thumb?>
</div>