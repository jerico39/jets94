<article id="post-<?php the_ID(); ?>" class="c-imgbox c-imgbox--topics">
<div class="c-txt c-txt--headline">
<P>TOPICS</P>
</div>
<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>
  <?php the_title_attribute(); ?>"><?php the_post_thumbnail('topics', array( 'class' => 'c-trimimg--topics' )); ?>
</a>
<p class="c-ttl c-ttl--topics">
  <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>
    <?php the_title_attribute(); ?>">
    <?php the_title(); ?>
  </a>
</p>
</article>
