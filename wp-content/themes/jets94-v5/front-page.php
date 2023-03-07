<?php get_header();
  ?>

<script>
  var Obj
  jQuery(document).ready(function () {
    Obj = new front_page('<?php echo get_stylesheet_directory_uri(); ?>');
  });
</script>
<div class="container front-page">
  <section class="top" id="top">
    <div class="topleft">

      <div class="sliderArea">
        <div class="name">
          <p class="line">HEAD LINE</p>
        </div>
        <!--HEADLINE-->
        <?php get_template_part( 'inc/headline' ); ?>
        <!-- //HEADLINE-->
      </div>
      <div class="link-list"><a href="/?s=">【ニュース一覧へ】</a></div>
    </div>

    <div class="topright">
       <!--Topics-->

      <div class="topics"> 
          <div class="name">
            <p class="line">TOPICS</p>
            <?php query_posts('ignore_sticky_posts=1&showposts=1&category_name=topics'); $i = 1; //カテゴリ名指定 ?>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>
            <?php the_title_attribute(); ?>"><?php the_post_thumbnail('topics', array( 'class' => '' )); ?>
            </a>
          </div>
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'cover-wp') ?>">
          <p class="ttl">
              <?php the_title(); ?>
          </p></a>
          <?php endwhile;
           endif; ?>
      </div>
      <div class="topics" > 
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
      </div>
       <!--//Topics-->
       <!--
      <div class="nextevent">
        <p>NEXT EVENT</p>
        <div class="top_text_inc"></div>
      </div>
          -->
    </div>
  </section>

  <section class="ad" id="ad">
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
  </section>
  <section class="row-slider ranking">
    <div class="ttl">
      <h3>週間アクセスランキング</h3>
      <a href="/ranking-all/">【ランキング一覧へ】</a>
    </div>
    <div class="inner">
      <div class="lineup">
        <?php
                $wpp = array (
                'range' => 'weekly', /*集計期間の設定（daily,weekly,monthly）*/
                'limit' => 5, /*表示数はmax5記事*/
                'post_type' => 'post', /*投稿のみ指定） 'post,page' だと固定ページも含む*/
                'title_length' => '80', /*タイトル文字数上限*/
                'stats_comments' => '0', /*コメント数は非表示*/
                'stats_views' => '0', /*閲覧数を表示させる=1*/
                'thumbnail_width' => '150', /*画像のwidth（px）*/
                'thumbnail_height' => '150', /*画像のheight（px）*/
                'wpp_start' => '<ul class="lineup-carousel number">',
	              'wpp_end' => '</ul>',
                'post_html' => '<li>{thumb}<p>{title}</p></li>', /*表示されるhtmlの設定（サムネイル、記事タイトル、の順で表示）*/
                ); ?>
                <?php wpp_get_mostpopular($wpp); ?>
      </div>
    </div>
  </section>

  </secctio>
  <section class="l-clm2" id="rss_jp">
    <div class="sec">
      <div class="ttl">
        <h3>NFL JAPAN RSS</h3>
        <p><a href="/rss-all/">【一覧へ】</a></p>
      </div>
  
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','NEWS_JP');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
 
    </div>
    <div class="sec">
      <div class="ttl">
        <h3>NFLファンブログ RSS</h3>
        <p><a href="/rss-all/?1">【ブログ一覧へ】</a></p>
      </div>
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','BLOG_JP');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
    </div>
  </section>
  <section class="row-slider" id="amz">
    <div class="ttl"><h3>JETS狂のオススメ</h3></div>
    <div class="inner">
      <div class="lineup">
        <ul class="lineup-carousel top10">
          <?php get_template_part( 'inc/amazon-box4'); ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="ad" id="ad">
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
  </section>
  <section class="row-slider youtube">
    <div class="ttl">
      <h3>NFL系Youtube</h3>
      <a href="/youtube-all/">【Youtube一覧へ】</a>
    </div>
    <div class="inner">
      <div class="lineup">
        <ul class="lineup-carousel top10">
        <?php include('inc/rss-youtube.php'); ?>
        </ul>
      </div>
    </div>
  </section>

  <section class="l-clm2">
    <div class="sec">
      <div class="ttl">
        <h3>海外ニュースRSS</h3>
        <p><a href="/rss-all/?2">【一覧へ】</a></p>
      </div>
      <?php
      $set_rss_code = "";
      $set_rss_code = get_ini('rss.ini','NEWS_US');
      wprss_display_feed_items( $args = array(
      'links_before' => '<ul class="list">',
      'links_after' => '</ul>',
      'link_before' => '<li>',
      'link_after' => '</li>',
      'limit' => '6',
      'source' => $set_rss_code
      ));
      ?>
    </div>
    <div class="sec">
      <div class="ttl">
        <h3>関連TV RSS</h3>
        <p><a href="/dazn/">【DAZN番組表はこちら】</a></p>
      </div>
      <ul class="list">
      <?php include('inc/rss-tv.php'); ?>
      </ul>
    </div>
  </section>
  <section class="l-clm3">
    <div class="sec">
      <div class="ttl">
        <h3><a href="https://twitter.com/jetskyou/" target="_blank">#JETS狂のつぶやき</a></h3>
      </div>
      <ul role="list"><a class="twitter-timeline" target="_blank" href="https://twitter.com/jetskyou" data-lang="ja" data-width="400" data-height="650" data-chrome="noheader" data-chrome="noheader nofooter" >Tweets by jetskyou
