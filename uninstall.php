<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package Fooorm
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Clear database stored data
$fooorms = get_posts( array( 'post-type' => 'fooorm', 'numberposts' => -1 ) );

foreach( $fooorms as $data ) {
    wp_delete_post( $data->ID, true );
}

// Access the db via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'fooorm'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)" );