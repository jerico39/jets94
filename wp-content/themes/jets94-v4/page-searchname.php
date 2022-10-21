<?php
/*
Template Name:page-searchname
*/

function get_cashbaster($filename){//キャッシュバスターを作成、ファイルが存在しなければ何も返さない
  if(file_exists( __DIR__.$filename )){
    return filemtime(__DIR__.$filename);
  }else {
      return null;
  }
}
//更新ファイル
$up_file = '/csv/searchname.csv'

?>
<?php get_header(); ?>
<div class="container l-container">
<div class="row lr-row">
  <!-- main -->
  <div class="col-md-8 lc-box">
    <!-- adsense -->
		<div class="l-ad l-ad-pagemax">
		<?php get_template_part('inc/page-ad-top'); ?>
		</div>
	<!-- //adsense -->
  <h1>読めない英語の名前を日本語(カタカナ)の読み方に変換しました一覧</h1>
  <?php echo do_shortcode('[sharelink]'); ?>
  <h4>NFL選手の通常では読めない名前にカナ発音を出来る限り掲載しています。手動登録なので誤りがある場合はすみません。</h4>
  <h4>(※最初、表示されるまで時間がかかります。)</h4>

  <form action="#">
  <span class="search"><b>検索：</b></span><input type="text" name="search" value="" id="id_search" />
  </form>
  <!--
  <form id="chkform">
  カラム1<input type="checkbox" name="chk[]" value="1" id="chk1" />
  </form>
  -->
  <!--ロード画面の記述-->
    <div class="js-loader js-loader--bg">
      <div class="js-loading js-loading--timer">
          ロード中・・・
      </div>
    </div>
  <!--ロード画面の記述ここまで-->

  <table id="" class="list_table js-list js-list--searchname">

  <tbody>
  </tbody>
  </table>

  </div><!-- [ /.mainSection ] -->

		<div class="col-md-4 subSection">
			<?php// get_sidebar(get_post_type()); ?>
			<?php get_sidebar(); ?>
		</div><!-- [ /.subSection ] -->

		</div><!-- [ /.row ] -->
	</div><!-- [ /.container ] -->
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/library/quicksearch.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/library/readcsv.js"></script>

<script type="text/javascript">
        jQuery(document).ready(function () {
                ReadCSV = new readcsv("<?php echo get_stylesheet_directory_uri().$up_file.'?date='.get_cashbaster($up_file); ?>","table.list_table tbody");
                ReadCSV.ResponseCSV();
        });



        jQuery(window).on("load",function(){  //全ての読み込みが完了したら実行する

            jQuery('.js-loader').delay(600).fadeOut(300);
            jQuery('.js-list').css('display', 'block');
        });
        jQuery(function(){  //10秒たったらロードを終わらせる
            setTimeout('stopload()',10000);
        });



</script>
<style>
    .list_table{
width:100%;
border-collapse: separate;
border-spacing: 0px;
border-top: 1px solid #ccc;
border-left: 1px solid #ccc;
}
.list_table th{
width: 25%;
padding: 4px;
text-align: left;
vertical-align: top;
color: #444;
background-color: #ccc;
border-top: 1px solid #fff;
border-left: 1px solid #fff;
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;
}
.list_table td{
padding: 4px;
background-color: #fafafa;
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;
}

 span.search{
color:#006600;
font-
}
    </style>
  </body>
  </html>
