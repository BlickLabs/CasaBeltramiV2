jQuery(document).ready(function($) {

	$(".red-tab-inner").tabs();
	
	$(".red-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.red-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.red-toggle-title', collapsible: true});
		}
	});
	
	
});

function red_send_mail( form, container){
	jQuery('#red-name').removeClass('invalid'); 
    jQuery('#red-email').removeClass('invalid'); 
    
    jQuery(container).html('');

	jQuery.ajax({
	    url: ajaxurl,
	    data: '&action=red_send_contact&'+jQuery( form ).serialize(),
	    type: 'POST',
	    dataType: "json",
	    cache: false,
	      success: function (json) {

	      	if(json.contact_name ){
	      		jQuery('#red-name').addClass('invalid'); 
	      		jQuery(container).append(json.contact_name);
	      	}

	      	if(json.contact_email ){
	      		jQuery('#red-email').addClass('invalid'); 
	      		jQuery(container).append(json.contact_email);
	      	}

	      	if(json.message ){
	      		jQuery(container).append(json.message);
	      	}
	        

	        
	    }
    });
    
}