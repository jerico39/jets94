

<li id="post-<?php the_ID(); ?>_latest" class="" >
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'c-thumbnail c-thumbnail--news' ) ); ?>
	</a>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	<p><?php the_title(); ?></p>
	</a>
<!--
<DIV class=wpex-list-meta><time><?php the_time(__('F jS, Y','cover-wp')); ?></time></DIV>
-->
<p class="c-list_comment">[<?php comments_popup_link(__('0 コメント','cover-wp'), __('1 コメント','cover-wp'), __('% コメント','cover-wp')); ?>]</p>
</li>
