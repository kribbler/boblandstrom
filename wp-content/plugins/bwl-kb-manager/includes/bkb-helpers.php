<?php

/*-----------------------------BKB AJAX Settings ----------------------------------*/

if ( ! function_exists('bkb_set_ajax_url') ) {
    
    function bkb_set_ajax_url() {

         $bkb_data = get_option('bkb_options');

         $bkb_tipsy_status =  1;
         $bkb_disable_feedback_status =  0;

         if ( isset($bkb_data['bkb_tipsy_status']) && $bkb_data['bkb_tipsy_status'] == 0 ) {

             $bkb_tipsy_status =  0;

         }
         
         if ( $bkb_tipsy_status == 1 ) {
             wp_enqueue_script( 'bkb-tipsy-script' ); // Load Tooltips
         }
         
         if ( isset($bkb_data['bkb_disable_feedback_status']) && $bkb_data['bkb_disable_feedback_status'] == 1 ) {
         
            $bkb_disable_feedback_status =  1;

        }

    ?>
        <script type="text/javascript">

             var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>',                
                    err_feedback_msg = '<?php _e(' Please Write Your Feedback Message', 'bwl-kb'); ?>',
                    bkb_feedback_thanks_msg = '<?php _e('Thanks for your feedback!', 'bwl-kb'); ?>',
                    bkb_unable_feedback_msg = '<?php _e('Unable to receive your feedback. Please try again !', 'bwl-kb'); ?>',
                    err_bkb_captcha = '<?php _e(' Incorrect Captcha Value!', 'bwl-kb'); ?>',
                    err_bkb_question = '<?php _e(' Write your question. Min length 3 characters !', 'bwl-kb'); ?>',
                    err_bkb_category = '<?php _e(' Select A KB Category!', 'bwl-kb'); ?>',
                    err_bkb_ques_email = '<?php _e(' Valid email address required!', 'bwl-kb'); ?>',
                    bkb_tipsy_status = '<?php echo $bkb_tipsy_status; ?>',
                    bkb_wait_msg = '<?php _e('Please Wait .....', 'bwl-kb'); ?>',
                    bkb_search_no_results_msg = '<?php _e('Sorry Nothing Found!', 'bwl-kb'); ?>',
                    bkb_disable_feedback_status = '<?php echo $bkb_disable_feedback_status; ?>';

        </script>

    <?php

    }

    add_action('wp_head', 'bkb_set_ajax_url');
        
} else {
        
        echo "bkb_set_ajax_url - Function already exist!";
            
}



/*---------------------------BKB Calculate Percentage ------------------------------------*/

if (!function_exists('bkb_calculate_percentage')) {

    function bkb_calculate_percentage( $num_total = 0, $num_amount = 0 ) {

        if ($num_amount == 0) {

            return 0;
        }

        $count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = $count2;
        return $count;
    }

} else {

    echo "bkb_calculate_percentage - Function already exist!";
    
}

/*----------------------------Get Column class by no of cols-----------------------------------*/

if ( ! function_exists('bkb_get_grid_col_class') ) {
        
    function bkb_get_grid_col_class( $no_of_cols = "" ) {
        
        if ( $no_of_cols == 3 ) {
            
            return "bkbcol-1-3";
            
        } else if( $no_of_cols == 2 ) {
            
            return "bkbcol-1-2";
            
        } else if( $no_of_cols == 1 ) {
            
            return "bkbcol-1-1";
            
        } else {
            
            return "bkbcol-1-2";
            
        }
        
        
    }
        
        
} else {
        
        echo "bkb_get_grid_col_class - Function already exist!";
            
}

