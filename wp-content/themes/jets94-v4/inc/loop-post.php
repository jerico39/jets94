<article id="post-<?php the_ID(); ?>" class="l-media  c-searchlist c-searchlist--item">


	<?php if ( has_post_thumbnail()) :?>


		<div class="l-media_thumbnail l-media_thumbnail--list">
		<a href="<?php the_permalink(); ?>">
		<?php
		//$attr = array('class'	=> "");
		//the_post_thumbnail('thumbnail',$attr); ?>

		<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'c-thumbnail c-thumbnail--news' ) ); ?>
		</a>
	</div>

	<?php endif; ?>

	<div class="l-media_body l-media_body--list ">


	<div class="p-meta_list p-meta_list--block">
		<span class="p-meta_item p-meta_item--update"><i class="fas fa-calendar-alt"></i><?php echo get_the_date() ?></span>
	</div>

		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="p-meta_list p-meta_list--category">
			<span class="p-meta_item p-meta_item--category c-link_block">
						<i class="fas fa-folder-open"></i><?php the_category(' '); ?></a>
			</span>
		</div>
		<div class="p-meta_list p-meta_list--tag">
			<span class="p-meta_item p-meta_item--tag c-link_block c-link_block--blue"><i class="fas fa-tags"></i><?php the_tags('', ' ', ''); ?></span>
		</div>
	</div>


</article>
