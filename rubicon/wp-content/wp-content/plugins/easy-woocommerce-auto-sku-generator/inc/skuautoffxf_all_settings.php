<?php
/**
 * Add settings to the specific section we created before
 */

add_filter( 'woocommerce_get_settings_products', 'skuautoffxf_all_settings', 10, 2 );

/**
 *  All settings
 *
 * @param mixed $settings Setting SKU.
 * @param mixed $current_section .
 *
 * @return array
 */
function skuautoffxf_all_settings( $settings, $current_section ) {



	wp_enqueue_script( 'ffxf_settings_script' );

	if ( 'skuautoffxf' === $current_section ) {

		$ffxf_settings_sku = array();

		$ffxf_settings_sku[] = array(
			'name' => __( 'General plugin settings', 'easy-woocommerce-auto-sku-generator' ),
			'type' => 'title',
			'desc' => __( 'On this page you can configure sku', 'easy-woocommerce-auto-sku-generator' ),
			'id'   => 'skuautoffxfid',
		);

		$ffxf_settings_sku[] = array(
			'title'     => __( 'Characters', 'easy-woocommerce-auto-sku-generator' ),
			'desc_tip'  => __( 'SKU prefix and product ID are not counted', 'easy-woocommerce-auto-sku-generator' ),
			'id'        => 'skuautoffxf_auto_number',
			'type'      => 'number',
			'custom_attributes' => array(
				'min'    => 4,
				'step'   => 1,
			),
			'default'   => '5',
			'class'     => 'manage_stock_field',
			'css'       => 'display:block; width:50px;',
			'desc'      => __( 'Specify the number of characters in SKU', 'easy-woocommerce-auto-sku-generator' ),
		);

		$ffxf_settings_sku[] = array(
			'name'      => __( 'Prefix SKU', 'easy-woocommerce-auto-sku-generator' ),
			'type'      => 'text',
			'default'   => '',
			'placeholder' => 'For example BN_',
			'desc_tip'  => __( 'Characters in the prefix are not assigned to the total number of characters (field above)', 'easy-woocommerce-auto-sku-generator' ),
			'id'        => 'skuautoffxf_auto_prefix',
			'css'       => 'width:100%;display:block',
			'desc'      => __( 'Enter any prefix that will be displayed at the beginning of the SKU. <br>For example <b>BN_</b>893267', 'easy-woocommerce-auto-sku-generator' ),
		);

		$ffxf_settings_sku[] = array(
			'name'      => __( 'Select SKU format', 'easy-woocommerce-auto-sku-generator' ),
			'id'        => 'skuautoffxf_letters_and_numbers',
			'type'      => 'radio',
			'default'   => 'ffxf_numbers',
			'css'       => 'color:red',

			'options'   => array(
				'ffxf_numbers' => __( 'Only numbers, for example - 893267', 'easy-woocommerce-auto-sku-generator' ),
				'ffxf_letters' => __( 'Only letters, for example - KSZHGD', 'easy-woocommerce-auto-sku-generator' ),
				'ffxf_landnum' => __( 'Letters and numbers, for example - 7SZ4G2', 'easy-woocommerce-auto-sku-generator' ),
				'ffxf_slug'    => __( 'Use product slug, for example - your-product', 'easy-woocommerce-auto-sku-generator' ),
			),

		);

		$ffxf_settings_sku[] = array(
			'name'      => __( 'Add product ID', 'easy-woocommerce-auto-sku-generator' ),
			'type'      => 'checkbox',
			'id'        => 'skuautoffxf_auto_ID',
			'css'       => 'min-width:300px;display:block',
			'desc'      => __( 'If checked, product ID will be added to SKU', 'easy-woocommerce-auto-sku-generator' ),
		);

		$ffxf_settings_sku[] = array(
			'name'      => __( 'Take previous product', 'easy-woocommerce-auto-sku-generator' ),
			'type'      => 'checkbox',
			'id'        => 'skuautoffxf_previous',
			'css'       => 'min-width:300px;display:block',
			'desc'      => __( 'Take into account the previous product', 'easy-woocommerce-auto-sku-generator' ),
		);

		$ffxf_settings_sku[] = array(
			'name'      => __( 'Variable product', 'easy-woocommerce-auto-sku-generator' ),
			'type'      => 'checkbox',
			'id'        => 'skuautoffxf_auto_variant',
			'css'       => 'min-width:300px;display:block',
			'desc'      => __( 'Turn off generation of variable product', 'easy-woocommerce-auto-sku-generator' ),
		);

		$ffxf_settings_sku[] = array( 'type' => 'sectionend', 'id' => 'skuautoffxf' );

		return $ffxf_settings_sku;

	} else {
		return $settings;
	}
}

add_action('admin_print_footer_scripts', 'my_action_javascript', 999);
function my_action_javascript() {
	?>
	<script type="text/javascript">
        var paged = 1;
        var procent = <?php echo wp_count_posts('product')->publish; ?>;
        jQuery(function($) {
                $.function_product_update = function(){
                    var data = {
                        'action': 'load_posts_by_ajax',
                        'paged': paged,
                        'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                        'class': 'load_more_posts',
                        'checked': $('#check_generate').prop('checked') ? 1 : 0,
                    };

                    $.get(ajaxurl, data, function(response) {
                        if(response != '') {
                            $('.my-posts').append(response);
                            paged++;
                            procent--;

                            var edenica = 1;
                            var celoe = procent;
                            var proc = 100;
                            var gotovo = edenica / celoe * proc;

                            $('.progress-pie-chart').attr('data-percent', gotovo.toFixed());

                            var $ppc = $('.progress-pie-chart'),
                                percent = gotovo.toFixed(),
                                deg = (360*percent++)/100;
                            if (percent > 50) {
                                $ppc.addClass('gt-50');
                            }
                            if (percent > 100) {
                                percent = 100;
                            }
                            $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
                            $('.ppc-percents span').html(percent+'%');
                            $('label#check_gen').hide();


                            $('.ps').text('<?php echo __( "Products left:", "easy-woocommerce-auto-sku-generator" ); ?> ' + procent);
                            $.function_product_update();
                        } else {
                            $('.generate_button').hide();


                            $('.ps').text('<?php echo __( "Product processing completed!", "easy-woocommerce-auto-sku-generator" ); ?>');
                            $('#text_generate_modal').fadeOut().fadeIn().text('<?php echo __( "Thanks for waiting! If the process did not work correctly, please refer to the user support forum.", "easy-woocommerce-auto-sku-generator" ); ?>');
                        }
                    });

                };

                $('body').on('click', '.generate_button', function() {
                    $.function_product_update();
                    $('.progress-pie-chart').fadeIn();
                    $('.generate_button').fadeOut();
                    $('#text_generate_modal').fadeOut().fadeIn().text(' <?php echo __( "At the moment, the process of generating all articles is in progress. The process will take some time, please wait until the end!", "easy-woocommerce-auto-sku-generator" ); ?>');
                });

            });
	</script>
	<?php
}