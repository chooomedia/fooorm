<?php
/**
 * @package Fooorm
 */
namespace Inc\Base;

 class Enqueue
 {
    public function register() {
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue' ) ); //load this
    }

    function enqueue() {
        wp_enqueue_style( 'fooorm-style', PLUGIN_URL .  'assets/css/style.css');
        wp_enqueue_script( 'fooorm-script', PLUGIN_URL .  'assets/js/form.js');
    }
}