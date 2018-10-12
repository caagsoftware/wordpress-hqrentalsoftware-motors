<?php

function hq_register_assets()
{

    wp_register_style('hq-motors-datetimepicker-css', plugins_url( 'css/jquery.datetimepicker.min.css', __FILE__ ));
    wp_register_script('moment-js', plugins_url( 'js/moment.js', __FILE__ ), array('jquery'), '0.1', true);
    wp_register_script('safari-js', plugins_url( 'js/safari.js', __FILE__ ), array('jquery'), '0.1', true);
    wp_register_script('hq-motors-datetimepicker-js', plugins_url( 'js/jquery.datetimepicker.full.min.js', __FILE__ ), array('jquery'), '0.1', true );
    wp_register_script('hq-motors-js', plugins_url( 'js/hq-motors-app.js', __FILE__ ), array('jquery'), '0.1.2', true);
    wp_register_script('hq-motors-reservations-brands-js', plugins_url( 'js/hq-motor-reservations-brands.js', __FILE__ ), array('jquery'), '0.0.7', true);
}
add_action('wp_enqueue_scripts','hq_register_assets');