<?php
/**
 * Register new custom post type
 */
if(!function_exists('create_portfolio_type')):

	add_action('init', 'create_portfolio_type');

	function create_portfolio_type(){
		$labels = array(
			'name' => 'Portfolio',
			'singular_name' => 'portfolio',
			'add_new' => 'Ajouter un portfolio',
			'add_new_item' => 'Ajouter un nouvelle portfolio',
			'edit_item' => 'Éditer un portfolio',
			'new_item' => 'Nouveau portfolio',
			'view_item' => 'Voir le portfolio',
			'search_items' => 'Rechercher un portfolio',
			'not_found' => 'Aucun portfolio',
			'not_found_in_trash' => 'Aucun portfolio dans la corbeille',
			'parent_item_colon' => '',
			'menu_name' => 'Portfolios',
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
		);

		register_post_type('portfolio',$args);

		$labels = array(
			'name' => 'Sections',
			'singular_name' => 'Section',
			'search_items' => 'Rechercher une section',
			'all_items' => 'Toutes les sections',
			'parent_item' => 'Section parente',
			'parent_item_colon' => 'Section parente',
			'edit_item' => 'Éditer cette section',
			'update_item' => 'Mettre à jour cette section',
			'add_new_item' => 'Ajouter une nouvelle section',
			'new_item_name' => 'Nouvelle section',
			'menu_name' => 'Sections'
		);

		register_taxonomy('section', array('portfolio'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'section')
		));

	
	}

endif;
?>