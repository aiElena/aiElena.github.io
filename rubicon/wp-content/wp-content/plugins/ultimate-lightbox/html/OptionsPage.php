<?php

$Custom_CSS = get_option("EWD_ULB_Custom_CSS");
$Add_Lightbox = get_option('EWD_ULB_Add_Lightbox');
$Image_Class_List = get_option('EWD_ULB_Image_Class_List');
$Image_Selector_List = get_option('EWD_ULB_Image_Selector_List');

$Transition_Effect = get_option('EWD_ULB_Transition_Effect');
$Transition_Speed = get_option('EWD_ULB_Transition_Speed');
$Background_Close = get_option('EWD_ULB_Background_Close');
$Gallery_Loop = get_option('EWD_ULB_Gallery_Loop');
$Mousewheel_Navigation = get_option('EWD_ULB_Mousewheel_Navigation');
$Curtain_Slide = get_option('EWD_ULB_Curtain_Slide');
$Overlay_Text_Source = get_option('EWD_ULB_Overlay_Text_Source');
$Disable_Other_Lightboxes = get_option('EWD_ULB_Disable_Other_Lightboxes');

$Show_Thumbnails = get_option('EWD_ULB_Show_Thumbnails');
$Show_Thumbnail_Toggle = get_option('EWD_ULB_Show_Thumbnail_Toggle');
$Show_Overlay_Text = get_option('EWD_ULB_Show_Overlay_Text');
$Start_Autoplay = get_option('EWD_ULB_Start_Autoplay');
$Autoplay_Interval = get_option('EWD_ULB_Autoplay_Interval');
$Show_Progress_Bar = get_option('EWD_ULB_Show_Progress_Bar');
$Hide_On_Mobile = get_option('EWD_ULB_Hide_On_Mobile');
$Min_Height = get_option('EWD_ULB_Min_Height');
$Min_Width = get_option('EWD_ULB_Min_Width');
$Transition_Type = get_option('EWD_ULB_Transition_Type');

$Top_Right_Controls = get_option('EWD_ULB_Top_Right_Controls');
$Top_Left_Controls = get_option('EWD_ULB_Top_Left_Controls');
$Bottom_Right_Controls = get_option('EWD_ULB_Bottom_Right_Controls');
$Bottom_Left_Controls = get_option('EWD_ULB_Bottom_Left_Controls');

$All_Controls = array('exit', 'autoplay', 'zoom', 'zoom_out', 'slide_counter', 'download', 'fullscreen', 'fullsize');

$ULB_Arrow = get_option('EWD_ULB_Arrow');
$ULB_Icon_Set = get_option('EWD_ULB_Icon_Set');

$ULB_Styling_Title_Font = get_option('EWD_ULB_Styling_Title_Font');
$ULB_Styling_Title_Font_Size = get_option('EWD_ULB_Styling_Title_Font_Size');
$ULB_Styling_Title_Font_Color = get_option('EWD_ULB_Styling_Title_Font_Color');

$ULB_Styling_Description_Font = get_option('EWD_ULB_Styling_Description_Font');
$ULB_Styling_Description_Font_Size = get_option('EWD_ULB_Styling_Description_Font_Size');
$ULB_Styling_Description_Font_Color = get_option('EWD_ULB_Styling_Description_Font_Color');
$ULB_Styling_Arrow_Size = get_option('EWD_ULB_Styling_Arrow_Size');
$ULB_Styling_Arrow_Color = get_option('EWD_ULB_Styling_Arrow_Color');
$ULB_Styling_Arrow_Background_Color = get_option('EWD_ULB_Styling_Arrow_Background_Color');
$ULB_Styling_Arrow_Background_Opacity = get_option('EWD_ULB_Styling_Arrow_Background_Opacity');
$ULB_Styling_Arrow_Background_Hover_Opacity = get_option('EWD_ULB_Styling_Arrow_Background_Hover_Opacity');
$ULB_Styling_Icon_Size = get_option('EWD_ULB_Styling_Icon_Size');
$ULB_Styling_Icon_Color = get_option('EWD_ULB_Styling_Icon_Color');

$ULB_Styling_Background_Overlay_Color = get_option('EWD_ULB_Styling_Background_Overlay_Color');
$ULB_Styling_Background_Overlay_Opacity = get_option('EWD_ULB_Styling_Background_Overlay_Opacity');
$ULB_Styling_Toolbar_Color = get_option('EWD_ULB_Styling_Toolbar_Color');
$ULB_Styling_Toolbar_Opacity = get_option('EWD_ULB_Styling_Toolbar_Opacity');
$ULB_Styling_Image_Overlay_Color = get_option('EWD_ULB_Styling_Image_Overlay_Color');
$ULB_Styling_Image_Overlay_Opacity = get_option('EWD_ULB_Styling_Image_Overlay_Opacity');

$ULB_Styling_Thumbnail_Bar_Color = get_option('EWD_ULB_Styling_Thumbnail_Bar_Color');
$ULB_Styling_Thumbnail_Bar_Opacity = get_option('EWD_ULB_Styling_Thumbnail_Bar_Opacity');
$ULB_Styling_Thumbnail_Scroll_Arrow_Color = get_option('EWD_ULB_Styling_Thumbnail_Scroll_Arrow_Color');
$ULB_Styling_Active_Thumbnail_Border_Color = get_option('EWD_ULB_Styling_Active_Thumbnail_Border_Color');

