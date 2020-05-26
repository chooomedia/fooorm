<?php
/**
 * @package Fooorm
 */

 class FooormDeactivate
 {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}