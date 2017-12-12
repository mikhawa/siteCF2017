<?php
/*
Template Name: Contact page
*/
get_header(); ?>

	<div id="primary" class="content-area row">
			<main id="main" class="site-main" role="main">

				<div class="col-sm-6" style="border-right:5px solid #D3D3D3;">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( get_theme_mod( 'sparkling_page_comments', 1 ) == 1 ) :
								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;
							endif;
						?>

					<?php endwhile; // end of the loop. ?>
				</div>

				<div class="col-sm-6">
				<div class="inner-map">
					<img src="<?= SITE_URL . '/wp-content/themes/pixelandco/images/reload/map.png';?>" class="img-responsive">
				</div>
				<div class="spacer"></div>
				<div class="row contact-info">
				<div class="col-lg-6 col-md-12 map-image">
					<img src="<?= SITE_URL . '/wp-content/themes/pixelandco/images/reload/logo-cf2m-gris.png';?>" class="center-block">
				</div>
				<div class="col-lg-6 col-md-12">
					<address class="">
					87-89 Avenue du Parc <br>
					1060 St-Gilles <br>
					<i class="fa fa-mobile fa-lg"></i> Formation : 02/539 03 60 <br>
					<i class="fa fa-mobile fa-lg"></i> Administration : 02/538 20 83 <br>
					<i class="fa fa-at fa-lg"></i> <a href="mailto:administration@cf2m.be">administration@cf2m.be</a> <br> 
					</address>
				</div>
				</div>
				</div>

			</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?> 