var evaAdminModule, eva_media_init;

(function($) {
    "use strict";


    evaAdminModule = (function() {

        var evaAdmin = {
            
            sizeGuideInit : function(){
                if ( $.fn.editTable ) {
                    $( '.eva-sguide-table-edit' ).each( function() {
                        $( this ).editTable(); 
                    } );
                }
            },
        };

        return {
            init: function() {

                $(document).ready(function() {
                    evaAdmin.sizeGuideInit();
                });

            },

            mediaInit: function(selector, button_selector, image_selector)  {
                var clicked_button = false;
                $(selector).each(function (i, input) {
                    var button = $(input).next(button_selector);
                    button.click(function (event) {
                        event.preventDefault();
                        var selected_img;
                        clicked_button = $(this);
             
                        // check for media manager instance
                        // if(wp.media.frames.gk_frame) {
                        //     wp.media.frames.gk_frame.open();
                        //     return;
                        // }
                        // configuration of the media manager new instance
                        wp.media.frames.gk_frame = wp.media({
                            title: 'Select image',
                            multiple: false,
                            library: {
                                type: 'image'
                            },
                            button: {
                                text: 'Use selected image'
                            }
                        });
             
                        // Function used for the image selection and media manager closing
                        var gk_media_set_image = function() {
                            var selection = wp.media.frames.gk_frame.state().get('selection');
             
                            // no selection
                            if (!selection) {
                                return;
                            }
             
                            // iterate through selected elements
                            selection.each(function(attachment) {
                                var url = attachment.attributes.url;
                                clicked_button.prev(selector).val(attachment.attributes.id);
                                $(image_selector).attr('src', url).show();
                            });
                        };
             
                        // closing event for media manger
                        wp.media.frames.gk_frame.on('close', gk_media_set_image);
                        // image selection event
                        wp.media.frames.gk_frame.on('select', gk_media_set_image);
                        // showing media manager
                        wp.media.frames.gk_frame.open();
                    });
               });
            }

        }

    }());

})(jQuery);

eva_media_init = evaAdminModule.mediaInit;

jQuery(document).ready(function() {
    evaAdminModule.init();
});
