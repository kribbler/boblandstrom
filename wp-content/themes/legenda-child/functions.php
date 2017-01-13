<?php
function child_ts_theme_widgets_init(){
    register_sidebar( array(
        'name' => __( 'Header Top Right', 'legenda' ),
        'id' => 'header-top-right',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Home', 'legenda' ),
        'id' => 'header-home',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Copyright area 1', 'legenda' ),
        'id' => 'coyright-area-1',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Copyright area 2', 'legenda' ),
        'id' => 'coyright-area-2',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Left', 'legenda' ),
        'id' => 'footer-left',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Center', 'legenda' ),
        'id' => 'footer-center',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Right', 'legenda' ),
        'id' => 'footer-right',
        'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar_title"><h3>',
        'after_title' => '</h3></div>',
    ) );

}

add_action( 'widgets_init', 'child_ts_theme_widgets_init' );

// **********************************************************************// 
// ! Menus
// **********************************************************************// 
if(!function_exists('etheme_register_s11_menus')) {
    function etheme_register_s11_menus() {
        register_nav_menus(array(
            'left-menu' => __('Left Menu', ETHEME_DOMAIN),
            'right-menu' => __('Right Menusenu', ETHEME_DOMAIN),
            'menu-art'  => __('Menu Art', ETHEME_DOMAIN)
        ));
    }
}

add_action('init', 'etheme_register_s11_menus');

add_shortcode( 'get_latest_articles', 'get_latest_articles' );

function get_latest_articles($atts, $content = null) {
    extract(shortcode_atts(array(
        'numberposts' => 2,
        'category' => get_cat_ID( 'Blog' )
    ), $atts ) );

    $limit = 2;

    $query_args = array(
        'numberposts' => 2,
        'category' => get_cat_ID( 'Articles' )
    );

    $posts = get_posts( $query_args );

    $output = "";

    foreach ( $posts as $post ) : setup_postdata( $post );
        $output .= '<div class="footer_article">';
            $output .= '<a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>';
            $output .= get_the_excerpt();
        $output .= '</div>';
    endforeach;

    //pr($posts);

    return $output;
}

add_shortcode( 'get_latest_blog_posts', 'get_latest_blog_posts' );

function get_latest_blog_posts($atts, $content = null) {
    extract(shortcode_atts(array(
        'numberposts' => 14,
        //'category' => get_cat_ID( 'Blog' )
    ), $atts ) );

    $limit = 14;

global $wp;
$category_slug = get_query_var( 'category_name', 1 );
//pr($category_slug);

if ($category_slug) {
    $query_args = array(
        'numberposts' => 14,
        'category_name' => $category_slug
    );
} else {
    $query_args = array(
        'numberposts' => 14,
        //'category' => get_cat_ID( 'Blog' )
    );
}

$posts = get_posts( $query_args );
//pr($query_args);
    $output = "";
$i = 0;
    foreach ( $posts as $post ) : setup_postdata( $post );
    //pr($post);
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        $output .= '<div class="blog_block">';
            
            $category = get_the_category($post->ID); 
            if (!$category_slug) 
                $output .= '<h2>'.$category[0]->name.'</h2>';
            else 
                $output .= '<h2>' . get_category_name_by_slug($category_slug) . '</h2>';
            if ($feat_image) {
                $output .= '<img src="'.$feat_image.'" class="aligncenter size-full" />';
            }
            $output .= '<h3>' . $post->post_title . '</h3>';
            $output .= '<div class="inner_block_">';
                $output .= substr(strip_tags($post->post_content), 0, 100) . ' ...';
                $output .= '<a href="'.get_permalink($post->ID).'">Read More</a>';
            $output .= '</div>';
        $output .= '</div>';
        $i++;
        if ($i%2 == 0){
            $output .=  '<div class="clear"></div>';
        }
    endforeach;

    $output .= '<div class="clear"></div>';

    return $output;
}

function get_category_name_by_slug($slug) {
    $category = get_category_by_slug($slug);
    return $category->name; 
}
add_shortcode( 'get_my_categories', 'get_my_categories' );

function get_my_categories($atts, $content = null) {
    extract(shortcode_atts(array(
        'numberposts' => 2,
        'category' => get_cat_ID( 'Blog' )
    ), $atts ) );

    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false 

    ); 

    $categories = get_categories( $args );

    $output = "<ul class='categories_list'>";

    foreach ($categories as $category){
        $output .= '<li><a href="' . get_category_link( $category->term_id ) . '">'.$category->name.'</a></li>';
        //$output .= '<li><a href="' . site_url() . '/blog/'. $category->slug .'/">'.$category->name.'</a></li>';
    }

    $output .= '<li><a href="' . site_url() . '/blog/' . '">SEE ALL</a></li>';
    $output .= '</ul>';
    return $output;
    pr($categories);
}

function pr($str){
    echo "<pre>"; var_dump($str); echo "</pre>";
}

add_shortcode('bkb_attachment', 'get_bkb_attachment');

     
function get_bkb_attachment( $id ) {

    $id = get_the_ID();
    
    $bkb_file_attachment_string = "";

    $get_bkb_attachment_ids =  get_post_meta(get_the_ID(), 'bkb_attachment_files');
    
    if ( sizeof($get_bkb_attachment_ids) > 0 ) {
        
        
        $bkb_file_attachment_string .= '<section class="bkb_file_attachment bkb_clearfix">';

        $bkb_file_attachment_heading = __("Attachments -", 'bwl-kb');

        $bkb_file_attachment_string .= '<h2>' . $bkb_file_attachment_heading . '</h2>';
        
        $counter  = 1;
        
        $bkb_file_attachment_string .= '<ul class="bkb-attachment-items">';
        
        foreach ($get_bkb_attachment_ids as $attachment_post_id){
             
            $get_bkb_attachment_url = get_post_meta( $attachment_post_id, '_wp_attached_file', true);
            
            $bkb_file_attachment_string .='<li>';
            
//            echo $bkb_display_file_name_status;
//            die();
            
                if( $bkb_display_file_name_status == 1 ) {
                    
                    $bkb_file_name = ' '.basename($get_bkb_attachment_url);
                    
                } else {
            
                    $bkb_file_name =  __(' File# ', 'bwl-kb') . $counter;
                    //$bkb_file_name = 
                    $attachment_meta = get_post($attachment_post_id);
                    $bkb_file_name = $attachment_meta->post_title;
                }
            
                $bkb_file_attachment_string .= '<a href="'.home_url().'/wp-content/uploads/' . $get_bkb_attachment_url .'" target="_blank">' . $bkb_file_name . '</a>';
            
            $bkb_file_attachment_string .='</li>';
            
            $counter++;
             
        }
        
        $bkb_file_attachment_string .= '</ul>';
        
        $bkb_file_attachment_string .='</section>';
        
    }
    
    return $bkb_file_attachment_string;
     
}