<?php

/*
 * Caag Product Grid
 * Author: Miguel Faggioni
 */

vc_map(
    array(
        'name'                    => __( 'HQ Vehicles Classes Grid', 'js_composer' ),
        'base'                    => 'hq_vehicles_classes_grid',
        'content_element'         => true,
        'show_settings_on_create' => true,
        'description'             => __( 'HQ Vehicles Classes Grid', 'js_composer'),
        'icon'                    =>    HQ_MOTORS_VC_SHORTCODES_ICON,
        'params' => array(
            array(
                'type'        => 'textfield',
                'heading'     => __( 'Number of Cars to Show', 'js_composer' ),
                'param_name'  => 'product_number',
                'value'       => '6'
            ),
            array(
                'type'        => 'textfield',
                'heading'     => __( 'Currency Tag', 'js_composer' ),
                'param_name'  => 'currency_tag',
                'value'       => ''
            ),
            array(
                'type'        => 'textfield',
                'heading'     => __( 'Reservation Page URL', 'js_composer' ),
                'param_name'  => 'reservation_page_url',
                'value'       => ''
            ),
        )
    )
);

class WPBakeryShortCode_hq_vehicles_classes_grid extends WPBakeryShortCode{
    protected function content( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'product_number'            => '6',
            'currency_tag'	            =>	'',
            'reservation_page_url'      =>  ''
        ), $atts ) );

        if (empty($product_number)) {
            $product_number = 6;
        }

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => intval($product_number),
            'post_status' => 'publish',
            'orderby'   => 'meta_value_num',
            'meta_key'  => '_price',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_type',
                    'field' => 'slug',
                    'terms' => 'car_option',
                    'operator' => 'NOT IN'
                )
            )
        );

        $offices = new WP_Query($args);

        if ($offices->have_posts()): ?>
            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                <div class="stm_products_grid_class">
                    <?php while ($offices->have_posts()): $offices->the_post();
                        $id = get_the_ID();
                        $s_title = get_post_meta($id, 'cars_info', true);
                        $car_info = stm_get_car_rent_info($id);
                        $product = new WC_Product($id);
                        $price = $product->get_price();
                        $link = $reservation_page_url;
                        ?>
                        <div class="stm_product_grid_single">
                            <a href="<?php echo $link; ?>" class="inner">
                                <div class="stm_top clearfix">
                                    <div class="stm_left heading-font">
                                        <h3><?php the_title(); ?></h3>
                                        <?php if (!empty($s_title)): ?>
                                            <div class="s_title"><?php echo sanitize_text_field($s_title); ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($price)): ?>
                                            <div class="price">
                                                <mark><?php esc_html_e('From', 'motors'); ?></mark>
                                                <?php if (! empty( $currency_tag ) ): ?>
                                                    <?php echo '<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">'. $currency_tag .'</span>'. $price .'</span>/day'; ?>
                                                <?php else: ?>
                                                    <?php echo sprintf( __('%s/day', 'motors'), wc_price($price) ); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($car_info)): ?>
                                        <div class="stm_right">
                                            <?php foreach ($car_info as $slug => $info):
                                                $name = $info['value'];
                                                if ($info['numeric']) {
                                                    $name = $info['value'] . ' ' . esc_html__($info['name'], 'motors');
                                                }
                                                $font = $info['font'];
                                                ?>
                                                <div class="single_info stm_single_info_font_<?php echo esc_attr($font) ?>">
                                                    <i class="<?php echo esc_attr($font); ?>"></i>
                                                    <span><?php echo sanitize_text_field($name); ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <?php if (has_post_thumbnail()): ?>
                                    <div class="stm_image">
                                        <?php the_post_thumbnail('stm-img-796-466', array('class' => 'img-responsive caag-product-grid-image')); ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        endif; ?>
        <?php

    }
}


