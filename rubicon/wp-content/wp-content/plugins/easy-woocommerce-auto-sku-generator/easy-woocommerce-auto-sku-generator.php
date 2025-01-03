<?php
/**
 * Plugin Name: Easy Auto SKU Generator for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/easy-woocommerce-auto-sku-generator/
 * Text Domain: easy-woocommerce-auto-sku-generator
 * Domain Path: /languages
 * Description: Automatically assign a unique SKU for all variations of your product. Just activate the plugin
 * Version: 0.9.5
 * Author: Dan Zakirov
 * Author URI: https://profiles.wordpress.org/alexodiy/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * WC requires at least: 3.3.0
 * WC tested up to: 3.8
 *
 *     Copyright Dan Zakirov
 *
 *     This file is part of Easy Auto SKU Generator for WooCommerce,
 *     a plugin for WordPress.
 *
 *     Easy Auto SKU Generator for WooCommerce is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 3 of the License, or (at your option)
 *     any later version.
 *
 *     Easy Auto SKU Generator for WooCommerce is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Easy Auto SKU Generator for WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'init', 'skuautoffxf_wpdocs_load_textdomain' );

/**
 * Load plugin textdomain.
 */
function skuautoffxf_wpdocs_load_textdomain() {
	load_plugin_textdomain( 'easy-woocommerce-auto-sku-generator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

register_activation_hook( __FILE__, 'ffxf_sku_plugin_activate' );

function ffxf_sku_plugin_activate() {
	/**
	 * Date of the plugin and add two days to remind myself in 2 days.
     * The reminder itself is activated in the /inc/skuautoffxf_rate.php file.
	 */
	update_option( 'glideffxf_data_install', date("Y-m-d", strtotime("+2 days")) );

}

/**
 * Register script notice
 *
 * @return void
 */
function ffxf_registering_notice_script() {
	wp_register_script( 'ffxf-rate-sku', plugins_url( '/assets/js/ffxf_rate_sku.js', __FILE__ ), array('jquery'), '0.1.0', true );
	wp_localize_script(
		'ffxf-rate-sku',
		'ffxf_sp',
		array(
			'ffxf_sp' => __( 'Thank you very much!<br>Remember to make updates when it is available.' ) // ffxf_sp.ffxf_sp
		)
	);
}

add_action( 'admin_enqueue_scripts', 'ffxf_registering_notice_script' );

/**
 * General
 */
function ffxf_registering_script() {

	if ( get_current_screen()->parent_base !== 'edit' && get_current_screen()->id !== 'product' ) {return;}

	$skuautoffxf_auto_number         = get_option( 'skuautoffxf_auto_number' );
	$skuautoffxf_auto_prefix         = get_option( 'skuautoffxf_auto_prefix' );
	$skuautoffxf_auto_id             = get_option( 'skuautoffxf_auto_ID' );
	$skuautoffxf_previous            = get_option( 'skuautoffxf_previous' );
	$skuautoffxf_letters_and_numbers = get_option( 'skuautoffxf_letters_and_numbers' );

	wp_enqueue_style( 'ffxf_autosku', plugins_url( '/assets/css/ffxf_autosku.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'ffxf_tooltip', plugins_url( '/assets/css/ffxf_tooltip.css', __FILE__ ), array(), '1.0' );

	if ( 'ffxf_slug' === $skuautoffxf_letters_and_numbers ) {

		$ffxf_slug = get_post_field( 'post_name', get_post() );

		wp_enqueue_script( 'ffxf_slug_script', plugins_url( '/assets/js/ffxf_slug_script.js', __FILE__ ), '0.1.0', true );

		wp_localize_script(
			'ffxf_slug_script',
			'ffxf_slug',
			array(
				'slug_product' => $ffxf_slug,
				'skuautoffxf_text_description'       => __( 'This feature is intented to generate another SKU formats, but you are using generation by product slug. If you want to use this feature, please change the slug and save product, then use this button. Also, you can use this feature if you rewrite old saved SKU.', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_bottom'                => __( 'You can always leave your suggestion for improvement in the user support forum. By clicking on the icon, you will be taken to the user support forum. Leave your suggestions, questions.', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_left'                  => __( 'You can always take part in finalizing this plugin.', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_right'                 => __( 'You have any suggestions for improving the plugin?', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip'                       => __( 'Settings SKU', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_trigger_script'        => __( 'Re-Create SKU online', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_trigger_script_thanks' => __( 'Thank you!', 'easy-woocommerce-auto-sku-generator' )
			)
		);

	} else {

		if ( empty( $skuautoffxf_auto_number ) ) {
			$skuautoffxf_auto_number = '5';
		}

		if ( empty( $skuautoffxf_letters_and_numbers ) ) {
				$ffxf_format_sku = '123456789';
		} elseif ( 'ffxf_numbers' === $skuautoffxf_letters_and_numbers ) {
				$ffxf_format_sku = '123456789';
		} elseif ( 'ffxf_letters' === $skuautoffxf_letters_and_numbers ) {
				$ffxf_format_sku = 'QWERTYUIOPASDFGHJKLZXCVBNM';
		} elseif ( 'ffxf_landnum' === $skuautoffxf_letters_and_numbers ) {
				$ffxf_format_sku = '123456789QWERTYUIOPASDFGHJKLZXCVBNM123456789';
		}

		if ( 'yes' === $skuautoffxf_auto_id ) {
			$skuautoffxf_id = get_the_id();
		} else {
			$skuautoffxf_id = '';
		}

		if ( 'yes' === $skuautoffxf_previous ) {
			$prev_post = get_previous_post();
			$prev_ID = get_post_meta( $prev_post->ID, '_sku', true );

			if (is_numeric($prev_ID)){
				$initial = $prev_ID;
				$length = strlen($initial);
				$result = $initial + 1;
				$final = str_pad($result, $length, '0', STR_PAD_LEFT);
				$str_prev_ID_done = $final;
			}else{
				add_action( 'admin_notices', 'ffxf_plugin_notice_this_product_cannot_be_generated' );
				function ffxf_plugin_notice_this_product_cannot_be_generated() {
					?>
					<div class="notice notice-warning is-dismissible"><h3><?php __( 'Easy Auto SKU Generator for WooCommerce', 'easy-woocommerce-auto-sku-generator' ); ?></h3>
						<p><?php __( 'SKU on this product cannot be generated. Previous SKU publication is not a numeric value. We remind you that you use the <strong>"Take the previous product"</strong> function, and it only works with digital values. You must correct the SKU of the previous product published one with digital values in order for the Take Previous Product feature to work. Also, you can simply manually change the SKU of the current product, but before that, just save this product.', 'easy-woocommerce-auto-sku-generator' ); ?></p>
						<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php __( 'Dismiss this notice.', 'easy-woocommerce-auto-sku-generator' ); ?></span></button></div>
					<?php
				}
			}

			$prev_ID = '';


		} else {
			$prev_ID = '';
		}

		wp_enqueue_script( 'ffxf_auto_sku', plugins_url( '/assets/js/ffxf_auto_sku.js', __FILE__ ), array(), '0.1.0', true );

		wp_localize_script(
			'ffxf_auto_sku',
			'ffxf_sku', 
			array(
				'ffxf_format_sku'                    => $ffxf_format_sku,
				'ffxf_id'                            => $skuautoffxf_id,
				'ffxf_prev_ID'                       => $str_prev_ID_done,
				'skuautoffxf_auto_prefix'            => $skuautoffxf_auto_prefix,
				'skuautoffxf_auto_prefix_text'       => __( 'Attention! You use the "Take previous product" function for your SKU. If you want to rewrite this SKU manually, first save the product, after which you can rewrite SKU manually. Remember, this function generates an article based on the previous published product and its SKU.<br><span style="font-weight:700;color:red;padding:0">Important! Do not use alphabetic values ​​in SKU when option "Take previous product" is enabled!</span> ', 'easy-woocommerce-auto-sku-generator' ),
				'skuautoffxf_id'                     => $skuautoffxf_id,
				'skuautoffxf_auto_number'            => $skuautoffxf_auto_number,
				'data_tooltip_bottom'                => __( 'You can always leave your suggestion for improvement in the user support forum. By clicking on the icon, you will be taken to the user support forum. Leave your suggestions, questions.', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_left'                  => __( 'You can always take part in finalizing this plugin.', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_right'                 => __( 'You have any suggestions for improving the plugin?', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip'                       => __( 'Settings SKU', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_trigger_script'        => __( 'Re-Create SKU online', 'easy-woocommerce-auto-sku-generator' ),
				'data_tooltip_trigger_script_thanks' => __( 'Thank you!', 'easy-woocommerce-auto-sku-generator' ),
			)
		);

	}

}

add_action( 'admin_enqueue_scripts', 'ffxf_registering_script' );



add_action( 'woocommerce_admin_process_product_object', 'ffxf_wc_auto_generate_variations_skus', 10, 1 );

	/**
	 * Get product SKU and children
	 *
	 * @param WC_Product $product Product object.
	 */
function ffxf_wc_auto_generate_variations_skus( $product ) {

	$skuautoffxf_auto_variant = get_option( 'skuautoffxf_auto_variant' );

	if ( $product->is_type( 'variable' ) && 'no' === $skuautoffxf_auto_variant ) {

		$parent_sku   = $product->get_sku();
		$children_ids = $product->get_children();
		$count        = 0;

		// Loop through the variations Ids.
		foreach ( $children_ids as $child_id ) {
			$count++;

			// Get an instance of the WC_Product_Variation object.
			$variation = wc_get_product( $child_id );

			// Set the prefix lenght based on variations count.
			$prefix = sizeof( $children_ids ) < 100 ? sprintf( '%02d', $count) : sprintf( '%03d', $count);

			// Geberate and set the sku.
			$variation->set_sku( $parent_sku . '-' . $prefix );

			// Save variation.
			$variation->save();
		}
	}
}

add_filter( 'woocommerce_get_sections_products', 'skuautoffxf_add_section' );

/**
 * Add section setting
 *
 * @param mixed $sections setting plugin.
 *
 * @return $sections
 */
function skuautoffxf_add_section( $sections ) {

	$sections['skuautoffxf'] = __( 'SKU Settings', 'easy-woocommerce-auto-sku-generator' );
	return $sections;

}

/**
 * Message in setting
 *
 * @return void
 */
function ffxf_registering_setting_script() {
	if ( isset( $_GET['section'] ) && $_GET['section'] === 'skuautoffxf' ) {

		wp_enqueue_style( 'ffxf_settings', plugins_url( '/assets/css/ffxf_settings.css', __FILE__ ), array(), '1.0' );
		wp_enqueue_style( 'ffxf_tooltip', plugins_url( '/assets/css/ffxf_tooltip.css', __FILE__ ), array(), '1.0' );

		wp_register_script( 'ffxf_settings_script', plugins_url( '/assets/js/ffxf_settings_script.js', __FILE__ ), array('jquery'), '0.1.0', true );
		wp_localize_script(
			'ffxf_settings_script',
			'ffxf_settings_locale',
			array(
				'ffxf_message' => __( 'If you use current SKU format, then Characters, Prefix SKU, and Add Product ID settings will not be respected. SKU will be generated basing on your product slug.', 'easy-woocommerce-auto-sku-generator' ), // ffxf_settings_locale.ffxf_message.
				'ffxf_message_preiv' => __( 'This function is made especially for online store owners who want their product SKU to be formed on the basis of the previous product. The function works only with numbers, its detailed description can be found in <br><a href="https://wordpress.org/support/topic/does-it-do-this-2/" target="_blank">this topic forum</a>.<br><br>At the moment, you see other options with a darkened color - they do not work when the "Take previous product" option is enabled. All characters, and with this setting only numbers, will come from the last published product <a href = "http://alexodlw.beget.tech/wp-admin/edit.php?post_type=product" target = "_ blank" > at the very top of the list </a> of your products. <br> <br> In connection with the above, it is required to configure or change the SKU of the last published product (in numbers). In this case, the articles will be published in order, for example 00801, 00802, 00803' ),
			)
		);
	}
}

add_action( 'admin_enqueue_scripts', 'ffxf_registering_setting_script' );


/**
 * Add Settings link to plugins.
 *
 * @param mixed $links return.
 * @param mixed $file plugin basename.
 *
 * @return $links
 */
function skuautoffxf_wpc_add_settings_link( $links, $file ) {

	$this_plugin = plugin_basename( __FILE__ );
	if ( $file === $this_plugin ) {
		$settings_link = '<a href="/wp-admin/admin.php?page=wc-settings&tab=products&section=skuautoffxf">' . __( 'Settings' ) . '</a>';
		array_unshift( $links, $settings_link );
	}
	return $links;
}
add_filter( 'plugin_action_links', 'skuautoffxf_wpc_add_settings_link', 10, 2 );

/**
 * Add settings to the specific section we created before
 */
require_once ( plugin_dir_path(__FILE__) . 'inc/skuautoffxf_all_settings.php' );

/**
 * Opening a wrapper hook for a website bar and information and bulk generator
 */
require_once ( plugin_dir_path(__FILE__) . 'inc/skuautoffxf_setting_block_and_generator.php' );

/**
 * Opening a wrapper hook for a website bar and information and bulk generator
 */
require_once ( plugin_dir_path(__FILE__) . 'inc/skuautoffxf_rate.php' );