<?php
/*
Plugin Name: C4D Woocommerce Category Grid Zoom
Plugin URI: http://coffee4dev.com/
Description: Zoom In Out product in category page
Author: Coffee4dev.com
Author URI: http://coffee4dev.com/
Text Domain: c4d-woo-cgz
Version: 2.0.8
*/

define('C4DWCGZ_PLUGIN_URI', plugins_url('', __FILE__));

add_action( 'wp_enqueue_scripts', 'c4d_woo_cgz_safely_add_stylesheet_to_frontsite');
add_shortcode( 'c4dwcgz', 'c4dwcgz_shortcode');
add_action( 'woocommerce_before_shop_loop', 'c4dwcgz_auto_add_to_category_page', 51);
add_filter( 'plugin_row_meta', 'c4d_woo_cgz_plugin_row_meta', 10, 2 );
add_action( 'c4d-plugin-manager-section', 'c4d_woo_cgz_section_options');

function c4d_woo_cgz_plugin_row_meta( $links, $file ) {
    if ( strpos( $file, basename(__FILE__) ) !== false ) {
        $new_links = array(
            'visit' => '<a href="http://coffee4dev.com">Visit Plugin Site</<a>',
            'premium' => '<a href="http://coffee4dev.com">Premium Support</<a>'
        );
        $links = array_merge( $links, $new_links );
    }
    return $links;
}

function c4d_woo_cgz_safely_add_stylesheet_to_frontsite( $page ) {
	wp_enqueue_style( 'c4d-woo-cgz-frontsite-style', C4DWCGZ_PLUGIN_URI.'/assets/default.css' );
	wp_enqueue_script( 'c4d-woo-cgz-frontsite-plugin-js', C4DWCGZ_PLUGIN_URI.'/assets/default.js', array( 'jquery' ), false, true ); 
	wp_localize_script( 'jquery', 'c4d_woo_cgz',
            array( 'cols' => 4 ) );
}

function c4dwcgz_shortcode ($params) {
	return c4dwcgz_control_box();
}

function c4dwcgz_auto_add_to_category_page() {
	echo c4dwcgz_control_box();
}

function c4dwcgz_control_box() {
	ob_start();
	$template = get_template_part('c4d-woo-category-grid-zoom/templates/default');
	if ($template && file_exists($template)) {
		require $template;
	} else {
		require dirname(__FILE__). '/templates/default.php';
	}
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}

function c4d_woo_cgz_section_options(){
    $opt_name = 'c4d_plugin_manager';
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Grid Zoom', 'c4d-woo-cgz' ),
        'id'               => 'c4d-woo-cgz',
        'desc'             => '',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'c4d-woo-cgz-icon-plus',
                'type'     => 'text',
                'title'    => esc_html__('Plus Icon', 'c4d-woo-cgz'),
                'default'  => 'fa fa-search-plus'
            ),
            array(
                'id'       => 'c4d-woo-cgz-icon-minus',
                'type'     => 'text',
                'title'    => esc_html__('Minus Icon', 'c4d-woo-cgz'),
                'default'  => 'fa fa-search-minus'
            )
        )
    ));
}