<?php

/**
 *	Shortcodes
 */

function dropcap_shortcode( $atts, $content ) {
	return '<span class="dropcap">' . $content . '</span>';
}
add_shortcode('dropcap', 'dropcap_shortcode');


function button_shortcode( $atts, $content = null ) {
	$style = isset($atts['style']) ? $atts['style'] : '';
	$href = isset($atts['href']) ? $atts['href'] : '';

	return '<a class="button ' . $style . '" href="' . $href . '">' . $content . '</a>';
}
add_shortcode('button', 'button_shortcode');

function info_shortcode( $atts, $content ) {
	return '<div class="alert info">' . $content . '</div>';
}

function error_shortcode( $atts, $content ) {
	return '<div class="alert error">' . $content . '</div>';
}

function success_shortcode( $atts, $content ) {
	return '<div class="alert success">' . $content . '</div>';
}

add_shortcode('info', 'info_shortcode');
add_shortcode('error', 'error_shortcode');
add_shortcode('success', 'success_shortcode');