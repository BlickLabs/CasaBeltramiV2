        <?php
            $footer_bg_options = '';
            $footer_bg_cover = '';
            if( options::logic('footer_settings', 'footer_bg_cover') ){
                $footer_bg_cover = 'background-size: cover;background-repeat: no-repeat';
            }else{
                $footer_bg_cover = 'background-repeat: repeat';
            }
            if ( options::get_value('footer_settings', 'footer_bg') != '' ) {
                $footer_bg_options = 'style="background-image: url('.options::get_value("footer_settings", "footer_bg").');'.$footer_bg_cover.'"';
            }
        ?>
        <?php

            ob_start();
            ob_clean();
            get_sidebar( 'footer-first' );
            $f1 = ob_get_clean();
            ob_start();
            ob_clean();
            get_sidebar( 'footer-second' );
            $f2 = ob_get_clean();
            ob_start();
            ob_clean();
            get_sidebar( 'footer-third' );
            $f3 = ob_get_clean();
            ob_start();
            ob_clean();
            get_sidebar( 'footer-fourth' );
            $f4 = ob_get_clean();   
            ob_start();
            ob_clean();
            get_sidebar( 'footer-fifth' );
            $full = ob_get_clean();
            
            if( strlen( $full ) ):
            ?>
            <div class="fullwidth-sidebar-footer">
                <?php echo $full; ?>
            </div>
            <?php endif; ?>
        <footer id="footer-container" role="contentinfo" <?php echo $footer_bg_options; ?>>

            <?php
                if( strlen( $f1 . $f2 . $f3 . $f4 ) ){
            ?>
            
            <div id="footerWidgets" class="row">
                <div class="three columns">
                    <?php echo $f1; ?>
                </div>
                <div class="three columns">
                    <?php echo $f2; ?>
                </div>
                <div class="three columns">
                    <?php echo $f3; ?>
                </div>
                <div class="three columns">
                    <?php echo $f4; ?>
                </div>
            </div>
            <?php
                }
            ?>

            
            <div class="footer-container-wrapper" id="footerCopyright" >
                <div class="row">
                    <div class="twelve columns"> 
                        <p class="copyright"><?php echo str_replace('%year%',date('Y') , options::get_value('general' , 'copy_right') ); ?></p>
                    </div>
                </div>
            </div>
            
        </footer>
       
    </div>
    <?php if( options::logic('styling','go_to_top') ) : ?>
        <div class="go-to-top"><i class="icon-top"></i></div>
    <?php endif; ?>
    <?php 
        echo options::get_value('general' , 'tracking_code');
        wp_footer();
    ?>
    </body> 
</html>