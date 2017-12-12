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
				<?php //post_type_archive_title('Catalogue des ', $display) . 's';
				//Ne fonctionne plus correctement,ça renvoit article à la place de formations???
				?>
				Catalogue des formations
				</h1>
			</header><!-- .page-header -->
			<div class="row nomarge">
			<?php
			// Start the Loop.
			$i = 1;
			while ( have_posts() ) : the_post();?>

			<div class="col-sm-4">

			<?php
					$text = get_field('metier');
					$p_url =  site_url() .'/'. $post->post_type .'/'. $post->post_name; 
					$r_more ='<br><span><a class="liremore" href="'.$p_url.'">Pour plus d’infos... [+]</a></span>';
					$trimmed = wp_trim_words( $text, $num_words = 20, $r_more );
			?>

			<a href="<?=site_url() .'/'. $post->post_type .'/'. $post->post_name; ?>">
			<?php 
			//$p_metas = get_post_meta ($post->ID);

			$image = get_field('title_logo');
			if( !empty($image) ): ?>
			<div class="col-xs-12 archive-formation-logo-bloc" style="background-color:<?=get_field('couleur');?>;">
				<img src="<?php echo $image; ?>" alt="logo" class="logo-forma"/>
			</div>
			<?php endif;?>

			<h2 style="color:<?=get_field('couleur');?>;" class="archive-formation-title"><?= $post->post_title; ?></h2>
			</a>
			

			<p class="archive-formation-text"><?=$trimmed; ?></p>
		

	

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