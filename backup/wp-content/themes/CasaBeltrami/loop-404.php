<article class="no-posts-found">
    <footer class="entry-footer">
        <div class="excerpt">
            <div class="no-posts-smile">
                :(
            </div>
            <div class="row">
                <div class="twelve columns">
                    <i class="icon-warning"></i>
                    <?php
                        if( is_search () ){
                            _e( 'Unfortunately we did not find any results. Please try more keywords or be more specific.' , 'redcodn' );
                        }else{
                            _e( 'We apologize but this page, post or resource does not exist or can not be found. Perhaps it is necessary to change the call method to this page, post or resource.' , 'redcodn' );
                        }

                        wp_link_pages();
                    ?>
                </div>
                <div class="six columns offset-by-three">
                    <div class="no-post-search">
                        <h4>
                            <?php _e('Try searching again', 'redcodn'); ?>:
                        </h4>
                        <?php
                            get_template_part('searchform');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</article>