function bkb_get_fa_icons () {

    $fa_icon_array_lists = explode(',' , 'fa-glass, fa-music, fa-search,fa-envelope-o,fa-heart,fa-star,fa-star-o,fa-user,fa-film,fa-th-large, fa-check,fa-times,  fa-signal,fa-cog, fa-home,fa-file-o,fa-clock-o,fa-road,fa-download,fa-arrow-circle-o-down,fa-arrow-circle-o-up,fa-inbox,fa-play-circle-o,fa-repeat,fa-refresh,fa-list-alt,fa-lock,fa-flag,fa-headphones,fa-volume-off,fa-volume-down,fa-volume-up,fa-qrcode,fa-barcode,fa-tag,fa-tags,fa-book,fa-bookmark,fa-print,fa-camera,fa-font,fa-bold,fa-italic,fa-text-height,fa-text-width,fa-align-left,fa-align-center,fa-align-right,fa-align-justify,fa-list,fa-outdent,fa-indent,fa-video-camera,fa-picture-o,fa-pencil,fa-map-marker,fa-adjust,fa-tint,fa-pencil-square-o,fa-share-square-o,fa-check-square-o,fa-arrows,fa-step-backward,fa-fast-backward,fa-backward,fa-play,fa-pause,fa-stop,fa-forward,fa-fast-forward,fa-step-forward,fa-eject,fa-chevron-left,fa-chevron-right,fa-plus-circle,fa-minus-circle,fa-times-circle,fa-check-circle,fa-question-circle,fa-info-circle,fa-crosshairs,fa-times-circle-o,fa-check-circle-o,fa-ban,fa-arrow-left,fa-arrow-right,fa-arrow-up,fa-arrow-down,fa-share,fa-expand,fa-compress,fa-plus,fa-minus,fa-asterisk,fa-exclamation-circle,fa-gift,fa-leaf,fa-fire,fa-eye,fa-eye-slash,fa-exclamation-triangle,fa-plane,fa-calendar,fa-random,fa-comment,fa-magnet,fa-chevron-up,fa-chevron-down,fa-retweet,fa-shopping-cart,fa-folder,fa-folder-open,fa-arrows-v,fa-arrows-h,fa-bar-chart-o, fa-camera-retro, fa-key,fa-cogs,fa-comments,fa-thumbs-o-up,fa-thumbs-o-down,fa-star-half,fa-heart-o,fa-sign-out,fa-linkedin-square,fa-thumb-tack,fa-external-link,fa-sign-in,fa-trophy, fa-upload,fa-lemon-o,fa-phone,fa-square-o,fa-bookmark-o,fa-phone-square,fa-twitter,fa-facebook, fa-unlock,fa-credit-card,fa-rss,fa-hdd-o,fa-bullhorn,fa-bell,fa-certificate,fa-hand-o-right,fa-hand-o-left,fa-hand-o-up,fa-hand-o-down,fa-arrow-circle-left,fa-arrow-circle-right,fa-arrow-circle-up,fa-arrow-circle-down,fa-globe,fa-wrench,fa-tasks,fa-filter,fa-briefcase,fa-arrows-alt,fa-scissors,fa-files-o,fa-paperclip,fa-floppy-o,fa-square,fa-bars,fa-list-ul,fa-list-ol,fa-strikethrough,fa-underline,fa-table,fa-magic,fa-truck,fa-pinterest,fa-pinterest-square,fa-google-plus-square,fa-google-plus,fa-money,fa-caret-down,fa-caret-up,fa-caret-left,fa-caret-right,fa-columns,fa-sort,fa-sort-asc,fa-sort-desc,fa-envelope,fa-linkedin,fa-undo,fa-gavel,fa-tachometer,fa-comment-o,fa-comments-o,fa-bolt,fa-sitemap,fa-umbrella,fa-clipboard,fa-lightbulb-o,fa-exchange,fa-cloud-download,fa-cloud-upload,fa-user-md,fa-stethoscope,fa-suitcase,fa-bell-o,fa-coffee,fa-cutlery,fa-file-text-o,fa-building-o,fa-hospital-o,fa-ambulance,fa-medkit,fa-fighter-jet,fa-beer,fa-h-square,fa-plus-square,fa-angle-double-left,fa-angle-double-right,fa-angle-double-up,fa-angle-double-down,fa-angle-left,fa-angle-right,fa-angle-up,fa-angle-down,fa-desktop,fa-laptop,fa-tablet,fa-mobile,fa-circle-o,fa-quote-left,fa-quote-right,fa-spinner,fa-circle,fa-reply,fa-github-alt,fa-folder-o,fa-folder-open-o,fa-smile-o,fa-frown-o,fa-meh-o,fa-gamepad,fa-keyboard-o,fa-flag-o,fa-flag-checkered,fa-terminal,fa-code,fa-reply-all,fa-mail-reply-all,fa-star-half-o,fa-location-arrow,fa-crop,fa-code-fork,fa-chain-broken,fa-question,fa-info,fa-exclamation,fa-superscript,fa-subscript,fa-eraser,fa-puzzle-piece,fa-microphone,fa-microphone-slash,fa-shield,fa-calendar-o,fa-fire-extinguisher,fa-rocket,fa-maxcdn,fa-chevron-circle-left,fa-chevron-circle-right,fa-chevron-circle-up,fa-chevron-circle-down,fa-html,fa-css,fa-anchor,fa-unlock-alt,fa-bullseye,fa-ellipsis-h,fa-ellipsis-v,fa-rss-square,fa-play-circle,fa-ticket,fa-minus-square,fa-minus-square-o,fa-level-up,fa-level-down,fa-check-square,fa-pencil-square,fa-external-link-square,fa-share-square,fa-compass,fa-caret-square-o-down,fa-caret-square-o-up,fa-caret-square-o-right,fa-eur,fa-gbp,fa-usd,fa-inr,fa-jpy,fa-rub,fa-krw,fa-btc,fa-file,fa-file-text,fa-sort-alpha-asc,fa-sort-alpha-desc,fa-sort-amount-asc,fa-sort-amount-desc,fa-sort-numeric-asc,fa-sort-numeric-desc,fa-thumbs-up,fa-thumbs-down,fa-long-arrow-down,fa-long-arrow-up,fa-long-arrow-left,fa-long-arrow-right,fa-android,fa-linux,fa-skype,fa-foursquare,fa-trello,fa-gittip,fa-sun-o,fa-moon-o,fa-archive,fa-bug,fa-vk,fa-weibo,fa-renren,fa-pagelines,fa-arrow-circle-o-right,fa-arrow-circle-o-left,fa-caret-square-o-left,fa-dot-circle-o,fa-wheelchair,fa-vimeo-square,fa-try,fa-plus-square-o' );

    $fa_icons = array();
    
    $fa_icons[''] = __("- Select Icon -", 'bwl_kb');
    
    foreach ($fa_icon_array_lists as $key => $value) {

                $fa_icons['fa '.$value] = ucfirst( str_replace("-", " ", str_replace("fa-", "",  $value) ) );

    }

    return $fa_icons;

}

