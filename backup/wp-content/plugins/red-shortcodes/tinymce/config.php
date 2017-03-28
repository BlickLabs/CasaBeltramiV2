<?php

$red_theme_name = wp_get_theme();


/*-----------------------------------------------------------------------------------*/
/*	List Posts Config
/*-----------------------------------------------------------------------------------*/


//allow possibility to overite/extend the shortcode parameters from the theme, 
// if you want to to change the default behaviour for list-posts shortcode, you need to create a function 
// in your theme/plugin called 'red_set_list_posts_shortcode', the function should return an array in hte same form as the one bellow

if(function_exists('red_set_list_posts_shortcode')){
	$red_shortcodes['list-posts'] = red_set_list_posts_shortcode();
}else{



	$red_shortcodes['list-posts'] = array(
		'no_preview' => true,
		'params' => array(

			
			'post_type' => array(
				'type' => 'select',
				'label' => __('Post type', 'textdomain'),
				'desc' => __('Select the post type you want to be displayed', 'textdomain'),
				'options' => red_get_post_types()
			),
			'taxonomy' => array(
				'type' => 'select',
				'label' => __('Taxonomy', 'textdomain'),
				'desc' => __('Select All to retrieve all the posts, or you can select a taxonomy beloging to a post type selected above.', 'textdomain'),
				'options' =>  array( ''=>__('All','textdomain'), 'category'=>'category', 'post_tag' => 'post_tag') // by default we show onlt taxonomies for the 'post' type
			),
			'term_name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Term name ', 'textdomain'),
				'desc' => __('If taxonomy parameter is not set to All, then you should set here the name of the term from which you want to retrieve the posts. For example if "category" is selected as taxonomy, you can type here "uncategorized" to get posts from that category.', 'textdomain'),
				
			),
			'view_type' => array(
				'type' => 'select',
				'label' => __('View type', 'textdomain'),
				'desc' => '',
				'options' => red_get_view_types(),
				'action' => "actionSelect( '#red_view_type' , { 'red-list-view' : '.number-columns' } , 'hs_' );" // we want to show/hide the row with class '.number-columns' when the selected value is changed
			),
			'number_columns' => array(
				'type' => 'select',
				'label' => __('Number of columns', 'textdomain'),
				'desc' => '',
				'class' => ' number-columns ', // additional class to settings row, this class is used to show/hide this settings depending on view type value
				'hide_default' => true,        // we want to hide this option by default, because we need it only for grid and thumb view, and by default we have list view
				'options' => array(
								'1'=>1,
								'2'=>2,
								'3'=>3,
						    	'4'=>4
						    )
			),
			'number_posts' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Number of posts', 'textdomain'),
				'desc' => ''
			),
			
			'pagination' => array(
				'type' => 'select',
				'label' => __('Pagination', 'textdomain'),
				'desc' => 'Select your pagination type: pages or carousel',
				'options' => array(
								'none'=>__('None', 'textdomain'),
								'pagination'=>__('Enable pagination', 'textdomain')
						    )
			),
			
			'orderby' => array(
				'type' => 'select',
				'label' => __('Order by', 'textdomain'),
				'options' => red_get_order_by_options(),
				'desc' => ''
			),
			'order' => array(
				'type' => 'select',
				'label' => __('Order', 'textdomain'),
				'desc' => '',
				'options' => array(
								'DESC'=>__('Descending','textdomain'),
						    	'ASC'=>__('Ascending','textdomain')
						    )
			),

			
		),
		'shortcode' => '[red_list_posts 
							post_type="{{post_type}}" 
							taxonomy="{{taxonomy}}" 
							term_name="{{term_name}}" 
							view_type="{{view_type}}" 
							number_columns="{{number_columns}}" 
							number_posts="{{number_posts}}" 
							orderby="{{orderby}}" 
							order="{{order}}"
	 						pagination="{{pagination}}"
							]
						[/red_list_posts]',
		'popup_title' => __('Insert List Posts Shortcode', 'textdomain')
	);
}


