<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkling
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( esc_html__( 'Author: %s', 'sparkling' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( esc_html__( 'Day: %s', 'sparkling' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( esc_html__( 'Month: %s', 'sparkling' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sparkling' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( esc_html__( 'Year: %s', 'sparkling' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sparkling' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							esc_html_e( 'Asides', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							esc_html_e( 'Galleries', 'sparkling');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							esc_html_e( 'Images', 'sparkling');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							esc_html_e( 'Videos', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							esc_html_e( 'Quotes', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							esc_html_e( 'Links', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							esc_html_e( 'Statuses', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							esc_html_e( 'Audios', 'sparkling' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							esc_html_e( 'Chats', 'sparkling' );

						else :
							//esc_html_e( 'Archives', 'sparkling' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
<div class="row">
			<?php /* Start the Loop */ $i = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
<div class="col-sm-6 pad30">
<article id="post-<?php the_ID(); ?>" <?php post_class('group post-standard'); ?>>	
	<div class="post-inner post-hover">
		
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail('thumb-standard'); ?>
				<?php endif; ?>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-star"></i></span>'; ?>
			</a>
			<?php if ( comments_open() ): ?>
				<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
			<?php endif; ?>
		</div><!--/.post-thumbnail-->
		
		<div class="post-content">
		
			<div class="post-meta group">
				<p class="post-category"><?php the_category(' / '); ?></p>
				<p class="post-date"><?php the_time('j M, Y'); ?></p>
			</div><!--/.post-meta-->
			<div class="clearfix"></div>
			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2><!--/.post-title-->

			<?php
			$p_url =  site_url() .'/'. $post->post_type .'/'. $post->post_name; 
			$content = get_the_content();
			$r_more = '<br><span><a class="liremore" href="'.$p_url.'">Pour plus d’infos... [+]</a></span>';
			$trimmed = wp_trim_words($content, 50, $r_more);
			
			?>
			<div class="entry excerpt">				
				<?php print $trimmed; ?>
			</div><!--/.entry-->
			
		
		</div><!--/.post-content-->
		
	</div><!--/.post-inner-->	
</article><!--/.post-->	
</div>
			<?php if($i%2===0): ?>
			</div><div class="row">
			<?php endif; ?>
			<?php $i++;endwhile; ?>
</div><!--row-->
			<?php sparkling_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>