function bkb_get_sticky_items() {
    
    
    $bkb_data = get_option('bkb_options');
    
    $bkb_sticky_html = "";
    
    if ( !isset($bkb_data['bkb_display_sticky_button']) || $bkb_data['bkb_display_sticky_button'] != "" ) {
        
        wp_enqueue_script( 'bkb-remodal-script' ); // Load Modal Scripts
        
        $bkb_search_html = "";
        $bkb_search_modal_window = "";
        
        $bkb_search_html .='<li id="bkb_search_popup" >
                                           <a href="#" title="'.__('Search', 'bwl-kb').'"><i class="fa fa-search"></i></a> <span>'.__('Search', 'bwl-kb').'</span>
                                          </li>';

        $bkb_search_modal_window .= '<div data-remodal-id="bkb_search_modal">'
                                                        .  do_shortcode("[bkb_search /]").
                                                    '</div>';
        
        
        if ( isset($bkb_data['bkb_display_question_submission_form']) && $bkb_data['bkb_display_question_submission_form'] == 1 ) {
                
            $bkb_ask_ques_html = "";
            $bkb_ask_ques_modal = "";
            
        } else {
            
            $bkb_ask_ques_html ='<li id="bkb_ask_ques_popup">
                                                    <a href="#" title="'.__('Ask a new Knowledgebase Question', 'bwl-kb').'"><i class="fa fa-edit"></i></a> <span>'.__('Ask A Question?', 'bwl-kb').'</span>
                                                  </li>';

            $bkb_ask_ques_modal = '<div data-remodal-id="bkb_ask_ques_modal">'
                                                            .  do_shortcode("[bkb_ques_form /]") .
                                                        '</div>';
            
        }


        $bkb_sticky_html .='<div class="bkb-sticky-container">
                                            <ul class="bkb-sticky">
                                            ' . $bkb_search_html . '
                                            ' . $bkb_ask_ques_html . '
                                            </ul>
                                      </div>';



        $bkb_sticky_html = $bkb_sticky_html . $bkb_search_modal_window . $bkb_ask_ques_modal;
    
    }
    
    echo $bkb_sticky_html;
    
}


