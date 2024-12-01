function ShowOptionTab(TabName) {
    jQuery(".ewd-ulb-option-set").each(function() {
        jQuery(this).addClass("ewd-ulb-hidden");
    });
    jQuery("#"+TabName).removeClass("ewd-ulb-hidden");

    jQuery(".options-subnav-tab").each(function() {
        jQuery(this).removeClass("options-subnav-tab-active");
    });
    jQuery("#"+TabName+"_Menu").addClass("options-subnav-tab-active");
    jQuery('input[name="Display_Tab"]').val(TabName);
}

jQuery(document).ready(function(){
    jQuery('.ewd-ulb-meta-menu-item').on('click', function() {
        var ID = jQuery(this).attr('id');
        var ID_Base = ID.substring(5);

        jQuery(".ewd-ulb-meta-body").each(function() {
            jQuery(this).addClass("ewd-ulb-hidden");
        });
        jQuery('#Body_'+ID_Base).removeClass("ewd-ulb-hidden");
    
        jQuery(".ewd-ulb-meta-menu-item").each(function() {
            jQuery(this).removeClass("meta-menu-tab-active");
        });
        jQuery(this).addClass("meta-menu-tab-active");
    });
});

jQuery(document).ready(function() {
    EWD_ULB_Set_Control_Click_Handlers();
    EWD_ULB_Set_Control_Button_Click_Handlers();

    Sortable.create(jQuery('#ulb-top-right-controls').get(0), { /* options */ });
    Sortable.create(jQuery('#ulb-top-left-controls').get(0), { /* options */ });
    Sortable.create(jQuery('#ulb-bottom-right-controls').get(0), { /* options */ });
    Sortable.create(jQuery('#ulb-bottom-left-controls').get(0), { /* options */ });
});

function EWD_ULB_Set_Control_Click_Handlers() {
    jQuery('.ulb-toolbar-control').off('click.controlselect');
    jQuery('.ulb-toolbar-control').on('click.controlselect', function() {
        if (jQuery(this).hasClass('ewd-ulb-selected-control')) {jQuery(this).removeClass('ewd-ulb-selected-control');}
        else {jQuery(this).addClass('ewd-ulb-selected-control');}
    })
}

function EWD_ULB_Set_Control_Button_Click_Handlers() {
    jQuery('.ulb-add-button').on('click', function() {
        var area = jQuery(this).data('controlarea');
        jQuery('.ulb-all-toolbar-controls.' + area).find('.ewd-ulb-selected-control').each(function() {
            jQuery(this).removeClass('ewd-ulb-selected-control');
            jQuery('.ulb-selected-toolbar-controls.' + area).append(jQuery(this).clone());
            //jQuery(this).clone().insertAfter('.ulb-selected-toolbar-controls.' + area + ' .ulb-toolbar-control:last');
            jQuery('.ulb-selected-toolbar-controls.' + area + ' .ulb-toolbar-control:last').append('<input type="hidden" name="' + area + '_controls[]" value="' + jQuery(this).data("controlvalue") + '" />');
        });
        EWD_ULB_Set_Control_Click_Handlers();
    });
    jQuery('.ulb-remove-button').on('click', function() {
        var area = jQuery(this).data('controlarea');
        jQuery('.ulb-selected-toolbar-controls.' + area).find('.ewd-ulb-selected-control').each(function() {
            jQuery(this).removeClass('ewd-ulb-selected-control');
            jQuery(this).remove();
        });
        EWD_ULB_Set_Control_Click_Handlers();
    });
}

jQuery(document).ready(function() {
    jQuery('.ewd-ulb-spectrum').spectrum({
        showInput: true,
        showInitial: true,
        preferredFormat: "hex",
        allowEmpty: true
    });

    jQuery('.ewd-ulb-spectrum').css('display', 'inline');

    jQuery('.ewd-ulb-spectrum').on('change', function() {
        if (jQuery(this).val() != "") {
            jQuery(this).css('background', jQuery(this).val());
            var rgb = EWD_ULB_hexToRgb(jQuery(this).val());
            var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
            if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
            else {jQuery(this).css('color', '#000000');}
        }
        else {
            jQuery(this).css('background', 'none');
        }
    });

    jQuery('.ewd-ulb-spectrum').each(function() {
        if (jQuery(this).val() != "") {
            jQuery(this).css('background', jQuery(this).val());
            var rgb = EWD_ULB_hexToRgb(jQuery(this).val());
            var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
            if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
            else {jQuery(this).css('color', '#000000');}
        }
    });
});

