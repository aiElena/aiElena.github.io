<?php

function EWD_ULB_Attachment_Fields($form_fields, $post) {
    if (substr($post->post_mime_type, 0, 5) == 'image') {
        $Curtain_Slide = get_option('EWD_ULB_Curtain_Slide');

        if (get_post_meta($post->ID, "_EWD_ULB_Add_Lightbox", true) == "on") {$Lightbox_Checkbox = "checked";}
        else {$Lightbox_Checkbox = "";}

        $Paired_Image_ID = get_post_meta($post->ID, "_EWD_ULB_Paired_Image_ID", true);

        if ($Paired_Image_ID != "") {
            $Image = wp_get_attachment_image_src($Paired_Image_ID);

            if ($Image) {$Current_Image_HTML = "<img class='ewd-ulb-paired-image-preview' src='" . $Image[0] . "' /><br /><div class='ewd-ulb-remove-paired-image'>" . __("Remove Pairing", 'ultimate-lightbox') . "</div>";}
        }
        if (!isset($Current_Image_HTML)) {$Current_Image_HTML = "";}

        $form_fields["ewd_ulb_lightbox"] = array(
            "label" => __("Lightbox?", 'ultimate-lightbox'),
            "input" => "html",
            "html" => "<input type='checkbox' name='attachments[{$post->ID}][ewd_ulb_lightbox]' id='attachments[{$post->ID}][ewd_ulb_lightbox]' value='on' " . $Lightbox_Checkbox . "/>",
            "helps" => "Should this image open in a lightbox when clicked?"
        );

        if ($Curtain_Slide == "true") {
            $form_fields["ewd_ulb_curtain_slide_pair"] = array(
                "label" => __("Curtain Slide Paired Image?", 'ultimate-lightbox'),
                "input" => "html",
                "html" => $Current_Image_HTML . "<div class='ewd-ulb-paired-image-select'>" . __("Select Pair", 'ultimate-lightbox') . "</div><input type='hidden' name='attachments[{$post->ID}][ewd_ulb_curtain_slide_pair]' id='attachments[{$post->ID}][ewd_ulb_curtain_slide_pair]' value='" . $Paired_Image_ID . "'/>",
                "helps" => "What image, if any, should be revealed by the curtain slide for this image in the lightbox?"
            );
        }
    }
    return $form_fields;
}
add_filter("attachment_fields_to_edit", "EWD_ULB_Attachment_Fields", null, 2);

function EWD_ULB_Save_Attachment_Fields($post, $attachment) {
    if (isset($attachment['ewd_ulb_lightbox'])) {update_post_meta($post['ID'], '_EWD_ULB_Add_Lightbox', $attachment['ewd_ulb_lightbox']);}
    else {update_post_meta($post['ID'], '_EWD_ULB_Add_Lightbox', "off");}
    if (isset($attachment['ewd_ulb_curtain_slide_pair'])) {update_post_meta($post['ID'], '_EWD_ULB_Paired_Image_ID', $attachment['ewd_ulb_curtain_slide_pair']);}
    else {update_post_meta($post['ID'], '_EWD_ULB_Paired_Image_ID', "off");}
    
    return $post;
}
add_filter("attachment_fields_to_save", "EWD_ULB_Save_Attachment_Fields", null, 2);

function EWD_ULB_Add_Attachment_HTML($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
    $Class = "ewd-ulb-lightbox";
    $Lightbox = get_post_meta($id, "_EWD_ULB_Add_Lightbox", true);
    if ($Lightbox == "on") {
        if ( preg_match('/<a.*? class=".*?">/', $html) ) {
            $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $Class . '$2', $html);
        } else {
            $html = preg_replace('/(<a.*?)>/', '$1 class="' . $Class . '" >', $html);
        }
        $html = str_replace("><img", " data-ulbsource='" . $url . "'><img", $html);
    } $html .= "Word"; update_option("EWD_ULB_Debugging", $html);
    return $html;
}
add_filter('image_send_to_editor','EWD_ULB_Add_Attachment_HTML',10,8);

?>