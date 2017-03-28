
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var reds = {
    	loadVals: function()
    	{
            var shortcode = $('#_red_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.red-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('red_', ''),		// gets rid of the red_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_red_ushortcode').remove();
    		$('#red-sc-form-table').prepend('<div id="_red_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_red_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.red-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('red_', '')		// gets rid of the red_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_red_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_red_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_red_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_red_ushortcode').remove();
    		$('#red-sc-form-table').prepend('<div id="_red_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				redPopup = $('#red-popup');

            tbWindow.css({
                height: redPopup.outerHeight() + 50,
                width: redPopup.outerWidth(),
                marginLeft: -(redPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				width: redPopup.outerWidth()
			});
			
			$('#red-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	reds = this,
    			popup = $('#red-popup'),
    			form = $('#red-sc-form', popup),
    			shortcode = $('#_red_shortcode', form).text(),
    			popupType = $('#_red_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		reds.resizeTB();
    		$(window).resize(function() { reds.resizeTB() });
    		
    		// initialise
    		reds.loadVals();
    		reds.children();
    		reds.cLoadVals();
    		
    		// update on children value change
    		$('.red-cinput', form).live('change', function() {
    			reds.cLoadVals();
    		});
    		
    		// update on value change
    		$('.red-input', form).change(function() {
    			reds.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.red-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_red_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#red-popup').livequery( function() { reds.load(); } );
});