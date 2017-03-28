

jQuery(document).on('change', '#red_post_type', function() {
    
    var post_type = jQuery(this).val();

    jQuery.ajax({
        url: ajaxurl,
        data: '&action=get_c_post_tax&post_type='+post_type+'&ajaxTaxNonce='+ajaxTaxNonce,
        type: 'POST',
        cache: false,
        success: function (content) { 
            
            if(content.length){
                jQuery('#red_taxonomy option').each(function(){
                    
                    jQuery(this).remove(); // remove current select options
                });

                jQuery('#red_taxonomy').append(content); // add the options returned via ajax
    
            }
            
        },
        error: function (xhr) {
            console.log(xhr);
        }
    });

});


function actionCheck(selector, args, type) {

	jQuery(document).ready(function () {
        if (type == 'hs') {
            if (jQuery(selector).is(':checked')) {

                for (var key in args) { console.log(args[ key ]);
                    if (args.hasOwnProperty(key)) {
                        if (jQuery(selector).val().trim() == key) {
                            jQuery(args[ key ]).hide();
                        } else {
                            jQuery(args[ key ]).show();
                        }
                    }
                }
            }
        }

        if (type == 'sh') {
            if (jQuery(selector).is(':checked')) {
                for (var key in args) {
                    if (args.hasOwnProperty(key)) {
                        if (jQuery(selector).val().trim() == key) {
                            jQuery(args[ key ]).show();
                        } else {
                            jQuery(args[ key ]).hide();
                        }
                    }
                }
            }
        }

	});
}

function actionSelect(selector, args, type) {
    jQuery(document).ready(function () {
        jQuery('option', jQuery('select' + selector)).each(function (i) {
        	
            if (type == 'hs') {
            	
                if (jQuery(this).is(':selected')) {
                	
                    for (var key in args) { 

                    	console.log(jQuery('args[ key ]').length);
                        
                        if (args.hasOwnProperty(key)) {

                            if (jQuery(this).val().trim() == key) {
                                jQuery(args[ key ]).hide();
                            } else {
                                jQuery(args[ key ]).show();
                            }
                        }
                    }
                }
            }

            if (type == 'sh') {
            	
                if (jQuery(this).is(':selected')) {
                	
                    for (var key in args) {
                        if (args.hasOwnProperty(key)) {
                            if (jQuery(this).val().trim() == key) {
                                jQuery(args[ key ]).show();
                            } else {
                                jQuery(args[ key ]).hide();
                            }
                        }
                    }
                }
            }

            if (type == 'sh_') {
                var show = '';
                var show_ = '';
                if (jQuery(this).is(':selected')) {
                    for (var key in args) {
                        if (args.hasOwnProperty(key)) {

                            if (jQuery(this).val().trim() == key) {
                                show = args[ key ];
                            } else {
                                if (key == 'else') {
                                    show_ = args[ key ];
                                }
                                jQuery(args[ key ]).hide();
                            }
                        }
                    }

                    if (show == '') {
                        jQuery(show_).show();
                    } else {
                        jQuery(show).show();
                    }
                }
            }

            if (type == 'hs_') {
                var hide = '';
                if (jQuery(this).is(':selected')) {
                    for (var key in args) {
                        if (args.hasOwnProperty(key)) {

                            if (jQuery(this).val().trim() == key) {
                                hide = args[ key ];
                            } else {
                                jQuery(args[ key ]).show();
                            }
                        }
                    }

                    jQuery(hide).hide();
                }
            }

            
        });
    });
}