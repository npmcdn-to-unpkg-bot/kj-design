<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="author" content="Esolz Technology">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- favicon -->
	<link rel="icon" href="<?php echo get_template_directory_uri();?>/images/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/images/favicon.png" />
    
    <!-- css link -->

    <link href="<?php echo get_template_directory_uri();?>/css/fonts.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/reset.css" />
	
    <link href="<?php echo get_template_directory_uri();?>/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri();?>/css/developer.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri();?>/css/responsive.css" rel="stylesheet" type="text/css" />
    
    
    <script src="<?php echo get_template_directory_uri();?>/js/jquery-1.12.0.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.js"></script>
    
    <script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/jquery.placeholder.1.3.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js" type="text/javascript"></script>
    <!-- custom js -->
    <script src="<?php echo get_template_directory_uri();?>/js/custom.js" type="text/javascript"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div class="win-height"> 

<header class="header">
    <div class="container clearfix logo-rel">
        <h1 class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" alt="" /></a>
        </h1>
           <ul class="nav-panel">
     <?php   
     
         $menu_name = 'primary'; // Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

$i=0;
    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
    
        ?>
           
            <li <?php if($i==0){ echo 'class="slick-current ft-sldr"';} ?> ><a href="javascript:void(0)"><?php echo $title; ?></a></li>
            
            <?php
            $i++;
            }
    }
            ?>
        </ul> 
        <div class="social">
            <a target="_blank" href=" <?php echo get_field('header_fb',38); ?>"><span class="hidden-xs">Connect with facebook</span><img src="<?php echo get_template_directory_uri();?>/images/fb.png" alt="" /></a>
            
            
        </div>
        <div class="toggle visible-xs">
           <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>
</header>    

    