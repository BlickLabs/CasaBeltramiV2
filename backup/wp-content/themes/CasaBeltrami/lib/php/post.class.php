<?php

class post {
    static $post_id = 0;

    function filter_where( $where = '' ) {
        global $wpdb;
        if( self::$post_id > 0 ){
            $where .= " AND  ".$wpdb->prefix."posts.ID < " . self::$post_id;
        }
        return $where;
    }






    static function search(){

    $query = isset( $_GET['params'] ) ? (array)json_decode( stripslashes( $_GET['params'] )) : exit;
    $query['s'] = isset( $_GET['query'] ) ? $_GET['query'] : exit;

    global $wp_query;
    $result = array();
    $result['query'] = $query['s'];

    $wp_query = new WP_Query( $query );

    if( $wp_query -> have_posts() ){
        foreach( $wp_query -> posts as $post ){
            $result['suggestions'][] = $post -> post_title;
            $result['data'][] =  $post -> ID;
        }
    }

    echo json_encode( $result );
    exit();
    }   

}
?>
