<?php
/*
Template Name:page-roster
*/
function get_cashbaster($filename){//キャッシュバスターを作成、ファイルが存在しなければ何も返さない
  if(file_exists( __DIR__.$filename )){
    return filemtime(__DIR__.$filename);
  }else {
      return null;
  }
}
//更新ファイル
$up_file = '/csv/r_j.txt'

?>

<?php get_header(); ?>
<div class="container l-container">
<div class="row lr-row">
	<!-- main -->
	<div class="col-md-8 lc-box">
    <!-- adsense -->
		<div class="l-ad l-ad-pagemax">
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-1827178535199750"
			 data-ad-slot="1291244189"
			 data-ad-format="auto"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>


				<div id="view0"></div>
        <!-- adsense recommend-->
         <?php get_template_part('inc/page-ad-under_refer'); ?>
           <!-- //adsense recommend-->
			</div><!-- [ /.mainSection ] -->

			<div class="col-md-4 subSection">
				<?php get_sidebar(); ?>

			</div><!-- [ /.subSection ] -->

		</div><!-- [ /.row ] -->
	</div><!-- [ /.container ] -->

<?php get_footer(); ?>
			<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/library/jquery.csv2.js"></script>
      <script>
        jQuery(function(){
          jQuery('#view0').csv2table('<?php echo get_stylesheet_directory_uri().$up_file.'?date='.get_cashbaster($up_file); ?>');
        });
      </script>
</body>
</html>
