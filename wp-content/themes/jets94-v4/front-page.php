  <?php get_header();
  $setting = new setting(); //RSSのID等 headerでinclude
  ?>
  <div class="container l-container">  
    <div class="row">
      <div class="col-md-8 lc-box lc-box--topleft" <?php post_class(); ?>>
      <!--HEADLINE-->
      <?php
      $cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る ?>
      <?php query_posts('ignore_sticky_posts=1&showposts=1&cat='.-$cat_slug->cat_ID.''); $i = 1; ?>
      <?php if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'inc/headline' );
      endwhile;
      endif; ?>
      <!-- //HEADLINE-->
      </div>

      <div class="col-md-4 lc-box lc-box--topright">
        <div class="row">
          <div class="col-md-12 lc-img--topics">
          <!--Topics-->
          <?php query_posts('ignore_sticky_posts=1&showposts=1&category_name=topics'); $i = 1; //カテゴリ名指定 ?>
          <?php if (have_posts()) : while (have_posts()) : the_post();
          get_template_part( 'inc/topics' );
          endwhile;
          endif; ?>
          <!--//Topics-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 lc-txt--nextevent">
            <div class="p-nextevent p-nextevent--home">
              <p>NEXT EVENT</p>
              <div class="top_text_inc"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- ad jets94-top-row01 -->
      <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-1827178535199750"
    data-ad-slot="2449389938"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!--//ad -->


    <div class="row">
      <div class="col-md-12 lc-box">
        <div id="link" class="l-box js-height_05">
          <h3 class="c-ttl  c-ttl--contents">速報リンク</h3>
          <ul class="c-list c-link_block">
          <li>
            <a href="http://www.nfl.com/scores" target="_blank"  >速報：Score(スコア)</a>
            <a href="https://nfljapan.com/broadcast" target="_blank" >放送予定(NFL JAPAN)</a>
            <a href="https://nfljapan.com/standing/division" target="_blank">順位表(NFL JAPAN)</a>
            <a href="https://www.youtube.com/user/NFL" target="_blank" >Youtube：NFL-ハイライト、他</a>
            <a href="http://www.tsp21.com/sports/nfl/" target="_blank">TSP SPORTS -NFL-</a>
          </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="row lr-row lr-row--list c-tabtable">
      <div class="col-md-4 lc-box ">

        <div class="l-box js-height_01">
          <h3 class="c-ttl  c-ttl--contents">MORE NEWS</h3>
          <div class="c-tabs c-tabs--morenews ">
            <input id="news" type="radio" name="c-tab--morenews" checked>
            <label class="c-tab_item c-tab_item--morenews" for="news">NEWS</label>
            <input id="topics" type="radio" name="c-tab--morenews">
            <label class="c-tab_item c-tab_item--morenews" for="topics">TOPICS</label>
            <!-- news-->
            <div class="c-tab_content" id="news_content">
              <ul class="c-list c-list--morenews">
                <?php //▼latest ?>
                  <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $ppp = get_option('posts_per_page');
                    $ppp = $ppp - 1;
                    $ppp=5; //出力ページ指定
                    $cat_slug = get_category_by_slug('topics'); //カテゴリ除去はスラッグのIDを得る
                    //query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat=-3,-12&offset=1");
                    query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat='.-$cat_slug->cat_ID.'&offset=1");
                    ?>
                          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                            <?php $words = 10;
                    //mb_substr(元の文字列, 開始位置, 文字数)
                    $content = mb_substr(get_the_excerpt(), 80, 80);
                    $excerpt = explode(' ',$content);
                    get_template_part( 'inc/home-list');
                    ?>
                              <?php endwhile; endif ?>
              </ul>
              <div class="u-left">
                <a class="c-btn c-botton--normal" href="/article-all/">NEWS一覧</a>
              </div>
            </div>
            <!-- //news-->
            <!-- topics-->
            <div class="c-tab_content" id="topics_content">

              <ul class="c-list c-list--morenews">
                <?php //▼latest ?>
                  <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $ppp = get_option('posts_per_page');
                  $ppp = $ppp - 1;
                  $ppp=5; //出力ページ指定
                  $cat_slug = get_category_by_slug('topics'); //カテゴリ取得
                  query_posts("ignore_sticky_posts=1&paged=$page&showposts=$ppp&cat='.$cat_slug->cat_ID.'&offset=1");
                  ?>
                  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                  <?php $words = 10;
                  //mb_substr(元の文字列, 開始位置, 文字数)
                  $content = mb_substr(get_the_excerpt(), 80, 80);
                  $excerpt = explode(' ',$content);
                  get_template_part( 'inc/home-list');
                  ?>
                <?php endwhile; endif ?>
              </ul>
              <div class="u-left">
                <a class="c-btn c-botton--normal" href="/category/topics/" >TOPICS一覧</a>
              </div>
            </div>
            <!-- //topics-->
          </div>
        </div>
      </div>
      <!--end.MORE-->
      <!-- Ranking -->
      <div class="col-md-4 lc-box">
        <div class="l-box js-height_01">
          <h3 class="c-ttl  c-ttl--contents">アクセスランキング</h3>
          <div class="c-tabs c-tabs--ranking">
            <input id="weekly" type="radio" name="c-tab--ranking" checked>
            <label class="c-tab_item c-tab_item--morenews" for="weekly">週間</label>
            <input id="monthly" type="radio" name="c-tab--ranking">
            <label class="c-tab_item c-tab_item--morenews" for="monthly">月間</label>

            <!-- ranking weekly-->
            <div class="c-tab_content" id="weekly_content">
              <?php
                $wpp = array (
                'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '80', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '90', /*画像のwidth（px）*/
                'thumbnail_height' => '90', /*画像のheight（px）*/
                'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
            </div>
            <!-- ranking month-->
            <div class="c-tab_content" id="monthly_content">
              <?php
                $wpp = array (
                'range' => 'monthly', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '80', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '90', /*画像のwidth（px）*/
                'thumbnail_height' => '90', /*画像のheight（px）*/
                'post_html' => '<li class="number">{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
            </div>
            <!-- //ranking month -->
          </div>
          <div class="u-left">
            <a class="c-btn c-botton--normal" href="/ranking-all" >ランキング一覧</a>
          </div>
        </div>
      </div>
      <!-- //ranking -->

      <!-- comment -->
      <div class="col-md-4 lc-box">
        <div class="l-box js-height_01">
          <div class="fb-page" data-href="https://www.facebook.com/jets94" data-width="330" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="https://www.facebook.com/jets94"><a href="https://www.facebook.com/jets94">Jets狂の宴 -We Love NFL-</a></blockquote>
            </div>
          </div>
          <a href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" target="_blank">
            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr/bnr-youtube.jpg" border="0" alt="youtube">
          </a>
          <?php include('inc/rss-youtube.php'); ?>
          <div class="u-left">
            <a class="c-btn c-botton--normal" target="_blank" href="https://www.youtube.com/channel/UCr3e1KBWNJAlI6Nc4nSpEjw" >JETS狂チャンネル</a>
          </div>
        </div>
      </div>
      <!-- //comment -->
    </div>

    <!-- ad jets94-top-row02 -->
    <ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-1827178535199750"
    data-ad-slot="8909464840"
    data-ad-format="auto"
    data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!--//ad -->

    <div class="row row-3">
      <div class="col-md-6 lc-box">
        <div class="l-box js-height_02">
          <h3 class="c-ttl  c-ttl--contents">日本版NFLニュース RSS</h3>
          <?php
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="c-list c-list--rss">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' =>$setting->getRssId_news_jp()
      /*
      NFL JAPAN,アメフトNewsJapan、NFL JapanBiz、NFL Japanコラム
      */
      ));
      ?>
          <div class="u-left">
            <a class="c-btn c-botton--normal" href="/rss-all" >もっと見る</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 lc-box">
        <div class="l-box js-height_02">
          <h3 class="c-ttl  c-ttl--contents">NFL応援ブログ RSS</h3>
            <?php
            wprss_display_feed_items( $args = array(
              'links_before' => '<ul class="c-list c-list--rss">',
              'links_after' => '</ul>',
              'link_before' => '<li>',
              'link_after' => '</li>',
              'limit' => '6',
              'source' =>$setting->getRssId_blog()
            ));
            ?>
          <div class="u-left">
            <a class="c-btn c-botton--normal" href="/rss-all?1" >もっと見る</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 lc-box">
        <!--ad jets94-top-04-->
 
        <!-- //ad end.jets94-top-04-->
        <div class="l-box js-height_03">

          <?php //▼jetskyou?>
          <h3 class="c-ttl  c-ttl--contents"><a href="https://twitter.com/jetskyou" target="_blank">#JETS狂のつぶやき</a></h3>
          <a class="twitter-timeline" href="https://twitter.com/jetskyou" data-lang="ja" data-width="400" data-height="450" data-chrome="noheader" data-chrome="noheader nofooter" >Tweets by jetskyou
          </a><script src="//platform.twitter.com/widgets.js" async="" charset="utf-8"></script>
            <div class="u-left">
              <a class="c-btn c-botton--normal" target="_blank" href="https://twitter.com/jetskyou" >Twitterで見る</a>
            </div>
            <?php //TW jetskyou?>
        </div>
      </div>
      <div class="col-md-4 lc-box" id="special">
        <div class="l-box js-height_03">
        <?php include('inc/home-bnrs.php'); ?>
        </div>
      </div>
      <div class="col-md-4 lc-box" >
        <div class="l-box js-height_03">
          <?php include('inc/home-bnrs-2.php'); ?>
        </div>
      </div>
    </div>

