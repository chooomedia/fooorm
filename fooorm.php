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

defined( 'ABSPATH' ) or die('Hey Dude - whats your plan? No Access to this Plugin for you :D!');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );


use Inc\Base\Activate;
use Inc\Base\Deactivate;


function activate_fooorm() {
    Activate::activate();
}

function deactivate_fooorm() {
    Deactivate::deactivate();
}

register_activation_hook( __FILE__ , 'activate_fooorm' );
register_activation_hook( __FILE__ , 'deactivate_fooorm' );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}