<?php
/**
 * @package Fooorm
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

 class Enqueue extends BaseController
 {
    public function register() {
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue' ) ); //load this
    }

    function enqueue() {
        wp_enqueue_style( 'fooorm-style', $this->plugin_url .  'assets/css/style.css');
        wp_enqueue_script( 'fooorm-script', $this->plugin_url .  'assets/js/form.js');
    }
}