<?php 
/**
 * Template Name: Google keyword suggest
 */
?>
<?php get_header();
//Googleキーワードサジェストツール
$my_input_word = '';
if ( isset($_GET['my_input_word']) )
  $my_input_word = htmlspecialchars(strip_tags($_GET['my_input_word']));
?>
<h1>
  <?php if ( $my_input_word ): ?>
    <q><?php echo $my_input_word; ?></q>のサジェスト
  <?php else: ?>
    キーワードサジェストツール
  <?php endif; ?>
</h1>
 
<p>キーワードを入力してください。</p>
<form method="GET" action="<?php the_permalink(); ?>">
  <input type="text" name="my_input_word" value="<?php echo $my_input_word; ?>">
  <input type="submit" name="btn1" value="送信">
</form>
<?php 
$added_letters_array= array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","あ","い","う","え","お","か","き","く","け","こ","さ","し","す","せ","そ","た","ち","つ","て","と","な","に","ぬ","ね","の","は","ひ","ふ","へ","ほ","ま","み","む","め","も","や","ゆ","よ","ら","り","る","れ","ろ","わ","を","ん","が","ぎ","ぐ","げ","ご","ざ","じ","ず","ぜ","ぞ","だ","ぢ","づ","で","ど","ば","び","ぶ","べ","ぼ","ぱ","ぴ","ぷ","ぺ","ぽ");
if($my_input_word): ?>
<div style="clear:left"></div>
<table>
  <thead>
    <tr>
      <th>サジェスト元</th>
      <th>キーワード</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($added_letters_array as $added_letter):
      $my_input_word_added_letter=$my_input_word.$added_letter;
      $url = "http://www.google.com/complete/search?hl=ja&output=toolbar&ie=utf_8&oe=utf_8&q=".
             urlencode($my_input_word_added_letter);
      $toplevel = simplexml_load_file($url);
      foreach ($toplevel->CompleteSuggestion as $completeSuggestion):
        $suggest_word_array[] = $completeSuggestion->suggestion->attributes()->data;
        echo "<tr><td>".$my_input_word_added_letter."</td>\t<td>".
             $completeSuggestion->suggestion->attributes()->data."</td></tr>\n"; 
      endforeach; 
    endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
		<!-- adsense recommend-->
	 <?php get_template_part('inc/page-ad-under_refer'); ?>
		 <!-- //adsense recommend-->
</article>
</div>
        <div class="col-md-4 lc-box lc-sidebar lc-sidebar--normal">
            <?php get_sidebar(); ?>
        </div>
        <!-- [ /.subSection ] -->

      </div>
      <!-- [ /.row ] -->
    </div>
    <!-- [ /.container ] -->
  </div>
  <!-- [ /.siteContent ] -->
  <?php get_footer(); ?>
</body>
</html>