function EWD_ULB_hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}




//OPTIONS HELP/DESCRIPTION TEXT
jQuery(document).ready(function($) {
    $('.ewd-ulb-option-set .form-table tr').each(function(){
        var thisOptionClick = $(this);
        thisOptionClick.find('th').click(function(){
            thisOptionClick.find('td p').toggle();
        });
    });
    $('.ewdOptionHasInfo').each(function(){
        var thisNonTableOptionClick = $(this);
        thisNonTableOptionClick.find('.ewd-ulb-admin-styling-subsection-label').click(function(){
            thisNonTableOptionClick.find('fieldset p').toggle();
        });
    });
    $(function(){
        $(window).resize(function(){
            $('.ewd-ulb-option-set .form-table tr').each(function(){
                var thisOption = $(this);
                if( $(window).width() < 783 ){
                    if( thisOption.find('.ewd-ulb-admin-hide-radios').length > 0 ) {
                        thisOption.find('td p').show();         
                        thisOption.find('th').css('background-image', 'none');          
                        thisOption.find('th').css('cursor', 'default');         
                    }
                    else{
                        thisOption.find('td p').hide();
                        thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-lightbox/img/options-asset-info.png)');          
                        thisOption.find('th').css('background-position', '95% 20px');           
                        thisOption.find('th').css('background-size', '18px 18px');          
                        thisOption.find('th').css('background-repeat', 'no-repeat');            
                        thisOption.find('th').css('cursor', 'pointer');                             
                    }       
                }
                else{
                    thisOption.find('td p').hide();
                    thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-lightbox/img/options-asset-info.png)');          
                    thisOption.find('th').css('background-position', 'calc(100% - 20px) 15px');         
                    thisOption.find('th').css('background-size', '18px 18px');          
                    thisOption.find('th').css('background-repeat', 'no-repeat');            
                    thisOption.find('th').css('cursor', 'pointer');         
                }
            });
            $('.ewdOptionHasInfo').each(function(){
                var thisNonTableOption = $(this);
                if( $(window).width() < 783 ){
                    if( thisNonTableOption.find('.ewd-ulb-admin-hide-radios').length > 0 ) {
                        thisNonTableOption.find('fieldset p').show();           
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-image', 'none');         
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('cursor', 'default');            
                    }
                    else{
                        thisNonTableOption.find('fieldset p').hide();
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-lightbox/img/options-asset-info.png)');         
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');            
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-size', '18px 18px');         
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-repeat', 'no-repeat');           
                        thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('cursor', 'pointer');                                
                    }       
                }
                else{
                    thisNonTableOption.find('fieldset p').hide();
                    thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-lightbox/img/options-asset-info.png)');         
                    thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');            
                    thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-size', '18px 18px');         
                    thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('background-repeat', 'no-repeat');           
                    thisNonTableOption.find('ewd-ulb-admin-styling-subsection-label').css('cursor', 'pointer');            
                }
            });
        }).resize();
    }); 
});


//OPTIONS PAGE YES/NO TOGGLE SWITCHES
jQuery(document).ready(function($) {
    jQuery('.ewd-ulb-admin-option-toggle').on('change', function() {
        var Input_Name = jQuery(this).data('inputname'); console.log(Input_Name);
        if (jQuery(this).is(':checked')) {
            jQuery('input[name="' + Input_Name + '"][value="true"]').prop('checked', true).trigger('change');
            jQuery('input[name="' + Input_Name + '"][value="false"]').prop('checked', false);
        }
        else {
            jQuery('input[name="' + Input_Name + '"][value="true"]').prop('checked', false).trigger('change');
            jQuery('input[name="' + Input_Name + '"][value="false"]').prop('checked', true);
        }
    });
    $(function(){
        $(window).resize(function(){
            $('.ewd-ulb-option-set .form-table tr').each(function(){
                var thisOptionTr = $(this);
                if( $(window).width() < 783 ){
                    if( thisOptionTr.find('.ewd-ulb-admin-switch').length > 0 ) {
                        thisOptionTr.find('th').css('width', 'calc(90% - 50px');            
                        thisOptionTr.find('th').css('padding-right', 'calc(5% + 50px');         
                    }
                    else{
                        thisOptionTr.find('th').css('width', '90%');            
                        thisOptionTr.find('th').css('padding-right', '5%');         
                    }       
                }
                else{
                    thisOptionTr.find('th').css('width', '200px');          
                    thisOptionTr.find('th').css('padding-right', '46px');           
                }
            });
        }).resize();
    }); 
});

