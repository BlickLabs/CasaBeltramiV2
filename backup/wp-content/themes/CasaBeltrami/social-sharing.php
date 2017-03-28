<?php
    /* social sharing  */ 
    if( (( is_page() && options::logic('blog_post', 'page_sharing') ) || ( !is_page() && options::logic('blog_post', 'post_sharing')) ) && meta::logic( $post , 'settings' , 'sharing' )  ){
?>      

<div class="dotted-separator">
    <div class="idot">
    </div>
</div>
<div class="box-sharing">
    <span>Share: </span>
    <ul class="share-options">
        <li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>">facebook</a></li>
        <li><a target="_blank" href="http://twitter.com/home?status=<?php echo urlencode($post->post_title); ?>+<?php echo get_permalink($post->ID); ?>">twitter</a></li>
        <li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&amp;description=<?php echo urlencode(get_the_title($post->ID)); ?>" >pinterest</a></li>
        <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID); ?>">google+</a></li>
    </ul>
</div>
<div class="dotted-separator bottom-separator">
    <div class="idot">
    </div>
</div>
<?php
    }
?>
