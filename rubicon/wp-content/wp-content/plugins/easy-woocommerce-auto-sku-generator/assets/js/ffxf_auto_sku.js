var FFxF_detect_sku = document.getElementById('_sku'); // value SKU input

// console.log(ffxf_sku.skuautoffxf_auto_prefix);
// console.log(ffxf_sku.skuautoffxf_id);
// console.log(ffxf_sku.ffxf_format_sku);
console.log(ffxf_sku.ffxf_prev_ID);
function FFxF_makeid(length) {
    var result = ffxf_sku.skuautoffxf_auto_prefix;
    var characters = ffxf_sku.ffxf_format_sku; // SKU Format
    var charactersLength = characters.length;
    
    if (ffxf_sku.ffxf_prev_ID) {
        result = ffxf_sku.ffxf_prev_ID; 
    } else {
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
    } 
    
    return result;
    
}

if (FFxF_detect_sku && FFxF_detect_sku.value === null || FFxF_detect_sku.value === "") {

    var FFxF_random_sku = FFxF_makeid(ffxf_sku.skuautoffxf_auto_number);
    FFxF_detect_sku.value = FFxF_random_sku + '' + ffxf_sku.skuautoffxf_id;

} else {

    //alert('Item field is filled');

}

// Add setting link 
var FFxF_el = document.createElement("div");
FFxF_el.className = "FFxF_icon_setting";
FFxF_el.innerHTML =
    '<a target="_blank" data-tooltip="' + ffxf_sku.data_tooltip + '" data-tooltip-bottom="" href="/wp-admin/admin.php?page=wc-settings&tab=products&section=skuautoffxf">' +
    '<span class="dashicons dashicons-admin-generic"></span>' +
    '</a>' +
    '<a target="_blank" id="rating-1" href="https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/" data-tooltip="' + ffxf_sku.data_tooltip_bottom + '" data-tooltip-bottom="">' +
    '<div class="circlephone" style="transform-origin: center;"></div>' +
    '<div class="circle-fill" style="transform-origin: center;"></div>' +
    '<div class="img-circle" style="transform-origin: center;" >' +
    '<div data-tooltip="' + ffxf_sku.data_tooltip_left + '" data-tooltip-left="">' +
    '<div data-tooltip="' + ffxf_sku.data_tooltip_right + '" data-tooltip-right="">' +
    '<div class="img-circleblock" style="transform-origin: center;">' +
    '<span class="dashicons dashicons-warning"></span>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</a>';

var FFxF_el_preiv = document.createElement("div");
FFxF_el_preiv.className = "border_preiv";
FFxF_el_preiv.innerHTML =
    '<div id="border_preiv"><span class="dashicons dashicons-info"></span><span>' + ffxf_sku.skuautoffxf_auto_prefix_text + '</span></div>';



// Уазываем селектор где будет отображаться подсказка
document.querySelectorAll("._sku_field")[0].append(FFxF_el);

document.addEventListener("DOMContentLoaded", function () {

    if (ffxf_sku.ffxf_prev_ID) {
        document.querySelectorAll("._sku_field")[0].append(FFxF_el_preiv);
    }

    function getData() {
        var data = "ratingData" in localStorage ?
            JSON.parse(localStorage.ratingData) : {
                count: 1
            };
        return Promise.resolve(data);
    }

    function saveData(ratingData) {
        localStorage.ratingData = JSON.stringify(ratingData);
        return Promise.resolve("ok");
    }

    var PREFIX = "rating-";
    var links = Array.from(
        document.querySelectorAll("a[id^='" + PREFIX.replace(/'/g, "\\'") + "']")
    );

    var hasBeenRatedElement = document.createElement("span");
    hasBeenRatedElement.innerHTML = "<a id='reflesh' data-tooltip='" + ffxf_sku.data_tooltip_trigger_script + "' data-tooltip-bottom='' href='#' onclick='FFxF_makeid_reflesh();return false;'><span class='dashicons dashicons-update-alt'></span></a>";

    // Уазываем селектор где будет отображаться подсказка
    document.querySelectorAll(".FFxF_icon_setting")[0].append(hasBeenRatedElement);

    var thanksElement = document.createElement("span");
    thanksElement.className = "thank";
    thanksElement.innerHTML = ffxf_sku.data_tooltip_trigger_script_thanks;

    getData().then(function (ratingData) {
        links.forEach(function (link) {
            var id = link.id.replace(PREFIX, "");

            if (id in ratingData) {
                link.parentNode.removeChild(link);
            } else {
                if (ratingData.count !== 0) {
                    link.parentNode.removeChild(link);
                    return;
                }

                link.target = "_blank";
                link.addEventListener("click", function () {
                    ratingData[id] = 1;
                    saveData(ratingData);

                    link.parentNode.insertBefore(thanksElement.cloneNode(true), link);
                    link.parentNode.removeChild(link);
                });
            }
        });

        ratingData.count = (ratingData.count + 1) % 2;
        saveData(ratingData);
    });

});

function FFxF_makeid_reflesh() {
    var reflesh_js = document.getElementById("reflesh");
    var animation_sku = document.getElementById("_sku");
    var FFxF_random_sku = FFxF_makeid(ffxf_sku.skuautoffxf_auto_number);

    animation_sku.classList.add('animation_sku');

    FFxF_detect_sku.value = FFxF_random_sku + '' + ffxf_sku.skuautoffxf_id;
}