if(function_exists('red_set_featured_area_shortcode')){
	$red_shortcodes['featured-area'] = red_set_featured_area_shortcode();
}else{



	$red_shortcodes['featured-area'] = array(
		'no_preview' => true,
		'params' => array(

			
			'post_type' => array(
				'type' => 'select',
				'label' => __('Post type', 'textdomain'),
				'desc' => __('Select the post type you want to be displayed', 'textdomain'),
				'options' => red_get_post_types()
			),
			'taxonomy' => array(
				'type' => 'select',
				'label' => __('Taxonomy', 'textdomain'),
				'desc' => __('Select All to retrieve all the posts, or you can select a taxonomy beloging to a post type selected above.', 'textdomain'),
				'options' =>  array( ''=>__('All','textdomain'), 'category'=>'category', 'post_tag' => 'post_tag') // by default we show onlt taxonomies for the 'post' type
			),
			'term_name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Term name ', 'textdomain'),
				'desc' => __('If taxonomy parameter is not set to All, then you should set here the name of the term from which you want to retrieve the posts. For example if "category" is selected as taxonomy, you can type here "uncategorized" to get posts from that category.', 'textdomain'),
				
			),
			
			'orderby' => array(
				'type' => 'select',
				'label' => __('Order by', 'textdomain'),
				'options' => red_get_order_by_options(),
				'desc' => ''
			),
			'order' => array(
				'type' => 'select',
				'label' => __('Order', 'textdomain'),
				'desc' => '',
				'options' => array(
								'DESC'=>__('Descending','textdomain'),
						    	'ASC'=>__('Ascending','textdomain')
						    )
			),

			
		),
		'shortcode' => '[red_featured_area 
							post_type="{{post_type}}" 
							taxonomy="{{taxonomy}}" 
							term_name="{{term_name}}" 
							orderby="{{orderby}}" 
							order="{{order}}"
							]
						[/red_featured_area]',
		'popup_title' => __('Insert Featured area Shortcode', 'textdomain')
	);
}


if(function_exists('red_set_featured_slider_shortcode')){
	$red_shortcodes['featured-slider'] = red_set_featured_slider_shortcode();
}else{



	$red_shortcodes['featured-slider'] = array(
		'no_preview' => true,
		'params' => array(

			
			'post_type' => array(
				'type' => 'select',
				'label' => __('Post type', 'textdomain'),
				'desc' => __('Select the post type you want to be displayed', 'textdomain'),
				'options' => red_get_post_types()
			),
			'taxonomy' => array(
				'type' => 'select',
				'label' => __('Taxonomy', 'textdomain'),
				'desc' => __('Select All to retrieve all the posts, or you can select a taxonomy beloging to a post type selected above.', 'textdomain'),
				'options' =>  array( ''=>__('All','textdomain'), 'category'=>'category', 'post_tag' => 'post_tag') // by default we show onlt taxonomies for the 'post' type
			),
			'term_name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Term name ', 'textdomain'),
				'desc' => __('If taxonomy parameter is not set to All, then you should set here the name of the term from which you want to retrieve the posts. For example if "category" is selected as taxonomy, you can type here "uncategorized" to get posts from that category.', 'textdomain'),
				
			),
			
			'orderby' => array(
				'type' => 'select',
				'label' => __('Order by', 'textdomain'),
				'options' => red_get_order_by_options(),
				'desc' => ''
			),
			'order' => array(
				'type' => 'select',
				'label' => __('Order', 'textdomain'),
				'desc' => '',
				'options' => array(
								'DESC'=>__('Descending','textdomain'),
						    	'ASC'=>__('Ascending','textdomain')
						    )
			),

			
		),
		'shortcode' => '[red_featured_slider 
							post_type="{{post_type}}" 
							taxonomy="{{taxonomy}}" 
							term_name="{{term_name}}" 
							orderby="{{orderby}}" 
							order="{{order}}"
							]
						[/red_featured_slider]',
		'popup_title' => __('Insert Featured slider Shortcode', 'textdomain')
	);
}

