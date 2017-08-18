<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?><!DOCTYPE html>
<!-- Site by Sam Vipond - sammypotato.com -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/style.min.css" />
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/font-awesome/css/font-awesome.min.css" />
<!-- <link href="https://fonts.googleapis.com/css?family=Poly" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Gentium+Basic|Poly" rel="stylesheet">
<meta name="google-site-verification" content="-3P57WQWQg-sl1xw6_vl6-6tjBPwJosHWSUgKh-uqPU" />
<?php wp_head(); ?>
<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>




	
	
