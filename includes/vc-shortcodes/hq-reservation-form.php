<?php

/*
 * HQ Rental Reservation Form
 * Author: Miguel Faggioni
 */

vc_map(
    array(
        'name'                    => __( 'HQ Rental Form', 'js_composer' ),
        'base'                    => 'hq_reservation_form',
        'content_element'         => true,
        'show_settings_on_create' => true,
        'description'             => __( 'HQ Rental Reservation Form Integration', 'js_composer'),
        'icon'                    =>    HQ_MOTORS_VC_SHORTCODES_ICON,
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
                'heading' => esc_html__('Return Location Label', 'motors'),
                'param_name' => 'return_location_label',
                'value' => '',
                'description' => esc_html__('Enter the return Location Label')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Return Location Placeholder', 'motors'),
                'param_name' => 'return_location_placeholder',
                'value' => '',
                'description' => esc_html__('Enter the return Location Placeholder')
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
                'heading' => esc_html__('Reservation Page URL', 'motors'),
                'param_name' => 'action_link',
                'value' => '',
                'description' => esc_html__('Reservation Page Url')
            ),
            array(
                'type'       => 'param_group',
                'heading'    => __( 'Pickup Locations', 'js_composer' ),
                'param_name' => 'pickup_locations',
                'params'     => array(
                    array(
                        'type' 		  => 'textfield',
                        'heading' 	  => __( 'Location Label', 'js_composer' ),
                        'param_name'  => 'label',
                        'description' => __( 'Location Label', 'js_composer' ),
                        'value' 	  => ''
                    ),
                    array(
                        'type' 		  => 'textfield',
                        'heading' 	  => __( 'Location Identification', 'js_composer' ),
                        'param_name'  => 'id',
                        'description' => __( 'Integer Number Representing the Location on the System', 'js_composer' ),
                        'value' 	  => ''
                    ),
                )
            ),
            array(
                'type'       => 'param_group',
                'heading'    => __( 'Return Locations', 'js_composer' ),
                'param_name' => 'return_locations',
                'params'     => array(
                    array(
                        'type' 		  => 'textfield',
                        'heading' 	  => __( 'Location Label', 'js_composer' ),
                        'param_name'  => 'label',
                        'description' => __( 'Location Label', 'js_composer' ),
                        'value' 	  => ''
                    ),
                    array(
                        'type' 		  => 'textfield',
                        'heading' 	  => __( 'Location Identification', 'js_composer' ),
                        'param_name'  => 'id',
                        'description' => __( 'Integer Number Representing the Location on the System', 'js_composer' ),
                        'value' 	  => ''
                    ),
                )
            )
        )
    )
);

class WPBakeryShortCode_hq_reservation_form extends WPBakeryShortCode{
    protected function content( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'pick_up_location_label'	    =>	'',
            'pick_up_location_placeholder'	=>	'',
            'pick_up_date_label'	        =>	'',
            'pick_up_date_placeholder'	    =>	'',
            'return_date_label'		        =>	'',
            'return_date_placeholder'	    =>	'',
            'button_text'                   =>  '',
            'alignment'                     =>  'text-left',
            'action_link'	                =>	'',
            'pickup_locations'              =>  '',
            'return_locations'              =>  '',
            'return_location_label'         =>  '',
            'return_location_placeholder'  =>  ''
        ), $atts ) );
        $pickup_locations 	= json_decode( urldecode( $pickup_locations ), true );
        $return_locations 	= json_decode( urldecode( $return_locations ), true );
        ?>
            <div class="stm_rent_car_form_wrapper caag-book-form-style style_1 <?php echo $alignment; ?>">
                <div class="stm_rent_car_form">
                    <form id="caag-book-form" action="<?php echo $action_link; ?>" method="post">
                        <h4><?php echo $pick_up_location_label; ?></h4>
                        <div class="stm_rent_form_fields">
                            <div class="stm_pickup_location">
                                <i class="stm-service-icon-pin"></i>
                                <select name="pick_up_location" data-class="stm_rent_location" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                        <option value=""><?php echo $pick_up_location_placeholder; ?></option>
                                    <?php foreach ($pickup_locations as $location): ?>
                                        <option value="<?php echo $location['id']; ?>"><?php echo $location['label']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <h4 style="margin-top:18px;"><?php echo $return_location_label; ?></h4>
                        <div class="stm_rent_form_fields">
                            <div class="stm_pickup_location">
                                <i class="stm-service-icon-pin"></i>
                                <select name="pick_up_location" data-class="stm_rent_location" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                    <option value=""><?php echo $return_location_placeholder; ?></option>
                                    <?php foreach ($return_locations as $location): ?>
                                        <option value="<?php echo $location['id']; ?>"><?php echo $location['label']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <h4 style="margin-top:18px;"><?php echo $pick_up_date_label; ?></h4>
                            <div class="stm_date_time_input">
                                <div class="stm_date_input">
                                    <input type="text" value="" id="caag-pick-up-date" class="stm-date-timepicker-start active" name="pick_up_date" placeholder="<?php echo $pick_up_date_placeholder; ?>" required="" readonly="">
                                    <i class="stm-icon-date"></i>
                                </div>
                            </div>
                        </div>
                        <h4><?php echo $return_date_label; ?></h4>
                        <div class="stm_rent_form_fields stm_rent_form_fields-drop">
                            <div class="stm_date_time_input">
                                <div class="stm_date_input">
                                    <input type="text" id="caag-return-date"  class="stm-date-timepicker-end active" name="return_date" value="" placeholder="<?php echo $return_date_placeholder; ?>" required="" readonly="">
                                    <i class="stm-icon-date"></i>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="order_old_days" value="1">
                        <button type="submit"><?php echo $button_text; ?><i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
            <style>
                .stm-template-car_rental .stm_rent_location .select2-dropdown{
                    min-height: 0px;
                }
            </style>
        <?php
        wp_enqueue_script('moment-js');
        wp_enqueue_script('hq-motors-js');
    }
}
