jQuery(document).ready(function(){
    /* show images inserted in gallery */
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
            autoplay_slideshow: false,
            theme: 'light_rounded',
            social_tools:false,
            deeplinking: false 
    });

    /* show images inserted into post in LightBox */
    jQuery("[class*='wp-image-']").parents('a').prettyPhoto({
            autoplay_slideshow: false,
            theme: 'light_rounded',
            social_tools:false,
            deeplinking: false 
    });
});