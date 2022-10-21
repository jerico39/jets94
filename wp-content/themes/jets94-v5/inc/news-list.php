

<li id="post-<?php the_ID(); ?>_latest" class="" >
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	<?php the_post_thumbnail( 'thumbnail', array( 'class' => '' ) ); ?>
	</a>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	<p><?php the_title(); ?></p>
	</a>
</li>
