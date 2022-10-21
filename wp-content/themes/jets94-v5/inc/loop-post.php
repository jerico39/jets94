


<li id="post-<?php the_ID(); ?>">
	
	<a class="imglink" rel="" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<?php if ( has_post_thumbnail()) {?>
		<?php the_post_thumbnail( 'thumbnail', array( 'class' => '' ) ); ?>
	<?php }else{ ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/noimg.jpg"/>
	<?php } ?>
	</a>
	
	<div class="result-link"> 
	<div class="title"> <span class="date"><i class="fas fa-calendar-alt"><?php echo get_the_date() ?></i></span>
	<a rel="/1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<p><?php the_title(); ?></p></a></div>
	<div class="meta">
		<div class="cate"><i class="fas fa-folder-open"></i><?php the_category(' '); ?></div>
		<div class="tag"><i class="fas fa-tags"></i><?php the_tags('', ' ', ''); ?></div>
	</div>
	</div>
</li>

