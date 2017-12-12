<?php 
/*
Plugin Name: Colorlib Plugin
Description: Quick Custom Solution Plugin for links '_blank' bug in parent theme.
Version: 1.0.0
Author: Movin
Author URI: http://freewptp.com/
License: GNU General Public License (Version 2 - GPLv2)
*/

function modify_sparkling_make_top_level_menu_clickable(){
    remove_action('wp_footer', 'sparkling_make_top_level_menu_clickable', 1);
    add_action('wp_footer', 'custom_sparkling_make_top_level_menu_clickable', 99);
}
add_action('init', 'modify_sparkling_make_top_level_menu_clickable');

/**
 * Makes the top level navigation menu item clickable
 */
function custom_sparkling_make_top_level_menu_clickable(){
if ( !wp_is_mobile() ) { ?>
  <script type="text/javascript">
    jQuery( document ).ready( function( $ ){
      if ( $( window ).width() >= 767 ){
        $( '.navbar-nav > li.menu-item > a' ).click( function(){
            if(jQuery(this).attr('target') !== '_blank'){
                window.location = $( this ).attr( 'href' );
            }
        });
      }
    });
  </script>
<?php }
}
