<?php
/*
Template Name: Sitemap
*/
get_header();
//$My_Walker = new Clean_Walker();
//$Cat_Walker = new Custom_Walker_Category();
?>
<h1 class="text-center site-map-title">Plan du site</h1>
<div class="row nomarge">
		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('Formations', 'pixelandco'); ?></h2>
			<ul class="list-group"><?php wp_list_pages(array('post_type' => 'formation', 'title_li' => '')); ?></ul>
		</div>
		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('Categories', 'pixelandco'); ?></h2>
			<ul class="list-group"><?php wp_list_categories(array('sort_column' => 'name', 'optioncount' => 1, 'hierarchical' => 0,  'title_li' => '')); ?></ul>
		</div>
		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('RSS Feeds', 'pixelandco'); ?></h2>
			<ul class="list-group">
				<li class="list-group-item"><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e('Feed RSS' , 'pixelandco'); ?></a></li>
				<li class="list-group-item"><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Feed Commentaires', 'pixelandco'); ?></a></li>
			</ul>
		</div>
	</div><!--Row-->

	<div class="row nomarge">

		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('Pages', 'pixelandco'); ?></h2>
			<ul class="list-group"><?php wp_list_pages(array('title_li' => '')); ?></ul>
		</div>

		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('Portfolios', 'pixelandco'); ?></h2>
			<ul class="list-group"><?php wp_list_pages(array('post_type' => 'portfolio', 'title_li' => '')); ?></ul>
		</div>

		<div class="col-xs-4">
			<h2 class="text-center site-map-h2"><?php _e('News', 'pixelandco'); ?></h2>
			<ul class="list-group"><?php $archive_query = new WP_Query('showposts=1000'); while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
				<li class="list-group-item">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
					(<?php comments_number('0', '1', '%'); ?>)
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div><!--Row-->
<?php get_footer(); ?>