if( $red_theme_name->Name == 'Photoform' ){
	if(function_exists('red_set_red_gallery_post_shortcode')){
		$red_shortcodes['gallery-post'] = red_set_red_gallery_post_shortcode();
	}else{



		$red_shortcodes['gallery-post'] = array(
			'no_preview' => true,
			'params' => array(

				
				'post_id' => array(
					'type' => 'select',
					'label' => __('Gallery post', 'textdomain'),
					'desc' => __('Select the gallery post you want to be displayed', 'textdomain'),
					'options' => red_get_gallery_posts()
				),
				'gallery_layout' => array(
					'type' => 'select',
					'label' => __('Gallery layout', 'textdomain'),
					'desc' => __('Choose the layout for your gallery.', 'textdomain'),
					'options' =>  array( 'scroll'=>__('Horizontal scroll','textdomain'), 'grid'=>'Grid masonry', 'justified' => 'Justified gallery', 'slider' => 'Horizontal slider', 'list' => 'List image gallery', 'fotorama' => 'Slider with thumbnails below') // by default we show onlt taxonomies for the 'post' type
				)
			),
			'shortcode' => '[red_gallery_post 
								post_id="{{post_id}}" 
								gallery_layout="{{gallery_layout}}" 
								]
							[/red_gallery_post]',
			'popup_title' => __('Insert Gallery post Shortcode', 'textdomain')
		);
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Team shortcode
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['team_member'] = array(
	'no_preview' => true,
	'params' => array(
		'image_url' => array(
				'std' => '',
				'type' => 'image',
				'label' => __('Image', 'textdomain'),
				'desc' => ''
			),
		'name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Name', 'textdomain'),
				'desc' => ''
			),
		'job' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Job position', 'textdomain'),
				'desc' => ''
			),
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Description', 'textdomain'),
			'desc' => ''
		),
		'social' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Social media', 'textdomain'),
			'desc' => __('Enter any social media links with a comma separated list. e.g. Facebook,http://facebook.com <br/> Twitter,http://twitter.com. <br/>Each profile account should be in a new line, and do not use any spaces between social service name and its link.', 'textdomain')
		)
		
	),
	'shortcode' => '[red_team_member image_url="{{image_url}}" name="{{name}}" job="{{job}}" description="{{description}}" social="{{social}}"  ]',
	'popup_title' => __('Insert Team Member Shortcode', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Team shortcode
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['red_feature'] = array(
	'no_preview' => true,
	'params' => array(
		'image_url' => array(
				'std' => '',
				'type' => 'image',
				'label' => __('Image', 'textdomain'),
				'desc' => ''
			),
		'title' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Title', 'textdomain'),
				'desc' => ''
			),
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Description', 'textdomain'),
			'desc' => ''
		)
		
	),
	'shortcode' => '[red_feature image_url="{{image_url}}" title="{{title}}" description="{{description}}"  ]',
	'popup_title' => __('Insert feature Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Box shortcode
/*-----------------------------------------------------------------------------------*/

if(function_exists('red_set_box_shortcode')){
	$red_shortcodes['box'] = red_set_box_shortcode();
}else{
	$red_shortcodes['box'] = array(
				'no_preview' => true,
				'params' => array(
					
					'box_bg_color' => array(
							'std' => '#fff',
							'type' => 'colorpicker',
							'label' => __('Background color', 'textdomain'),
							'desc' => ''
						),
					'box_text_color' => array(
							'std' => '#000',
							'type' => 'colorpicker',
							'label' => __('Text color', 'textdomain'),
							'desc' => ''
						),
					'content_width' => array(
						'type' => 'select',
						'label' => __('Content width', 'redcodn'),
						'desc' => __('You will notice the difference only if the shortcode is used in a page using "Full width" template page.', 'redcodn'),
						'options' => array(
										'1140px'=>'1140px',
								    	'100%'=>'100%'
								    )
					),
					'padding_sides' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Left and right paddings', 'redcodn'),
						'desc' => __('This padding will be added to the left and right side of the box', 'redcodn'),
					),
					'padding_top_bottom' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Top and bottom paddings', 'redcodn'),
						'desc' => __('This padding will be added to the top and bottom of the box', 'redcodn'),
					),
					'content_align' => array(
						'type' => 'select',
						'label' => __('Content align', 'redcodn'),
						'desc' => __('Your content wil be aligned according to this option', 'redcodn'),
						'options' => array(
										'left'=>'Left',
								    	'center'=>'Center',
								    	'right'=>'Right'
								    )
					),
					
					
				),
				'shortcode' => '[red_box box_bg_color="{{box_bg_color}}" box_text_color="{{box_text_color}}" content_width="{{content_width}}" padding_sides="{{padding_sides}}" padding_top_bottom="{{padding_top_bottom}}" content_align="{{content_align}}" ]'.__('Add your content here','textdomain').'[/red_box]',
				'popup_title' => __('Insert Box Shortcode', 'textdomain')
			);
}

/*-----------------------------------------------------------------------------------*/
/*	Banner box shortcode
/*-----------------------------------------------------------------------------------*/

