<?php
/* The file contains all of the functions which make changes to the WordPress tables */

function EWD_ULB_UpdateOptions() {
	global $ULB_Full_Version;

	check_admin_referer('update_options');

	if (isset($_POST['Options_Submit']) and (!isset($_POST['add_lightbox']) or !is_array($_POST['add_lightbox']))) {$_POST['add_lightbox'] = array();}
	if (isset($_POST['Options_Submit']) and (!isset($_POST['hide_on_mobile']) or !is_array($_POST['hide_on_mobile']))) {$_POST['hide_on_mobile'] = array();}
	if (isset($_POST['Options_Submit']) and (!isset($_POST['top_right_controls']) or !is_array($_POST['top_right_controls']))) {$_POST['top_right_controls'] = array();}
	if (isset($_POST['Options_Submit']) and (!isset($_POST['top_left_controls']) or !is_array($_POST['top_left_controls']))) {$_POST['top_left_controls'] = array();}
	if (isset($_POST['Options_Submit']) and (!isset($_POST['bottom_right_controls']) or !is_array($_POST['bottom_right_controls']))) {$_POST['bottom_right_controls'] = array();}
	if (isset($_POST['Options_Submit']) and (!isset($_POST['bottom_left_controls']) or !is_array($_POST['bottom_left_controls']))) {$_POST['bottom_left_controls'] = array();}

	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Custom_CSS', sanitize_text_field($_POST['custom_css']));}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Add_Lightbox', $_POST['add_lightbox']);}
	if (isset($_POST['image_class_list'])) {update_option('EWD_ULB_Image_Class_List', sanitize_text_field($_POST['image_class_list']));}
	if (isset($_POST['image_selector_list'])) {update_option('EWD_ULB_Image_Selector_List', sanitize_text_field($_POST['image_selector_list']));}

	if (isset($_POST['transition_effect']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Transition_Effect', sanitize_text_field($_POST['transition_effect']));}
	if (isset($_POST['transition_speed']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Transition_Speed', sanitize_text_field($_POST['transition_speed']));}
	if (isset($_POST['background_close'])) {update_option('EWD_ULB_Background_Close', sanitize_text_field($_POST['background_close']));}
	if (isset($_POST['gallery_loop']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Gallery_Loop', sanitize_text_field($_POST['gallery_loop']));}
	if (isset($_POST['mousewheel_navigation']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Mousewheel_Navigation', sanitize_text_field($_POST['mousewheel_navigation']));}
	if (isset($_POST['curtain_slide']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Curtain_Slide', sanitize_text_field($_POST['curtain_slide']));}
	if (isset($_POST['overlay_text_source']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Overlay_Text_Source', sanitize_text_field($_POST['overlay_text_source']));}
	if (isset($_POST['disable_other_lightboxes']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Disable_Other_Lightboxes', sanitize_text_field($_POST['disable_other_lightboxes']));}

	if (isset($_POST['show_thumbnails'])) {update_option('EWD_ULB_Show_Thumbnails', sanitize_text_field($_POST['show_thumbnails']));}
	if (isset($_POST['show_thumbnail_toggle']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Show_Thumbnail_Toggle', sanitize_text_field($_POST['show_thumbnail_toggle']));}
	if (isset($_POST['show_overlay_text'])) {update_option('EWD_ULB_Show_Overlay_Text', sanitize_text_field($_POST['show_overlay_text']));}
	if (isset($_POST['start_autoplay'])) {update_option('EWD_ULB_Start_Autoplay', sanitize_text_field($_POST['start_autoplay']));}
	if (isset($_POST['autoplay_interval'])) {update_option('EWD_ULB_Autoplay_Interval', sanitize_text_field($_POST['autoplay_interval']));}
	if (isset($_POST['show_progress_bar']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Show_Progress_Bar', sanitize_text_field($_POST['show_progress_bar']));}
	if (isset($_POST['hide_on_mobile']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Hide_On_Mobile', array_map('sanitize_text_field', $_POST['hide_on_mobile']));}
	if (isset($_POST['min_height'])) {update_option('EWD_ULB_Min_Height', sanitize_text_field($_POST['min_height']));}
	if (isset($_POST['min_width'])) {update_option('EWD_ULB_Min_Width', sanitize_text_field($_POST['min_width']));}
	if (isset($_POST['transition_type'])) {update_option('EWD_ULB_Transition_Type', $_POST['transition_type']);}

	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Top_Right_Controls', $_POST['top_right_controls']);}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Top_Left_Controls', $_POST['top_left_controls']);}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Bottom_Right_Controls', $_POST['bottom_right_controls']);}
	if (isset($_POST['Options_Submit'])) {update_option('EWD_ULB_Bottom_Left_Controls', $_POST['bottom_left_controls']);}

	if (isset($_POST['ulb_arrow']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Arrow', sanitize_text_field($_POST['ulb_arrow']));}
	if (isset($_POST['ulb_icon_set']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Icon_Set', sanitize_text_field($_POST['ulb_icon_set']));}

	if (isset($_POST['ulb_styling_title_font']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Title_Font',  $_POST['ulb_styling_title_font']);}
	if (isset($_POST['ulb_styling_title_font_size']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Title_Font_Size',  $_POST['ulb_styling_title_font_size']);}
	if (isset($_POST['ulb_styling_title_font_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Title_Font_Color',  $_POST['ulb_styling_title_font_color']);}
	if (isset($_POST['ulb_styling_description_font']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Description_Font',  $_POST['ulb_styling_description_font']);}
	if (isset($_POST['ulb_styling_description_font_size']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Description_Font_Size',  $_POST['ulb_styling_description_font_size']);}
	if (isset($_POST['ulb_styling_description_font_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Description_Font_Color',  $_POST['ulb_styling_description_font_color']);}
	if (isset($_POST['ulb_styling_arrow_size']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Arrow_Size',  $_POST['ulb_styling_arrow_size']);}
	if (isset($_POST['ulb_styling_arrow_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Arrow_Color',  $_POST['ulb_styling_arrow_color']);}
	if (isset($_POST['ulb_styling_arrow_background_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Arrow_Background_Color',  $_POST['ulb_styling_arrow_background_color']);}
	if (isset($_POST['ulb_styling_arrow_background_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Arrow_Background_Opacity',  $_POST['ulb_styling_arrow_background_opacity']);}
	if (isset($_POST['ulb_styling_arrow_background_hover_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Arrow_Background_Hover_Opacity',  $_POST['ulb_styling_arrow_background_hover_opacity']);}
	if (isset($_POST['ulb_styling_icon_size']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Icon_Size',  $_POST['ulb_styling_icon_size']);}
	if (isset($_POST['ulb_styling_icon_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Icon_Color',  $_POST['ulb_styling_icon_color']);}
	if (isset($_POST['ulb_styling_background_overlay_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Background_Overlay_Color',  $_POST['ulb_styling_background_overlay_color']);}
	if (isset($_POST['ulb_styling_background_overlay_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Background_Overlay_Opacity',  $_POST['ulb_styling_background_overlay_opacity']);}
	if (isset($_POST['ulb_styling_toolbar_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Toolbar_Color',  $_POST['ulb_styling_toolbar_color']);}
	if (isset($_POST['ulb_styling_toolbar_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Toolbar_Opacity',  $_POST['ulb_styling_toolbar_opacity']);}
	if (isset($_POST['ulb_styling_image_overlay_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Image_Overlay_Color',  $_POST['ulb_styling_image_overlay_color']);}
	if (isset($_POST['ulb_styling_image_overlay_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Image_Overlay_Opacity',  $_POST['ulb_styling_image_overlay_opacity']);}
	if (isset($_POST['ulb_styling_thumbnail_bar_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Thumbnail_Bar_Color',  $_POST['ulb_styling_thumbnail_bar_color']);}
	if (isset($_POST['ulb_styling_thumbnail_bar_opacity']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Thumbnail_Bar_Opacity',  $_POST['ulb_styling_thumbnail_bar_opacity']);}
	if (isset($_POST['ulb_styling_thumbnail_scroll_arrow_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Thumbnail_Scroll_Arrow_Color',  $_POST['ulb_styling_thumbnail_scroll_arrow_color']);}
	if (isset($_POST['ulb_styling_active_thumbnail_border_color']) and $ULB_Full_Version == "Yes") {update_option('EWD_ULB_Styling_Active_Thumbnail_Border_Color',  $_POST['ulb_styling_active_thumbnail_border_color']);}

	$update_message = __("Options have been succesfully updated.", 'ultimate-lightbox');
	$update['Message'] = $update_message;
	$update['Message_Type'] = "Update";
	return $update;
}

?>
