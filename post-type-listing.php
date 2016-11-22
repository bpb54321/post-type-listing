<?php
/*
Plugin Name: Post Type Listing Plugin
Author: Brian Blosser (bpb54321@gmail.com)
Description: This plugin contains functions and shortcodes for querying lists of any post type, and finding the next or previous post type in chronological order.
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

 /**
  * A shortcode that creates a <ul> of <li><a></li>'s of permalinks to all the posts of a given post type.
  *
  * Description.
  *
  * @param type $var Description.
  * @param type $var Optional. Description. Default.
  * @return String Returns an unordered list of post titles linking to the post permalinks, in alphabetical order.
  */
function list_posts() {
  $post_type = 'page';
  $order_direction = 'ASC';
  $order_by = 'title';

  $args = [
		'post_type' => $post_type,
		'order'                  => $order_direction,
		'orderby'                => $order_by,
	];

	$query = new WP_Query( $args );

  $output = '';
  $output .=  "<ul class=''>";
  foreach ( $query->posts as $post ) {
    $post_title = $post->post_title;
    $post_permalink = get_the_permalink( $post->ID );
    if ( $post_title !== "Home" ) {
      $output .=    "<li><a href='{$post_permalink}'>{$post_title}</a></li>";
    }
  }
  $output .=  "</ul>";

  return $output;
}
add_shortcode( 'list_posts', 'list_posts' );
