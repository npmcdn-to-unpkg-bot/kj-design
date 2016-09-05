<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">
        <meta name="theme-color" content="#b12727">
        <title><?php wp_title( '|', true, 'right' ) ?></title>
		<meta name="author" content="">
		<link rel="icon" href="<?php bloginfo('template_url') ?>/images/icon.png">
		<link href="http://vjs.zencdn.net/5.10.4/video-js.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat:400,700|Open+Sans|Roboto" rel="stylesheet">

		<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>

		<script type="text/javascript">
			
			console.log('header');
		</script>

		<?php wp_head() ?>

<script src="https://use.typekit.net/kox1ydw.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

    </head>
    <body <?php body_class() ?>>
    <div class="page-back">
		<header id="page-header">
		<div class="top-header">

		<div class="center-menu">


			<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>

				<?php 
				wp_nav_menu(array(
				'theme_location' => 'left-menu',
				'container'      => 'nav',
				'container_id'   => 'left-nav'
			)) ?>



						<div class="branding">
				<?php if (!is_front_page()): ?>
					<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/uploads/2016/06/logo.jpg">
					</a>
				<?php else: ?>
					<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/uploads/2016/06/logo.jpg">
					</a>
				<?php endif; ?>
			</div>
			<div class="boxout"></div>



				<?php

								wp_nav_menu(array(
				'theme_location' => 'right-menu',
				'container'      => 'nav',
				'container_id'   => 'right-nav',
				
			))
				/*wp_nav_menu(array(
				'theme_location' => 'main-nav',
				'container'      => 'nav',
				'container_id'   => 'primary-nav'
			)) */?>

			<div class="clearfix"></div>

			</div>
			<div class="" id="local">
			<div class="search-wrap">
			<i class="fa fa-search" aria-hidden="true"></i>
			<?php get_search_form();?>
			</div>
			</div>
			</div>
			<div class="clearfix"></div>
		</header>
		<div id="content-wrap">
		<div class="add-btn"></div>
		<!--<div class="social-bar">
			<div id="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></div>
			<div id="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></div>
			<div id="pintrest"><i class="fa fa-pinterest" aria-hidden="true"></i></div>
		</div>-->


