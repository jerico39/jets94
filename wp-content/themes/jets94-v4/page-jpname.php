<?php
/*
Template Name:page-roster
*/
?>
<?php get_header(); ?>

<?php get_template_part('module_pageTit'); ?>
<?php get_template_part('module_panList'); ?>

<div class="section siteContent">
	<div class="container">
		<div class="row">

			<div class="col-md-8 mainSection" id="main" role="main">

				<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.csv2.js"></script>
				<div id="view0"></div>
				<script>
					jQuery(function(){
						jQuery('#view0').csv2table('<?php echo get_stylesheet_directory_uri(); ?>/csv/jpname.csv');
					});
				</script>

			</div><!-- [ /.mainSection ] -->

			<div class="col-md-4 subSection">
				<?php// get_sidebar(get_post_type()); ?>
				<?php get_sidebar(); ?>

			</div><!-- [ /.subSection ] -->

		</div><!-- [ /.row ] -->
	</div><!-- [ /.container ] -->
</div><!-- [ /.siteContent ] -->
<?php get_footer(); ?>
