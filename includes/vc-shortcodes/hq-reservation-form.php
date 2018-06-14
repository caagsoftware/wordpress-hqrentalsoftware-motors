<?php

/*
 * HQ Rental Reservation Form
 * Author: Miguel Faggioni
 */

vc_map(
    array(
        'name'                    => __( 'Caag Car Rental Form', 'js_composer' ),
        'base'                    => 'caag_car_rental_form',
        'content_element'         => true,
        'show_settings_on_create' => true,
        'description'             => __( 'Caag Car Rental Form Integration', 'js_composer'),
        'icon'                    =>    'https://rent-scandinavia.caag.nl/wp-content/uploads/2018/01/apple-icon-60x60.png',
        'params' => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __( "Alignment", "my-text-domain" ),
                "param_name" => "alignment",
                "value" => array(
                    'left'  =>  'text-left',
                    'right' =>  'text-right'
                ),
                "description" => __( "Form Alignment", "my-text-domain" )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Pick Up Location Label', 'motors'),
                'param_name' => 'pick_up_location_label',
                'value' => '',
                'description' => esc_html__('Enter the pick up Location Label')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Pick Up Location Placeholder', 'motors'),
                'param_name' => 'pick_up_location_placeholder',
                'value' => '',
                'description' => esc_html__('Enter the pick up Location Placeholder')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Pick Up Date Label', 'motors'),
                'param_name' => 'pick_up_date_label',
                'value' => '',
                'description' => esc_html__('Enter the Pick Up Date Label')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Pick Up Date Placeholder', 'motors'),
                'param_name' => 'pick_up_date_placeholder',
                'value' => '',
                'description' => esc_html__('Enter the Pick Up Date Placeholder')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Return Date Label', 'motors'),
                'param_name' => 'return_date_label',
                'value' => '',
                'description' => esc_html__('Enter the Return Date Label')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Return Date Placeholder', 'motors'),
                'param_name' => 'return_date_placeholder',
                'value' => '',
                'description' => esc_html__('Enter the Return Date Placeholder')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text', 'motors'),
                'param_name' => 'button_text',
                'value' => '',
                'description' => esc_html__('Enter the Button Text')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Reservation Page Link', 'motors'),
                'param_name' => 'action_link',
                'value' => '',
                'description' => esc_html__('Reservation Page Link')
            )
        )
    )
);

class WPBakeryShortCode_caag_car_rental_form extends WPBakeryShortCode{
    protected function content( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'pick_up_location_label'	=>	'',
            'pick_up_location_placeholder'	=>	'',
            'pick_up_date_label'	=>	'',
            'pick_up_date_placeholder'	=>	'',
            'return_date_label'		=>	'',
            'return_date_placeholder'	=>	'',
            'button_text'               =>  '',
            'alignment'     =>  'text-left',
            'action_link'	=>	''

        ), $atts ) );
        $output = '<div class="stm_rent_car_form_wrapper caag-book-form-style style_1 '. $alignment .'">
                        <div class="stm_rent_car_form">
                            <form id="caag-book-form" action="'.$action_link.'" method="post">
                                <h4>'. $pick_up_location_label .'</h4>
                                <div class="stm_rent_form_fields">
                                    <div class="stm_pickup_location">
                                        <i class="stm-service-icon-pin"></i>
                                        <select name="pick_up_location" data-class="stm_rent_location" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <option value="">'. $pick_up_location_placeholder .'</option>
                                            <option value="2">Miami</option>
                                        </select>
                                    </div>
                                    <h4 style="margin-top:18px;">'. $pick_up_date_label .'</h4>                                    
                                    <div class="stm_date_time_input">
                                        <div class="stm_date_input">
                                            <input type="text" value="" id="caag-pick-up-date" class="stm-date-timepicker-start active" name="pick_up_date" placeholder="'. $pick_up_date_placeholder .'" required="" readonly="">
                                            <i class="stm-icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <h4>'. $return_date_label .'</h4>
                                <div class="stm_rent_form_fields stm_rent_form_fields-drop">
                                    <div class="stm_date_time_input">
                                        <div class="stm_date_input">
                                            <input type="text" id="caag-return-date"  class="stm-date-timepicker-end active" name="return_date" value="" placeholder="'. $return_date_placeholder .'" required="" readonly="">
                                            <i class="stm-icon-date"></i>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="order_old_days" value="1">
                                <button type="submit">'. $button_text .'<i class="fa fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>';
        /*        wp_register_script( 'momentjs', get_stylesheet_directory_uri() . '/caag-customizations/assets/js/moment.js');
                wp_register_script( 'caag-car-rental-form-script', get_stylesheet_directory_uri() . '/caag-customizations/assets/js/caagRentalForm.js');
                wp_enqueue_script('momentjs');
                wp_enqueue_script('caag-car-rental-form-script');*/
        return $output;
    }
}
