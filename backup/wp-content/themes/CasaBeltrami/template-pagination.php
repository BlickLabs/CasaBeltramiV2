<?php 
global $the_query;
                
if ( get_query_var('paged') ) {
    $current = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $current = get_query_var('page');
} else {
    $current = 1;
}
//==========================Pagination==============================
$total = $the_query->max_num_pages;
if($the_query->max_num_pages > 1 ){ // if we have more than 1 page

  	$pl_args = array(
        'base'     => add_query_arg('paged','%#%'),
        'format'   => '',
        'total'    => $the_query->max_num_pages,
        'current'  => max(1, $current),
        'type' => 'array'
  	);

  	// for ".../page/n"
  	if($GLOBALS['wp_rewrite']->using_permalinks())
    $pl_args['base'] = user_trailingslashit(trailingslashit(get_pagenum_link(1)).'page/%#%/', 'paged');

    $pgn = paginate_links($pl_args);
   
    if(!empty($pgn)){
        echo '<div class="red-list-posts  pag">';
        echo '<ul class="b_pag center p_b">';
        foreach($pgn as $k => $link){
            echo '<li>'; 
            echo str_replace( "'" , '"' , $link );
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}
?>