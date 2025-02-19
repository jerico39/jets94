<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--DNS prefetch(2022/6/28 時代遅れ？いれつつ不要は削除)-->
<meta http-equiv="x-dns-prefetch-control" content="on">
<!--google analytics, Googleタグマネージャー-->
<link rel='preconnect dns-prefetch' href="//www.googletagmanager.com">
<link rel='preconnect dns-prefetch' href="//www.google-analytics.com">
<!--Adsense-->
<!-- Xpediaで関連コンテンツが表示されないため、コメントアウト→再表示-->
<!--
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="//tpc.googlesyndication.com">
<link rel="dns-prefetch" href="//www.gstatic.com">
-->
<!--Bing Webmaster tools-->
<meta name="msvalidate.01" content="E9968BAC09E30541CFEB88C97E674710" >
<!--Twitter-->
<link rel="dns-prefetch" href="//twitter.com">
<link rel="dns-prefetch" href="//cdn.api.twitter.com">
<link rel="dns-prefetch" href="//p.twitter.com">
<link rel="dns-prefetch" href="//platform.twitter.com">

<!--end.DNS prefetch-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- link(rel="stylesheet", href="https://cdn.simplecss.org/simple.min.css")-->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lib/simple.min.css">


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/layout.css?u=22614">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/header.css?u=241008">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/sidebar.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/footer.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/util.css?u=20240524">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/common.js?up=0327"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.min.js"></script>
<?php get_template_part( 'inc/head_setpage' ) ;?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lib/fontawesome-free-6.2.1-web/css/all.min.css">
<?php wp_head();?>
</head><body>