</a>
      </ul>
    </div>
    <div class="sec comment">
      <div class="ttl">
        <h3>コメント頂きました</h3>
      </div>
      <ul class="list">
      <?php //▼コメント?>
          <?php
          $args = array(
          'number' => '6', // 取得するコメント数
          'status' => 'approve', //承認済み
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
    <div id="link-croud" name="link-croud" class="sec link-croud">
      <div class="ttl">
        <h3>リンク集</h3>
      </div>
      <ul class="list">
        <li>
          <h4>NFL JAPAN(公式) ＆日本語関連サイト</h4><a href="https://nfljapan.com/" target="_blank">NFL Japan</a><a href="https://nfljapan.com/broadcast" target="_blank">放送予定</a><a href="https://nfljapan.com/score" target="_blank">スコア</a><a href="https://nfljapan.com/standing/division" target="_blank">順位表</a><a href="https://www.flashscore.co.jp/american-football/usa/nfl/" target="_blank">NFL 試合速報</a><a href="http://www.tsp21.com/sports/nfl/" target="_blank">TSP SPORTS -NFL-</a><a href="http://www.2nn.jp/word/NFL" target="_blank">2NN -NFL-</a>
        </li>
        <li>
          <h4>NFLグッズ(国内)</h4>
          <a href="https://hb.afl.rakuten.co.jp/hgc/305a294f.bc7069ab.305a2950.1c09fa18/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Ffanatics-store%2Fc%2F0000000004%2F&link_type=text&ut=eyJwYWdlIjoidXJsIiwidHlwZSI6InRleHQiLCJjb2wiOjF9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;"  >楽天・Fanatics</a>
          <a href="http://item.rakuten.co.jp/selection-int/c/0000000108/?scid=af_pc_link_txt&amp;amp;sc2id=324676366" target="_blank">楽天・SELECTION EXPRESS</a>
          <a href="http://item.rakuten.co.jp/selection-j/c/0000001211/?scid=af_pc_ich_link_txt&amp;amp;sc2id=194075779" target="_blank">楽天・SELECTION</a>
          <a href="http://item.rakuten.co.jp/wss-r/c/0000000102/?scid=af_pc_ich_link_urltxt_pc&amp;amp;sc2id=167317437" target="_blank">ワールドスポーツ</a>
        </li>
        <li>
          <h4>NFL.com(英語)＆海外関連サイト</h4>
          <a href="http://www.nfl.com/" target="_blank">NFL.com</a>
          <a href="http://www.nfl.com/scores" target="_blank">速報 Score(スコア)</a>
          <a href="http://www.nfl.com/injuries" target="_blank">Injuries list(ケガ人)</a><a href="http://www.nfl.com/stats/team" target="_blank">Team stats(チーム別成績)</a><a href="https://www.youtube.com/user/NFL" target="_blank">Youtube NFL-ハイライト、他</a><a href="https://www.nfl.com/teams/new-york-jets/roster" target="_blank">NFL.com Roster - Jets</a><a href="http://espn.go.com/blog/new-york/jets/" target="_blank">ESPN - Jets</a><a href="http://www.profootballweekly.com/team/jets/" target="_blank">ProFootballWeekly.com-Jets</a><a href="http://www.pro-football-reference.com/teams/" target="_blank">NFL データベース</a><a href="http://bleacherreport.com/new-york-jets" target="_blank">bleacher report</a>
        </li>
        <li>
          <h4>JETS関連</h4><a href="/roster" target="_blank">JETS 日本語ロースター</a>
          <a href="http://www.newyorkjets.com/" target="_blank">JETS 公式サイト</a>
          <a href="http://www.nfl.com/teams/newyorkjets/schedule?team=nyj" target="_blank">JETS スケジュール</a>
          <a href="http://www.spotrac.com/nfl/new-york-jets/cap/" target="_blank">JETS サラリーキャップ</a>
          <a href="https://www.cbssports.com/nfl/teams/NYJ/new-york-jets/injuries/" target="_blank">JETS Injuries(CBS)</a>
          <a href="https://www.teamrankings.com/nfl/team/new-york-jets" target="_blank">JETS (TEAM RANKINGS)</a>
        </li>
        <li>
          <h4>便利ツール</h4><a href="https://www.time-j.net/WorldTime/Location/America/New_York" target="_blank">時差変換[米東部＞日本]</a>
          <a href="http://friends-esl.com/american-life/america-feet-inch-lb.php" target="_blank">身長・体重の単位換算</a>
          <a href="https://ja.howtopronounce.com/" target="_blank">発音検索</a>
        </li>
        <li>
          <h4>アメフト日本国内リーグ</h4><a href="http://amefootlive.jp/" target="_blank">American Football Live</a><a href="http://www.xleague.com/schedule/" target="_blank">Ｘリーグ 試合日程</a><a href="http://www.kcfa.jp/schedule_all/" target="_blank">関東学連 試合日程(秋季)</a><a href="http://www.kansai-football.jp/schedule/" target="_blank">関西学連 試合日程</a><a href="http://kantokoukou-football.com/cms/index.php?page_id=0" target="_blank">関東高校連盟ＨＰ</a><a href="http://www.kansaikoukou-football.com/index.html" target="_blank">関西高校連盟ＨＰ</a>
        </li>
      </ul>
    </div>
  </section>
</div>
<?php get_footer();?>
