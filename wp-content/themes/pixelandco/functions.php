<?php
// FOR TABS in formations pages see the following http://www.wpexplorer.com/add-tabs-wordpress/
if(!defined('THEME_DIR')){
	define('THEME_DIR', get_stylesheet_directory());
}

if(!defined('SITE_URL')){
	define('SITE_URL', site_url());
	
}

// Include file that creates custom post type = Formation
require_once(THEME_DIR.'/types/formation.php');

// Include file that creates custom post type = Formation
require_once(THEME_DIR.'/types/portfolio.php');

/*if(!function_exists('pixelandco_cat_settings')):

	function pixelandco_cat_settings() {  
	// Add tag metabox to page
	register_taxonomy_for_object_type('post_tag', 'page');
	register_taxonomy_for_object_type('post_tag', 'formation');
	register_taxonomy_for_object_type('post_tag', 'post');
	register_taxonomy_for_object_type('post_tag', 'portfolio');
	// Add category metabox to page
	register_taxonomy_for_object_type('category', 'page');
	register_taxonomy_for_object_type('category', 'formation');
	register_taxonomy_for_object_type('category', 'post');
	register_taxonomy_for_object_type('category', 'portfolio');   
	}
	 // Add to the admin_init hook of your theme functions.php file 
	add_action( 'init', 'pixelandco_cat_settings' );

endif;//pixelandco_cat_settings*/

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'pixelandco_enqueue_child_styles', 99);

function pixelandco_enqueue_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_dequeue_style('sparkling-style');
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_script('stacktable',get_stylesheet_directory_uri() . '/js/stacktable.js',array(), FALSE, TRUE);
    wp_enqueue_script('custom-script',get_stylesheet_directory_uri() . '/js/script.js',array(), FALSE, TRUE);
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if(!isset($content_width)){
	$content_width = 1170; //pixels
}

if(!function_exists('sparkling_setup')):
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*/

	function sparkling_setup() {

		//Make theme available for translation
		// Translations can be filed in the /languages/ folder
		load_theme_textdomain('sparkling', get_template_directory() . '/languages');

		// Add RSS feed links to <head> for posts and comments
		add_theme_support('automatic-feed-links');

		// Let WP manage the document title
		/*By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WP to provide it for us*/
		add_theme_support('title-tag');

		/*// add theme support for site logo
		$args = array(
		'default-text-color' => 'fff',
		'flex-width'    => true,
		'width'         => 120,
		'flex-height'   => true,
		'height'        => 80,
		'wp-head-callback' => 'pixelandco_header_style',
		'default-image' => get_template_directory_uri() . '/images/logo.png',
		'uploads'       => true,
		);
		add_theme_support( 'custom-header', $args );*/

		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(150,150);

		 //add_image_size( 'sparkling-featured', 1140, 200, true);
		 add_image_size( 'tab-small', 60, 60, true); //
         add_image_size( 'thumb-standard', 525, 150, true );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		//add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

		//This theme uses wp_nav_menu() in two location
		register_nav_menus(array(
			'Students' => __('Students', 'sparkling'),
			'Employers' => __('Employers', 'sparkling'),
			'Header-menu' => __('Header menu', 'sparkling'),
			'footer-links' => esc_html__( 'Footer Links', 'sparkling' )
			));

		// Switch default core markup for search form, comment form and comments to output valid html5
		add_theme_support('html5', array(
			'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
			));

		// Enable support for Post formats
		add_theme_support('post-formats', array(
			'aside','gallery','link','image','quote','status','video','audio','chat'
			));

		// Set up the WP core custom background feature
		add_theme_support('custom-background', apply_filters(
			'sparkling_custom_background_args', array(
				'default-color' => 'F2F2F2',
				'default-image' => get_stylesheet_directory_uri().'/images/bground.jpg',
				)
			));
	}

endif; //sparkling_setup

add_action('after_setup_theme', 'sparkling_setup');


//Filter Query
add_filter('query_vars', 'pixelandco_queryvars' );
function pixelandco_queryvars( $qvars ) {
  $qvars[] = 'part';
  return $qvars;
}

