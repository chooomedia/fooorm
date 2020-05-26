<?php
/**
 * @package Fooorm
 */
/*
    Plugin Name: Fooorm
    Plugin URI: https://chooomedia.de/fooorm
    Description: Fooorm is a very useful contact forumlar plugin for Wordpress. Thanks to our three super features like the builder, the dynamic selection form and the practical preview, ugly standard forms are a thing of the past. Furthermore you will be shown a list of requests with opt-in status, which are a must-have for DSGVO compliant websites. In the upcoming Pro version you can import and export forms, include variables from other data sources within your Wordpress, add a cookie consents and much more. 
    Version: 1.0.0
    Author: Christopher Matt
    Author URI: https://chooomedia.de#team
    License: GPLv2 or later
    Text Domain: Fooorm
 */

 /*
    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License 
    as published by the Free Software Foundation; either version 2
    of the License, or (at your opinion) any later version.

    This program is distributed in the hope that it will be usefull 
    but WITHOUT ANY WARRANTY; without even the implied warranty of 
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public 
    License along with this program; if not, write to the Free Software 
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

    Copyright 2005-2015 Automattic, Inc.
 */

defined( 'ABSPATH' ) or die('Hey Dude - whats your plan? No Access to this Plugin for ya!');

class Fooorm
{

    function register() {
        add_action( 'admin_enque_scripts', array($this, 'enqueue') ); //loads inside admin-dashboard
       // add_action( 'wp_enque_scripts', array($this, 'enqueue') ); //loads this on frontend
    }

    protected function create_post_type() {
        add_action( 'init', array( $this, 'custom_post_type') );
    }

    function custom_post_type() {
        register_post_type( 'fooorm', array(
            'public' => true,
            'menu-icon' => 'dashicons-feedback',
            'label' => 'Fooorm')
        );
    }

    function enqueue() {
        // enque all scripts
        wp_enqueue_style( 'fooorm-style', plugins_url( 'assets/css/style.css', __FILE__ ) );
    }
}

if (class_exists( 'Fooorm') ) {
    $fooorm = new Fooorm();
    $fooorm->register();
}


// activation
require_once plugin_dir_path( __FILE__ . 'inc/fooorm-activate.php');
register_activation_hook( __FILE__, array( 'FooormActivate', 'activate' ) );

// deactivation
require_once plugin_dir_path( __FILE__ . 'inc/fooorm-deactivate.php');
register_deactivation_hook( __FILE__, array( 'FooormDeactivate', 'deactivate' ) );
