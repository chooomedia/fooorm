<?php
/**
 * @package Fooorm
 */

 class FooormActivate 
 {
    public static function activate() {
        flush_rewrite_rules();
    }
}