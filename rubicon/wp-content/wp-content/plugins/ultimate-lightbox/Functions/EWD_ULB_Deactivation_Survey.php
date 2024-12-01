<?php
add_action('current_screen', 'EWD_ULB_Deactivation_Survey');
function EWD_ULB_Deactivation_Survey() {
	if (in_array(get_current_screen()->id, array( 'plugins', 'plugins-network' ), true)) {
		add_action('admin_enqueue_scripts', 'EWD_ULB_Enqueue_Deactivation_Scripts');
		add_action( 'admin_footer', 'EWD_ULB_Deactivation_Survey_HTML'); 
	}
}

function EWD_ULB_Enqueue_Deactivation_Scripts() {
	wp_enqueue_style('ewd-ulb-deactivation-css', EWD_ULB_CD_PLUGIN_URL . 'css/ewd-ulb-plugin-deactivation.css');
	wp_enqueue_script('ewd-ulb-deactivation-js', EWD_ULB_CD_PLUGIN_URL . 'js/ewd-ulb-plugin-deactivation.js', array('jquery'));

	wp_localize_script('ewd-ulb-deactivation-js', 'ewd_ulb_deactivation_data', array('site_url' => site_url()));
}

function EWD_ULB_Deactivation_Survey_HTML() {
	$Install_Time = get_option("EWD_ULB_Install_Time");

	$options = array(
		1 => array(
			'title'   => esc_html__( 'I no longer need the plugin', 'ultimate-lightbox' ),
		),
		2 => array(
			'title'   => esc_html__( 'I\'m switching to a different plugin', 'ultimate-lightbox' ),
			'details' => esc_html__( 'Please share which plugin', 'ultimate-lightbox' ),
		),
		3 => array(
			'title'   => esc_html__( 'I couldn\'t get the plugin to work', 'ultimate-lightbox' ),
			'details' => esc_html__( 'Please share what wasn\'t working', 'ultimate-lightbox' ),
		),
		4 => array(
			'title'   => esc_html__( 'It\'s a temporary deactivation', 'ultimate-lightbox' ),
		),
		5 => array(
			'title'   => esc_html__( 'Other', 'ultimate-lightbox' ),
			'details' => esc_html__( 'Please share the reason', 'ultimate-lightbox' ),
		),
	);
	?>
	<div class="ewd-ulb-deactivate-survey-modal" id="ewd-ulb-deactivate-survey-ultimate-faqs">
		<div class="ewd-ulb-deactivate-survey-wrap">
			<form class="ewd-ulb-deactivate-survey" method="post" data-installtime="<?php echo $Install_Time; ?>">
				<span class="ewd-ulb-deactivate-survey-title"><span class="dashicons dashicons-testimonial"></span><?php echo ' ' . __( 'Quick Feedback', 'ultimate-lightbox' ); ?></span>
				<span class="ewd-ulb-deactivate-survey-desc"><?php echo __('If you have a moment, please share why you are deactivating Ultimate Lightbox:', 'ultimate-lightbox' ); ?></span>
				<div class="ewd-ulb-deactivate-survey-options">
					<?php foreach ( $options as $id => $option ) : ?>
						<div class="ewd-ulb-deactivate-survey-option">
							<label for="ewd-ulb-deactivate-survey-option-ultimate-faqs-<?php echo $id; ?>" class="ewd-ulb-deactivate-survey-option-label">
								<input id="ewd-ulb-deactivate-survey-option-ultimate-faqs-<?php echo $id; ?>" class="ewd-ulb-deactivate-survey-option-input" type="radio" name="code" value="<?php echo $id; ?>" />
								<span class="ewd-ulb-deactivate-survey-option-reason"><?php echo $option['title']; ?></span>
							</label>
							<?php if ( ! empty( $option['details'] ) ) : ?>
								<input class="ewd-ulb-deactivate-survey-option-details" type="text" placeholder="<?php echo $option['details']; ?>" />
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="ewd-ulb-deactivate-survey-footer">
					<button type="submit" class="ewd-ulb-deactivate-survey-submit button button-primary button-large"><?php _e('Submit and Deactivate', 'ultimate-lightbox' ); ?></button>
					<a href="#" class="ewd-ulb-deactivate-survey-deactivate"><?php _e('Skip and Deactivate', 'ultimate-lightbox' ); ?></a>
				</div>
			</form>
		</div>
	</div>
	<?php
}

?>