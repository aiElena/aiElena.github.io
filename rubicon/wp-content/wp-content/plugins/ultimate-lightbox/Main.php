<?php
/*
Plugin Name: Ultimate Lightbox
Plugin URI: http://www.EtoileWebDesign.com/plugins/
Description: A plugin that lets you add a lightbox to images on your site
Author: Etoile Web Design
Author URI: http://www.EtoileWebDesign.com/
Terms and Conditions: http://www.etoilewebdesign.com/plugin-terms-and-conditions/
Text Domain: ultimate-lightbox
Version: 0.24
*/

global $ewd_ulb_message;
global $ULB_Full_Version;
global $EWD_ULB_Version;

$EWD_ULB_Version = '1.0.4a';

define( 'EWD_ULB_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_ULB_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

register_activation_hook(__FILE__,'Set_EWD_ULB_Options');
register_activation_hook(__FILE__,'EWD_ULB_Show_Dashboard_Link');

/* Add localization support */
function EWD_ULB_localization_setup() {
    load_plugin_textdomain('ultimate-lightbox', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_ULB_localization_setup');

if ( is_admin() ){
    add_action('admin_head', 'EWD_ULB_Admin_Options');
    add_action('admin_enqueue_scripts', 'EWD_ULB_Admin_Scripts', 10, 1);
    add_action('widgets_init', 'Update_EWD_ULB_Content');
    add_action('admin_notices', 'EWD_ULB_Error_Notices');
}

function EWD_ULB_Admin_Options() {
    wp_enqueue_style( 'ewd-ulb-admin', plugins_url("ultimate-lightbox/css/Admin.css"));
    wp_enqueue_style( 'spectrum', plugins_url("ultimate-lightbox/css/spectrum.css"));
}

function EWD_ULB_Admin_Scripts($hook) {
    global $EWD_ULB_Version;
    wp_enqueue_script('ewd-ulb-review-ask', plugins_url("js/ewd-ulb-dashboard-review-ask.js", __FILE__), array('jquery'), $EWD_ULB_Version);

    if (isset($_GET['page']) && $_GET['page'] == 'EWD-ULB-options') {
        wp_enqueue_script( 'ewd-ulb-admin', plugins_url('ultimate-lightbox/js/admin.js'), array('jquery'), $EWD_ULB_Version);
        wp_enqueue_script( 'Sortable', plugins_url('ultimate-lightbox/js/Sortable.js'), array('jquery', 'ewd-ulb-admin'), true);
        wp_enqueue_script( 'ewd-ulb-spectrum', plugins_url('ultimate-lightbox/js/spectrum.js'), array('jquery'), true);
    }

    if ($hook == 'upload.php') {
        wp_enqueue_script( 'ewd-ulb-admin', plugins_url('ultimate-lightbox/js/admin-upload-media.js'), array('jquery', 'media-editor'), true);
    }
}

function EWD_ULB_Enable_Menu() {
    $Access_Role = get_option("EWD_ULB_Access_Role");

    if ($Access_Role == "") {$Access_Role = "administrator";}
    add_menu_page('Ultimate Lightbox', 'Lightbox', $Access_Role, 'EWD-ULB-options', 'EWD_ULB_Output_Options_Page', 'dashicons-format-gallery' , '50.8');
}
add_action('admin_menu' , 'EWD_ULB_Enable_Menu');

add_action( 'wp_enqueue_scripts', 'EWD_ULB_Add_Stylesheet' );
function EWD_ULB_Add_Stylesheet() {
    global $EWD_ULB_Version;
    wp_enqueue_style( 'ewd-ulb-main', plugins_url("ultimate-lightbox/css/ewd-ulb-main.css"), $EWD_ULB_Version);
    wp_enqueue_style( 'ewd-ulb-twentytwenty', plugins_url("ultimate-lightbox/css/twentytwenty.css"), $EWD_ULB_Version);
}

// Add settings link on plugin page
function EWD_ULB_plugin_settings_link($links) {
  $settings_link = '<a href="admin.php?page=EWD-ULB-options">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'EWD_ULB_plugin_settings_link' );

function EWD_ULB_Show_Dashboard_Link() {
    set_transient('ewd-ulb-admin-install-notice', true, 5);
}

add_action( 'wp_enqueue_scripts', 'Add_EWD_ULB_FrontEnd_Scripts' );
function Add_EWD_ULB_FrontEnd_Scripts() {
    global $EWD_ULB_Version;
    $Disable_Other_Lightboxes = get_option('EWD_ULB_Disable_Other_Lightboxes');

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    $deps = array('jquery');
    if (is_plugin_active('woocommerce/woocommerce.php')) {$deps[] = 'woocommerce';}

    wp_enqueue_script( 'iframe-clicks', plugins_url('ultimate-lightbox/js/jquery.iframetracker.js'), array('jquery'), true);
    wp_register_script( 'ewd-ulb', plugins_url('ultimate-lightbox/js/ewd-ulb.js'), $deps, $EWD_ULB_Version);

    $Add_Lightbox = json_encode(get_option('EWD_ULB_Add_Lightbox'));
    $Image_Class_List = get_option('EWD_ULB_Image_Class_List');
    $Image_Selector_List = get_option('EWD_ULB_Image_Selector_List');
    $Min_Height = get_option('EWD_ULB_Min_Height');
    $Min_Width = get_option('EWD_ULB_Min_Width');
    $Overlay_Text_Source = get_option('EWD_ULB_Overlay_Text_Source');

    $Add_Data_Array = array('add_lightbox' => $Add_Lightbox,
                        'image_class_list' => $Image_Class_List,
                        'image_selector_list' => $Image_Selector_List,
                        'min_height' => $Min_Height,
                        'min_width' => $Min_Width,
                        'overlay_text_source' => $Overlay_Text_Source
        );

    wp_localize_script( 'ewd-ulb', 'ewd_ulb_php_add_data', $Add_Data_Array );

    wp_enqueue_script('ewd-ulb');

    if (!empty($Add_Lightbox)) {
        wp_enqueue_script( 'event-move', plugins_url('ultimate-lightbox/js/jquery.event.move.js'), array('jquery'), true);
        wp_enqueue_script( 'twenty-twenty', plugins_url('ultimate-lightbox/js/jquery.twentytwenty.js'), array('jquery'), true);
        wp_register_script(  'ultimate-lightbox', plugins_url('ultimate-lightbox/js/ultimate-lightbox.js'), array('jquery', 'event-move', 'twenty-twenty'), $EWD_ULB_Version);

        $Custom_CSS = get_option('EWD_ULB_Custom_CSS');

        //$Transition_Effect = get_option('EWD_ULB_Transition_Effect');
        //$Transition_Speed = get_option('EWD_ULB_Transition_Speed');
        $Background_Close = get_option('EWD_ULB_Background_Close');
        $Gallery_Loop = get_option('EWD_ULB_Gallery_Loop');
        //$Mousewheel_Navigation = get_option('EWD_ULB_Mousewheel_Navigation');

        $Show_Thumbnails = get_option('EWD_ULB_Show_Thumbnails');
        //$Show_Thumbnail_Toggle = get_option('EWD_ULB_Show_Thumbnail_Toggle');
        $Start_Autoplay = get_option('EWD_ULB_Start_Autoplay');
        $Autoplay_Interval = get_option('EWD_ULB_Autoplay_Interval');
        //$Show_Progress_Bar = get_option('EWD_ULB_Show_Progress_Bar');
        $Hide_On_Mobile = get_option('EWD_ULB_Hide_On_Mobile');

        $Top_Right_Controls = get_option('EWD_ULB_Top_Right_Controls');
        $Top_Left_Controls = get_option('EWD_ULB_Top_Left_Controls');
        $Bottom_Right_Controls = get_option('EWD_ULB_Bottom_Right_Controls');
        $Bottom_Left_Controls = get_option('EWD_ULB_Bottom_Left_Controls');

        $Lightbox_Controls = array('top_right_controls' => $Top_Right_Controls,
                        'top_left_controls' => $Top_Left_Controls,
                        'bottom_right_controls' => $Bottom_Right_Controls,
                        'bottom_left_controls' => $Bottom_Left_Controls
            );

        $ULB_Arrow = get_option('EWD_ULB_Arrow');
        $ULB_Icon_Set = get_option('EWD_ULB_Icon_Set');
        $Transition_Type = get_option('EWD_ULB_Transition_Type');
        $Curtain_Slide = get_option('EWD_ULB_Curtain_Slide');

        $Transition_Effect = get_option('EWD_ULB_Transition_Effect');
        $Transition_Speed = get_option('EWD_ULB_Transition_Speed');

        $Style_String = EWD_ULB_Add_Modified_Styles();

        $Data_Array = array('custom_css' => $Custom_CSS,
                        'styling_options' => $Style_String,
                        'background_close' => $Background_Close,
                        'gallery_loop' => $Gallery_Loop,
                        'show_thumbnails' => $Show_Thumbnails,
                        'autoplay' => $Start_Autoplay,
                        'autoplayInterval' => $Autoplay_Interval,
                        'hideElements' => $Hide_On_Mobile,
                        'controls' => $Lightbox_Controls,
                        'ulb_arrow' => $ULB_Arrow,
                        'ulb_icon_set' => $ULB_Icon_Set,
                        'transition_class' => $Transition_Type,
                        'curtain_slide' => $Curtain_Slide,
                        'transition_effect' => $Transition_Effect,
                        'transition_speed' => $Transition_Speed,
        );

        wp_localize_script( 'ultimate-lightbox', 'ewd_ulb_php_data', $Data_Array );

        wp_enqueue_script('ultimate-lightbox');

        wp_enqueue_script(  'jquery.mousewheel.min', plugins_url('ultimate-lightbox/js/jquery.mousewheel.min.js'), array('jquery', 'ultimate-lightbox'), true);

        if ($Disable_Other_Lightboxes == "Yes") {
            wp_enqueue_script( 'ewd-ulb-disable-lightboxes', plugins_url('ultimate-lightbox/js/ewd-ulb-disable-lightboxes.js'), array('jquery'), true, true );
        }
    }
}

$ULB_Full_Version = get_option("EWD_ULB_Full_Version");

include "Functions/EWD_ULB_Add_Attachment_Options.php";
include "Functions/EWD_ULB_Deactivation_Survey.php";
include "Functions/EWD_ULB_Error_Notices.php";
include "Functions/EWD_ULB_Output_Options_Page.php";
include "Functions/EWD_ULB_Process_AJAX.php";
include "Functions/EWD_ULB_Styling.php";
include "Functions/FrontEndAjaxUrl.php";
include "Functions/Update_EWD_ULB_Admin_Databases.php";
include "Functions/Update_EWD_ULB_Content.php";

if (get_option('EWD_ULB_Version') != $EWD_ULB_Version) {
    Set_EWD_ULB_Options();
}

function Set_EWD_ULB_Options() {
    global $ULB_Full_Version;
    global $EWD_ULB_Version;

    if (get_option("EWD_ULB_Add_Lightbox") == "") {update_option("EWD_ULB_Add_Lightbox", array());}

    if (get_option("EWD_ULB_Transition_Type") == "") {update_option("EWD_ULB_Transition_Type", "ewd-ulb-no-transition");}
    if (get_option("EWD_ULB_Transition_Speed") == "") {update_option("EWD_ULB_Transition_Speed", 600);}

    if (get_option("EWD_ULB_Background_Close") == "") {update_option("EWD_ULB_Background_Close", "true");}
    if (get_option("EWD_ULB_Gallery_Loop") == "") {update_option("EWD_ULB_Gallery_Loop", "true");}
    if (get_option("EWD_ULB_Mousewheel_Navigation") == "") {update_option("EWD_ULB_Mousewheel_Navigation", "true");}
    if (get_option("EWD_ULB_Curtain_Slide") == "") {update_option("EWD_ULB_Curtain_Slide", "No");}
    if (get_option("EWD_ULB_Overlay_Text_Source") == "") {update_option("EWD_ULB_Overlay_Text_Source", "alt");}
    if (get_option("EWD_ULB_Disable_Other_Lightboxes") == "") {update_option("EWD_ULB_Disable_Other_Lightboxes", "No");}

    if (get_option("EWD_ULB_Show_Thumbnails") == "") {update_option("EWD_ULB_Show_Thumbnails", "bottom");}
    if (get_option("EWD_ULB_Show_Thumbnail_Toggle") == "") {update_option("EWD_ULB_Show_Thumbnail_Toggle", "true");}
    if (get_option("EWD_ULB_Show_Overlay_Text") == "") {update_option("EWD_ULB_Show_Overlay_Text", "Yes");}
    if (get_option("EWD_ULB_Start_Autoplay") == "") {update_option("EWD_ULB_Start_Autoplay", "false");}
    if (get_option("EWD_ULB_Autoplay_Interval") == "") {update_option("EWD_ULB_Autoplay_Interval", 5000);}
    if (get_option("EWD_ULB_Autoplay_Interval") == "") {update_option("EWD_ULB_Autoplay_Interval", 5000);}
    if (get_option("EWD_ULB_Show_Progress_Bar") == "") {update_option("EWD_ULB_Show_Progress_Bar", "true");}
    if (get_option("EWD_ULB_Hide_On_Mobile") == "") {update_option("EWD_ULB_Hide_On_Mobile", array("description", "thumbnails"));}
    if (get_option("EWD_ULB_Min_Height") == "") {update_option("EWD_ULB_Min_Height", 50);}
    if (get_option("EWD_ULB_Min_Width") == "") {update_option("EWD_ULB_Min_Width", 50);}

    if (get_option("EWD_ULB_Top_Right_Controls") == "") {update_option("EWD_ULB_Top_Right_Controls", array('exit'));}
    if (get_option("EWD_ULB_Top_Left_Controls") == "") {update_option("EWD_ULB_Top_Left_Controls", array('autoplay', 'zoom'));}
    if (get_option("EWD_ULB_Bottom_Right_Controls") == "") {update_option("EWD_ULB_Bottom_Right_Controls", array('slide_counter'));}
    if (get_option("EWD_ULB_Bottom_Left_Controls") == "") {update_option("EWD_ULB_Bottom_Left_Controls", array());}

    if (get_option("EWD_ULB_Arrow") == "") {update_option("EWD_ULB_Arrow", "a");}
    if (get_option("EWD_ULB_Icon_Set") == "") {update_option("EWD_ULB_Icon_Set", "a");}

    if (get_option("EWD_ULB_Install_Time") == "") {update_option("EWD_ULB_Install_Time", time());}
    if(!get_option("EWD_ULB_Ask_Review_Date")){add_option("EWD_ULB_Ask_Review_Date", "");}

    if (get_option("EWD_ULB_Full_Version") == "") {update_option("EWD_ULB_Full_Version", "Yes");}

    update_option("EWD_ULB_Version", $EWD_ULB_Version);
}
