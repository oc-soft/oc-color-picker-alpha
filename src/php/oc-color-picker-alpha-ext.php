<?php

/**
 * color picker alpha extension
 */
class OC_Color_Picker_Alpha_Ext {

    /**
     * extension instance
     */
    static $instance = null;


    /**
     * register 
     */
    function customize_register($customize_mgr) {
        $customize_mgr->register_control_type('OC_Color_Picker_Alpha');
    }


    /**
     * enqueue scripts
     */
    function enqueue_scripts($js_directory) {
        
        wp_register_script('wp-color-ext',
            implode('/', [
                $js_directory,
                'color-ext.js'
            ]), ['iris']);

        wp_register_script('wp-iris-alpha', 
            implode('/', [
                $js_directory, 
                'wp-iris-alpha.js']),
            ['iris', 'wp-color-ext']);


        wp_register_script('wp-color-picker-alpha', 
            implode('/', [
                $js_directory, 
                'wp-color-picker-alpha.js']),
            ['wp-color-picker', 'wp-iris-alpha']);


        wp_enqueue_script('wp-color-picker-alpha');
        wp_register_script('oc-color-picker-alpha',
            implode('/', [
                $js_directory,
                'oc-color-picker-alpha.js'
            ]), 
            [ 'customize-controls' ]);
        wp_enqueue_script('oc-color-picker-alpha');
    }
}

OC_Color_Picker_Alpha_Ext::$instance = 
    new OC_Color_Picker_Alpha_Ext;
// vi: se ts=4 sw=4 et: 
