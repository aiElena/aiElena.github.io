var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
var output_two = document.getElementById("demo_two");
output.innerHTML = slider.value; // Display the default slider value
// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
    var donate = document.getElementById("donate").href = 'https://www.paypal.com/cgi-bin/webscr?&cmd=_xclick&business=studia55x5@yandex.ru&currency_code=USD&amount='+output.innerHTML+'&item_name=On%20coffee%20for%20the%20developer';
}


var inputs = document.querySelectorAll("input[name='skuautoffxf_letters_and_numbers']");

function FFxFparent() {
    var FFxFparent = inputs[3].parentElement.parentElement;
    var FFxF_el = document.createElement("div");
    FFxF_el.className = "FFxF_icon_setting";
    FFxF_el.innerHTML = '<div id="sku_description" class="updated inline sku_description" style=" max-width: 340px; "><p><strong>' + ffxf_settings_locale.ffxf_message + '</strong></p></div>';
    var element = document.getElementById("sku_description");
    if (!element) {
        FFxFparent.append(FFxF_el);
    }
}

if (inputs[3].checked) {
    FFxFparent();
}

for (var i = 0; i < inputs.length; ++i) {
    inputs[i].addEventListener('change', function () {
        if (this.value == 'ffxf_slug') {
            FFxFparent();
        } else {
            if (document.getElementById("sku_description")) {
                document.getElementById("sku_description").remove();
            }
        }

    });
}


function ffxf_message_preiv() {
    var chbox = document.getElementById('skuautoffxf_previous');
    if (chbox.checked) {

        var FFxFparent_preiv = document.querySelector('#mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(5) > td > fieldset');
        var FFxF_el_preiv = document.createElement("div");
        FFxF_el_preiv.className = "FFxF_icon_setting_preiv";
        FFxF_el_preiv.innerHTML = '<div id="sku_description_preiv" class="updated inline sku_description" style=" max-width: 340px; z-index:999; top:0; left:0;"><p><strong>' + ffxf_settings_locale.ffxf_message_preiv + '</strong></p></div>';
        var element_preiv = document.getElementById("sku_description_preiv");

        if (!element_preiv) {
            FFxFparent_preiv.append(FFxF_el_preiv);
        }

        var FFxF_style = document.createElement('style');
        FFxF_style.setAttribute('id', 'FFxF_style_preiv');
        FFxF_style.typeof = 'text/css';
        FFxF_style.innerHTML = '.mass_generate { background: rgba(134, 134, 134, 0.3); cursor: no-drop; color: #9a9a9a; } #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(1), #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(2), #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(3),#mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(4) {z-index:9;background: rgba(134, 134, 134, 0.3); cursor: no-drop;color: #9a9a9a;}#mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(1) label, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(2) label, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(3) label, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(4) label{cursor: no-drop;color: #9a9a9a;}#mainform > div > div:nth-child(3) > table > tbody > tr:nth-child(1) input, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(2) input, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(3) input, #mainform > div > div:nth-child(2) > table > tbody > tr:nth-child(4) input{cursor: no-drop;color: #9a9a9a;}table.form-table { z-index: 99; }';
        document.getElementsByTagName('head')[0].appendChild(FFxF_style);
        document.getElementById('generate_mass_sku').setAttribute('disabled', 'disabled');


    } else {
        if (document.getElementById("sku_description_preiv")) {
            document.getElementById("sku_description_preiv").remove();
        }
        if (document.getElementById("FFxF_style_preiv")) {
            document.getElementById("FFxF_style_preiv").remove();
        }

        document.querySelector('#skuautoffxf_auto_prefix').removeAttribute("align");
        document.getElementById('generate_mass_sku').removeAttribute('disabled');

    }
}


var FFxF_button_priev_post = document.querySelector('label[for="skuautoffxf_previous"]');
FFxF_button_priev_post.addEventListener("change", function () {
    ffxf_message_preiv();

});


window.onload = function () {
    ffxf_message_preiv();
};

jQuery(document).on('ready', function(){
    $modal_generate= jQuery('.modal_generate');
    $overlay = jQuery('.modal-overlay');

    /* Need this to clear out the keyframe classes so they dont clash with each other between enter/leave. */
    $modal_generate.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
        if($modal_generate.hasClass('state-leave')) {
            $modal_generate.removeClass('state-leave');
        }
    });

    jQuery('.close').on('click', function(){
        $overlay.removeClass('state-show');
        $modal_generate.removeClass('state-appear').addClass('state-leave');
    });

    jQuery('.open').on('click', function(){
        $overlay.addClass('state-show');
        $modal_generate.removeClass('state-leave').addClass('state-appear');
    });
});


