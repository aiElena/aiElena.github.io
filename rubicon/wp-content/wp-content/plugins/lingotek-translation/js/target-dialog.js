jQuery(document).ready(function($) {
    function singleUpload() {
        var data = {
            action:   "lingotek_upload_with_target",
            taxonomy: lingotek_upload_data.taxonomy,
            id:       lingotek_upload_data.id,
            type:     lingotek_upload_data.type,
            locales:  JSON.stringify($("#target-select").select2('data').map(a => a.text)), //select2('data') gets selected objects
            _lingotek_target_nonce: lingotek_upload_data.nonce,
        }
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: data,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            success: function(data){
                jQuery(location).attr('href', lingotek_upload_data.sendback);    
            }
        });
    }

    function bulkUpload(){
        var urlParts = window.location.href.split('?');
        var params = new URLSearchParams(urlParts[1]);
        params.delete('show_target_dialog');
        params.append('locales', $("#target-select").select2('data').map(a => a.text));
        var redirect = urlParts[0] + '?' + params.toString();
         window.location.replace(redirect);
    }

    if ('undefined' != typeof(lingotek_upload_data)) {
        if (lingotek_upload_data.show) {
            var d = $("#lingotek-targetselector");
            if (d.length) {
                d.dialog({
                width: 410,
                dialogClass: "targetSelector",
                buttons: [
                    {
                        id: "request-button",
                        class: "requestButton",
                        text: "Save",
                        click: function(){
                            lingotek_upload_data.bulk ? bulkUpload() : singleUpload();
                        },
                        disabled: true,
                    },
                    {
                        text:"Cancel",
                        click: function(){
                            $(this).dialog('close');
                        }
                    },
                ]
                });
                d.bind("dialogclose", function(e) {
                    window.location = lingotek_upload_data.sendback;
                });

                var locales = lingotek_upload_data.locales.map((x, i) => {
                    var obj = {};
                    obj.id = i; 
                    obj.text = x; 
                    return obj;    
                });
             
                //Make backspace delete tags instead of changing text thanks ghilios (select2 github issue 3354)
                $.fn.select2.amd.require(['select2/selection/search'], function (Search) {
                    Search.prototype.searchRemoveChoice = function (decorated, item) {
                        this.trigger('unselect', {
                            data: item
                        });
                
                        this.$search.val('');
                        this.handleSearch();
                    };
                }, null, true);

                let $select2 = $("#target-select").select2({
                    multiple: true,
                    data: locales,
                    placeholder: "Select Targets",
                    width: 398,
                    closeOnSelect: false,
                    sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
                    templateResult: function(value){
                        if (value && !value.selected){
                            return $('<span>' + value.text + "</span>");
                        }
                    },
                });

                //make selected tags always append, but preserve order when removed. Thanks vol7ron for this fix (select2 github issue 3106)
                //modified a bit since didn't work properly for this case
                /**
                 * select2_renderselections
                 * @param  {jQuery Select2 object}
                 * @return {null}
                 */
                function select2_renderSelections($select2){
                    const order      = $select2.data('preserved-order') || [];
                    const $container = $select2.next('.select2-container');
                    const $tags      = $container.find('li.select2-selection__choice');
                    const $input     = $tags.last().next();
           
                    // apply tag order
                    order.forEach(val=>{
                        for (let i =0; i < $tags.length; i++){
                            $el = $tags[i];
                            if ($el.title === val.text){
                                break;
                            }
                        }
                        $input.before( $el );
                    });
                }
                /**
                 * selectionHandler
                 * @param  {Select2 Event Object}
                 * @return {null}
                 */
                function selectionHandler(e){
                    const $select2  = $(this);
                    const val       = e.params.data.id;
                    const text     = e.params.data.text;
                    const order     = $select2.data('preserved-order') || [];
                    
                    switch (e.type){
                        case 'select2:select':      
                            order[order.length] = { id: val, text: text};
                            break;
                        case 'select2:unselect':
                            let found_index = order.map(a => a.id).indexOf(val);
                            if (found_index >= 0 ) {
                                order.splice(found_index,1);
                            }
                            break;
                    }
                    $select2.data('preserved-order', order); // store it for later
                    select2_renderSelections($select2);
                }
                
                $select2.on('select2:select select2:unselect', selectionHandler);

                //disable button until at least one target selected
                $select2.on('change', function(e){
                    if ($(this).find(':selected').length == 0){
                        $('#request-button').prop("disabled",true);
                    } else{
                        $('#request-button').prop("disabled", false);
                    }
                    //refresh after each choice instead of highlighting
                    $select2.select2("close");
                    $select2.select2("open");
                })
            }

        } else {
            jQuery(location).attr('href', lingotek_upload_data.sendback);
        }
    } 
});
