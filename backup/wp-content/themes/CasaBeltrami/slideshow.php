<?php global $slideshow; ?>
<div class="fluid_container">
    <div class="camera_wrap camera_white_skin" id="camera_wrap_1">
        <?php 
            $size = 'slideshow';  

            foreach( $slideshow as $i => $slide ){ 
                if( isset( $slide[ 'type_res' ] ) && $slide[ 'type_res' ] == 'post' ){
                    $sliderPostID = $slide[ 'resources' ];
                    
                    if( has_post_thumbnail( $sliderPostID ) ){
                        $img_url = wp_get_attachment_url( get_post_thumbnail_id( $sliderPostID )  ,'full'); //get img URL
                        $image = aq_resize( $img_url, get_aqua_size($size), get_aqua_size($size, 'height'), true, false); //crop img  
                        $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $sliderPostID )  ,'thumbnail');
                          
                    }else{
                        $image = array();
                        $image[ 0 ] = get_template_directory_uri() .'/images/no.image.600x300.png';;
                        
                    }

                    if( isset( $slide[ 'slide_id' ] ) && is_numeric( $slide[ 'slide_id' ] ) ){
                        $img_url = wp_get_attachment_url( $slide[ 'slide_id' ]  ,'full'); //get img URL                       
                        $image = aq_resize( $img_url, get_aqua_size($size), get_aqua_size($size, 'height'), true, false); //crop img
                        $image_thumb = wp_get_attachment_image_src( $slide[ 'slide_id' ]  ,'thumbnail');

                        $image_id = $slide[ 'slide_id' ];
                        
                    }

                    $sliderPost = get_post( $sliderPostID );                        
                    if(isset( $slide[ 'title' ] ) && strlen($slide[ 'title' ])){
                        $title = $slide[ 'title' ];
                    }else{
                        $title = $sliderPost -> post_title;    
                    }
                    if(strlen($slide[ 'description' ])){
                        $description = $slide[ 'description' ];
                    }else if( strlen( $sliderPost -> post_excerpt ) ){
                        if( strlen( $sliderPost -> post_excerpt ) > 180 ){
                            $description = mb_substr( strip_tags( strip_shortcodes( $sliderPost -> post_excerpt ) ), 0, 180 ) . '..';
                        }else if(strlen($sliderPost -> post_excerpt)){
                            $description = strip_tags( strip_shortcodes( $sliderPost -> post_excerpt ) );
                        }
                    }else{
                        if( strlen( $sliderPost -> post_content ) > 180 ){
                            $description = mb_substr( strip_tags( strip_shortcodes( $sliderPost -> post_content ) ), 0, 180 ) . '..';
                        }else{
                            $description = strip_tags( strip_shortcodes( $sliderPost -> post_content ) );
                        }
                    }

                    $link = get_permalink( $sliderPostID );
                    if( isset( $slide[ 'url' ] ) && strlen( $slide[ 'url' ] ) ){
                        $link = $slide[ 'url' ];
                    }
                    $label = __('Take a tour','redcodn');
                    if( isset( $slide[ 'label' ] ) && strlen( $slide[ 'label' ] ) ){
                        $label = $slide[ 'label' ];
                    }  

                }else{
                    $img_url = wp_get_attachment_url( $slide[ 'slide_id' ]  ,'full'); //get img URL                       
                    $image = aq_resize( $img_url, get_aqua_size($size), get_aqua_size($size, 'height'), true, false); //crop img
                    
                    $image_thumb = wp_get_attachment_image_src( $slide[ 'slide_id' ]  ,'thumbnail');

                    $image_id = $slide[ 'slide_id' ];

                    $title = isset( $slide[ 'title' ] ) ? $slide[ 'title' ] : '';
                    $description = isset( $slide[ 'description' ] ) ? $slide[ 'description' ] : '';
                    $link = isset( $slide[ 'url' ] ) ? $slide[ 'url' ] : '';
                    $label = isset( $slide[ 'label' ] ) ? $slide[ 'label' ] : '';

                }

                if (isset($slide['boxed_layout']) && $slide['boxed_layout'] == 'no') {
                    $boxed_class = '';
                }else{
                    $boxed_class = 'boxed-layout';
                }

                if (isset($slide['title_position']) && strlen($slide['title_position'])) {
                    $title_position = $slide[ 'title_position' ];
                }else{
                    $title_position = 'right';
                }

                
            ?>

            <?php if ($image[ 0 ]) {
                    if (isset($slide['overlay_color'])) {
                        $rgb_color = hex2rgb($slide['overlay_color']);
                        if (isset($slide['overlay_opacity'])) {
                            $rgb_color = 'background: rgba('.$rgb_color.' '. 0.01*(int)$slide['overlay_opacity']. ');';
                        }else{
                            $rgb_color = 'background:'.$slide['overlay_color']. ';';
                        }
                    }else{
                        $rgb_color = '';
                    }
                } else {
                    $rgb_color = '';
                } 
                if (isset($image_thumb[ 0 ])) {
                    $thumb = $image_thumb[ 0 ];
                }else{
                    $thumb = '';
                }

                if (isset($image[ 0 ])) {
                    $slide_image = $image[ 0 ];
                }else{
                    $slide_image = get_template_directory_uri() .'/images/no.image.600x300.png';
                }
            ?>
            <div data-thumb="<?php echo $thumb;?>" data-src="<?php echo $image[ 0 ]; ?>">
                
                <div class="camera_caption fadeFromBottom">

                    <div class="header-slideshow-elem-content <?php echo $boxed_class . ' '; echo $title_position; if(strlen($slide['title']) == '' && strlen($slide['description']) == '' && strlen($link) == '') { echo ' no-text-description'; }?>">
                        <ul>
                            <?php if(strlen(trim($title))){ ?>
                            <li class="elem-content-container elem-slide-title">
                                <h2 <?php if(strlen($slide[ 'title_color' ])) { echo 'style="color:'. $slide[ 'title_color' ] .';"'; } ?> ><span><?php echo $title;?></span></h2>
                            </li>
                            <?php } ?>
                            <li class="elem-content-container elem-slide-desc"><p <?php if(strlen($slide[ 'description_color' ])) { echo 'style="color:'. $slide[ 'description_color' ] . ';"'; } ?> ><?php echo $description; ?></p></li>
                            <li class="elem-content-container elem-slide-button"> 
                                <?php if(strlen($link)){ echo '<a class="slide-button" '; if(strlen($slide[ 'title_color' ])) { echo 'style="color:'. $slide[ 'title_color' ] .';border-color: ' . $slide[ 'title_color' ] . '"'; } echo ' href="'. $link .'">';  
                                    if (strlen($label)) {
                                        echo $label;
                                    }else{
                                        echo __('Take a tour','redcodn');
                                    }
                                    echo '</a>'; } 
                                ?>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        <?php } ?>
    </div>
</div>

