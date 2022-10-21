<?php
/*
Template Name:page-roster
*/

$up_file = '/csv/r_j.txt';

 $udate = get_cashbaster($up_file); //CSVファイルのタイムスタンプをunix形式で獲得
 $date = date_create();
date_timestamp_set($date, $udate);//unix を日付型に変換
$w_update = date_format($date,'Y/m/d') ;

 get_header();
//更新ファイル

  ?>


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css">
<div class="container single">
  <div class="l-page">
    <div class="l-main">
    <section class="amz">
        <ul>
          <?php get_template_part( 'inc/amazon-box4'); ?>
        </ul>
      </section>
    <h1>ジェッツ日本語ロースター</h1>
    <p>(更新日：<?php echo $w_update ?>)</p>
    <b class="option_txt">「状態」を絞り込む：</b>
    <select name="option" id="search">
        <option value="" >ALL(全てを表示)</option>
        <option value="ACT" selected>ACT(アクティブ)</option>
        <option value="DEV">DEV(練習生)</option>
        <option value="RES">RES(故障者)</option>
        <option value="PUP">PUP(故障者)</option>
        <option value="RSN">RSN(故障者)</option>
    </select>

    <article> 
    <div id="view0"></div>
    </article>

    <section class="ad">
    <?php get_template_part( 'inc/ad-under_refer'); ?>
    </section>

 
			<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/jquery.csv2.js?d=<?php echo $w_update?>"></script>
      <script>
        jQuery(function(){
          jQuery('#view0').csv2table('<?php echo get_stylesheet_directory_uri().$up_file.'?date='.get_cashbaster($up_file); ?>');
        });
      </script>

<script>

$(function(){

  $("table").change(function(e){
    hiddentr();
  });


  $('select[name="option"]').change(function() {
    hiddentr();
  });

  $(window).on('load', function(){
    hiddentr();
  });
});

function hiddentr(){
		var re = new RegExp($('#search').val());
		$('#view0 tbody tr').each(function(){
			var txt = $(this).find("td:eq(4)").html();
			if(txt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	};
</script>

    </div>
    <div class="l-sidebar"> 
      <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer();?>
