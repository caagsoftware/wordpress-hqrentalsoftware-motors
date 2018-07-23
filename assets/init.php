<?php

function hq_register_assets()
{
    wp_register_script('hq-motors-js', plugins_url( 'js/hq-motors-app.js', __FILE__ ), array('jquery'), '0.4.8', true );
    //wp_register_script('moment-js', plugins_url( 'js/moment.js', __FILE__ ), array('jquery'), '0.1', true);
    wp_register_script('safari-js', plugins_url( 'js/safari.js', __FILE__ ), array('jquery'), '0.1', true );
    wp_enqueue_script("safari-js");
    wp_register_style('datetimepicker-css', plugins_url( 'css/jquery.datetimepicker.min.css', __FILE__ ));
    wp_register_script('datetime-picker-js', plugins_url( 'js/jquery.datetimepicker.min.js', __FILE__ ), array('jquery'), '0.1', true );
}
add_action('wp_enqueue_scripts','hq_register_assets');