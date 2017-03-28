(function ()
{
	// create redShortcodes plugin
	tinymce.create("tinymce.plugins.redShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("redPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert red Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "red_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('red_button', {
                    title: "Insert red Shortcode",
					image: redShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });
                btn.onRenderMenu.add(function (c, b)
				{	
					a.addWithPopup( b, "Content Box", "box" );
					a.addWithPopup( b, "Banner Box", "banner" );
					a.addWithPopup( b, "List posts", "list-posts" );
					if( red_theme_name == 'Tempest' ){
						a.addWithPopup( b, "Featured area", "featured-area" );
						a.addWithPopup( b, "Featured post slider", "featured-slider" );
					}
					if( red_theme_name == 'Photoform' ){
						a.addWithPopup( b, "Gallery post", "gallery-post" );
					}
					a.addWithPopup( b, "Team member", "team_member" );	
					a.addWithPopup( b, "Feature", "red_feature" );	
					a.addWithPopup( b, "Contact form", "contact_form" );				
					a.addWithPopup( b, "Spacer", "spacer" );
					a.addWithPopup( b, "Title", "title" );
					a.addWithPopup( b, "Skill", "skill" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Toggle", "toggle" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("redPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		} 
	});
	
	// add redShortcodes plugin
	tinymce.PluginManager.add("redShortcodes", tinymce.plugins.redShortcodes);
})();