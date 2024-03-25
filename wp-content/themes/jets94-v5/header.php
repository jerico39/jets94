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
        <ul>
          <li><a href="/rss-all/">NFLブログ更新情報</a></li>
          <li><a href="/?s=">ニュース一覧</a></li>
          <li><a href="/category/result-all/">試合結果</a></li>
          <li><a href="/youtube-all/">Youtube更新情報</a></li>
          <li><a href="/wwe/">WWEの森</a></li>
        </ul>
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
      <ul class="accordion empty"> <!--メニューがズレるので必要-->
        <li>
          <p>&nbsp;</p>
        </li>
      </ul>
      <ul class="accordion">       
        <li class="def">
          <p>メインメニュー</p>
          <div class="i_box"><i class="one_i"></i></div>
        </li>
        <ul class="small-list">
        <li><a href="/rss-all/" class="u-base-color u-font-bold ">NFLブログ更新情報</a></li>
          <li><a href="/?s=">ニュース一覧</a></li>
          <li><a href="/category/result-all/">試合結果</a></li>
          <li><a href="/youtube-all/">Youtube更新情報</a></li>
          <li><a href="/wwe/">あつまれWWEの森</a></li>
          <li><a href="/about/">JETS狂の宴とは</a></li>
        </ul>
      </ul>
      <ul class="accordion">
        <li >
          <p>速報リンク</p>
          <div class="i_box"><i class="one_i"></i></div>
        </li>
        <ul class="small-list">
          <li><a href="https://nfljapan.com/broadcast" target="_blank">放送予定(NFL JAPAN)</a></li>
          <li><a href="http://www.nfl.com/scores" target="_blank">試合速報/スコア(NFL.com)</a></li>
          <li><a href="https://www.espn.com/nfl/scoreboard" target="_blank">スコア(ESPN)</a></li>
          <li><a href="https://www.cbssports.com/nfl/scoreboard/" target="_blank">スコア(CBS)</a></li>
          <li><a href="https://nfljapan.com/standing/division" target="_blank">順位表(NFL JAPAN) </a></li>
          <li><a href="https://www.youtube.com/user/NFL" target="_blank">Youtube(NFL公式)</a></li>
          <li><a href="http://www.tsp21.com/sports/nfl/" target="_blank">TSP SPORTS -NFL-</a></li>
        </ul>
      </ul>
      <ul class="accordion">       
        <li>
          <p>オリジナルコンテンツ</p>
          <div class="i_box"><i class="one_i"></i></div>
        </li>
        <ul class="small-list">
          <li><a href="/roster/" class="u-base-color u-font-bold ">ジェッツ日本語ロースター</a></li>
          <li><a href="/ontv/">NFLを見る方法</a></li>
          <li><a href="/kasuga/">オードリー春日の呪い</a></li>
          <li><a href="/eyeshield21/">特集アイシールド21</a></li>
          <li><a href="/superbowl-what/">スーパーボウルとは？</a></li>
          <li><a href="/nfl-word/">アメフト用語集</a></li>
          <li><a href="/penalty/">NFL反則集</a></li>
          <li ><a href="/#link-croud" class="linkon">役に立つリンク集</a></li>
          <li><a href="/ranking/">アクセスランキング</a></li>
        </ul>
      </ul>
      <ul class="accordion">
        <li>
          <p>人気のカテゴリ・タグ</p>
          <div class="i_box"><i class="one_i"></i></div>
        </li>
        <ul class="small-list">
          <li><a href="/tag/がっかり・オブ・ザ・イヤー/">がっかり・オブ・ザ・イヤー </a></li>
          <li><a href="/tag/そうだったのか！/">そうだったのか！(NFLトリビア)</a></li>
          <li><a href="/tag/nflスーパースター列伝/">NFLスーパースター列伝</a></li>
          <li><a href="/tag/トム・ブレイディ/">トム・ブレイディ</a></li>
          <li><a href="/tag/映画/">映画</a></li>
        </ul>
      </ul>
    </nav>
  </div>
  <div id="fb-root"></div>
</header>
<!--end header-->