<?php
$wp_session = WP_Session::get_instance();
$section = $wp_query->query_vars['section'];
       
if(!is_front_page()){
    
    if($section == "employeurs"){
        wp_session_unset();
        $wp_session['section'] = 'employeurs';
    }elseif($section == "stagiaires"){
        wp_session_unset();
        $wp_session['section'] = 'stagiaires';
    }

    if(isset($wp_session['section']) && $wp_session['section'] == "employeurs"){
        $display_nav_employers = TRUE;               
    }

    if(isset($wp_session['section']) && $wp_session['section'] == "stagiaires"){
        $display_nav_students = TRUE;             
    }
}else{
    wp_session_unset();
}
?>
<!DOCTYPE html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default <?php if( of_get_option( 'sticky_header' ) ) echo 'navbar-fixed-top'; ?>" role="navigation">
			<div class="container">
				<div class="row">
					<div class="site-navigation-inner col-sm-12">
						<div class="navbar-header">
							<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php if( get_header_image() != '' ) : ?>

							<div id="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>"  height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
							</div><!-- end of #logo -->

							<?php endif; // header image was removed ?>

							<?php if( !get_header_image() ) : ?>

							<div id="logo">
								<?php echo is_home() ?  '<h1 class="site-name">' : '<p class="site-name">'; ?>
									<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
								<?php echo is_home() ?  '</h1>' : '</p>'; ?>
							</div><!-- end of #logo -->

							<?php endif; // header image was removed (again) ?>

						</div>
						<?php
						if($display_nav_employers){

				            wp_nav_menu( array(
				                'theme_location' => 'Employers',
				                'menu' => 'Employers',
				                'container' => 'div',
				                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
    							'menu_class' => 'nav navbar-nav',
								'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
								'walker' => new wp_bootstrap_navwalker()
							));

				        }elseif($display_nav_students){

				            wp_nav_menu( array(
				                        'theme_location' => 'Students',
				                        'menu' => 'Students',
				                        'depth' => 2,
				                        'container' => 'div',
				                        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
    									'menu_class' => 'nav navbar-nav',
									    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
									    'walker' => new wp_bootstrap_navwalker()
							));
				        }
?>
					</div>
				</div>
			</div>
		</nav><!-- .site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="top-section">
			<?php sparkling_featured_slider(); ?>
			<?php sparkling_call_for_action(); ?>
		</div>

		<div class="container main-content-area">
            <?php $layout_class = get_layout_class(); ?>
			<div class="row <?php echo $layout_class; ?>">
				<div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">