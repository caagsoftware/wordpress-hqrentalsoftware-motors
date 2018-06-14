<?php
/*
 * Caag Contact Form
 * Author: Miguel Faggioni
 */

vc_map(
    array(
        'name'                    => __( 'Caag Contact Form', 'js_composer' ),
        'base'                    => 'caag_contact_form',
        'content_element'         => true,
        'show_settings_on_create' => true,
        'description'             => __( 'Caag Contact Form Integration', 'js_composer'),
        'icon'					  =>	'https://rent-scandinavia.caag.nl/wp-content/uploads/2018/01/apple-icon-60x60.png',
        'params' => array(

        )
    )
);

class WPBakeryShortCode_caag_contact_form extends WPBakeryShortCode{
    protected function content( $atts, $content = null ) {
        extract( shortcode_atts( array(
        ), $atts ) );

        $translations = array(
            'name_label'			=> 	pll__('Name Field Label'),
            'name_placeholder'		=>	pll__('Name Field Placeholder'),
            'last_name_label'		=> 	pll__('Last Name Field Label'),
            'last_name_placeholder'	=> 	pll__('Last Name Field Placeholder'),
            'email_label'			=> 	pll__('Email Field Label'),
            'email_placeholder'		=> 	pll__('Email Field Placeholder'),
            'phone_label'			=>	pll__('Phone Number Field Label'),
            'phone_placeholder'		=> 	pll__('Phone Number Field Placeholder'),
            'message_label'			=>	pll__('Message Field Label'),
            'message_placeholder'	=>	pll__('Message Field Placeholder'),
            'button_text'			=>	pll__('Button Text'),
            'message_label'			=>	pll__('Message Field Label'),
            'message_placeholder'	=>	pll__('Message Field Placeholder'),
            'action'				=>	pll__('Caag Contact Form Link')
        );
        $output = '<form action="'. $translations['action'] .'" method="post" class="wpcf7-form">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<div class="form-group">
									<div class="contact-us-label">'. $translations['message_label'] .'</div>
										<p><span class="wpcf7-form-control-wrap message"><textarea name="field_183" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="'. $translations['message_placeholder'] .'"></textarea></span>
					            		</p>
				            		</div>
			            		</div>
		            		</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<div class="contact-us-label">'. $translations['name_label'] .'*</div>
									<p><span class="wpcf7-form-control-wrap name"><input type="text" name="field_177" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="'. $translations['name_placeholder'] .'" required></span>
				          			</p>
			          			</div>
			          			<div class="form-group">
									<div class="contact-us-label">'. $translations['last_name_label'] .'*</div>
									<p><span class="wpcf7-form-control-wrap name"><input type="text" name="field_178" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="'. $translations['last_name_placeholder'] .'" required></span>
				          			</p>
			          			</div>
								<div class="form-group">
									<div class="contact-us-label">'. $translations['email_label'] .'*</div>
									<p><span class="wpcf7-form-control-wrap email"><input type="email" name="field_180" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="'. $translations['email_placeholder'] .'" required></span>
				          			</p>
			          			</div>
			          			<div class="form-group">
									<div class="contact-us-label">'. $translations['phone_label'] .'</div>
									<p><span class="wpcf7-form-control-wrap email"><input type="text" name="field_181" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="'. $translations['phone_placeholder'] .'"></span>
				          			</p>
			          			</div>
								<div class="contact-us-submit">
				            		<input type="submit" value="'. $translations['button_text'] .'" class="wpcf7-form-control wpcf7-submit contact-us-submit">
				          		</div>
		          			</div>
						</div>
							<div class="wpcf7-response-output wpcf7-display-none"></div>
				</form>';
        return $output;

    }
}