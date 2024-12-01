<?php

function EWD_ULB_AJAX_Custom_CSS() {
    $Path = ABSPATH . 'wp-load.php';
    include_once($Path);

    $Response = EWD_ULB_Add_Modified_Styles();

    echo json_encode($Response);
}
add_action('wp_ajax_ulb_get_custom_css', 'EWD_ULB_AJAX_Custom_CSS');
add_action( 'wp_ajax_nopriv_ulb_get_custom_css', 'EWD_ULB_AJAX_Custom_CSS');

function EWD_ULB_Get_Paired_Images() {
    $Path = ABSPATH . 'wp-load.php';
    include_once($Path);

    $Image_Source_Array = json_decode(stripslashes($_POST['image_sources']));
    if (!is_array($Image_Source_Array)) {$Image_Source_Array = array();}

    $Paired_Image_Array = array();
    foreach ($Image_Source_Array as $Image_Source) {
    	$Attachment_ID = attachment_url_to_postid($Image_Source);

    	$Paired_Image_URL = '';
    	if ($Attachment_ID) {
    		$Paired_Image_ID = get_post_meta($Attachment_ID, "_EWD_ULB_Paired_Image_ID", true);
    		if ($Paired_Image_ID) {
    			$Paired_Image = wp_get_attachment_image_src($Paired_Image_ID, 'full');
    			$Paired_Image_URL = $Paired_Image[0];
    		}
    	}

    	$Paired_Image_Array[$Image_Source] = $Paired_Image_URL;
    }

    echo json_encode($Paired_Image_Array);//response

    die();
}
add_action('wp_ajax_ulb_get_paired_images', 'EWD_ULB_Get_Paired_Images');
add_action( 'wp_ajax_nopriv_ulb_get_paired_images', 'EWD_ULB_Get_Paired_Images');


//REVIEW ASK POP-UP
function EWD_ULB_Hide_Review_Ask(){   
    $Ask_Review_Date = sanitize_text_field($_POST['Ask_Review_Date']);

    if (get_option('EWD_ULB_Ask_Review_Date') < time()+3600*24*$Ask_Review_Date) {
        update_option('EWD_ULB_Ask_Review_Date', time()+3600*24*$Ask_Review_Date);
    }

    die();
}
add_action('wp_ajax_ewd_ulb_hide_review_ask','EWD_ULB_Hide_Review_Ask');

function EWD_ULB_Send_Feedback() {   
    $headers = 'Content-type: text/html;charset=utf-8' . "\r\n";  
    $Feedback = sanitize_text_field($_POST['Feedback']);
    $Feedback .= '<br /><br />Email Address: ';
    $Feedback .= sanitize_text_field($_POST['EmailAddress']);

    wp_mail('contact@etoilewebdesign.com', 'ULB Feedback - Dashboard Form', $Feedback, $headers);

    die();
}
add_action('wp_ajax_ewd_ulb_send_feedback','EWD_ULB_Send_Feedback');


