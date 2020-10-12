<?php
/**
 * Learnpress compatibility
 *
 * @package Polmo Lite
 */

/**
 * Wraps free course label in span
 *
 */
function polmo_lite_learnpress_free_course_label() {

	return '<span class="free-course-label">' . __( 'Free', 'polmo-lite' ) . '</span>';

}
add_filter( 'learn_press_course_price_html_free', 'polmo_lite_learnpress_free_course_label' );

/**
 * Wraps paid course label in span
 *
 */
function polmo_lite_learnpress_paid_course_label( $price ) {

	return '<span class="paid-course-label">' . $price . '</span>';

}
add_filter( 'learn_press_course_price_html', 'polmo_lite_learnpress_paid_course_label' );