if(function_exists('red_set_banner_box_shortcode')){
	$red_shortcodes['banner'] = red_set_banner_box_shortcode();
}else{
	$red_shortcodes['banner'] = array(
				'no_preview' => true,
				'params' => array(
					
					'box_bg_color' => array(
							'std' => '#fff',
							'type' => 'colorpicker',
							'label' => __('Background color', 'textdomain'),
							'desc' => ''
						),
					'box_image' => array(
							'std' => '#fff',
							'type' => 'image',
							'label' => __('Background image', 'textdomain'),
							'desc' => ''
						),
					'box_text_color' => array(
							'std' => '#000',
							'type' => 'colorpicker',
							'label' => __('Text color', 'textdomain'),
							'desc' => ''
						),
					'padding_sides' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Left and right paddings', 'redcodn'),
						'desc' => __('This padding will be added to the left and right side of the box', 'redcodn'),
					),
					'padding_top_bottom' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Top and bottom paddings', 'redcodn'),
						'desc' => __('This padding will be added to the top and bottom of the box', 'redcodn'),
					),
					'headline' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Please set the headline here', 'redcodn'),
						'desc' => __('This will be used for the big text', 'redcodn'),
					),
					'button' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Button text', 'redcodn'),
						'desc' => __('This will set the text of the button under the headline', 'redcodn'),
					),
					'url' => array(
						'std' => '0',
						'type' => 'text',
						'label' => __('Please insert URL for the button', 'redcodn'),
						'desc' => __('Where do you want the button to go on click', 'redcodn'),
					),
					'content_align' => array(
						'type' => 'select',
						'label' => __('Content align', 'redcodn'),
						'desc' => __('Your content wil be aligned according to this option', 'redcodn'),
						'options' => array(
										'left'=>'Left',
								    	'center'=>'Center',
								    	'right'=>'Right'
								    )
					),
					
					
				),
				'shortcode' => '[red_banner_box box_image="{{box_image}}" box_bg_color="{{box_bg_color}}" box_text_color="{{box_text_color}}" padding_sides="{{padding_sides}}" padding_top_bottom="{{padding_top_bottom}}" content_align="{{content_align}}" headline="{{headline}}" button="{{button}}" url="{{url}}"][/red_banner_box]',
				'popup_title' => __('Insert Banner Box Shortcode', 'textdomain')
			);
}

/*-----------------------------------------------------------------------------------*/
/*	Spacer shortcode
/*-----------------------------------------------------------------------------------*/

if(function_exists('red_set_spacer_shortcode')){
	$red_shortcodes['red_spacer'] = red_set_spacer_shortcode();
}else{
	$red_shortcodes['spacer'] = array(
		'no_preview' => true,
		'params' => array(
			
			'spacer_margin' => array(
					'std' => '30',
					'type' => 'text',
					'label' => __('Spacing height', 'textdomain'),
					'desc' => ''
				)
			
			
		),
		'shortcode' => '[red_spacer spacer_margin="{{spacer_margin}}"]'.__('','textdomain').'[/red_spacer]',
		'popup_title' => __('Insert spacer Shortcode', 'textdomain')
	);
}


/*-----------------------------------------------------------------------------------*/
/*	Skills shortcode
/*-----------------------------------------------------------------------------------*/

if(function_exists('red_set_skill_shortcode')){
	$red_shortcodes['red_skill'] = red_set_skill_shortcode();
}else{
	$red_shortcodes['skill'] = array(
		'no_preview' => true,
		'params' => array(
			
			'skill_title' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Skill title', 'textdomain'),
					'desc' => 'The name of the skill you want to add'
				),
			'skill_percentage' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Skill percentage', 'textdomain'),
					'desc' => 'The percentage of the skill of 100.'
				)
			
			
		),
		'shortcode' => '[red_skill skill_title="{{skill_title}}" skill_percentage="{{skill_percentage}}"]'.__('','textdomain').'[/red_skill]',
		'popup_title' => __('Insert skill Shortcode', 'textdomain')
	);
}

/*-----------------------------------------------------------------------------------*/
/*	Title shortcode
/*-----------------------------------------------------------------------------------*/

if(function_exists('red_set_title_shortcode')){
	$red_shortcodes['red_title'] = red_set_title_shortcode();
}else{
	$red_shortcodes['title'] = array(
		'no_preview' => true,
		'params' => array(
			
			'title' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Title', 'textdomain'),
					'desc' => ''
				),
			'subtitle' => array(
					'std' => '',
					'type' => 'text',
					'label' => __('Subtitle', 'textdomain'),
					'desc' => ''
				),
			'style' => array(
				'type' => 'select',
				'label' => __('Title style', 'redcodn'),
				'desc' => __('Change this to get different types of titles', 'redcodn'),
				'options' => array(
								'red-title-ultra'=>'Big title',
								'red-title-lines'=>'Titles with top and bottom line',
								'red-title-centered'=>'Centered title'
						    )
			),
			
			
		),
		'shortcode' => '[red_title title="{{title}}" subtitle="{{subtitle}}" style="{{style}}" ]'.__('','textdomain').'[/red_title]',
		'popup_title' => __('Insert title Shortcode', 'textdomain')
	);
}

