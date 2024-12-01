<?php
function EWD_ULB_Add_Modified_Styles() {
	$Show_Overlay_Text = get_option('EWD_ULB_Show_Overlay_Text');
	$Default_Background_Opacity = ".83";
	$Default_Toolbar_Opacity = ".5";
	$Default_Thumbnail_Bar_Opacity = ".25";
	$Default_Image_Overlay_Opacity = ".6";
	$Default_Arrow_Background_Opacity = ".4";
	$Default_Arrow_Background_Hover_Opacity = ".7";
	$StylesString = "<style>";
		if($Show_Overlay_Text == "false"){
			$StylesString .=".ewd-ulb-slide-overlay { display: none !important; }";
		}
		$StylesString .=".ewd-ulb-slide-title { ";
			if (get_option("EWD_ULB_Styling_Title_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_ULB_Styling_Title_Font") . " !important;";}
			if (get_option("EWD_ULB_Styling_Title_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_ULB_Styling_Title_Font_Size") . " !important;";}
			if (get_option("EWD_ULB_Styling_Title_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_ULB_Styling_Title_Font_Color") . " !important;";}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-slide-description { ";
			if (get_option("EWD_ULB_Styling_Description_Font") != "") {$StylesString .= "font-family:" .  get_option("EWD_ULB_Styling_Description_Font") . " !important;";}
			if (get_option("EWD_ULB_Styling_Description_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_ULB_Styling_Description_Font_Size") . " !important;";}
			if (get_option("EWD_ULB_Styling_Description_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_ULB_Styling_Description_Font_Color") . " !important;";}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-arrow { ";
			if (get_option("EWD_ULB_Styling_Arrow_Size") != "") {$StylesString .="font-size:" . get_option("EWD_ULB_Styling_Arrow_Size") . " !important;";}
			if (get_option("EWD_ULB_Styling_Arrow_Color") != "") {$StylesString .= "color:" . get_option("EWD_ULB_Styling_Arrow_Color") . " !important;";}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-control { ";
			if (get_option("EWD_ULB_Styling_Icon_Size") != "") {$StylesString .="font-size:" . get_option("EWD_ULB_Styling_Icon_Size") . " !important;";}
			if (get_option("EWD_ULB_Styling_Icon_Color") != "") {$StylesString .= "color:" . get_option("EWD_ULB_Styling_Icon_Color") . " !important;";}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-active-thumbnail img { ";
			if (get_option("EWD_ULB_Styling_Active_Thumbnail_Border_Color") != "") {$StylesString .= "border-color:" . get_option("EWD_ULB_Styling_Active_Thumbnail_Border_Color") . " !important;";}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-background { ";
			if (get_option("EWD_ULB_Styling_Background_Overlay_Color") != "") {
				$Background_Opacity = get_option("EWD_ULB_Styling_Background_Overlay_Opacity");
				if ($Background_Opacity == "") {$Background_Opacity = $Default_Background_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Background_Overlay_Color")) . ", " . $Background_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-top-toolbar, .ewd-ulb-bottom-toolbar { ";
			if (get_option("EWD_ULB_Styling_Toolbar_Color") != "") {
				$Toolbar_Opacity = get_option("EWD_ULB_Styling_Toolbar_Opacity");
				if ($Toolbar_Opacity == "") {$Toolbar_Opacity = $Default_Toolbar_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Toolbar_Color")) . ", " . $Toolbar_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-bottom-thumbnail-bar, .ewd-ulb-top-thumbnail-bar { ";
			if (get_option("EWD_ULB_Styling_Thumbnail_Bar_Color") != "") {
				$Thumbnail_Bar_Opacity = get_option("EWD_ULB_Styling_Thumbnail_Bar_Opacity");
				if ($Thumbnail_Bar_Opacity == "") {$Thumbnail_Bar_Opacity = $Default_Thumbnail_Bar_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Thumbnail_Bar_Color")) . ", " . $Thumbnail_Bar_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-slide .ewd-ulb-slide-overlay { ";
			if (get_option("EWD_ULB_Styling_Image_Overlay_Color") != "") {
				$Image_Overlay_Opacity = get_option("EWD_ULB_Styling_Image_Overlay_Opacity");
				if ($Image_Overlay_Opacity == "") {$Image_Overlay_Opacity = $Default_Image_Overlay_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Image_Overlay_Color")) . ", " . $Image_Overlay_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-slide-control { ";
			if (get_option("EWD_ULB_Styling_Arrow_Background_Color") != "") {
				$Arrow_Background_Opacity = get_option("EWD_ULB_Styling_Arrow_Background_Opacity");
				if ($Arrow_Background_Opacity == "") {$Arrow_Background_Opacity = $Default_Arrow_Background_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Arrow_Background_Color")) . ", " . $Arrow_Background_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-ulb-slide-control:hover { ";
			if (get_option("EWD_ULB_Styling_Arrow_Background_Color") != "") {
				$Arrow_Background_Hover_Opacity = get_option("EWD_ULB_Styling_Arrow_Background_Hover_Opacity");
				if ($Arrow_Background_Hover_Opacity == "") {$Arrow_Background_Hover_Opacity = $Default_Arrow_Background_Hover_Opacity;}
				$StylesString .= "background: rgba(" . EWD_ULB_Hex_To_RGB(get_option("EWD_ULB_Styling_Arrow_Background_Color")) . ", " . $Arrow_Background_Hover_Opacity . ") !important;";
			}
		$StylesString .="}";
		$StylesString .=".ewd-thumbnail-scroll-button { ";
			if (get_option("EWD_ULB_Styling_Thumbnail_Scroll_Arrow_Color") != "") {$StylesString .= "color:" . get_option("EWD_ULB_Styling_Thumbnail_Scroll_Arrow_Color") . " !important;";}
		$StylesString .="}";
	$StylesString .= "</style>";

	return $StylesString;
}

function EWD_ULB_Hex_To_RGB($Hex) {
	$Hex = str_replace("#", "", $Hex);

   if(strlen($Hex) == 3) {
      $r = hexdec(substr($Hex,0,1).substr($Hex,0,1));
      $g = hexdec(substr($Hex,1,1).substr($Hex,1,1));
      $b = hexdec(substr($Hex,2,1).substr($Hex,2,1));
   } else {
      $r = hexdec(substr($Hex,0,2));
      $g = hexdec(substr($Hex,2,2));
      $b = hexdec(substr($Hex,4,2));
   }
   $rgb = $r . ", " . $g . ", " . $b;
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