if (isset($_POST['Display_Tab'])) {$Display_Tab = $_POST['Display_Tab'];}
else {$Display_Tab = "";}
?>
<div class="wrap ulb-options-page-tabbed">
	<div class="ulb-options-submenu-div">
		<ul class="ulb-options-submenu ulb-options-page-tabbed-nav">
			<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');"><?php _e("Basic", 'ultimate-lightbox'); ?></a></li>
			<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');"><?php _e("Premium", 'ultimate-lightbox'); ?></a></li>
			<!--<li><a id="WooCommerce_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'WooCommerce') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('WooCommerce');"><?php _e("WooCommerce", 'ultimate-lightbox'); ?></a></li> -->
			<li><a id="Controls_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Controls') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Controls');"><?php _e("Controls", 'ultimate-lightbox'); ?></a></li>
			<li><a id="Icons_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Icons') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Icons');"><?php _e("Icons", 'ultimate-lightbox'); ?></a></li>
			<li><a id="Styling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Styling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Styling');"><?php _e("Styling", 'ultimate-lightbox'); ?></a></li>
		</ul>
	</div>

	<div class="ulb-options-page-tabbed-content">
		<form method="post" action="admin.php?page=EWD-ULB-options&DisplayPage=Options&Action=EWD_ULB_UpdateOptions">
			<?php wp_nonce_field('update_options'); ?>

			<input type='hidden' name='Display_Tab' value='<?php echo $Display_Tab; ?>' />

			<div id='Basic' class='ewd-ulb-option-set<?php echo ( ($Display_Tab == '' or $Display_Tab == 'Basic') ? '' : ' ewd-ulb-hidden' ); ?>'>
				<h2 id='label-basic-options' class='ulb-options-page-tab-title'><?php _e("Basic Options", 'ultimate-lightbox'); ?></h2>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Add Lightbox Options', 'ultimate-lightbox'); ?></div>

				<table class="form-table" style="border-bottom: 2px solid #eee; margin-bottom: 20px;">
					<tr>
						<th scope="row">
							Images with Lightbox
							<p style="padding: 8px 12px; background: #f3f3f3; margin-bottom: 16px; display: block !important;"><?php _e("Use this section to choose which images have lightboxes.", 'ultimate-lightbox'); ?></p>
						</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Add Lightbox Options</span></legend>
								<label title='all_images' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='all_images' <?php if(in_array("all_images", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("All Images", 'ultimate-lightbox'); ?></span></label><br />
								<label title='galleries' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='galleries' <?php if(in_array("galleries", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("All WordPress Galleries", 'ultimate-lightbox'); ?></span></label><br />
								<label title='all_youtube' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='all_youtube' <?php if(in_array("all_youtube", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("All YouTube Videos", 'ultimate-lightbox'); ?></span></label><br />
								<label title='woocommerce_product_page' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='woocommerce_product_page' <?php if(in_array("woocommerce_product_page", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("WooCommerce Product Page Images", 'ultimate-lightbox'); ?></span></label><br />
								<label title='image_class' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='image_class' <?php if(in_array("image_class", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("Images with the Class: ", 'ultimate-lightbox'); ?><input type='text' name='image_class_list' value='<?php echo $Image_Class_List; ?>' /></span></label><br />
								<p><?php _e("Can be a comma-separated list of classes to apply the lightbox to, with no extra spaces between the elements.", 'ultimate-lightbox'); ?></p>
								<label title='image_selector' class='ewd-ulb-admin-input-container'><input type='checkbox' name='add_lightbox[]' value='image_selector' <?php if(in_array("image_selector", $Add_Lightbox)) {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("Images with the Following CSS Selectors: ", 'ultimate-lightbox'); ?><input type='text' name='image_selector_list' value='<?php echo $Image_Selector_List; ?>' /></span></label><br />
								<p><?php _e("Can be a comma-separated list of CSS selectors to apply the lightbox to, with no extra spaces between the elements.", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
				</table>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Settings', 'ultimate-lightbox'); ?></div>

				<table class="form-table">
					<tr>
						<th scope="row">Custom CSS</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Custom CSS</span></legend>
								<label title='Custom CSS'></label><textarea class='ewd-ulb-textarea' name='custom_css'> <?php echo $Custom_CSS; ?></textarea><br />
								<p>You can add custom CSS styles to your lightbox in the box above.</p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Close on Background Click", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Close on Background Click</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='background_close' value='true' <?php if($Background_Close == "true") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
									<label title='false'><input type='radio' name='background_close' value='false' <?php if($Background_Close  == "false") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="background_close" <?php if($Background_Close == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p><?php _e("Should the lightbox close when the background is clicked?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Show Thumbnail Images", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Show Thumbnail Images</span></legend>
								<label title='top' class='ewd-ulb-admin-input-container'><input type='radio' name='show_thumbnails' value='top' <?php if($Show_Thumbnails == "top") {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-radio-button'></span> <span><?php _e("Top", 'ultimate-lightbox'); ?></span></label><br />
								<label title='bottom' class='ewd-ulb-admin-input-container'><input type='radio' name='show_thumbnails' value='bottom' <?php if($Show_Thumbnails  == "bottom") {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-radio-button'></span> <span><?php _e("Bottom", 'ultimate-lightbox'); ?></span></label><br />
								<label title='none' class='ewd-ulb-admin-input-container'><input type='radio' name='show_thumbnails' value='none' <?php if($Show_Thumbnails  == "none") {echo "checked='checked'";} ?> /><span class='ewd-ulb-admin-radio-button'></span> <span><?php _e("None", 'ultimate-lightbox'); ?></span></label><br />
								<p><?php _e("Should thumbnails of other images in a specific gallery be shown?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Show Overlay Text", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Show Overlay Text</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='show_overlay_text' value='true' <?php if($Show_Overlay_Text == "true") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
									<label title='false'><input type='radio' name='show_overlay_text' value='false' <?php if($Show_Overlay_Text  == "false") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="show_overlay_text" <?php if($Show_Overlay_Text == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p><?php _e("Should the text overlay show for images in the lightbox?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Start Autoplay on Opening", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Show Slide Counter</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='start_autoplay' value='true' <?php if($Start_Autoplay == "true") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
									<label title='false'><input type='radio' name='start_autoplay' value='false' <?php if($Start_Autoplay  == "false") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="start_autoplay" <?php if($Start_Autoplay == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p><?php _e("Should autoplay start automatically when a gallery is opened?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Autoplay Interval (milliseconds)", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Autoplay Interval (milliseconds)</span></legend>
								<input type='text' name='autoplay_interval' value='<?php echo $Autoplay_Interval; ?>' />
								<p><?php _e("How long should there be between transitions when autoplay is enabled? (Should be greater than 0)", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Minimum Image Height", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Minimum Image Height</span></legend>
								<input type='text' name='min_height' value='<?php echo $Min_Height; ?>' />
								<p><?php _e("What is the minimum height an image should have to be eligible to be opened in a lightbox?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Minimum Image Width", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Minimum Image Width</span></legend>
								<input type='text' name='min_width' value='<?php echo $Min_Width; ?>' />
								<p><?php _e("What is the minimum width an image should have to be eligible to be opened in a lightbox?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Transition Type", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Transition Type</span></legend>
								<select name="transition_type">
							  		<option value="ewd-ulb-no-transition" <?php if($Transition_Type == "ewd-ulb-no-transition") {echo "selected=selected";} ?> >None</option>
							  		<option value="ewd-ulb-horizontal-slide" <?php if($Transition_Type == "ewd-ulb-horizontal-slide") {echo "selected=selected";} ?> >Slide</option>
								</select>
								<p><?php _e("Select the transition that happens when cycling through images in the lightbox.", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
				</table>
			</div>


			<div id='Premium' class='ewd-ulb-option-set<?php echo ( $Display_Tab == 'Premium' ? '' : ' ewd-ulb-hidden' ); ?>'>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Premium Options', 'ultimate-lightbox'); ?></div>

				<table class="form-table ewd-ulb-premium-options-table">
<!-- 					
					<tr>
						<th scope="row">Transition Effect</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Transition Effect</span></legend>
								<select name="transition_effect" <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> >
							  		<option value="lg-slide" <?php if($Transition_Effect == "lg-slide") {echo "selected=selected";} ?> >Slide</option>
							  		<option value="lg-fade" <?php if($Transition_Effect == "lg-fade") {echo "selected=selected";} ?> >Fade</option>
							  		<option value="lg-zoom-in" <?php if($Transition_Effect == "lg-zoom-in") {echo "selected=selected";} ?> >Zoom In</option>
							  		<option value="lg-zoom-in-big" <?php if($Transition_Effect == "lg-zoom-in-big") {echo "selected=selected";} ?> >Big Zoom In</option>
							  		<option value="lg-zoom-out" <?php if($Transition_Effect == "lg-zoom-out") {echo "selected=selected";} ?> >Zoom Out</option>
							  		<option value="lg-zoom-out-big" <?php if($Transition_Effect == "lg-zoom-out-big") {echo "selected=selected";} ?> >Big Zoom Out</option>
							  		<option value="lg-zoom-out-in" <?php if($Transition_Effect == "lg-zoom-out-in") {echo "selected=selected";} ?> >Zoom Out-In</option>
							  		<option value="lg-zoom-in-out" <?php if($Transition_Effect == "lg-zoom-in-out") {echo "selected=selected";} ?> >Zoom In-Out</option>
							  		<option value="lg-soft-zoom" <?php if($Transition_Effect == "lg-soft-zoom") {echo "selected=selected";} ?> >Soft Zoom</option>
							  		<option value="lg-scale-up" <?php if($Transition_Effect == "lg-scale-up") {echo "selected=selected";} ?> >Scale Up</option>
							  		<option value="lg-slide-circular" <?php if($Transition_Effect == "lg-slide-circular") {echo "selected=selected";} ?> >Slide - Circular</option>
							  		<option value="lg-slide-circular-vertical" <?php if($Transition_Effect == "lg-slide-circular-vertical") {echo "selected=selected";} ?> >Slide - Circular-Vertical</option>
							  		<option value="lg-slide-vertical" <?php if($Transition_Effect == "lg-slide-vertical") {echo "selected=selected";} ?> >Slide - Vertical</option>
							  		<option value="lg-slide-vertical-growth" <?php if($Transition_Effect == "lg-slide-vertical-growth") {echo "selected=selected";} ?> >Slide - Vertical Growth</option>
							  		<option value="lg-slide-skew-only" <?php if($Transition_Effect == "lg-slide-skew-only") {echo "selected=selected";} ?> >Slide - Skew Only</option>
							  		<option value="lg-slide-skew-only-rev" <?php if($Transition_Effect == "lg-slide-skew-only-rev") {echo "selected=selected";} ?> >Slide - Skew Only Reverse</option>
							  		<option value="lg-slide-skew-only-y" <?php if($Transition_Effect == "lg-slide-skew-only-y") {echo "selected=selected";} ?> >Slide - Skew Only Y</option>
							  		<option value="lg-slide-skew-only-y-rev" <?php if($Transition_Effect == "lg-slide-skew-only-y-rev") {echo "selected=selected";} ?> >Slide - Skew Only Y Reverse</option>
							  		<option value="lg-slide-skew" <?php if($Transition_Effect == "lg-slide-skew") {echo "selected=selected";} ?> >Slide - Skew</option>
							  		<option value="lg-slide-skew-rev" <?php if($Transition_Effect == "lg-slide-skew-rev") {echo "selected=selected";} ?> >Slide - Skew Reverse</option>
							  		<option value="lg-slide-skew-cross" <?php if($Transition_Effect == "lg-slide-skew-cross") {echo "selected=selected";} ?> >Slide - Skew Cross</option>
							  		<option value="lg-slide-skew-cross-rev" <?php if($Transition_Effect == "lg-slide-skew-cross-rev") {echo "selected=selected";} ?> >Slide - Skew Cross Reverse</option>
							  		<option value="lg-slide-skew-ver" <?php if($Transition_Effect == "lg-slide-skew-ver") {echo "selected=selected";} ?> >Slide - Skew Vertical</option>
							  		<option value="lg-slide-skew-ver" <?php if($Transition_Effect == "lg-slide-skew-ver-rev") {echo "selected=selected";} ?> >Slide - Skew Vertical Reverse</option>
							  		<option value="lg-slide-skew-ver-cross" <?php if($Transition_Effect == "lg-slide-skew-ver-cross") {echo "selected=selected";} ?> >Slide - Skew Vertical Cross</option>
							  		<option value="lg-slide-skew-ver-cross-rev" <?php if($Transition_Effect == "lg-slide-skew-ver-cross-rev") {echo "selected=selected";} ?> >Slide - Skew Vertical Cross Reverse</option>
							  		<option value="lg-lollipop" <?php if($Transition_Effect == "lg-lollipop") {echo "selected=selected";} ?> >Lollipop</option>
							  		<option value="lg-lollipop-rev" <?php if($Transition_Effect == "lg-lollipop-rev") {echo "selected=selected";} ?> >Lollipop Reverse</option>
							  		<option value="lg-rotate" <?php if($Transition_Effect == "lg-rotate") {echo "selected=selected";} ?> >Rotate</option>
							  		<option value="lg-rotate" <?php if($Transition_Effect == "lg-rotate-rev") {echo "selected=selected";} ?> >Rotate Reverse</option>
							  		<option value="lg-tube" <?php if($Transition_Effect == "lg-tube") {echo "selected=selected";} ?> >Tube</option>
								</select>
								<p>How should images in a gallery transition?</p>
							</fieldset>
						</td>
					</tr>
					
					<tr>
						<th scope="row">Transition Speed (milliseconds)</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Transition Speed (milliseconds)</span></legend>
								<input type='text' name='transition_speed' value='<?php echo $Transition_Speed; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								<p>How long should the transition between images take in a gallery? (Should be greater than 0)</p>
							</fieldset>
						</td>
					</tr>
 -->				

					<tr>
						<th scope="row"><?php _e("Gallery Loop", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Gallery Loop</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='gallery_loop' value='true' <?php if($Gallery_Loop == "true") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
									<label title='false'><input type='radio' name='gallery_loop' value='false' <?php if($Gallery_Loop  == "false") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="gallery_loop" <?php if($Gallery_Loop == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p><?php _e("Should it be possible to navigate from the last element back to the first?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>

				    <tr>
						<th scope="row">Mousewheel Navigation</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Mousewheel Navigation</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='mousewheel_navigation' value='true' <?php if($Mousewheel_Navigation == "true") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='false'><input type='radio' name='mousewheel_navigation' value='false' <?php if($Mousewheel_Navigation  == "false") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="mousewheel_navigation" <?php if($Mousewheel_Navigation == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p>Should rolling the mousewheel transition a gallery between images?</p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row">Curtain Slide</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Curtain Slide</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='curtain_slide' value='true' <?php if($Curtain_Slide == "true") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='false'><input type='radio' name='curtain_slide' value='false' <?php if($Curtain_Slide  == "false") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="curtain_slide" <?php if($Curtain_Slide == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p>Should a curtain slide be added for images that are paired (By going to "Media" and clicking on an image)?</p>
							</fieldset>
						</td>
					</tr> 
					<tr>
						<th scope="row">Show Thumbnail Toggle</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Show Slide Counter</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='show_thumbnail_toggle' value='true' <?php if($Show_Thumbnail_Toggle == "true") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='false'><input type='radio' name='show_thumbnail_toggle' value='false' <?php if($Show_Thumbnail_Toggle  == "false") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="show_thumbnail_toggle" <?php if($Show_Thumbnail_Toggle == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p>Should the thumbnail toggle icon be shown, to hide or unhide thumbnail images?</p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row">Show Autoplay Progress Bar</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Show Autoplay Progress Bar</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='show_progress_bar' value='true' <?php if($Show_Progress_Bar == "true") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='false'><input type='radio' name='show_progress_bar' value='false' <?php if($Show_Progress_Bar  == "false") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="show_progress_bar" <?php if($Show_Progress_Bar == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p>Should a progress bar be displayed when autoplay is active?</p>
							</fieldset>
						</td>
					</tr> 

					<tr>
						<th scope="row" class="ewd-ulb-admin-no-info-button"><?php _e("Hide Elements from Mobile View", 'ultimate-lightbox'); ?></th>
						<td>
						    <fieldset><legend class="screen-reader-text"><span>Hide Elements from Mobile View</span></legend>
						        <label title='title' class='ewd-ulb-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='title' <?php if(in_array("title", $Hide_On_Mobile)) {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("Title", 'ultimate-lightbox'); ?></span></label><br />
						        <label title='description' class='ewd-ulb-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='description' <?php if(in_array("description", $Hide_On_Mobile)) {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("Description", 'ultimate-lightbox'); ?></span></label><br />
						        <label title='thumbnails' class='ewd-ulb-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='thumbnails' <?php if(in_array("thumbnails", $Hide_On_Mobile)) {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-checkbox'></span> <span><?php _e("Thumbnails", 'ultimate-lightbox'); ?></span></label><br />
						    </fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Overlay Text Source", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Overlay Text Source</span></legend>
								<label title='alt' class='ewd-ulb-admin-input-container'><input type='radio' name='overlay_text_source' value='alt' <?php if($Overlay_Text_Source == "alt") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span> <span><?php _e("Alt Text", 'ultimate-lightbox'); ?></span></label><br />
								<label title='caption' class='ewd-ulb-admin-input-container'><input type='radio' name='overlay_text_source' value='caption' <?php if($Overlay_Text_Source  == "caption") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span> <span><?php _e("Caption", 'ultimate-lightbox'); ?></span></label><br />
								<p><?php _e("Should the overlay text that shows on an image be pulled from the image alt text or the image caption?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Disable Other Lightboxes", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Disable Other Lightboxes</span></legend>
								<div class="ewd-ulb-admin-hide-radios">
									<label title='true'><input type='radio' name='disable_other_lightboxes' value='true' <?php if($Disable_Other_Lightboxes == "true") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
									<label title='false'><input type='radio' name='disable_other_lightboxes' value='false' <?php if($Disable_Other_Lightboxes  == "false") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								</div>
								<label class="ewd-ulb-admin-switch">
									<input type="checkbox" class="ewd-ulb-admin-option-toggle" data-inputname="disable_other_lightboxes" <?php if($Disable_Other_Lightboxes == "true") {echo "checked='checked'";} ?>>
									<span class="ewd-ulb-admin-switch-slider round"></span>
								</label>		
								<p><?php _e("Should other lightboxes be disabled? This option should only be used if there's no other way to disbale a hardcoded lightbox, and only works for a number of the most popular lightboxes.", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<tr class="ewd-ulb-premium-options-table-overlay">
							<th colspan="2">
								<div class="ewd-ulb-unlock-premium">
									<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
									<p>Access this section by by upgrading to premium</p>
									<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
								</div>
							</th>
						</tr>
					<?php } ?>
				</table>
			</div>



			<!--<div id='WooCommerce' class='ewd-ulb-option-set'>
				<table class='form-table'>
					<tr>
						<th scope="row"><?php _e("Open Products in Lightbox", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Open Products in Lightbox</span></legend>
								<label title='Yes'><input type='radio' name='catalog_lightbox' value='Yes' <?php if($Catalog_Lightbox == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
								<label title='No'><input type='radio' name='catalog_lightbox' value='No' <?php if($Catalog_Lightbox  == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								<p><?php _e("Should products on the catalog page of WooCommerce open in a lightbox instead of going to the product page?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Product Information to Display", 'ultimate-lightbox'); ?></th>
						<td>
						    <fieldset><legend class="screen-reader-text"><span>Product Information to Display</span></legend>
						        <label title='title'><input type='checkbox' name='hide_on_mobile[]' value='title' <?php if(in_array("title", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /> <span><?php _e("Title", 'ultimate-lightbox'); ?></span></label><br />
						        <label title='description'><input type='checkbox' name='hide_on_mobile[]' value='description' <?php if(in_array("description", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /> <span><?php _e("Description", 'ultimate-lightbox'); ?></span></label><br />
						        <label title='thumbnails'><input type='checkbox' name='hide_on_mobile[]' value='thumbnails' <?php if(in_array("thumbnails", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /> <span><?php _e("Thumbnails", 'ultimate-lightbox'); ?></span></label><br />
						        <p><?php _e("Should a link to the product page be added for WooCommerce products displayed in the lightbox?", 'ultimate-lightbox'); ?></p>
						    </fieldset>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Link to Product Page", 'ultimate-lightbox'); ?></th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Link to Product Page</span></legend>
								<label title='Yes'><input type='radio' name='wc_product_link' value='Yes' <?php if($WC_Product_Link == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'ultimate-lightbox'); ?></span></label><br />
								<label title='No'><input type='radio' name='wc_product_link' value='No' <?php if($WC_Product_Link  == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'ultimate-lightbox'); ?></span></label><br />
								<p><?php _e("Should a link to the product page be added for WooCommerce catalog products displayed in the lightbox?", 'ultimate-lightbox'); ?></p>
							</fieldset>
						</td>
					</tr>
				</table>
			</div>-->

			<div id='Controls' class='ewd-ulb-option-set<?php echo ( $Display_Tab == 'Controls' ? '' : ' ewd-ulb-hidden' ); ?>'>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Control Options', 'ultimate-lightbox'); ?></div>

				<table class="form-table ewd-ulb-premium-options-table">
					<tr>
						<th scope="row">Top Right Controls</th>
						<td>
							<div id='ulb-top-right-controls' class='ulb-toolbar-controls ulb-selected-toolbar-controls ulb-controls-right top_right ulb-admin-one-third'>&nbsp;
							<?php
								foreach ($Top_Right_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "'>a";
									echo "<input type='hidden' name='top_right_controls[]' value='" . $Control . "' />";
									echo "</div>";
								}
							?>
							</div>
							<div class='ulb-toolbar-controls ulb-all-toolbar-controls top_right ulb-admin-one-third'>
							<?php
								foreach ($All_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "' data-controlvalue='" . $Control . "'>a</div>";
								}
							?>
							</div>
							<div class='ewd-ulb-clear'></div>
							<div class='ulb-add-control ulb-admin-one-sixth'>
								<div class='ulb-remove-button' data-controlarea='top_right'><?php _e("Remove", 'ultimate-lightbox'); ?> &#8594;</div>
								<div class='ulb-add-button' data-controlarea='top_right'>&#8592; <?php _e("Add", 'ultimate-lightbox'); ?></div>
							</div>
							<div class='ewd-ulb-clear'></div>
							<p><?php _e("What control options should be in the top right toolbar area?", 'ultimate-lightbox'); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Top Left Controls", 'ultimate-lightbox'); ?></th>
						<td>
							<div id='ulb-top-left-controls' class='ulb-toolbar-controls ulb-selected-toolbar-controls ulb-controls-left top_left ulb-admin-one-third'>&nbsp;
							<?php
								foreach ($Top_Left_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "'>a";
									echo "<input type='hidden' name='top_left_controls[]' value='" . $Control . "' />";
									echo "</div>";
								}
							?>
							</div>
							<div class='ulb-toolbar-controls ulb-all-toolbar-controls top_left ulb-admin-one-third'>
							<?php
								foreach ($All_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "' data-controlvalue='" . $Control . "'>a</div>";
								}
							?>
							</div>
							<div class='ewd-ulb-clear'></div>
							<div class='ulb-add-control ulb-admin-one-sixth'>
								<div class='ulb-remove-button' data-controlarea='top_left'><?php _e("Remove", 'ultimate-lightbox'); ?> &#8594;</div>
								<div class='ulb-add-button' data-controlarea='top_left'>&#8592; <?php _e("Add", 'ultimate-lightbox'); ?></div>
							</div>
							<div class='ewd-ulb-clear'></div>
							<p><?php _e("What control options should be in the top left toolbar area?", 'ultimate-lightbox'); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Bottom Right Controls", 'ultimate-lightbox'); ?></th>
						<td>
							<div id='ulb-bottom-right-controls' class='ulb-toolbar-controls ulb-selected-toolbar-controls ulb-controls-right bottom_right ulb-admin-one-third'>&nbsp;
							<?php
								foreach ($Bottom_Right_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "'>a";
									echo "<input type='hidden' name='bottom_right_controls[]' value='" . $Control . "' />";
									echo "</div>";
								}
							?>
							</div>
							<div class='ulb-toolbar-controls ulb-all-toolbar-controls bottom_right ulb-admin-one-third'>
							<?php
								foreach ($All_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "' data-controlvalue='" . $Control . "'>a</div>";
								}
							?>
							</div>
							<div class='ewd-ulb-clear'></div>
							<div class='ulb-add-control ulb-admin-one-sixth'>
								<div class='ulb-remove-button' data-controlarea='bottom_right'><?php _e("Remove", 'ultimate-lightbox'); ?> &#8594;</div>
								<div class='ulb-add-button' data-controlarea='bottom_right'>&#8592; <?php _e("Add", 'ultimate-lightbox'); ?></div>
							</div>
							<div class='ewd-ulb-clear'></div>
							<p><?php _e("What control options should be in the bottom right toolbar area?", 'ultimate-lightbox'); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><?php _e("Bottom Left Controls", 'ultimate-lightbox'); ?></th>
						<td>
							<div id='ulb-bottom-left-controls' class='ulb-toolbar-controls ulb-selected-toolbar-controls ulb-controls-left bottom_left ulb-admin-one-third'>&nbsp;
							<?php
								foreach ($Bottom_Left_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "'>a";
									echo "<input type='hidden' name='bottom_left_controls[]' value='" . $Control . "' />";
									echo "</div>";
								}
							?>
							</div>
							<div class='ulb-toolbar-controls ulb-all-toolbar-controls bottom_left ulb-admin-one-third'>
							<?php
								foreach ($All_Controls as $Control) {
									echo "<div class='ulb-toolbar-control ulb-" . $Control . "' data-controlvalue='" . $Control . "'>a</div>";
								}
							?>
							</div>
							<div class='ewd-ulb-clear'></div>
							<div class='ulb-add-control ulb-admin-one-sixth'>
								<div class='ulb-remove-button' data-controlarea='bottom_left'><?php _e("Remove", 'ultimate-lightbox'); ?> &#8594;</div>
								<div class='ulb-add-button' data-controlarea='bottom_left'>&#8592; <?php _e("Add", 'ultimate-lightbox'); ?></div>
							</div>
							<div class='ewd-ulb-clear'></div>
							<p><?php _e("What control options should be in the bottom left toolbar area?", 'ultimate-lightbox'); ?></p>
						</td>
					</tr>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<tr class="ewd-ulb-premium-options-table-overlay">
							<th colspan="2">
								<div class="ewd-ulb-unlock-premium">
									<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
									<p>Access this section by by upgrading to premium</p>
									<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
								</div>
							</th>
						</tr>
					<?php } ?>
				</table>
			</div> <!-- Controls -->

			<div id='Icons' class='ewd-ulb-option-set<?php echo ( $Display_Tab == 'Icons' ? '' : ' ewd-ulb-hidden' ); ?>'>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Premium Icon Options', 'ultimate-lightbox'); ?></div>

				<div class="ewd-ulb-admin-styling-section">
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Arrows', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<fieldset class="ewdAdminIconChoice">
									<label class='ewd-ulb-admin-input-container fourteen'><input type='radio' name='ulb_arrow' value='None' <?php if ($ULB_Arrow == "None") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  No Arrow</label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='a' <?php if ($ULB_Arrow == "a") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>b</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='c' <?php if ($ULB_Arrow == "c") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>d</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='e' <?php if ($ULB_Arrow == "e") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>f</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='g' <?php if ($ULB_Arrow == "g") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>h</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='i' <?php if ($ULB_Arrow == "i") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>j</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='k' <?php if ($ULB_Arrow == "k") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>l</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='m' <?php if ($ULB_Arrow == "m") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>n</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='o' <?php if ($ULB_Arrow == "o") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>p</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='q' <?php if ($ULB_Arrow == "q") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>r</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='A' <?php if ($ULB_Arrow == "A") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>B</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='E' <?php if ($ULB_Arrow == "E") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>F</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='G' <?php if ($ULB_Arrow == "G") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>H</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='I' <?php if ($ULB_Arrow == "I") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>J</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='K' <?php if ($ULB_Arrow == "K") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>L</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='M' <?php if ($ULB_Arrow == "M") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>N</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='O' <?php if ($ULB_Arrow == "O") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>P</span></label>
									<label class='ewd-ulb-admin-input-container'><input type='radio' name='ulb_arrow' value='Q' <?php if ($ULB_Arrow == "Q") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-ulb-admin-radio-button'></span>  <span class='ulb-arrow'>R</span></label>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Icons', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<fieldset class="ewdAdminIconChoice ewdWiderIconChoice">
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='a' <?php if ($ULB_Icon_Set == "a") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>a</span><span class='ulb-autoplay'>a</span><span class='ulb-zoom'>a</span><span class='ulb-zoom_out'>a</span><span class='ulb-download'>a</span><span class='ulb-fullsize'>a</span><span class='ulb-fullscreen'>a</span><span class='ulb-regular_screen'>a</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='b' <?php if ($ULB_Icon_Set == "b") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>b</span><span class='ulb-autoplay'>b</span><span class='ulb-zoom'>b</span><span class='ulb-zoom_out'>b</span><span class='ulb-download'>b</span><span class='ulb-fullsize'>b</span><span class='ulb-fullscreen'>b</span><span class='ulb-regular_screen'>b</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='c' <?php if ($ULB_Icon_Set == "c") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>c</span><span class='ulb-autoplay'>c</span><span class='ulb-zoom'>c</span><span class='ulb-zoom_out'>c</span><span class='ulb-download'>c</span><span class='ulb-fullsize'>c</span><span class='ulb-fullscreen'>c</span><span class='ulb-regular_screen'>c</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='d' <?php if ($ULB_Icon_Set == "d") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>d</span><span class='ulb-autoplay'>d</span><span class='ulb-zoom'>d</span><span class='ulb-zoom_out'>d</span><span class='ulb-download'>d</span><span class='ulb-fullsize'>d</span><span class='ulb-fullscreen'>d</span><span class='ulb-regular_screen'>d</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='e' <?php if ($ULB_Icon_Set == "e") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>e</span><span class='ulb-autoplay'>e</span><span class='ulb-zoom'>e</span><span class='ulb-zoom_out'>e</span><span class='ulb-download'>e</span><span class='ulb-fullsize'>e</span><span class='ulb-fullscreen'>e</span><span class='ulb-regular_screen'>e</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='f' <?php if ($ULB_Icon_Set == "f") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>f</span><span class='ulb-autoplay'>f</span><span class='ulb-zoom'>f</span><span class='ulb-zoom_out'>f</span><span class='ulb-download'>f</span><span class='ulb-fullsize'>f</span><span class='ulb-fullscreen'>f</span><span class='ulb-regular_screen'>f</span>
									</label>
									<label class='ewd-ulb-admin-input-container'>
										<input type='radio' name='ulb_icon_set' value='g' <?php if ($ULB_Icon_Set == "g") {echo "checked='checked'";} ?> <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
										<span class='ewd-ulb-admin-radio-button'></span> <span class='ulb-exit'>g</span><span class='ulb-autoplay'>g</span><span class='ulb-zoom'>g</span><span class='ulb-zoom_out'>g</span><span class='ulb-download'>g</span><span class='ulb-fullsize'>g</span><span class='ulb-fullscreen'>g</span><span class='ulb-regular_screen'>g</span>
									</label>
								</fieldset>
							</div>
						</div>
					</div>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<div class="ewd-ulb-premium-options-table-overlay">
							<div class="ewd-ulb-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>


			</div> <!-- Icons -->


			<div id='Styling' class='ewd-ulb-option-set<?php echo ( $Display_Tab == 'Styling' ? '' : ' ewd-ulb-hidden' ); ?>'>
				<h2 id='styling-options' class='ulb-options-page-tab-title'>Styling Options</h2>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Title and Description', 'ultimate-lightbox'); ?></div>

				<div class="ewd-ulb-admin-styling-section">
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Title', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_title_font_color' value='<?php echo $ULB_Styling_Title_Font_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_title_font' class='ewd-ulb-admin-font-size' value='<?php echo $ULB_Styling_Title_Font; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_title_font_size' value='<?php echo $ULB_Styling_Title_Font_Size; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Description', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_description_font_color' value='<?php echo $ULB_Styling_Description_Font_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_description_font' value='<?php echo $ULB_Styling_Description_Font; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_description_font_size' value='<?php echo $ULB_Styling_Description_Font_Size; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<div class="ewd-ulb-premium-options-table-overlay">
							<div class="ewd-ulb-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Arrows and Icons', 'ultimate-lightbox'); ?></div>

				<div class="ewd-ulb-admin-styling-section">
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Arrows', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Arrow', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_arrow_color' value='<?php echo $ULB_Styling_Arrow_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_arrow_background_color' value='<?php echo $ULB_Styling_Arrow_Background_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Arrow Size (<span>in "px", "em", "%", etc.</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_arrow_size' value='<?php echo $ULB_Styling_Arrow_Size; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Arrow Background Opacity (<span>e.g. "0.4"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_arrow_background_opacity' value='<?php echo $ULB_Styling_Arrow_Background_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Arrow Background Hover Opacity (<span>e.g. "0.7"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_arrow_background_hover_opacity' value='<?php echo $ULB_Styling_Arrow_Background_Hover_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Icons', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_icon_color' value='<?php echo $ULB_Styling_Icon_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Size (<span>in "px", "em", "%", etc.</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_icon_size' value='<?php echo $ULB_Styling_Icon_Size; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<div class="ewd-ulb-premium-options-table-overlay">
							<div class="ewd-ulb-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Background, Toolbars, Overlay', 'ultimate-lightbox'); ?></div>

				<div class="ewd-ulb-admin-styling-section">
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Background', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_background_overlay_color' value='<?php echo $ULB_Styling_Background_Overlay_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Opacity (<span>e.g. "0.8"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_background_overlay_opacity' value='<?php echo $ULB_Styling_Background_Overlay_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Toolbars', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_toolbar_color' value='<?php echo $ULB_Styling_Toolbar_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Opacity (<span>e.g. "0.4"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_toolbar_opacity' value='<?php echo $ULB_Styling_Toolbar_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Image Overlay', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Color', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Arrow', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_image_overlay_color' value='<?php echo $ULB_Styling_Image_Overlay_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Opacity (<span>e.g. "0.4"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_image_overlay_opacity' value='<?php echo $ULB_Styling_Image_Overlay_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<div class="ewd-ulb-premium-options-table-overlay">
							<div class="ewd-ulb-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

				<br />

				<div class="ewd-ulb-admin-section-heading"><?php _e('Thumbnails', 'ultimate-lightbox'); ?></div>

				<div class="ewd-ulb-admin-styling-section <?php echo $ULB_Full_Version; ?>">
					<div class="ewd-ulb-admin-styling-subsection">
						<div class="ewd-ulb-admin-styling-subsection-label"><?php _e('Thumbnails', 'ultimate-lightbox'); ?></div>
						<div class="ewd-ulb-admin-styling-subsection-content">
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Thumbnail Bar', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_thumbnail_bar_color' value='<?php echo $ULB_Styling_Thumbnail_Bar_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Thumbnail Scroll Arrow', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_thumbnail_scroll_arrow_color' value='<?php echo $ULB_Styling_Thumbnail_Scroll_Arrow_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-ulb-admin-styling-subsection-content-color-picker">
										<div class="ewd-ulb-admin-styling-subsection-content-color-picker-label"><?php _e('Active Thumbnail Border', 'ultimate-lightbox'); ?></div>
										<input type='text' class='ewd-ulb-spectrum' name='ulb_styling_active_thumbnail_border_color' value='<?php echo $ULB_Styling_Active_Thumbnail_Border_Color; ?>' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-ulb-admin-styling-subsection-content-each">
								<div class="ewd-ulb-admin-styling-subsection-content-label"><?php _e('Thumbnail Bar Opacity (<span>e.g. "0.4"</span>)', 'ultimate-lightbox'); ?></div>
								<div class="ewd-ulb-admin-styling-subsection-content-right">
									<input type='text' name='ulb_styling_thumbnail_bar_opacity' value='<?php echo $ULB_Styling_Thumbnail_Bar_Opacity; ?>' class='ewd-ulb-admin-font-size' <?php if ($ULB_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($ULB_Full_Version != "Yes") { ?>
						<div class="ewd-ulb-premium-options-table-overlay">
							<div class="ewd-ulb-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Lightbox Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-lightbox/#buy" class="ewd-ulb-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

			</div> <!-- Styling -->




			<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p>
		</form>
	</div> <!-- ulb-options-page-tabbed-content -->
