jQuery(document).ready(function($){   
    tinymce.PluginManager.add('advanced_post_carousel_button', function(editor, url) {
            editor.addButton('advanced_post_carousel_button', {
                title : 'Advanced Post Carousel',
                //image : url+'/../images/shortcode-icon.png',
                onclick : function() {
                    var width = jQuery(window).width(), height = jQuery(window).height(), 
                    effectiveWidth = ( 720 < width ) ? 750 : width - 50;
                    effectiveheight = height - 150;
                                    
                    tb_show('Advanced Post Carousel','admin-ajax.php?action=advanced_post_carousel_shortcode_generator&width=' + effectiveWidth + '&height=' + effectiveheight );
               }
            });        
    });
});