<!-- ad jets94-top-row04 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1827178535199750"
     data-ad-slot="2804410869"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!--//ad-->
    <div class="row">
      <div class="col-md-4 lc-box">
        <div class="l-box js-height_04">
              <h3 class="c-ttl  c-ttl--contents">関連TVスケジュール</h3>
              <?php include('inc/home-tv.php'); ?>
        </div>
      </div>
      <div class="col-md-4 lc-box">
        <div class="l-box js-height_04">
          <h3 class="c-ttl  c-ttl--contents">Amazon</h3>
          <?php
             get_template_part( 'inc/home-amazon-link');
             ?>
        </div>
      </div>
      <div class="col-md-4 lc-box">
        <div class="l-box l-box--fb_youtube js-height_04">
          <h3 class="c-ttl  c-ttl--contents">コメント頂きましたぜ</h3>
          <ul class="c-list c-list--comment">
 <?php //▼コメント?>
          <?php
          $args = array(
          'number' => '5', // 取得するコメント数
          'post_status' => 'publish', //公開済
          'type' => 'comment' // 取得タイプを指定。トラックバックとピンバックは除外
          );
          // The Query
          $comments_query = new WP_Comment_Query;
          $comments = $comments_query->query( $args );
          // Comment Loop
          if ( $comments ) {
          foreach ( $comments as $comment ) {
          $url = get_permalink($comment->comment_post_ID);
          echo '<li>';
          echo '<span class="my_comments_content">';
          echo '<span class="my_author">';
          echo '<i class="fa fa-commenting"></i>[';
          comment_author($comment->comment_ID);
          echo ']</span>&nbsp;&nbsp;';
          echo '<span class="comment_date">';
          echo comment_date( 'Y.n.d', $comment->comment_ID);
          echo '</span>';
          echo '</span><br/>';
          $my_pre_comment_content = strip_tags($comment->comment_content);
          if(mb_strlen($my_pre_comment_content,"UTF-8")>30) {
          $my_comment_content = mb_substr($my_pre_comment_content,0,40) ; echo $my_comment_content. '...' ;
          } else {echo $comment->comment_content;};
          echo '<dd><i class="fa fa-angle-double-right"></i>';
          echo '<a href="'.get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID.'">'.$comment->post_title.'</a>';
          echo '</dd>';
          echo '</li>';
          }
          } else {
          echo 'コメントなし';
          }
          ?>
 <?php //▲コメント ?>
          </ul>

        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 lc-box ">
        <div class="l-box js-height_05">
          <h3 class="c-ttl  c-ttl--contents">海外NFLニュースRSS</h3>
          <?php
          wprss_display_feed_items( $args = array(
            'links_before' => '<ul class="c-list">',
            'links_after' => '</ul>',
            'link_before' => '<li>',
            'link_after' => '</li>',
            'limit' => '10',
            'source' =>$setting->getRssId_news_us()
          ));
          ?>
          <div class="u-left">
            <a class="c-btn c-botton--normal" href="/rss-all?2" >もっと見る</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 lc-box">
        <div id="link" class="l-box js-height_05">
          <h3 class="c-ttl  c-ttl--contents">お役に立ちリンク</h3>
          <ul class="c-list c-link_block">
          <h4>JETS関連</h4>
          <li><a href="https://jets94.com/roster">JETS 日本語ロースター</a><a href="https://jets94.com/searchname">名前の読み方一覧</a><a href="https://jets94.com/ontv">NFLの視聴方法</a><a href="https://jets94.com/superbowl-what">スーパーボウルとは？</a><a href="http://www.newyorkjets.com/"
          target="_blank">JETS 公式サイト</a><a href="http://www.nfl.com/teams/newyorkjets/schedule?team=nyj" target="_blank">JETS スケジュール</a><a href="http://www.spotrac.com/nfl/new-york-jets/cap/" target="_blank">JETS サラリーキャップ</a></li>
          <h4>NFL JAPAN(公式)</h4>
          <li><a href="https://nfljapan.com/" target="_blank">NFL Japan</a><a href="https://nfljapan.com/broadcast" target="_blank" class="p-note" >放送予定</a><a href="https://nfljapan.com/score" target="_blank">スコア</a><a href="https://nfljapan.com/standing/division" target="_blank">順位表</a></li>
          <h4>NFL.com(英語)</h4>
          <li><a href="http://www.nfl.com/" target="_blank">NFL.com</a><a href="http://www.nfl.com/scores" target="_blank" class="p-note" >速報：Score(スコア)</a><a href="http://www.nfl.com/injuries" target="_blank">Injuries list(ケガ人)</a><a href="http://www.nfl.com/stats/team" target="_blank">Team stats(チーム別成績)</a><a href="https://www.youtube.com/user/NFL" target="_blank" class="p-note" >Youtube：NFL-ハイライト、他</a>
          </li>
          <h4>日本語関連サイト</h4>
          <li><a href="https://www.flashscore.co.jp/american-football/usa/nfl/" class="p-note" target="_blank">NFL 試合速報</a><a href="http://www.tsp21.com/sports/nfl/" target="_blank">TSP SPORTS -NFL-</a><a href="http://www.2nn.jp/word/NFL" target="_blank">2NN -NFL-</a><a href="http://paper.li/jetskyou/1329805251" target="_blank">ほぼ日刊ＮＦＬ</a><a href="http://paper.li/jetskyou/1329827007"
          target="_blank">ほぼ日刊ＷＷＥ</a>
          </li>
          <h4>日本国内リーグ</h4>
          <li><a href="http://amefootlive.jp/" target="_blank">American Football Live</a><a href="http://www.xleague.com/schedule/" target="_blank">Ｘリーグ 試合日程</a><a href="http://www.kcfa.jp/schedule_all/" target="_blank">関東学連 試合日程(秋季)</a><a href="http://www.kansai-football.jp/schedule/" target="_blank">関西学連 試合日程</a><a href="http://kantokoukou-football.com/cms/index.php?page_id=0" target="_blank">関東高校連盟ＨＰ</a><a href="http://www.kansaikoukou-football.com/index.html" target="_blank">関西高校連盟ＨＰ</a>
          </li>
          <h4>海外関連サイト</h4>
          <li><a href="http://www.nfl.com/teams/roster?team=NYJ" target="_blank">NFL.com Roster - Jets</a><a href="http://espn.go.com/blog/new-york/jets/" target="_blank">ESPN - Jets</a><a href="http://pro32.ap.org/teams/new-york-jets" target="_blank">AP Newyork Jets</a><a href="http://www.profootballweekly.com/team/jets/" target="_blank">ProFootballWeekly.com-Jets</a><a href="http://www.pro-football-reference.com/teams/" target="_blank">NFL データベース</a><a href="http://www.nydailynews.com/sports/football/jets/index.html" target="_blank">NY DAILY NEWS</a><a href="http://www.nypost.com/sports/jets" target="_blank">NEWYORK POST</a><a href="http://bleacherreport.com/new-york-jets" target="_blank">bleacher report</a><a href="http://www.nj.com/jets/" target="_blank">NJ.com</a></li>
          <h4>アメリカ単位変換リンク＆NFLグッズ</h4>
          <li><a href="https://www.time-j.net/WorldTime/Location/America/New_York" target="_blank">時差変換[アメリカ東部＞日本]</a><a href="http://friends-esl.com/american-life/america-feet-inch-lb.php" target="_blank">アメリカ式身長・体重の単位換算</a></br>
          <a href="http://item.rakuten.co.jp/selection-int/c/0000000108/?scid=af_pc_link_txt&amp;sc2id=324676366" target="_blank"><b style="color:#ff99cc;">楽天・SELECTION EXPRESS</b></a><a href="http://item.rakuten.co.jp/selection-j/c/0000001211/?scid=af_pc_ich_link_txt&amp;sc2id=194075779" target="_blank">楽天・SELECTION</a><a href="http://item.rakuten.co.jp/wss-r/c/0000000102/?scid=af_pc_ich_link_urltxt_pc&amp;sc2id=167317437" target="_blank">ワールドスポーツ</a>
          </li>
                    </ul>
        </div>
      </div>
    </div>

    <div class="row" id="what_jets94">
      <div class="col-md-12 lc-box lc-fiximg lc-fiximg--jets">

        <div class="row" style="">
          <div class="col-md-3">

          </div>
          <div class="col-md-9 ">
            <p class="p-fiximg p-fiximg--jets">
              <span style="FONT-SIZE: 24px">JETS狂の<span style="FONT-SIZE: 50px">宴</span>とは？</span>
              <br>
              <span style="FONT-SIZE: 24px">ニューヨーク・ジェッツ</span>
              <span style="FONT-SIZE: 20px">が</span>
              <span style="FONT-SIZE: 24px">スーパーボウル</span>
              <span style="FONT-SIZE: 20px">を</span>
              <span style="FONT-SIZE: 30px">制覇</span>
              <span style="FONT-SIZE: 20px">すれば</span><br>
              <span style="FONT-SIZE: 40px;color:red;font-weight:bold;">終了</span>
              <span style="FONT-SIZE: 20px">する、</span>
              <span style="FONT-SIZE: 30px">儚</span>
              <span style="FONT-SIZE: 20px">きブログである。</span>
              <br>
              <span style="FONT-SIZE: 20px">※なお書いてる人は<span style="FONT-SIZE: 30px">「JETS狂」</span>と名乗っているが、<br>これはブログのタイトルを<span style="FONT-SIZE: 24px;">某居酒屋チェーン店</span>からパクっために、<br>そう名乗らざるえないだけで、実際には<span style="FONT-SIZE: 40px;color:red;font-weight:bold;">狂</span>ってはいない。</span>
            </p>
          </div>
        </div>

      </div>
      <!-- //col-md-12-->
    </div>


  </div>
  <!-- /container -->

<?php get_footer();?>
<script async type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/front-page.js'></script>
<script>
var CommonObj
jQuery(document).ready(function () {
  Obj = new front_page('<?php echo get_stylesheet_directory_uri(); ?>');
});
</script>
<style>
  /** CSS：Area */
</style>
</body>
</html>
