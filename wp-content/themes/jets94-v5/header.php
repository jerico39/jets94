<?php get_template_part( 'inc/head' ) ;?>
<?php get_template_part( 'inc/gatag' ) ;?>
<div id="loading" class="">
  <div class="spinner"></div>
</div>
<!--header-->
<header id="header">
  <div class="header-contents">
    <div class="header-left">
      <div class="header-logo"><a rel="" href="/" title="JETS狂の宴logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/jets94-logo-header.svg"/></a></div>
      <div class="header-menu">
        <?php get_template_part( 'inc/header_menu' ) ;?>
      </div>
    </div>
    <div class="header-right">
      <div class="header-sns">
        <ul>
          <li><a href="https://twitter.com/jetskyou" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li>
          <li><a href="https://www.facebook.com/jets94/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li>
          <li><a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank"><i class="fab fa-youtube fa-2x"></i></a></li>
        </ul>
      </div>
      <div class="header-search">
        <form role="search" action="/" name="search1" method="get">
          <input type="text" value="" name="s" placeholder=""/>
          <button class="fas" type="submit" value="&amp;#xf002"> <i class="fas fa-search"></i></button>
        </form>
      </div>
    </div><span class="btn-gnavi" id="js-hamburger"><span></span><span></span><span></span></span>
    <nav class="gnavi" id="js-nav">
      <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/jets94-logo-header.svg"/></a>
      <div class="search">
        <form role="search" action="/" name="search1" method="get">
          <input type="text" id="s" type="text" value="" name="s" placeholder=""/>
          <button class="fas" type="submit" value="&amp;#xf002"> <i class="fas fa-search"></i></button>
        </form>
        <a href="https://twitter.com/jetskyou" target="_blank"><i class="fab fa-twitter fa-2x"></i></a><a href="https://www.facebook.com/jets94/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a><a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
      </div>
      <?php get_template_part( 'inc/header_menu' ) ;?>
    </nav>
  </div>
  <div id="fb-root"></div>
</header>
<!--end header-->