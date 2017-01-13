<?php

if( !function_exists('bkb_custom_theme')) {
    
    function bkb_custom_theme() {
        
        /*------------------------------  Default Settings ---------------------------------*/
        $bkb_like_bar_color = '#559900';
        $bkb_dislike_bar_color = '#C9231A';
        $bkb_like_thumb_color= '#559900';
        $bkb_dislike_bar_color = '#C9231A';
        
        $bkb_data = get_option('bkb_options');
        
        $custom_theme = '<style type="text/css">';
        
        // Like Bar Color.
        
        if( isset( $bkb_data['bkb_like_bar_color'] ) && $bkb_data['bkb_like_bar_color']!="" ) {
            
            $bkb_like_bar_color = $bkb_data['bkb_like_bar_color'];            
            $custom_theme .= '.bkb_container .bg-green{ background-color: ' . $bkb_like_bar_color .';}';
            
        }
        
        // Dislike Bar Color.
        
        if( isset( $bkb_data['bkb_dislike_bar_color'] ) && $bkb_data['bkb_dislike_bar_color']!="" ) {
            $bkb_dislike_bar_color = $bkb_data['bkb_dislike_bar_color'];
            $custom_theme .= '.bkb_container .bg-red{ background-color: ' . $bkb_dislike_bar_color .';}';
        }
        
        // Like Button Thumb Color.
        
        if( isset( $bkb_data['bkb_like_thumb_color'] ) && $bkb_data['bkb_like_thumb_color']!="" ) {
            
            $bkb_like_thumb_color= $bkb_data['bkb_like_thumb_color'];            
            $custom_theme .= '.bkb_container .btn_like{ color: ' . $bkb_like_thumb_color .';}';
            $custom_theme .= '.bkb_icon_like_color{ color: ' . $bkb_like_thumb_color .';}';
        }
        
        // Dislike Button Text Color.
        
        if( isset( $bkb_data['bkb_dislike_thumb_color'] ) && $bkb_data['bkb_dislike_thumb_color']!="" ) {
            $bkb_dislike_thumb_color = $bkb_data['bkb_dislike_thumb_color'];
            $custom_theme .= '.bkb_container .btn_dislike{ color: ' . $bkb_dislike_thumb_color .';}';
            $custom_theme .= '.bkb_icon_dislike_color{ color: ' . $bkb_dislike_thumb_color .';}';
        }
        
        
        /*------------------------------ Tipsy ---------------------------------*/
        
        $bkb_tipsy_bg = "#000000";
        $bkb_tipsy_text_color = "#FFFFFF";
        
        if( isset( $bkb_data['bkb_tipsy_bg'] ) && $bkb_data['bkb_tipsy_bg']!="" ) {
            $bkb_tipsy_bg = $bkb_data['bkb_tipsy_bg'];
        }
        
        if( isset( $bkb_data['bkb_tipsy_text_color'] ) && $bkb_data['bkb_tipsy_text_color']!="" ) {
            $bkb_tipsy_text_color = $bkb_data['bkb_tipsy_text_color'];
        }
        
        $custom_theme .= '.tipsy-inner{ background: ' . $bkb_tipsy_bg .'; color: ' . $bkb_tipsy_text_color .';}';
        
         /*------------------------------ KB List Heading Color  ---------------------------------*/
        $bkb_heading_link_color = "#0074A2";
        $bkb_heading_link_hover_color = "#004F6C";
        
        if( isset( $bkb_data['bkb_heading_link_color'] ) && $bkb_data['bkb_heading_link_color']!="" ) {
            $bkb_heading_link_color = $bkb_data['bkb_heading_link_color'];
        }
        
        if( isset( $bkb_data['bkb_heading_link_hover_color'] ) && $bkb_data['bkb_heading_link_hover_color']!="" ) {
            $bkb_heading_link_hover_color = $bkb_data['bkb_heading_link_hover_color'];
        }
        
        $custom_theme .= '.bwl-kb h2.bwl-kb-category-title a{ color: ' . $bkb_heading_link_color .';}';
        $custom_theme .= '.bwl-kb h2.bwl-kb-category-title a:hover{ color: ' . $bkb_heading_link_hover_color .';}';
        
        
        /*---------------------------- KB List Text Color -----------------------------------*/
        
        $bkb_list_text_color = "#2C2C2C";
        $bkb_list_bg = "#EBEBEB";
        
        $bkb_list_hover_text_color = "#5C5C5C";
        $bkb_list_hover_bg = "#DDDDDD";
        
        if( isset( $bkb_data['bkb_list_text_color'] ) && $bkb_data['bkb_list_text_color']!="" ) {
            $bkb_list_text_color = $bkb_data['bkb_list_text_color'];
        }
        
        if( isset( $bkb_data['bkb_list_bg'] ) && $bkb_data['bkb_list_bg']!="" ) {
            $bkb_list_bg = $bkb_data['bkb_list_bg'];
        }
        
        if( isset( $bkb_data['bkb_list_hover_text_color'] ) && $bkb_data['bkb_list_hover_text_color']!="" ) {
            $bkb_list_hover_text_color = $bkb_data['bkb_list_hover_text_color'];
        }
        
        if( isset( $bkb_data['bkb_list_hover_bg'] ) && $bkb_data['bkb_list_hover_bg']!="" ) {
            $bkb_list_hover_bg = $bkb_data['bkb_list_hover_bg'];
        }
        
        if ( isset($bkb_data['bkb_list_style_type']) && $bkb_data['bkb_list_style_type']=="rectangle") {
            
            $custom_theme .= '.rectangle-list a{ background: ' . $bkb_list_bg .'; color: ' . $bkb_list_text_color .';}';
            $custom_theme .= '.rectangle-list a:hover{ background: ' . $bkb_list_hover_bg .'; color: ' . $bkb_list_hover_text_color .';}';
            
        } else{
            
            $custom_theme .= '.rounded-list a, .rounded-list a:visited{ background: ' . $bkb_list_bg .'; color: ' . $bkb_list_text_color .';}';
            $custom_theme .= '.rounded-list a:hover{ background: ' . $bkb_list_hover_bg .'; color: ' . $bkb_list_hover_text_color .';}';
            
        }
        
        
        /*----------------------------KB Rounded Box Text & Background -----------------------------------*/
        
        $bkb_rounded_box_text_color = "#2C2C2C";
        
        $bkb_rounded_box_bg = "#CDCDCD";
        
        if( isset( $bkb_data['bkb_rounded_box_text_color'] ) && $bkb_data['bkb_rounded_box_text_color']!="" ) {
            $bkb_rounded_box_text_color = $bkb_data['bkb_rounded_box_text_color'];
        }
        
        if( isset( $bkb_data['bkb_rounded_box_bg'] ) && $bkb_data['bkb_rounded_box_bg']!="" ) {
            $bkb_rounded_box_bg = $bkb_data['bkb_rounded_box_bg'];
        }
        
        if ( isset($bkb_data['bkb_list_style_type']) && $bkb_data['bkb_list_style_type']=="rectangle") {
            
            $custom_theme .= '.rectangle-list a:before { background: ' . $bkb_rounded_box_bg .'; color: ' . $bkb_rounded_box_text_color .';}';
            
        } else{
            
            $custom_theme .= '.rounded-list a:before { background: ' . $bkb_rounded_box_bg .'; color: ' . $bkb_rounded_box_text_color .';}';
            
        }
        
       
        
        /*------------------------------Tab Border Settings ---------------------------------*/
        
        $bkb_tab_border_color = "#2C2C2C";
        
        if( isset( $bkb_data['bkb_tab_border_color'] ) && $bkb_data['bkb_tab_border_color']!="" ) {
            $bkb_tab_border_color = $bkb_data['bkb_tab_border_color'];
        }
        
        $custom_theme .= '.bkb-wrapper ul.bkb-tabs li.active { border-color: ' . $bkb_tab_border_color .';}';
        
        
        /*---------------------------- Custom CSS -----------------------------------*/
        
        $bkb_custom_css = "";
        
        if( isset( $bkb_data['bkb_custom_css'] ) && $bkb_data['bkb_custom_css']!="" ) {
            $bkb_custom_css = $bkb_data['bkb_custom_css'];
        }
        
        $custom_theme .= $bkb_custom_css;
        
        $custom_theme .= '</style>';
        
        echo $custom_theme;
        
    }
    
    
    add_action('wp_head', 'bkb_custom_theme');
    
}