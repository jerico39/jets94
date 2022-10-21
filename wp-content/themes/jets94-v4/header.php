<?php
include_once(dirname(__FILE__) . "/setting.php");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
  <!--DNS prefetch-->
<meta http-equiv="x-dns-prefetch-control" content="on">
<!--Adsense-->
<!-- Xpediaで関連コンテンツが表示されないため、コメントアウト→再表示-->
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="//tpc.googlesyndication.com">
<link rel="dns-prefetch" href="//www.gstatic.com">
<!--Twitter-->
<link rel="dns-prefetch" href="//twitter.com">
<link rel="dns-prefetch" href="//cdn.api.twitter.com">
<link rel="dns-prefetch" href="//p.twitter.com">
<link rel="dns-prefetch" href="//platform.twitter.com">
<!--FB-->
<link rel="dns-prefetch" href="//www.facebook.com">
<link rel="dns-prefetch" href="//connect.facebook.net">
<link rel="dns-prefetch" href="//static.ak.facebook.com">
<link rel="dns-prefetch" href="//static.ak.fbcdn.net">
<link rel="dns-prefetch" href="//s-static.ak.facebook.com">
<!--end.DNS prefetch-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="jets94">
  <!-- Bootstrap core CSS -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/library/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!--original css-->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/compil.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/sub.css?m=20220212">
  <?php wp_head();?>
<!-- GA&AD -->
<?php get_template_part( 'inc/gatag' ) ;?>


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    		var js, fjs = d.getElementsByTagName(s)[0];
    		if (d.getElementById(id)) return;
    		js = d.createElement(s); js.id = id;
    		js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.3&appId=117140211779461";
    		fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));</script>
    <?php //▲FB-page ?>



    <?php //▼エンター→検索を止める ?>
    <script>
jQuery(function(){
  jQuery("input[type=text],input[type=search]").keypress(function(ev) {
    if ((ev.which && ev.which === 13) ||
        (ev.keyCode && ev.keyCode === 13)) {
      return false;
    } else {
      return true;
    }
  });
});
</script>
    <?php //▲エンター→検索を止める ?>


</head>

<body>
  <!-- toggle menu -->

  <div class="navbar-header">
    <!-- icon -->
    <a class="js-navbar navbar-toggle">
          <span class="icon-bar"></span>
      </a>
    <!-- //icon -->
  </div>
  <div class="cmenu-nav ">
    <div class="cmenu-navigation-wrapper">
      <div class="row lr-nav lr-nav--auther">
        <div class="col-sm-12 lc-nav lc-nav--autherimg">
          <div class="l-nav_auther l-nav_auther--img">
          <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/jetskyou.png" alt="JETS狂" class="" itemprop="image"></a>
        </div>
          <div class="l-nav_auther l-nav_auther--btn">
          <ul class="c-snsbtn c-snsbtn--white">
            <li><a href="https://twitter.com/jetskyou" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li>
            <li><a href="https://www.facebook.com/jets94/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank"><i class="fab fa-youtube fa-2x"></i></a></li>
          </ul>
        </div>
        </div>
      </div>
        <div class="row lr-nav lr-nav--auther">
        <div class="col-sm-12 lc-nav lc-nav--authertxt">
          <div class="l-nav--authertxt">
            全米人気No1 スポーツリーグ<strong>「NFL」</strong> のチーム、<strong>「ニューヨーク・ジェッツ」</strong>のファンブログ、<strong>「JETS狂の宴」</strong>を一人できりもりする<strong>「JETS狂」</strong>と呼ばれる管理人。<br/>ふざけて作ったブログをひょんな事から10年以上も続ける事になってしまった。
            <br/> 「ブログの寿命」と「ダサいブログ名の由来」に関してはTOPページの下の方を見てください。
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 lc-nav lc-nav--search">
  
          <form action="/" name="search1" method="get">
            <dl class="p-nav p-nav--search">
              <dt><input id="s" type="text" value="" name="s" placeholder="Search" /></dt>
              <dd><button><i class="fab fa-sistrix"></i></button></dd>
            </dl>
          </form>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12 lc-nav lc-nav--menu">
            <?php
              $args = array(
              'theme_location' => 'header01',
              'container'      => 'nav',
              'items_wrap'     => '<ul id="%1$s" class="%2$s p-nav--menu p-nav--menu--left" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
              'fallback_cb'    => '',
              'echo'           => true
              );
              wp_nav_menu( $args ) ;

              $args = array(
              'theme_location' => 'header02',
              'container'      => 'nav',
              'items_wrap'     => '<ul id="%1$s" class="%2$s p-nav--menu p-nav--menu--left">%3$s</ul>',
              'fallback_cb'    => '',
              'echo'           => true
              );
              wp_nav_menu( $args ) ;
            ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- //toggle menu -->
  <!--end.cmenu-nav-->
  <header>
    <div class="row lr-header lr-header--ttl">
      <div class="col-md-12 lc-header--logo">
        <h1 class="sitename">
        <a href="/" itemprop="url">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/jets94-logo-header.svg" alt="JETS今日の宴" height="55" itemprop="image">
        </a></h1>
      </div>
    </div>
    <div class="row lc-slider-row">         
      <div class="col-md-12 lc-slider-col u-center">
        <div class="lc-slider-nav-wrap u-center">
          <div class="lc-slider-scroll-nav">
          <ul>
          <li><a href="/rss-all/">NFL応援RSS</a></li>
          <li><a class="header_wwe" href="/wwe/" onclick="gtag('event', 'click', {'event_category': 'header-link','event_label': '/wwe/','value': '1'});" >WWEの森</a></li>
          <li><a href="/#link" onclick="gtag('event', 'click', {'event_category': 'header-link','event_label': '#link','value': '2'});" >役立つリンク集</a></li>
          <li><a href="/category/topics/">トピックス</a></li>
          <li><a href="/dazn/">DAZN番組表</a></li>
          <li><a href="/#special">特集</a></li>
          <li><a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank">JETS狂チャンネル</a></li>
          <li><a href="/#what_jets94">JETS狂の宴とは</a></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
    <?php
    //パンクズ[TOPは非表示](breadcrumbs NavXT)
    if(function_exists('bcn_display') && !is_front_page()) {
    echo '  <div class="row lr-header lr-header--bcn"><div class="col-md-12 lc-bcn lc-header--bcn">';
    bcn_display();
    echo '</div></div>';
    }
    ?>
</header>