add_action('wp_footer', 'bkb_get_sticky_items');


/*-------------------------Clean Up Shortcode--------------------------------------*/


function bkb_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'bkb_clean_shortcodes');

/*------------------------------ Filter Category Page Title  ---------------------------------*/



function bkb_custom_cat_page_title($title) {
    
    $bkb_data = get_option('bkb_options');
 
    if ( is_tax( 'bkb_category' ) && isset( $bkb_data ['bkb_custom_cat_page_title_status']['enabled'] ) && $bkb_data ['bkb_custom_cat_page_title_status']['enabled'] == "on" ) {
        
        $bkb_cat_additional_title_text = "";
        $bkb_cat_title = ucfirst( single_cat_title( '', false ) );
        $bkb_cat_custom_title = "";
     
        if ( isset( $bkb_data ['bkb_custom_cat_page_title_status']['bkb_cat_additional_title_text'] ) && $bkb_data ['bkb_custom_cat_page_title_status']['bkb_cat_additional_title_text'] != "" ) {
            
            $bkb_cat_additional_title_text = $bkb_data ['bkb_custom_cat_page_title_status']['bkb_cat_additional_title_text'];
            
        }
        
        if ( isset( $bkb_data ['bkb_custom_cat_page_title_status']['bkb_cat_additional_title_prefix_status'] ) && 
                    $bkb_data ['bkb_custom_cat_page_title_status']['bkb_cat_additional_title_prefix_status'] == "on" ) {
            
            $bkb_cat_custom_title = $bkb_cat_additional_title_text . $bkb_cat_title ;
            
        } else {
            
            $bkb_cat_custom_title = $bkb_cat_title .  $bkb_cat_additional_title_text;
            
        }
        
        return $bkb_cat_custom_title;
    
    } else{
        
        return $title;
        
    }
    
}
 

add_filter('wp_title', 'bkb_custom_cat_page_title', 10, 1);
 

/*------------------------------ Filter Tags Page Title  ---------------------------------*/

function bkb_custom_tag_page_title( $title ) {
    
    $bkb_data = get_option('bkb_options');
 
    if ( is_tax( 'bkb_tags' ) && isset( $bkb_data ['bkb_custom_tag_page_title_status']['enabled'] ) && $bkb_data ['bkb_custom_tag_page_title_status']['enabled'] == "on" ) {
        
        $bkb_tag_additional_title_text = "";
        $bkb_tag_title = ucfirst( single_cat_title( '', false ) );
        $bkb_tag_custom_title = "";
     
        if ( isset( $bkb_data ['bkb_custom_tag_page_title_status']['bkb_tag_additional_title_text'] ) && $bkb_data ['bkb_custom_tag_page_title_status']['bkb_tag_additional_title_text'] != "" ) {
            
            $bkb_tag_additional_title_text = $bkb_data ['bkb_custom_tag_page_title_status']['bkb_tag_additional_title_text'];
            
        }
        
        if ( isset( $bkb_data ['bkb_custom_tag_page_title_status']['bkb_tag_additional_title_prefix_status'] ) && 
                    $bkb_data ['bkb_custom_tag_page_title_status']['bkb_tag_additional_title_prefix_status'] == "on" ) {
            
            $bkb_tag_custom_title = $bkb_tag_additional_title_text .  $bkb_tag_title ;
            
        } else {
            
            $bkb_tag_custom_title = $bkb_tag_title . $bkb_tag_additional_title_text;
            
        }
        
        return $bkb_tag_custom_title;
    
    } else{
        
        return $title;
        
    }
    
}
 

add_filter('wp_title', 'bkb_custom_tag_page_title', 10, 1);

/*------------------------------ CUSTOM STYLESHEET ---------------------------------*/

function bkbm_custom_style() {

    $style = '<style type="text/css">
                                    .bkb-custom-icon-font{
                                            display: inline-block; text-align: center; 
                                             font-size: 20px;
                                    }
                                </style>';


    echo $style;
}

add_action('admin_head', 'bkbm_custom_style');