/*-----------------------------------------------------------------------------------*/
/*	CONTACT FORM shortcode
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['contact_form'] = array(
	'no_preview' => true,
	'params' => array(
		
		'email' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Email', 'textdomain'),
				'desc' => __('Add here the email address where the messages will be sent.', 'textdomain')
			),
		
		
	),
	'shortcode' => '[red_contact_form  email={{email}} ]',
	'popup_title' => __('Insert Contact Form Shortcode', 'textdomain')
);
/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'textdomain'),
			'desc' => __('Add the button\'s url eg http://example.com', 'textdomain')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'textdomain'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'textdomain'),
			'options' => array(
				'grey' => 'Grey',
				'black' => 'Black',
				'green' => 'Green',
				'light-blue' => 'Light Blue',
				'blue' => 'Blue',
				'red' => 'Red',
				'orange' => 'Orange',
				'purple' => 'Purple',
				'white' => 'White'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'textdomain'),
			'desc' => __('Select the button\'s size', 'textdomain'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'textdomain'),
			'desc' => __('Select the button\'s type', 'textdomain'),
			'options' => array(
				'round' => 'Round',
				'square' => 'Square'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'textdomain'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'textdomain'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'textdomain'),
			'desc' => __('Add the button\'s text', 'textdomain'),
		)
	),
	'shortcode' => '[red_button url="{{url}}" style="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/red_button]',
	'popup_title' => __('Insert Button Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'textdomain'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'textdomain'),
			'options' => array(
				'white' => 'White',
				'grey' => 'Grey',
				'red' => 'Red',
				'yellow' => 'Yellow',
				'green' => 'Green'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'textdomain'),
			'desc' => __('Add the alert\'s text', 'textdomain'),
		)
		
	),
	'shortcode' => '[red_alert style="{{style}}"] {{content}} [/red_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'textdomain'),
			'desc' => __('Add the title that will go above the toggle content', 'textdomain'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'textdomain'),
			'desc' => __('Add the toggle content. Will accept HTML', 'textdomain'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'textdomain'),
			'desc' => __('Select the state of the toggle on page load', 'textdomain'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[red_toggle title="{{title}}" state="{{state}}"] {{content}} [/red_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[red_tabs] {{child_shortcode}}  [/red_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'textdomain'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'textdomain'),
                'desc' => __('Title of the tab', 'textdomain'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'textdomain'),
                'desc' => __('Add the tabs content', 'textdomain')
            )
        ),
        'shortcode' => '[red_tab title="{{title}}"] {{content}} [/red_tab]',
        'clone_button' => __('Add Tab', 'textdomain')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$red_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'textdomain'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'red_one_third' => 'One Third',
					'red_one_third_last' => 'One Third Last',
					'red_two_third' => 'Two Thirds',
					'red_two_third_last' => 'Two Thirds Last',
					'red_one_half' => 'One Half',
					'red_one_half_last' => 'One Half Last',
					'red_one_fourth' => 'One Fourth',
					'red_one_fourth_last' => 'One Fourth Last',
					'red_three_fourth' => 'Three Fourth',
					'red_three_fourth_last' => 'Three Fourth Last',
					'red_one_fifth' => 'One Fifth',
					'red_one_fifth_last' => 'One Fifth Last',
					'red_two_fifth' => 'Two Fifth',
					'red_two_fifth_last' => 'Two Fifth Last',
					'red_three_fifth' => 'Three Fifth',
					'red_three_fifth_last' => 'Three Fifth Last',
					'red_four_fifth' => 'Four Fifth',
					'red_four_fifth_last' => 'Four Fifth Last',
					'red_one_sixth' => 'One Sixth',
					'red_one_sixth_last' => 'One Sixth Last',
					'red_five_sixth' => 'Five Sixth',
					'red_five_sixth_last' => 'Five Sixth Last'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'textdomain'),
				'desc' => __('Add the column content.', 'textdomain'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'textdomain')
	)
);

?>