if (!function_exists('list_custom_archive')):

function list_custom_archive($query) {
  if (is_post_type_archive('formation') && is_main_query() && !is_admin()) {
    $query->set( 'posts_per_page', -1 );
    $query->set( 'order', 'ASC' );
  }elseif(is_post_type_archive('portfolio') && is_main_query() && !is_admin()){
    $query->set( 'posts_per_page', -1 );
    $query->set( 'order', 'ASC' );
  }
}
add_action('pre_get_posts','list_custom_archive');

endif; // list_custom_archive

add_action( 'template_redirect', 'custom_archive_page_template');
function custom_archive_page_template(){
  global $post;
  if(is_post_type_archive()){

    switch($post->post_type){

      case 'formation':
      $new_template = locate_template( array('archive-formation.php'));
      include_once $new_template;
      die();
      break;

      case 'portfolio':
      $new_template = locate_template( array('archive-portfolio.php'));
      include_once $new_template;
      die();
      break;

    }
  }
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

if ( ! function_exists( 'sparkling_header_menu' ) ) :
/**
 * Header menu (should you choose to use one)
 */
function sparkling_header_menu() {
  // display the WordPress Custom Menu if available
  wp_nav_menu(array(
    'menu'              => 'Header-menu',
    'theme_location'    => 'Header-menu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse navbar-header-collapse',
    'menu_class'        => 'nav navbar-nav',
    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
    'walker'            => new wp_bootstrap_navwalker()
  ));
} /* end header menu */
endif;

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function pixelandco_widgets_init() {

	require_once(THEME_DIR.'/widgets/widget-recent-posts.php');
	register_widget( 'sparkling_recent_posts' );

}
add_action( 'widgets_init', 'pixelandco_widgets_init' );

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/newlogo.jpg);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function portfolios_by_year($section) {
  // array to use for results
  $years = array();

  $posts = get_posts(
        array(
            'numberposts' => -1,
            'post_type' => 'portfolio',
            'tax_query' => array(
                array(
                    'taxonomy' => 'section',
                    'terms' => $section,
                    'field' => 'slug',
                    'include_children' => true,
                    'operator' => 'IN'
                )
            ),
        )
    );



  // get posts from WP
  //$posts = get_posts(array('post_type' => 'portfolio'));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}

/*TINYMCE*/
function my_mce_buttons_2( $buttons ) {
	
	array_push( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );


function my_mce_before_init_insert_formats($settings){
    $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';

    // From http://tinymce.moxiecode.com/examples/example_24.php
    $style_formats = array(
        array('title' => 'table-responsive','selector' => 'table','classes' => 'table table-responsive table-bordered','wrapper' => true),
    );
    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');


// Les 2 fonctions dessous, je sais pas ce qu'il s'est passé mais après avoir réactiver l'hébergement et réinitialiser l'IP, il y avait des erreurs warning sur la claase clean walker.
// Donc j'ai commenté, apparement ça n'était plus utilisé sur le site, je sais pâs pourquoi j'avais créer ces foncrtions, surement par besoin mais me souviens plus;
/*class Clean_Walker extends Walker_Page {
    function start_lvl(&$output, $depth, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }
    function start_el(&$output, $page, $depth, $args, $current_page) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';
        extract($args, EXTR_SKIP);
        $class_attr = '';
        if ( !empty($current_page) ) {
            $_current_page = get_page( $current_page );
            if ( (isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors)) || ( $page->ID == $current_page ) || ( $_current_page && $page->ID == $_current_page->post_parent ) ) {
                $class_attr = 'sel';
            }
        } elseif ( (is_single() || is_archive()) && ($page->ID == get_option('page_for_posts')) ) {
            $class_attr = 'sel';
        }
        if ( $class_attr != '' ) {
            $class_attr = ' class="' . $class_attr . '"';
            $link_before .= '<strong>';
            $link_after = '</strong>' . $link_after;
        }
        $output .= $indent . '<li class="list-group-item"><a href="' . get_page_link($page->ID) . '"' . $class_attr . '>' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';

        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;
            $output .= " " . mysql2date($date_format, $time);
        }
    }
}

class Custom_Walker_Category extends Walker_Category {

        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                extract($args);
                $cat_name = esc_attr( $category->name );
                $cat_name = apply_filters( 'list_cats', $cat_name, $category );
                $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
                if ( $use_desc_for_title == 0 || empty($category->description) )
                        $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
                else
                        $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
                $link .= '>';
                $link .= $cat_name . '</a>';
                if ( !empty($feed_image) || !empty($feed) ) {
                        $link .= ' ';
                        if ( empty($feed_image) )
                                $link .= '(';
                        $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';
                        if ( empty($feed) ) {
                                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                        } else {
                                $title = ' title="' . $feed . '"';
                                $alt = ' alt="' . $feed . '"';
                                $name = $feed;
                                $link .= $title;
                        }
                        $link .= '>';
                        if ( empty($feed_image) )
                                $link .= $name;
                        else
                                $link .= "<img src='$feed_image'$alt$title" . ' />';
                        $link .= '</a>';
                        if ( empty($feed_image) )
                                $link .= ')';
                }
                if ( !empty($show_count) )
                        $link .= ' (' . intval($category->count) . ')';
                if ( 'list' == $args['style'] ) {
                        $output .= "\t<li";
                        $class = 'list-group-item cat-item cat-item-' . $category->term_id;


                        // YOUR CUSTOM CLASS
                        if ($depth)
                            $class .= ' sub-'.sanitize_title_with_dashes($category->name);


                        if ( !empty($current_category) ) {
                                $_current_category = get_term( $current_category, $category->taxonomy );
                                if ( $category->term_id == $current_category )
                                        $class .=  ' current-cat';
                                elseif ( $category->term_id == $_current_category->parent )
                                        $class .=  ' current-cat-parent';
                        }
                        $output .=  ' class="' . $class . '"';
                        $output .= ">$link\n";
                } else {
                        $output .= "\t$link<br />\n";
                }
        } // function start_el

} // class Custom_Walker_Category*/

/**
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 */
function list_searcheable_acf(){
  $list_searcheable_acf = array('metier','qualites','competences','programme_de_cours','preformation','formation_qualifiante','stage');
  return $list_searcheable_acf;
}
/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $where    [the initial "where" part of the search query]
 * @param  [object]                 $wp_query []
 * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
function advanced_custom_search( $where, &$wp_query ) {
    global $wpdb;
    $wp_query->set('post_type', array('post', 'page', 'formation', 'portfolio'));
 
    if ( empty( $where ))
        return $where;
    
    // get search expression
    $terms = $wp_query->query_vars[ 's' ];
    
    // explode search expression to get search terms
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    // reset search in order to rebuilt it as we whish
    $where = '';
    
    // get searcheable_acf, a list of advanced custom fields you want to search content in
    $list_searcheable_acf = list_searcheable_acf();
    foreach( $exploded as $tag ) :
        $where .= " 
          AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS (
              SELECT * FROM wp_postmeta
                  WHERE post_id = wp_posts.ID
                    AND (";
        foreach ($list_searcheable_acf as $searcheable_acf) :
          if ($searcheable_acf == $list_searcheable_acf[0]):
            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          else :
            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
          endif;
        endforeach;
            $where .= ")
            )
            OR EXISTS (
              SELECT * FROM wp_comments
              WHERE comment_post_ID = wp_posts.ID
                AND comment_content LIKE '%$tag%'
            )
            OR EXISTS (
              SELECT * FROM wp_terms
              INNER JOIN wp_term_taxonomy
                ON wp_term_taxonomy.term_id = wp_terms.term_id
              INNER JOIN wp_term_relationships
                ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
              WHERE (
                taxonomy = 'post_tag'
                    OR taxonomy = 'category'                
                    OR taxonomy = 'myCustomTax'
                )
                AND object_id = wp_posts.ID
                AND wp_terms.name LIKE '%$tag%'
            )
        )";
    endforeach;
    return $where;
}
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );

// Enlever la version de WP dans le head pour moins de risque de HACK
remove_action("wp_head", "wp_generator");
add_filter('login_errors',create_function('$a', "return null;"));