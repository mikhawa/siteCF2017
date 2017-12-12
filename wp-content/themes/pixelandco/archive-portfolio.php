<?php
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="row" style="position:relative;z-index:0;">
			<div class="col-xs-12">
				<img src="<?=site_url();?>/wp-content/themes/pixelandco/images/catalogue-tiny.png" alt="" style="width:100%;">
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

			<header>
				<h1 class="page-title title-archive-formation">
				Catalogue des portfolios
				</h1>
			</header><!-- .page-header -->
			<div class="row nomarge">
			<?php
			// Start the Loop.
			$i = 1;
			while ( have_posts() ) : the_post();?>

			<div class="col-sm-4">
				<a href="<?=site_url() .'/'. $post->post_type .'/'. $post->post_name; ?>">
					<h2 class="archive-formation-title"><?= $post->post_title; ?></h2>
				</a>
			</div>
<?php if ($i % 3 == 0) {
   echo '</div><br><div class="row nomarge">';
}?>
			
<?php
			$i++;
			// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>
		</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>