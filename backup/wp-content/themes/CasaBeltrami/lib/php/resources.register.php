<?php
    $sidebar_value = extra::select_value( '_sidebar' );

    if(!( is_array( $sidebar_value ) || !empty( $sidebar_value ) ) ){
        $sidebar_value = array();
    }

    /* hide if is full width */
    $classes = 'sidebar_list';

    if( isset( $_GET['post'] ) ){
        $meta = meta::get_meta( (int) $_GET['post'] , 'layout' );

        if( isset( $meta['type'] ) && $meta['type'] == 'full' ){
            $classes = 'sidebar_list hidden';
        }
    }

    $position = array( 'left' => __( 'Align Left' , 'redcodn' ) , 'right' => __( 'Align Right' , 'redcodn' ) );

    $video_permalink = options::get_value( 'general' , 'video_link' );
    if (!$video_permalink) {
        $video_permalink = 'video';
    }

    /* post type Video */
    $res['video']['labels'] = array(
        'name' => _x('Videos', 'post type general name','redcodn'),
        'singular_name' => _x('Video', 'post type singular name','redcodn'),
        'add_new' => _x('Add New', __('Video','redcodn')),
        'add_new_item' => __('Add New Video','redcodn'),
        'edit_item' => __('Edit Video','redcodn'),
        'new_item' => __('New Video','redcodn'),
        'view_item' => __('View Video','redcodn'),
        'search_items' => __('Search Video','redcodn'),
        'not_found' =>  __('Nothing found','redcodn'),
        'not_found_in_trash' => __('Nothing found in Trash','redcodn')
    );
    $res['video']['args'] = array(
        'menu_icon' => get_template_directory_uri() . '/lib/images/custom.video.png',
        'public' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => $video_permalink, 'with_front' => true ),
        'menu_position' => 7,
        'supports' => array('title','editor','thumbnail'),
        '__on_front_page' => true
    );

    


    $gallery_permalink = options::get_value( 'general' , 'gallery_link' );
    if (!$gallery_permalink) {
        $gallery_permalink = 'gallery';
    }

    /* post type Gallery */
    $res['gallery']['labels'] = array(
        'name' => _x('Galleries', 'post type general name','redcodn'),
        'singular_name' => _x('Gallery', 'post type singular name','redcodn'),
        'add_new' => _x('Add New', __('Gallery','redcodn')),
        'add_new_item' => __('Add New Gallery','redcodn'),
        'edit_item' => __('Edit Gallery','redcodn'),
        'new_item' => __('New Gallery','redcodn'),
        'view_item' => __('View Gallery','redcodn'),
        'search_items' => __('Search Gallery','redcodn'),
        'not_found' =>  __('Nothing found','redcodn'),
        'not_found_in_trash' => __('Nothing found in Trash','redcodn')
    );
    $res['gallery']['args'] = array(
        'menu_icon' => get_template_directory_uri() . '/lib/images/custom.gallery.png',
        'public' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => $gallery_permalink, 'with_front' => true ),
        'menu_position' => 7,
        'supports' => array('title','editor','thumbnail'),
        '__on_front_page' => true
    );

    /* box for gallery */

    resources::$labels['gallery']         = $res['gallery']['labels'];
    resources::$type['gallery']           = $res['gallery']['args'];
    //resources::$box['gallery']            = $box['gallery'];

    $portfolio_permalink = options::get_value( 'general' , 'portfolio_link' );
    if (!$portfolio_permalink) {
        $portfolio_permalink = 'portfolio';
    }

    /* post type portfolio */
    $res['portfolio']['labels'] = array(
        'name' => _x('Portfolios', 'post type general name','redcodn'),
        'singular_name' => _x('Portfolio', 'post type singular name','redcodn'),
        'add_new' => _x('Add New', __('portfolio','redcodn')),
        'add_new_item' => __('Add new portfolio','redcodn'),
        'edit_item' => __('Edit portfolio','redcodn'),
        'new_item' => __('New portfolio','redcodn'),
        'view_item' => __('View portfolio','redcodn'),
        'search_items' => __('Search portfolio','redcodn'),
        'not_found' =>  __('Nothing found','redcodn'),
        'not_found_in_trash' => __('Nothing found in Trash','redcodn')
    );
    $res['portfolio']['args'] = array(
        'menu_icon' => get_template_directory_uri() . '/lib/images/custom.portfolio.png',
        'public' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => $portfolio_permalink, 'with_front' => true ),
        'menu_position' => 7,
        'supports' => array('title','editor','thumbnail','comments'),
        '__on_front_page' => true
    );


    /* portfolio post */
    $form['portfolio']['layout']['type']         = array( 'type' => 'sh--select' , 'label' =>  __( 'Select layout type' , 'redcodn' ) , 'value' => array( 'right' => __( 'Right Sidebar'  , 'redcodn' ) , 'left' => __( 'Left Sidebar' , 'redcodn' ) , 'full' => __( 'Full Width' , 'redcodn' )  ) , 'action' => "act.select( '#post_layout' , { 'full' : '.sidebar_list' } , 'hs_');" , 'id' => 'post_layout' , 'ivalue' =>  options::get_value( 'layout' , 'single' ) );
    $form['portfolio']['layout']['sidebar']      = array( 'type' => 'sh--select' , 'label' =>  __( 'Select sidebar' , 'redcodn' ) , 'value' => $sidebar_value , 'classes' => $classes );
    $form['portfolio']['layout']['link']         = array( 'type' => 'sh--link' , 'url' => 'admin.php?page=redcodn___sidebar' , 'title' => __( 'Add new Sidebar' , 'redcodn' ) );

    if( options::get_value( 'layout' , 'single' ) == 'full' ){
        $form['portfolio']['layout']['sidebar']['classes'] = $classes . ' hidden';
        $form['portfolio']['layout']['link']['classes'] = $classes .' hidden';
    }  


    $form['portfolio']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show portfolio meta' , 'redcodn' ) , 'hint' => __( 'Show portfolio meta on this portfolio' , 'redcodn' ) , 'cvalue' => 'yes', 'action' => "act.check( this , { 'yes' : '.meta_view'  } , 'sh');" );
        if (isset($_GET['portfolio']) && is_admin()) {
            $settings = meta::get_meta( $_GET['portfolio'] , 'settings' );

            if(isset($settings['meta']) && $settings['meta'] == 'yes'){
                $form['portfolio']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show portfolio love' , 'redcodn' ) , 'hint' => __( 'Show portfolio love on this portfolio' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
            }else{
                $form['portfolio']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view hidden', 'label' => __( 'Show portfolio love' , 'redcodn' ) , 'hint' => __( 'Show portfolio love on this portfolio' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
            }
        } elseif(!isset($_GET['portfolio']) && is_admin()){
            $form['portfolio']['settings']['love']                 = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show portfolio love' , 'redcodn' ) , 'hint' => __( 'Show portfolio love on this portfolio' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }

        $form['portfolio']['settings']['sharing']              = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show social sharing' , 'redcodn' ) , 'hint' => __( 'Show social sharing on this portfolio'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_portfolio' , 'portfolio_sharing' ) );
        $form['portfolio']['settings']['author_box']           = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show author box' , 'redcodn' ) , 'hint' => __( 'Show author box on this portfolio'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_portfolio' , 'author_box' ) );

        $form['portfolio']['settings']['portfolio_bg']              = array( 'type' => 'st--upload' , 'label' => __( 'Upload or choose image from media library' , 'redcodn') , 'id' => 'portfolio_background' , 'hint' => __( 'This will be the background image for this portfolio' , 'redcodn' ) );
        $form['portfolio']['settings']['position']             = array( 'type' => 'st--select' , 'label' => __( 'Image background position' , 'redcodn' ) , 'value' => array( 'left' => __( 'Left' , 'redcodn' ) , 'center' => __( 'Center' , 'redcodn' ) , 'right' => __( 'Right' , 'redcodn' ) ) );
        $form['portfolio']['settings']['repeat']               = array( 'type' => 'st--select' , 'label' => __( 'Image background repeat' , 'redcodn' ) , 'value' => array( 'no-repeat' => __( 'No Repeat' , 'redcodn' ) , 'repeat' => __( 'Tile' , 'redcodn' ) , 'repeat-x' => __( 'Tile Horizontally' , 'redcodn' ) , 'repeat-y' => __( 'Tile Vertically' , 'redcodn' ) ) );
        $form['portfolio']['settings']['attachment']           = array( 'type' => 'st--select' , 'label' => __( 'Image background attachment type' , 'redcodn' ) , 'value' => array( 'scroll' => __( 'Scroll' , 'redcodn' ) , 'fixed' => __( 'Fixed' , 'redcodn' ) ) );
        $form['portfolio']['settings']['color']                = array( 'type' => 'st--color-picker' , 'label' => __( 'Set background color for this portfolio' , 'redcodn' ) );

    $box['portfolio']['layout']                  = array( __('Layout and Sidebars' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['portfolio']['layout'] , 'box' => 'layout' , 'update' => true  );
    $box['portfolio']['settings']                = array( __('Post Settings' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['portfolio']['settings'] , 'box' => 'settings' , 'update' => true  );

    /* box for portfolio */

    resources::$labels['portfolio']         = $res['portfolio']['labels'];
    resources::$type['portfolio']           = $res['portfolio']['args'];
    resources::$box['portfolio']            = $box['portfolio'];



    function rc_portfolio_updated_messages( $messages ) {
      global $post, $post_ID;

      $messages['portfolio'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => sprintf( __('Portfolio Item updated. <a href="%s">View Portfolio Item</a>', 'redcodn'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.', 'redcodn'),
        3 => __('Custom field deleted.', 'redcodn'),
        4 => __('Portfolio Item updated.', 'redcodn'),
        /* translators: %s: date and time of the revision */
        5 => isset($_GET['revision']) ? sprintf( __('Slider restored to revision from %s', 'redcodn'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Portfolio Item published. <a href="%s">View Portfolio Item</a>', 'redcodn'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Portfolio Item saved.', 'redcodn'),
        8 => sprintf( __('Portfolio Item submitted. <a target="_blank" href="%s">Preview Portfolio Item</a>', 'redcodn'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Portfolio Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio Item</a>', 'slider'),
          // translators: Publish box date format, see http://php.net/date
          date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Portfolio Item draft updated. <a target="_blank" href="%s">Preview Portfolio Item</a>', 'redcodn'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      );

      return $messages;
    }

    add_filter( 'post_updated_messages', 'rc_portfolio_updated_messages' );
    add_action( 'add_meta_boxes', 'rc_portfolio_add_custom_box' );
    add_action( 'save_post', 'rc_portfolio_save_postdata' );
    function rc_portfolio_add_custom_box()
    {
        add_meta_box( 
            'rc_portfolio',
            'Portfolio',
            'rc_portfolio_custom_box',
            'portfolio'
        );
    }

    function rc_portfolio_custom_box( $post )
    {
        // Use nonce for verification
        wp_nonce_field( plugin_basename( __FILE__ ), 'rc_portfolio_nonce' ); 
        $portfolio_items = get_post_meta($post->ID, 'rc_portfolio', TRUE);
        $portfolio_meta = get_post_meta($post->ID, 'rc_portfolio_meta', TRUE);
        if( empty($portfolio_meta) ){
            $portfolio_meta = array('client' => '', 'work' => '', 'url' => '');
        }
        echo '<table><tr>';
        echo '<td>Client:</td><td><input type="text" name="portfolio_meta[client]" value="' . $portfolio_meta["client"] . '" /></td></tr><tr><td>Work:</td><td><input type="text" name="portfolio_meta[work]" value="' . $portfolio_meta["work"] . '" /></td></tr><tr><td>URL:</td><td><input type="text" name="portfolio_meta[url]" value="' . $portfolio_meta["url"] . '" />';
        echo '</td></tr></table><br><br>';
        echo '<br/><input type="button" class="button button-primary" id="add-item" value="' .__('Add New Portfolio Item', 'redcodn'). '" /><br/><br/>';
        echo '<ul id="portfolio-items">';
        
        $portfolio_editor = '';

        if (!empty($portfolio_items)) {
            $index = 0;
            foreach ($portfolio_items as $portfolio_item_id => $portfolio_item) {
                $index++;
                $is_image = ($portfolio_item['item_type'] == 'i') ? 'checked="checked"' : ''; 
                $is_video = ($portfolio_item['item_type'] == 'v') ? 'checked="checked"' : ''; 

                $portfolio_editor .= '
                <li class="portfolio-item">
                <div class="sortable-meta-element"><span class="tab-arrow entypo tab-arrow-right">&#10133;</span> <span class="portfolio-item-tab">'.($portfolio_item['slide_title'] ? $portfolio_item['slide_title'] : 'Slide ' . $index).'</span></div>
                <table class="hidden">
                <tr>
                    <td>' . __( 'Item type', 'redcodn' ) . '</td>
                    <td>
                        <label for="item-type-image-'.$portfolio_item_id.'">
                            <input type="radio" class="item-type-image" name="portfolio['.$portfolio_item_id.'][item_type]" value="i" checked="checked" id="item-type-image-'.$portfolio_item_id.'" '.$is_image.'/> Image
                        </label> 
                        <label for="item-type-video-'.$portfolio_item_id.'">
                            <input type="radio" class="item-type-video" name="portfolio['.$portfolio_item_id.'][item_type]" value="v" id="item-type-video-'.$portfolio_item_id.'" '.$is_video.'/> Video
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>' . __( 'Title', 'redcodn' ) . '</td>
                    <td>
                        <input type="text" class="slide_title" name="portfolio['.$portfolio_item_id.'][slide_title]" value="'.$portfolio_item['slide_title'].'" style="width: 100%" />
                    </td>
                </tr>
                <tr class="portfolio-embed '.( $is_image ? 'hidden' : '' ).'">
                    <td valign="top">' . __( 'Embed/Video URL<br/>(<a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">supported sites</a>)', 'redcodn' ) . '</td>
                    <td>
                        <textarea name="portfolio['.$portfolio_item_id.'][embed]" cols="60" rows="5">'.$portfolio_item['embed'].'</textarea>
                    </td>
                </tr>
                <tr class="portfolio-image-url '.( $is_video ? 'hidden' : '' ).'">
                    <td>' . __( 'Image URL', 'redcodn' ) . '</td>
                    <td>
                        <input type="text" class="slide_url" name="portfolio['.$portfolio_item_id.'][item_url]" value="'.$portfolio_item['item_url'].'" />
                        <input type="hidden" class="slide_media_id" name="portfolio['.$portfolio_item_id.'][media_id]" value="'.$portfolio_item['media_id'].'" />
                        <input type="button" id="upload-'.$portfolio_item_id.'" class="button rt-upload-slide" value="' .__( 'Upload', 'redcodn' ). '" /> 
                    </td>
                </tr>
                <tr>
                    <td></td><td><input type="button" class="button button-primary remove-item" value="'.__('Remove', 'redcodn').'" /></td>
                </tr>
                </table>
                </li>';
            }
        } else{
            echo __('Sorry, no portfolio items were found. Please add some.', 'redcodn');
        }

        echo $portfolio_editor;
        
        echo '</ul>';
        echo '<br/><input type="button" class="button button-primary" id="add-item" value="' .__('Add New Portfolio Item', 'redcodn'). '" /><br/><br/>';
        echo '<script id="portfolio-items-template" type="text/template">';
        echo '<li class="portfolio-item">
        <div class="sortable-meta-element"><span class="tab-arrow entypo tab-arrow-down">&#10134;</span> <span class="portfolio-item-tab">Slide {{slide-number}}</span></div>
        <table>
            <tr>
                <td>' . __( 'Item type', 'redcodn' ) . '</td>
                <td>
                    <label for="item-type-image-{{item-id}}">
                        <input type="radio" class="item-type-image" name="portfolio[{{item-id}}][item_type]" value="i" checked="checked" id="item-type-image-{{item-id}}"/> Image
                    </label> 
                    <label for="item-type-video-{{item-id}}">
                        <input type="radio" class="item-type-video" name="portfolio[{{item-id}}][item_type]" value="v" id="item-type-video-{{item-id}}" /> Video
                    </label>
                </td>
            </tr>
            <tr>
                <td>' . __( 'Title', 'redcodn' ) . '</td>
                <td>
                    <input type="text" class="slide_title" name="portfolio[{{item-id}}][slide_title]" value="" style="width: 100%" />
                </td>
            </tr>
            <tr class="portfolio-embed hidden">
                <td valign="top">' . __( 'Embed/Video URL<br/>(<a href="http://codex.wordpress.org/Embeds#Can_I_Use_Any_URL_With_This.3F" target="_blank">supported sites</a>)', 'redcodn' ) . '</td>
                <td>
                    <textarea name="portfolio[{{item-id}}][embed]" cols="60" rows="5"></textarea>
                </td>
            </tr>
            <tr class="portfolio-image-url">
                <td>' . __( 'Image URL', 'redcodn' ) . '</td>
                <td>
                    <input type="text" class="slide_url" name="portfolio[{{item-id}}][item_url]" value="" />
                    <input type="hidden" class="slide_media_id" name="portfolio[{{item-id}}][media_id]" value="" />
                    <input type="button" id="upload-{{item-id}}" class="button rt-upload-slide" value="' .__( 'Upload', 'redcodn' ). '" /> 
                </td>
            </tr>
            <tr>
                <td></td><td><input type="button" class="button button-primary remove-item" value="'.__('Remove', 'redcodn').'" /></td>
            </tr>
        </table></li>';
        echo '</script>';
    ?>
        <script>
        jQuery(document).ready(function($) {
            var portfolio_items = $("#portfolio-items > li").length;

            // sortable portfolio items
            $("#portfolio-items").sortable();
            //$("#portfolio-items").disableSelection();

            $(document).on('change', '.slide_title', function(event) {
                event.preventDefault();
                var _this = $(this);
                _this.closest('.portfolio-item').find('.portfolio-item-tab').text(_this.val());
            });

            $(document).on('click', '.sortable-meta-element', function(event) {
                event.preventDefault();
                var arrow = $(this).find('.tab-arrow');
                if (arrow.hasClass('tab-arrow-right')) {
                    arrow.removeClass('tab-arrow-right').addClass('tab-arrow-down');
                    arrow.html("&#10134;");
                } else if (arrow.hasClass('tab-arrow-down')) {
                    arrow.removeClass('tab-arrow-down').addClass('tab-arrow-right');
                    arrow.html("&#10133;");
                }
                $(this).next().toggle();
            });

            // Content type switcher
            $(document).on('click', '.item-type-image', function(event) {
                var _this = $(this);
                _this.closest('table').find('.portfolio-embed').hide();
                _this.closest('table').find('.portfolio-image-url').show();
            });

            $(document).on('click', '.item-type-video', function(event) {
                var _this = $(this);
                _this.closest('table').find('.portfolio-embed').show();
                _this.closest('table').find('.portfolio-image-url').hide();
            });

            // Media uploader
            var items = $('#portfolio-items'),
                slideTempalte = $('#portfolio-items-template').html(),
                custom_uploader = {};
                
            if (typeof wp.media.frames.file_frame == 'undefined') {
                wp.media.frames.file_frame = {};
            }

            $(document).on('click', '#add-item', function(event) {
                event.preventDefault();
                portfolio_items++;
                var sufix = new Date().getTime();
                var item_id = new RegExp('{{item-id}}', 'g');
                var item_number = new RegExp('{{slide-number}}', 'g');

                var template = slideTempalte.replace(item_id, sufix).replace(item_number, portfolio_items);
                items.append(template);
            });

            $(document).on('click', '.remove-item', function(event) {
                event.preventDefault();
                $(this).closest('li').remove();
                portfolio_items--;
            });

            
            $(document).on('click', '.rt-upload-slide', function(e) {
                e.preventDefault();
                
                var _this     = $(this),
                    target_id = _this.attr('id'),
                    media_id  = _this.closest('li').find('.slide_media_id').val();

                //If the uploader object has already been created, reopen the dialog
                if (custom_uploader[target_id]) {
                    custom_uploader[target_id].open();
                    return;
                }

                //Extend the wp.media object
                custom_uploader[target_id] = wp.media.frames.file_frame[target_id] = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    library: {
                        type: 'image'
                    },
                    multiple: false,
                    selection: [media_id]
                });

                //When a file is selected, grab the URL and set it as the text field's value
                custom_uploader[target_id].on('select', function() {
                    var attachment = custom_uploader[target_id].state().get('selection').first().toJSON();
                    var item = _this.closest('table');
                    console.log(item.html());
                    item.find('.slide_url').val(attachment.url);
                    item.find('.slide_media_id').val(attachment.id);
                });

                //Open the uploader dialog
                custom_uploader[target_id].open();
            });
        });
        </script>
    <?php
    }

    // saving slider
    function rc_portfolio_save_postdata( $post_id )
    {
        global $post;

        if ( @$post->post_type != 'portfolio' ) {
            return;
        }

        if ( ! isset( $_POST['rc_portfolio_nonce'] ) ||
             ! wp_verify_nonce( $_POST['rc_portfolio_nonce'], plugin_basename( __FILE__ ) ) 
        ) return;

        if( !current_user_can( 'edit_post', $post_id ) ) return;

        // array containing filtred items
        $portfolio_items = array();

        if ( isset( $_POST['portfolio'] ) ) {
            if ( is_array( $_POST['portfolio'] ) && !empty( $_POST['portfolio'] ) ) {
                foreach ( $_POST['portfolio'] as $item_id => $portfolio_item ) {

                    $p = array();
                    $p['item_id']   = $item_id;

                    $p['item_type'] = isset($portfolio_item['item_type']) ?
                                    esc_attr($portfolio_item['item_type']) : '';

                    $p['item_type'] = isset($portfolio_item['item_type']) && 
                                    ( $portfolio_item['item_type'] === 'i' || $portfolio_item['item_type'] === 'v' ) ?
                                    $portfolio_item['item_type'] : 'i';

                    $p['slide_title'] = isset($portfolio_item['slide_title']) ?
                                    esc_textarea($portfolio_item['slide_title']) : ''; 

                    $p['embed'] = isset($portfolio_item['embed']) ?
                                esc_textarea($portfolio_item['embed']) : ''; 

                    $p['item_url'] = isset($portfolio_item['item_url']) ?
                                    esc_url($portfolio_item['item_url']) : '';

                    $p['media_id'] = isset($portfolio_item['media_id']) ?
                                    esc_attr($portfolio_item['media_id']) : '';

                    $portfolio_items[] = $p; 
                }
            }
        }
        $portfolio_meta = $_POST['portfolio_meta'];
        update_post_meta( $post_id, 'rc_portfolio', $portfolio_items );
        update_post_meta( $post_id, 'rc_portfolio_meta', $portfolio_meta );
    }

    add_action( 'add_meta_boxes', 'rc_portfolio_add_custom_box' );
    /* BOF post type slideshow */
    $res[ 'slideshow' ][ 'labels' ] = array(
        'name' => _x('Slideshow', 'post type general name','redcodn'),
        'singular_name' => _x(__('Slideshow','redcodn'), 'post type singular name'),
        'add_new' => _x('Add New', __('Slideshow','redcodn')),
        'add_new_item' => __('Add New Slideshow','redcodn'),
        'edit_item' => __('Edit Slideshow','redcodn'),
        'new_item' => __('New Slideshow','redcodn'),
        'view_item' => __('View Slideshow','redcodn'),
        'search_items' => __('Search Slideshow','redcodn'),
        'not_found' =>  __('Nothing found','redcodn'),
        'not_found_in_trash' => __('Nothing found in Trash','redcodn')
    );
    $res[ 'slideshow' ][ 'args' ] = array(
        'public' => true,
        'hierarchical' => false,
        'menu_position' => 3,
        'supports' => array('title'),
        'exclude_from_search' => true,
        '__on_front_page' => true,
        'menu_icon' => get_template_directory_uri() . '/lib/images/custom.slideshow.png'
    );

    /*=====================================================*/
    /*================------Slideshow-----=================*/
    /*=====================================================*/
    $title_position = array('left' => __( 'On the left' , 'redcodn' ), 'center' => __( 'Center' , 'redcodn' ), 'right' => __( 'On the right' , 'redcodn' ));
    $boxed_layout = array('yes' => __( 'Yes' , 'redcodn' ), 'no' => __( 'No' , 'redcodn' ));
    $struct[ 'slideshow' ][ 'box' ] = array(
        'layout' => 'B',
        'field-style' => 'line',
        'check-column' => array(
            'name' => 'idrow',
            'type' => 'hidden',
            'evisible' => false,
            'lvisible' => false,
        ),
        'icon-column' => array(
            'name' => 'slide',
            'type' => 'attachment',
            'attach_type' => 'image',
            'width' => 100,
            'height' => 100,
            'evisible' => false,
            'lvisible' => false,
        ),
        'info-column-0' => array(
            array(
                'name' => 'resources',
                'type' => 'hidden',
                'evisible' => true,
                'lvisible' => false,
                'post_link' => true,
            ),
            array(
                'name' => 'type_res',
                'type' => 'hidden',
                'evisible' => false,
                'lvisible' => false,
            ),
            array(
                'name' => 'title',
                'type' => 'text',
                'label' => __( 'Slide title' , 'redcodn' ),
                'before' => '<h2>',
                'after' => '</h2>',
                'evisible' => false,
                'lvisible' => true,
            ),
            array(
                'name' => 'title_color',
                'type' => 'color-picker',
                'label' => __( 'Title text color' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => true
            ),
            array(
                'name' => 'title_position',
                'type' => 'select',
                'label' => __( 'Title position' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => false,
                'assoc' => $title_position
            ),  
            array(
                'name' => 'description',
                'type' => 'textarea',
                'label' => __( 'Description' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => true,
                'classes' => 'not-text-slide-option'
            ),
            array(
                'name' => 'description_color',
                'type' => 'color-picker',
                'label' => __( 'Description text color' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => true,
                'classes' => 'not-text-slide-option'
            ),
            array(
                'name' => 'url',
                'type' => 'text',
                'label' => __( 'Custom URL' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => false,
            ),  
            array(
                'name' => 'label',
                'type' => 'text',
                'label' => __( 'Text label for Custom URL (Default value is "Take a tour)' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => false,
            ),  
            array(
                'name' => 'boxed_layout',
                'type' => 'select',
                'label' => __( 'Enable boxed layout' , 'redcodn' ),
                'evisible' => false,
                'lvisible' => false,
                'assoc' => $boxed_layout
            )                                        
        ),
        'actions' => array(
            0 => array( 'slug' => 'edit' , 'label' => 'edit' ,  'args' => array( 'res' => 'slideshow' , 'box' => 'box' , 'post_id' => '' , 'index' => '' , 'selector' => 'div#slideshow_box div.inside div#box_slideshow_box' ) ),
            1 => array( 
                'slug' => 'update' , 
                'label' => 'update' , 
                'args' => array( 
                    'res' => 'slideshow' , 
                    'box' => 'box' , 
                    'post_id' => '' , 
                    'index' => '' , 
                    'data' => array( 
                        'input' =>  "['slideshow-box-slide_id' ,
                                    'slideshow-box-slide' ,
                                    'slideshow-box-title',
                                    'slideshow-box-title_color',
                                    'slideshow-box-first_line',
                                    'slideshow-box-second_line',
                                    'slideshow-box-slider_caption',
                                    'slideshow-box-title_position',
                                    'slideshow-box-description',
                                    'slideshow-box-description_color',
                                    'slideshow-box-url',
                                    'slideshow-box-label',
                                    'slideshow-box-boxed_layout' ]"
                        ),
                        'selector' => 'div#slideshow_box div.inside div#box_slideshow_box'
                 )
            ),
            2 => array( 'slug' => 'del' , 'label' => 'delete' , 'args' => array( 'res' => '' , 'box' => '' , 'post_id' => '' , 'index' => '' , 'selector' => 'div#slideshow_box div.inside div#box_slideshow_box' ) )
        )
    );

    $sl_res = array('none' => __( 'Simple image' , 'redcodn' ) , 
                    'post' => __( 'Post' , 'redcodn' )
                    );
    

    $form['slideshow']['box']['type_res'] = array(
        'type' => 'st--m-select' ,
        'label' => __( 'Select slider type' , 'redcodn') ,
        'value' =>  $sl_res ,
        'action' => "act.select('#type_resource' , {  'post' : '.mis-hint .generic-hint , .slider_resources' }, 'sh_');" ,
        'id' => 'type_resource'
    );
    $form['slideshow']['box'][ 'resources' ]  = array( 'type' => 'st--m-search' , 'label' => __( 'Select a post' , 'redcodn' ) , 'classes' => 'slider_resources hidden' , 'query' => array( 'post_type' => 'post' , 'post_status' => 'publish' ) , 'action' => "act.search( this , '-');", 'hint'=>__('Start typing the post title','redcodn') );
    $form['slideshow']['box']['slide' ]      = array( 'type' => 'st--m-upload-id' , 'label' => __( 'Upload an image or choose one from media library' , 'redcodn') , 'id' => 'box_slide' , 'hint' =>  __( 'If not uploaded will use post\'s Featured image for post sliders.' , 'redcodn' ) , 'classes' => 'mis-hint' , 'hclass' => 'hidden' );
    $form['slideshow']['box']['title']      = array(
        'type' => 'st--m-text' ,
        'label' =>  __( 'Slide title' , 'redcodn' ) ,
        'hint' => __( 'If not completed will use post title' , 'redcodn'  ) ,
        'classes' => 'mis-hint image-slide' ,
        'hclass' => 'hidden'
    );

    $form[ 'slideshow' ][ 'box' ][ 'title_color' ]= array(
        'type' => 'st--m-color-picker',
        'label' => __( 'Title text color' , 'redcodn' ),
        'set' => 'slider-title_color',
    );

    $form['slideshow']['box']['title_position'] = array(
        'type' => 'st--m-select' ,
        'label' => __( 'Title position' , 'redcodn') ,
        'value' =>  $title_position ,
        'id' => 'title_position'
    );
    $form[ 'slideshow' ][ 'box' ][ 'description' ] = array(
        'type' => 'st--m-textarea',
        'label' => __( 'Description' , 'redcodn' ),
        'id' => 'slider_caption',
        //'classes' => 'slider_resources image-slide' ,
    );
    $form[ 'slideshow' ][ 'box' ][ 'description_color' ] = array(
        'type' => 'st--m-color-picker',
        'label' => __( 'Description text color' , 'redcodn' ),
        'set' => 'slider-description_color',
        //'classes' => 'slider_resources image-slide' ,
    );
    $form['slideshow']['box']['url']        = array( 'type' => 'st--m-text' , 'label' =>  __( 'Custom URL' , 'redcodn' ) , 'hint' => __( 'If not completed then Title will link to the selected post' , 'redcodn'  ) , 'classes' => 'mis-hint' , 'hclass' => 'hidden' );
    $form['slideshow']['box']['label']      = array( 'type' => 'st--m-text' , 'label' =>  __( 'Text label for Custom URL' , 'redcodn' ) , 'hint' => __( 'Default value is "Take a tour"' , 'redcodn'  )  );
    $form['slideshow']['box']['boxed_layout']      = array( 'type' => 'st--m-select' , 'label' =>  __( 'Enable boxed layout' , 'redcodn' ), 'value' =>  $boxed_layout , );

    $form['slideshow']['box']['submit']     = array( 'type' => 'st--meta-save' ,  'value' => __( 'Add to slideshow' ,'redcodn' ) , 'selector' => 'div#slideshow_box div.inside div#box_slideshow_box'  );

    if(isset($_GET['post'])){
        $slideshow_settings = meta::get_meta( $_GET['post'], 'slidesettings' );
        //var_dump($slideshow_settings['slideshowSource']);
        if( (isset($slideshow_settings['slideshowSource']) && $slideshow_settings['slideshowSource'] == 'none') || !isset($slideshow_settings['slideshowSource'])){
            $add_manual_hint = 'add-manual-hint';
            $add_automat_hint = 'add-automat-hint hidden';
            $number_posts = 'number_posts hidden';    
        }else{
            $add_manual_hint = 'add-manual-hint hidden';
            $add_automat_hint = 'add-automat-hint ';
            $number_posts = 'number_posts ';
        }
    }else{
        $add_manual_hint = 'add-manual-hint';
        $add_automat_hint = 'add-automat-hint hidden';
        $number_posts = 'number_posts hidden';
    }

    $form[ 'slideshow' ][ 'slidesettings' ]      = array(
        
        'slideshowEffects' => array(
            'type' => 'st--select',
            'label' => __( 'Slideshow effects' ,   'redcodn' ),
            'value' => array(
                'simpleFade' => __( 'Fade' ,   'redcodn' ),
                'scrollLeft' => __( 'Scroll left' ,   'redcodn'  ),
                'scrollRight' => __( 'Scroll right' ,   'redcodn'  ),
                'scrollHorz' => __( 'Scroll horizontally' ,   'redcodn'  ),
                'scrollBottom' => __( 'Scroll bottom' ,   'redcodn'  ),
                'scrollTop' => __( 'Scroll top' ,   'redcodn'  )
            ),
            'classes' => 'slide_effect', 
            'id' => 'slide_effect'
        ),

        'hint-effect' => array(
            'type' => 'st--hint',
            'value' => __( 'Choose the effect used for your slider.' , 'redcodn' ),
            'classes' => $add_manual_hint
        ),
        'slideshowSource' => array(
            'type' => 'st--select',
            'label' => __( 'Slides source' ,   'redcodn' ),
            'value' => array(
                'none' => __( 'None(user defined)' ,   'redcodn' ),
                'latest_posts' => __( 'Latest posts' ,   'redcodn'  )
            ),
            'classes' => 'slide_source', 
            'action' => "act.select('#slide_source' , {  'none' : '.add-manual-hint', 'latest_posts' : '.add-automat-hint, .number_posts' }, 'sh_');" ,
            'id' => 'slide_source'
        ),

        'hint-manual' => array(
            'type' => 'st--hint',
            'value' => __( 'Use Additional slideshow items box below to populate your slideshow manualy.' , 'redcodn' ),
            'classes' => $add_manual_hint
        ),
        'hint-automat' => array(
            'type' => 'st--hint',
            'value' => __( 'Select this value if you wish to automatically populate your slideshow. Use Additional slideshow items box below to add additional images.' , 'redcodn' ),
            'classes' => $add_automat_hint
        ),
        'numberOfPosts' => array(
            'type' => 'st--digit',
            'label' => __( 'Number of posts' ,   'redcodn'  ),
            'hint' => __( 'Select number of posts that will be inserted automatically in the slideshow' ,   'redcodn'  ),
            'classes' => $number_posts,
            'cvalue' => 5
        ),

    );

    if( isset( $_GET[ 'post' ] ) ){
        $post = get_post( $_GET[ 'post' ] );
    }

    $box[ 'slideshow' ][ 'slidesettings' ]       = array( __( 'Slideshow Settings' , 'redcodn' ) , 'normal' , 'low' , 'content' => $form[ 'slideshow' ][ 'slidesettings' ] , 'box' => 'slidesettings' , 'update' => true  );
    $box['slideshow']['box']                = array( __('Additional slideshow items. Compose slideshow (drag and drop items to rearange position)' , 'redcodn' ) , 'normal' , 'low' , 'content' => $form['slideshow']['box'] , 'box' => 'box' , 'struct' => $struct['slideshow']['box'] , 'callback' => array( 'get_meta_records' , array( 'slideshow' , 'box' , 'box' ) ) , 'records-title' => __('Slideshow items' , 'redcodn' ) );


    resources::$labels['slideshow']         = $res['slideshow']['labels'];
    resources::$type['slideshow']           = $res['slideshow']['args'];
    resources::$box['slideshow']            = $box['slideshow'];

    /* EOF slideshow */





    /* standard post */
    $form['post']['layout']['type']         = array( 'type' => 'sh--select' , 'label' =>  __( 'Select layout type' , 'redcodn' ) , 'value' => array( 'right' => __( 'Right Sidebar'  , 'redcodn' ) , 'left' => __( 'Left Sidebar' , 'redcodn' ) , 'full' => __( 'Full Width' , 'redcodn' )  ) , 'action' => "act.select( '#post_layout' , { 'full' : '.sidebar_list' } , 'hs_');" , 'id' => 'post_layout' , 'ivalue' =>  options::get_value( 'layout' , 'single' ) );
    $form['post']['layout']['sidebar']      = array( 'type' => 'sh--select' , 'label' =>  __( 'Select sidebar' , 'redcodn' ) , 'value' => $sidebar_value , 'classes' => $classes );
    $form['post']['layout']['link']         = array( 'type' => 'sh--link' , 'url' => 'admin.php?page=redcodn___sidebar' , 'title' => __( 'Add new Sidebar' , 'redcodn' ) );

    if( options::get_value( 'layout' , 'single' ) == 'full' ){
        $form['post']['layout']['sidebar']['classes'] = $classes . ' hidden';
        $form['post']['layout']['link']['classes'] = $classes .' hidden';
    }  


    $form['post']['settings']['related']    = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show related posts' , 'redcodn' ) , 'hint' => __( 'Show related posts on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'show_similar' ) );
/*    $form['post']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show post meta' , 'redcodn' ) , 'hint' => __( 'Show post meta on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'meta' ), 'action' => "act.check( this , { 'yes' : '.meta_view'  } , 'sh');" );
*/
    
    $form['post']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show post meta' , 'redcodn' ) , 'hint' => __( 'Show post meta on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'meta' ), 'action' => "act.check( this , { 'yes' : '.meta_view'  } , 'sh');" );
    if (isset($_GET['post']) && is_admin()) {
        $settings = meta::get_meta( $_GET['post'] , 'settings' );

        if(isset($settings['meta']) && $settings['meta'] == 'yes'){
            $form['post']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }else{
            $form['post']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view hidden', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }
    } elseif(!isset($_GET['post']) && is_admin()){
        $form['post']['settings']['love']                 = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
    }

    $form['post']['settings']['sharing']              = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show social sharing' , 'redcodn' ) , 'hint' => __( 'Show social sharing on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'post_sharing' ) );
    $form['post']['settings']['author_box']           = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show author box' , 'redcodn' ) , 'hint' => __( 'Show author box on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'author_box' ) );

    $form['post']['settings']['post_bg']              = array( 'type' => 'st--upload' , 'label' => __( 'Upload or choose image from media library' , 'redcodn') , 'id' => 'post_background' , 'hint' => __( 'This will be the background image for this post' , 'redcodn' ) );
    $form['post']['settings']['position']             = array( 'type' => 'st--select' , 'label' => __( 'Image background position' , 'redcodn' ) , 'value' => array( 'left' => __( 'Left' , 'redcodn' ) , 'center' => __( 'Center' , 'redcodn' ) , 'right' => __( 'Right' , 'redcodn' ) ) );
    $form['post']['settings']['repeat']               = array( 'type' => 'st--select' , 'label' => __( 'Image background repeat' , 'redcodn' ) , 'value' => array( 'no-repeat' => __( 'No Repeat' , 'redcodn' ) , 'repeat' => __( 'Tile' , 'redcodn' ) , 'repeat-x' => __( 'Tile Horizontally' , 'redcodn' ) , 'repeat-y' => __( 'Tile Vertically' , 'redcodn' ) ) );
    $form['post']['settings']['attachment']           = array( 'type' => 'st--select' , 'label' => __( 'Image background attachment type' , 'redcodn' ) , 'value' => array( 'scroll' => __( 'Scroll' , 'redcodn' ) , 'fixed' => __( 'Fixed' , 'redcodn' ) ) );
    $form['post']['settings']['color']                = array( 'type' => 'st--color-picker' , 'label' => __( 'Set background color for this post' , 'redcodn' ) );

    if( isset( $_GET['post'] ) ){
        $post_format = get_post_format( $_GET['post'] );
    }else{
        $post_format = 'standard';
    }
       
    $box['post']['layout']                  = array( __('Layout and Sidebars' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['post']['layout'] , 'box' => 'layout' , 'update' => true  );
    $box['post']['settings']                = array( __('Post Settings' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['post']['settings'] , 'box' => 'settings' , 'update' => true  );

    $form[ 'post' ][ 'redembed' ][ 'url' ]   = array( 'type' => 'st--textarea' , 'label' => __( 'URL or embed code' , 'redcodn' ) , 'hint' => sprintf(__( 'The URL or embed provided here will be used instead of featured image on single post page. The %s following services are supported %s' , 'redcodn' ),'<a target="_blank" href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">','</a>') );
    $box['post']['redembed']   = array( __('Post embed' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['post']['redembed'] , 'box' => 'redembed' , 'update' => true );
    

    resources::$type['post']                = array();
    resources::$box['post']                 = $box['post'];


    $form['page']['layout']['type']         = array( 'type' => 'sh--select' , 'label' =>  __( 'Select layout type' , 'redcodn' ) , 'value' => array( 'right' => __( 'Right Sidebar'  , 'redcodn' ) , 'left' => __( 'Left Sidebar' , 'redcodn' ) , 'full' => __( 'Full Width' , 'redcodn' )  ) , 'action' => "act.select( '#post_layout' , { 'full' : '.sidebar_list' } , 'hs_');" , 'id' => 'post_layout' , 'ivalue' =>  options::get_value( 'layout' , 'page' ) );
    $form['page']['layout']['sidebar']      = array( 'type' => 'sh--select' , 'label' =>  __( 'Select sidebar' , 'redcodn' ) , 'value' => $sidebar_value , 'classes' => $classes );
    $form['page']['layout']['link']         = array( 'type' => 'sh--link' , 'url' => 'admin.php?page=redcodn___sidebar' , 'title' => __( 'Add new Sidebar' , 'redcodn' ) );

    if( options::get_value( 'layout' , 'page' ) == 'full' ){
        $form['page']['layout']['sidebar']['classes'] = $classes . ' hidden';
        $form['page']['layout']['link']['classes'] = $classes .' hidden';
    }


    $portfolio_categories = get_terms('portfolio-category',array(
        'hide_empty' => 0
    ));

    $portfolio_category_options = array("all" => __( 'All' , 'redcodn' ));
        //deb::e($video_categories);
    foreach ($portfolio_categories as $type) {
        $portfolio_category_options[$type->slug] = $type->name;
    }
    $gallery_categories = get_terms('gallery-category',array(
        'hide_empty' => 0
    ));

    $gallery_category_options = array("all" => __( 'All' , 'redcodn' ));
        //deb::e($video_categories);
    foreach ($gallery_categories as $type) {
        $gallery_category_options[$type->slug] = $type->name;
    }
    // Form for portfolios
    $form['page']['portfolioTemplateSettings']['hint']         = array( 'type' => 'sh--hint' ,  'value' => __( 'Here you can configure which categories will display in your portfolio page.'  , 'redcodn' )   );
    $form['page']['portfolioTemplateSettings']['categories']   = array( 'type' => 'sh--multiple-select' , 'label' =>  __( 'Select portfolio Categories' , 'redcodn' ) , 'value' => $portfolio_category_options );
    $form['page']['portfolioTemplateSettings']['enb_filters']  = array( 'type' => 'sh--logic-radio' , 'label' => __( 'Display Sortable' , 'redcodn' ) , 'cvalue' => 'no' );
    $form['page']['portfolioTemplateSettings']['pagination_type']   = array( 'type' => 'sh--select' , 'label' => __( 'Select pagination type' , 'redcodn' ) , 'value' => array('pagination' => 'Pagination', 'infinitescroll' => 'Infinite Scroll') );

    // Form for galleries
    $form['page']['galleryTemplateSettings']['hint']         = array( 'type' => 'sh--hint' ,  'value' => __( 'Here you can configure which categories will display in your gallery page.'  , 'redcodn' )   );
    $form['page']['galleryTemplateSettings']['categories']   = array( 'type' => 'sh--multiple-select' , 'label' =>  __( 'Select gallery Categories' , 'redcodn' ) , 'value' => $gallery_category_options );
    $form['page']['galleryTemplateSettings']['enb_filters']  = array( 'type' => 'sh--logic-radio' , 'label' => __( 'Display Sortable' , 'redcodn' ) , 'cvalue' => 'no' );
    $form['page']['galleryTemplateSettings']['pagination_type']   = array( 'type' => 'sh--select' , 'label' => __( 'Select pagination type' , 'redcodn' ) , 'value' => array('pagination' => 'Pagination', 'infinitescroll' => 'Infinite Scroll') );

    $slideshow_select1 = get__posts( array( 'post_status' => 'publish' , 'post_type' => 'slideshow' ) , '' );
    $select_default = array('0' => 'Select');
    $slideshow_select = $select_default + $slideshow_select1;
    $form['page']['slideshowSettings']['slideshow_select'] = array('type' => 'st--select' , 'label' => __( 'Select slideshow' , 'redcodn' ) , 'value' => $slideshow_select );

    $form['page']['settings']['page_title']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show page title' , 'redcodn' ) , 'hint' => 'Show page title on this page' , 'cvalue' => 'yes' );

    $form['page']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show page meta' , 'redcodn' ) , 'hint' => 'Show post meta on this page' , 'cvalue' => 'no', 'action' => "act.check( this , { 'yes' : '.page_love'  } , 'sh');"  );
/*    $form['page']['settings']['love']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show page love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ));    
*/       
    if (isset($_GET['post']) && is_admin()) {
        $settings = meta::get_meta( $_GET['post'] , 'settings' );

        if(isset($settings['meta']) && $settings['meta'] == 'yes'){
            $form[ 'page' ][ 'settings' ][ 'love' ] = array( 
                'type' => 'st--logic-radio' , 
                'label' => __( 'Show page love' , 'redcodn' ) , 
                'hint' => __( 'Show post love on this post' , 'redcodn' )  ,
                'cvalue' => options::get_value(  'likes' , 'enb_likes' ),
                'classes' => 'page_love'
            ); 
        }else{
            $form[ 'page' ][ 'settings' ][ 'love' ] = array( 
                'type' => 'st--logic-radio' , 
                'label' => __( 'Show page love' , 'redcodn' ) , 
                'hint' => __( 'Show post love on this post' , 'redcodn' )  ,
                'cvalue' => options::get_value(  'likes' , 'enb_likes' ),
                'classes' => 'page_love hidden'
            );                 
        }
    } elseif(!isset($_GET['post']) && is_admin()){
        if(isset($settings['meta']) && $settings['meta'] == 'yes'){
            $form[ 'page' ][ 'settings' ][ 'love' ] = array( 
                'type' => 'st--logic-radio' , 
                'label' => __( 'Show page love' , 'redcodn' ) , 
                'hint' => __( 'Show post love on this post' , 'redcodn' )  ,
                'cvalue' => options::get_value(  'likes' , 'enb_likes' ),
                'classes' => 'page_love'
            ); 
        }else{
            $form[ 'page' ][ 'settings' ][ 'love' ] = array( 
                'type' => 'st--logic-radio' , 
                'label' => __( 'Show page love' , 'redcodn' ) , 
                'hint' => __( 'Show post love on this post' , 'redcodn' )  ,
                'cvalue' => options::get_value(  'likes' , 'enb_likes' ),
                'classes' => 'page_love hidden'
            );                 
        }                 
    }

    $form['page']['settings']['sharing']    = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show social sharing' , 'redcodn' ) , 'hint' => 'Show social sharing on this page' , 'cvalue' => options::get_value( 'blog_post' , 'page_sharing' ) );
    $form['page']['settings']['post_bg']    = array( 'type' => 'st--upload' , 'label' => __( 'Upload image, or choose from media library.' , 'redcodn') , 'id' => 'post_background' , 'hint' => __( 'This will be the background image for this page' , 'redcodn' ) );
    $form['page']['settings']['position']   = array( 'type' => 'st--select' , 'label' => __( 'Background position' , 'redcodn' ) , 'value' => array( 'left' => __( 'Left' , 'redcodn' ) , 'center' => __( 'Center' , 'redcodn' ) , 'right' => __( 'Right' , 'redcodn' ) ) );
    $form['page']['settings']['repeat']     = array( 'type' => 'st--select' , 'label' => __( 'Background repeat' , 'redcodn' ) , 'value' => array( 'no-repeat' => __( 'No Repeat' , 'redcodn' ) , 'repeat' => __( 'Tile' , 'redcodn' ) , 'repeat-x' => __( 'Tile Horizontally' , 'redcodn' ) , 'repeat-y' => __( 'Tile Vertically' , 'redcodn' ) ) );
    $form['page']['settings']['attachment'] = array( 'type' => 'st--select' , 'label' => __( 'Background attachment type' , 'redcodn' ) , 'value' => array( 'scroll' => __( 'Scroll' , 'redcodn' ) , 'fixed' => __( 'Fixed' , 'redcodn' ) ) );
    $form['page']['settings']['color']      = array( 'type' => 'st--color-picker' , 'label' => __( 'Set background color for this post' , 'redcodn' ) );

    $box['page']['layout']                  = array( __('Layout and Sidebars' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['page']['layout'] , 'box' => 'layout' , 'update' => true  );
    $box['page']['portfolioTemplateSettings'] = array( __('Portfolio display Settings' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['page']['portfolioTemplateSettings'] , 'box' => 'portfolioTemplateSettings' , 'update' => true  );
    $box['page']['galleryTemplateSettings'] = array( __('Portfolio display Settings' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['page']['galleryTemplateSettings'] , 'box' => 'galleryTemplateSettings' , 'update' => true  );
    $box['page']['slideshowSettings']      = array( __('Slideshow Settings' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['page']['slideshowSettings'] , 'box' => 'slideshowSettings' , 'update' => true  );
    $box['page']['settings']                = array( __('Page Settings' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['page']['settings'] , 'box' => 'settings' , 'update' => true  );
    
    
    resources::$type['page']                = array();
    resources::$box['page']                 = $box['page'];


   
    /* Gallery */

    $gallery_layouts = array( 'scroll' => __( 'Horizontal scroll' , 'redcodn' ) , 'grid' => __( 'Grid masonry' , 'redcodn' ) , 'slider' => __( 'Horizontal slider' , 'redcodn' ) , 'list' => __( 'List image gallery' , 'redcodn' ) , 'fotorama' => __( 'Slider with thumbnails below' , 'redcodn' ));
    
    $form['gallery']['settings']['related']    = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show related posts' , 'redcodn' ) , 'hint' => __( 'Show related posts on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'show_similar' ) );
    $form['gallery']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show post meta' , 'redcodn' ) , 'hint' => __( 'Show post meta on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'meta' ), 'action' => "act.check( this , { 'yes' : '.meta_view'  } , 'sh');" );
    if (isset($_GET['post']) && is_admin()) {
        $settings = meta::get_meta( $_GET['post'] , 'settings' );

        if(isset($settings['meta']) && $settings['meta'] == 'yes'){
            $form['gallery']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }else{
            $form['gallery']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view hidden', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }
    } elseif(!isset($_GET['post']) && is_admin()){
        $form['gallery']['settings']['love']                 = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
    }

    $form['gallery']['settings']['sharing']              = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show social sharing' , 'redcodn' ) , 'hint' => __( 'Show social sharing on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'post_sharing' ) );
    $form['gallery']['settings']['author_box']           = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show author box' , 'redcodn' ) , 'hint' => __( 'Show author box on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'author_box' ) );

    $form['gallery']['settings']['post_bg']              = array( 'type' => 'st--upload' , 'label' => __( 'Upload or choose image from media library' , 'redcodn') , 'id' => 'post_background' , 'hint' => __( 'This will be the background image for this post' , 'redcodn' ) );
    $form['gallery']['settings']['position']             = array( 'type' => 'st--select' , 'label' => __( 'Image background position' , 'redcodn' ) , 'value' => array( 'left' => __( 'Left' , 'redcodn' ) , 'center' => __( 'Center' , 'redcodn' ) , 'right' => __( 'Right' , 'redcodn' ) ) );
    $form['gallery']['settings']['repeat']               = array( 'type' => 'st--select' , 'label' => __( 'Image background repeat' , 'redcodn' ) , 'value' => array( 'no-repeat' => __( 'No Repeat' , 'redcodn' ) , 'repeat' => __( 'Tile' , 'redcodn' ) , 'repeat-x' => __( 'Tile Horizontally' , 'redcodn' ) , 'repeat-y' => __( 'Tile Vertically' , 'redcodn' ) ) );
    $form['gallery']['settings']['attachment']           = array( 'type' => 'st--select' , 'label' => __( 'Image background attachment type' , 'redcodn' ) , 'value' => array( 'scroll' => __( 'Scroll' , 'redcodn' ) , 'fixed' => __( 'Fixed' , 'redcodn' ) ) );
    $form['gallery']['settings']['color']                = array( 'type' => 'st--color-picker' , 'label' => __( 'Set background color for this post' , 'redcodn' ) );
    $form['gallery']['settings']['gallery_layout']           = array( 'type' => 'st--select' , 'label' => __( 'Gallery layout' , 'redcodn' ) , 'value' => $gallery_layouts );

    $box['gallery']['settings']                = array( __('Gallery Settings' , 'upcode' ) , 'normal' , 'high' , 'content' => $form['gallery']['settings'] , 'box' => 'settings' , 'update' => true  );
    
    
    
    resources::$box['gallery']                 = $box['gallery'];

    // Video box

    $form['video']['settings']['meta']       = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show post meta' , 'redcodn' ) , 'hint' => __( 'Show post meta on this post' , 'redcodn' ) , 'cvalue' => options::get_value(  'blog_post' , 'meta' ), 'action' => "act.check( this , { 'yes' : '.meta_view'  } , 'sh');" );
    if (isset($_GET['post']) && is_admin()) {
        $settings = meta::get_meta( $_GET['post'] , 'settings' );

        if(isset($settings['meta']) && $settings['meta'] == 'yes'){
            $form['video']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }else{
            $form['video']['settings']['love']             = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view hidden', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
        }
    } elseif(!isset($_GET['post']) && is_admin()){
        $form['video']['settings']['love']                 = array( 'type' => 'st--logic-radio' , 'classes' => 'meta_view', 'label' => __( 'Show post love' , 'redcodn' ) , 'hint' => __( 'Show post love on this post' , 'redcodn' )  , 'cvalue' => options::get_value(  'likes' , 'enb_likes' ) );
    }

    $form['video']['settings']['sharing']              = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show social sharing' , 'redcodn' ) , 'hint' => __( 'Show social sharing on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'post_sharing' ) );
    $form['video']['settings']['author_box']           = array( 'type' => 'st--logic-radio' , 'label' => __( 'Show author box' , 'redcodn' ) , 'hint' => __( 'Show author box on this post'  , 'redcodn' ) , 'cvalue' => options::get_value( 'blog_post' , 'author_box' ) );

    $form['video']['settings']['post_bg']              = array( 'type' => 'st--upload' , 'label' => __( 'Upload or choose image from media library' , 'redcodn') , 'id' => 'post_background' , 'hint' => __( 'This will be the background image for this post' , 'redcodn' ) );
    $form['video']['settings']['position']             = array( 'type' => 'st--select' , 'label' => __( 'Image background position' , 'redcodn' ) , 'value' => array( 'left' => __( 'Left' , 'redcodn' ) , 'center' => __( 'Center' , 'redcodn' ) , 'right' => __( 'Right' , 'redcodn' ) ) );
    $form['video']['settings']['repeat']               = array( 'type' => 'st--select' , 'label' => __( 'Image background repeat' , 'redcodn' ) , 'value' => array( 'no-repeat' => __( 'No Repeat' , 'redcodn' ) , 'repeat' => __( 'Tile' , 'redcodn' ) , 'repeat-x' => __( 'Tile Horizontally' , 'redcodn' ) , 'repeat-y' => __( 'Tile Vertically' , 'redcodn' ) ) );
    $form['video']['settings']['attachment']           = array( 'type' => 'st--select' , 'label' => __( 'Image background attachment type' , 'redcodn' ) , 'value' => array( 'scroll' => __( 'Scroll' , 'redcodn' ) , 'fixed' => __( 'Fixed' , 'redcodn' ) ) );
    $form['video']['settings']['color']                = array( 'type' => 'st--color-picker' , 'label' => __( 'Set background color for this post' , 'redcodn' ) );
    /* box for video */
    $form[ 'video' ][ 'redembed' ][ 'url' ]   = array( 'type' => 'st--textarea' , 'label' => __( 'URL or embed code' , 'redcodn' ) , 'hint' => sprintf(__( 'The %s following services are supported %s' , 'redcodn' ),'<a target="_blank" href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F">','</a>') );


    $box['video']['settings']                = array( __('video Settings' , 'upcode' ) , 'normal' , 'high' , 'content' => $form['video']['settings'] , 'box' => 'settings' , 'update' => true  );
    
    $box['video']['redembed']   = array( __('Post embed' , 'redcodn' ) , 'normal' , 'high' , 'content' => $form['video']['redembed'] , 'box' => 'redembed' , 'update' => true );
    
    

    resources::$labels['video']         = $res['video']['labels'];
    resources::$type['video']           = $res['video']['args'];
    resources::$box['video']            = $box['video'];

    // resources::$box['video']                 = $box['gallery'];



    /* Prduct layout */
    /*  check if woocommerce is installed*/    
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        /* standard post */
        $form['product']['layout']['type']         = array( 'type' => 'sh--select' , 'label' =>  __( 'Select layout type' , 'redcodn' ) , 'value' => array( 'right' => __( 'Right Sidebar'  , 'redcodn' ) , 'left' => __( 'Left Sidebar' , 'redcodn' ) , 'full' => __( 'Full Width' , 'redcodn' )  ) , 'action' => "act.select( '#post_layout' , { 'full' : '.sidebar_list' } , 'hs_');" , 'id' => 'post_layout' , 'ivalue' =>  options::get_value( 'layout' , 'single' ) );
        $form['product']['layout']['sidebar']      = array( 'type' => 'sh--select' , 'label' =>  __( 'Select sidebar' , 'redcodn' ) , 'value' => $sidebar_value , 'classes' => $classes );
        $form['product']['layout']['link']         = array( 'type' => 'sh--link' , 'url' => 'admin.php?page=redcodn___sidebar' , 'title' => __( 'Add new Sidebar' , 'redcodn' ) );

        if( options::get_value( 'layout' , 'single' ) == 'full' ){
            $form['product']['layout']['sidebar']['classes'] = $classes . ' hidden';
            $form['product']['layout']['link']['classes'] = $classes .' hidden';
        }

        $box['product']['layout']                  = array( __('Layout and Sidebars' , 'redcodn' ) , 'side' , 'low' , 'content' => $form['product']['layout'] , 'box' => 'layout' , 'update' => true  );
        resources::$type['product']                = array();
        resources::$box['product']                 = $box['product'];
    }

?>