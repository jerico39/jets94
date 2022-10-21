

<article  id="post-<?php the_ID(); ?>" class="c-imgbox c-imgbox--headline">

	<div class="c-txt c-txt--headline">
		<p>NEWS HEAD LINE</p>
	</div>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to','cover-wp') ?>
																  <?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'headline', array( 'class' => 'c-trimimg c-trimimg--headline' ) ); ?>
    </a>
		<p class="c-ttl c-ttl--headline">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to','cover-wp') ?><?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
		</p>
 </article>
