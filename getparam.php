<?php
/**
 * Plugin Name: Contact Form 7 Get and Show Parameter from URL (Fixed)
 * Plugin URI: https://github.com/LWS-Web/contact-form-7-get-and-show-parameter-from-url/
 * Description: Get and Show Parameter from URL with Contact Form 7 Plugin.
 * Version: 0.9.7a
 * Author: Chad Huntley, Mo
 * Author URI: https://github.com/LWS-Web/
 * License: GPL2
 */

/*  Original code, copyright 2013  Chad Huntley  (email : chad@elementdesignllc.com)

    Code modified to work with new WP and CF7 versions, 2017 Moritz Heier (email : moritz.heier@lws-werbung.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'wpcf7_init', 'wpcf7_add_shortcode_getparam' );

function wpcf7_add_shortcode_getparam() {
    /* CHANGED
     * WPCF7_Shortcode Has Become Deprecated
     * WPCF7_Shortcode class is now marked as deprecated. If you use WPCF7_Shortcode in your custom code, you will need to replace it with 
     * WPCF7_FormTag. Otherwise, you will receive a warning if you are in the debug mode.
     * Link: https://contactform7.com/2016/12/03/contact-form-7-46/
     */
    if ( function_exists( 'wpcf7_add_form_tag' ) ) {
        wpcf7_add_form_tag( 'getparam', 'wpcf7_getparam_shortcode_handler', true );
        wpcf7_add_form_tag( 'showparam', 'wpcf7_showparam_shortcode_handler', true );
    }
}

function wpcf7_getparam_shortcode_handler($tag) {
    /* CHANGED
     * $tag is no longer an array, but is now an object.
     * Link: https://wordpress.org/support/topic/not-yet-working-with-contact-form-7-v4-8/
     * Thanks to PascalFuchs (https://wordpress.org/support/users/pascalfuchs/)
     */
    if (!is_object($tag)) return '';

    $name = $tag['name'];
    if (empty($name)) return '';

    $html = '<input type="hidden" name="' . $name . '" value="'. esc_attr( $_GET[$name] ) . '" />';
    return $html;
}

function wpcf7_showparam_shortcode_handler($tag) {
    /* CHANGED
     * $tag is no longer an array, but is now an object.
     * Link: https://wordpress.org/support/topic/not-yet-working-with-contact-form-7-v4-8/
     * Thanks to PascalFuchs (https://wordpress.org/support/users/pascalfuchs/)
     */
    if (!is_object($tag)) return '';

    $name = $tag['name'];
    if (empty($name)) return '';

    $html = esc_html( $_GET[$name] );
    return $html;
}
