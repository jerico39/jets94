

<li id="post-<?php the_ID(); ?>_latest" class="" >
	<div>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'c-thumbnail c-thumbnail--news--row' ) ); ?>
		</a>
	</div>
	<div>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<p><?php echo mb_strimwidth( strip_tags( get_the_title() ), 0, 50, '…', 'UTF-8' ); ?></p>
		</a>
	</div>
	<!--
<p class="c-list_comment">[<?php comments_popup_link(__('0 コメント','cover-wp'), __('1 コメント','cover-wp'), __('% コメント','cover-wp')); ?>]</p>
-->
</li>
