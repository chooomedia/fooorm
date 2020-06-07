<?php

namespace inc\Pages;

use \Inc\Base\BaseController;

/**
 * 
 * 
 */

 class Admin extends BaseController
 {

   public function register() {
      add_action( 'admin_menu', array( $this, 'add_admin_pages') );
   }

   public function add_admin_pages() {
      add_menu_page( 'Fooorm Plugin', 'Fooorm', 'manage_options', 'fooorm_plugin', array( $this, 'admin_index' ), 'dashicons-format-status', 110 );
   }

   public function admin_index() {
         require_once $this->plugin_path . 'templates/admin.php';
   }
}