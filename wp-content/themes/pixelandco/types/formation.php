<?php
/**
 * Register new custom post type
 */
if(!function_exists('create_post_type')):

	add_action('init', 'create_post_type');

	function create_post_type(){
		$labels = array(
			'name' => 'Formation',
			'singular_name' => 'formation',
			'add_new' => 'Ajouter une formation',
			'add_new_item' => 'Ajouter une nouvelle formation',
			'edit_item' => 'Éditer une formation',
			'new_item' => 'Nouvelle formation',
			'view_item' => 'Voir la formation',
			'search_items' => 'Rechercher une formation',
			'not_found' => 'Aucune formation',
			'not_found_in_trash' => 'Aucune formation dans la corbeille',
			'parent_item_colon' => '',
			'menu_name' => 'Formations',
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

		register_post_type('formation',$args);

		$labels = array(
			'name' => 'Rubriques',
			'singular_name' => 'Rubrique',
			'search_items' => 'Rechercher une rubrique',
			'all_items' => 'Toutes les rubriques',
			'parent_item' => 'Rubrique parente',
			'parent_item_colon' => 'Rubrique parente',
			'edit_item' => 'Éditer cette rubrique',
			'update_item' => 'Mettre à jour cette rubrique',
			'add_new_item' => 'Ajouter une nouvelle rubrique',
			'new_item_name' => 'Nouvelle rubrique',
			'menu_name' => 'Rubriques'
		);

		register_taxonomy('rubrique', array('formation'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'rubrique')
		));

	}

endif;
?>