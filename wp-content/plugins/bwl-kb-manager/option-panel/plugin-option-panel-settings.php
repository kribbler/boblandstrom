<?php

  //include the main class file
  if ( ! class_exists( 'BF_Admin_Page_Class') ) :
    
    require_once("admin-page-class/admin-page-class.php");

 endif;
  
// delete_option('bkb_options');
  /**
   * configure your admin page
   */
  $config = array(    
    'menu'           => 'bwl_kb',             //sub page to settings page
    'page_title'     => __('Option Panel','bwl-kb'),       //The name of this page  
    'capability'     => 'activate_plugins',         // The capability needed to view the page, only admin can see the option panel.
    'option_group'   => 'bkb_options',       //the name of the option to create in the database [do change]
    'id'             => 'bkb_admin_page',            // meta box id, unique per page[do change]
    'fields'         => array(),            // list of fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );  
  
  /**
   * instantiate your admin page
   */
  $options_panel = new BF_Admin_Page_Class($config);
  $options_panel->OpenTabs_container('');
  
  /**
   * define your admin page tabs listing
   */
  $options_panel->TabsListing(array(
    'links' => array(
      'options_general' =>  __('General','bwl-kb'),
      'options_kb_page' =>  __('Knowledege Base Page','bwl-kb'),
      'options_theme' =>  __('Theme Options','bwl-kb'),
//      'options_breadcrumb' =>  __('Breadcrumb Settings','bwl-kb'),
      'options_voting' =>  __('Voting Options','bwl-kb'),
      'options_tipsy' =>  __('Tipsy Settings','bwl-kb'),
      'options_icons' =>  __('Icon Settings','bwl-kb'),
      'options_advance' =>  __('Advance','bwl-kb')
    )
  ));
  
  /**
   * Open admin page for General Settings
   */
  $options_panel->OpenTab('options_general');

  //title
  $options_panel->Title(__("General Options",'bwl-kb'));
  
  //Required Login To Submit Vote
  $options_panel->addCheckbox('bkb_login_status',array('name'=> __('Login Required? ','bwl-kb'), 'std' => FALSE, 'desc' => __('Allow voting & submit questions only for registered users.', 'bwl-kb')));

  //Enable Font Awesome
  $options_panel->addCheckbox('bkb_fontawesome_status',array('name'=> __('Load Font Awesome ','bwl-kb'), 'std' => true, 'desc' => __('If your theme already loaded Font Awesome icons, then you can disable this option.', 'bwl-kb')));
  
  //Enable Font Awesome
  $options_panel->addCheckbox('bkb_display_sticky_button',array('name'=> __('Display Sticky Button? ','bwl-kb'), 'std' => true, 'desc' => __('Display sticky search and add question button.', 'bwl-kb')));

  //Enable Font Awesome
  $options_panel->addCheckbox('bkb_display_question_submission_form',array('name'=> __('Hide External Question Submission Form? ','bwl-kb'), 'std' => false));
  
  //Title Of External From
  $options_panel->addText('bkb_ask_question_title',array('name'=> __('External Question Submission Form Title','bwl-kb'), 'std' => __( "Add A Knowledge Base Question !", 'bwl-kb'), 'desc' => __('Set external knowledgebase submission FORM title in here.','bwl-kb')));

  //Ask User Email
  $options_panel->addCheckbox('bkb_ask_user_email_status',array('name'=> __('Ask User Email','bwl-kb'), 'std' => true, 'desc' => __( "Force users to submit their Email while submit question. Admin can notify user when question will publish or update.", 'bwl-kb')));
  
  //Title Of Feedback From
  $options_panel->addText('bkb_feedback_form_title', array('name'=> __('Feedback Form Title','bwl-kb'), 'std'=> __('Tell us how can we improve this post?', 'bwl-kb') , 'desc' => __('Set Feedback Form title in here.', 'bwl-kb')));
  
  //Feedback Email to Admin
  $options_panel->addCheckbox('bkb_feedback_email_status',array('name'=> __('Send Feedback Message To Admin','bwl-kb'), 'std' => true, 'desc' => __( "Turn it ON to get user feedback notification.", 'bwl-kb')));
  
  //Admin Email Address
  $options_panel->addText('bkb_feedback_admin_email', array('name'=> __('Admin Email ','bwl-kb'), 'std'=> get_bloginfo( 'admin_email' ), 'desc' => __( "Set an email address to get Ask A Question & Feedback submit notification", 'bwl-kb')));
  
  
  $options_panel->CloseTab();
  
  $options_panel->OpenTab('options_theme');
 
  //title
  $options_panel->Title(__('Theme Settings','bwl-kb'));
  
  //Enable/Disable Like/Dislike Bar

//  $options_panel->addColor('bkb_text_color',array('name'=> __('Text Color ','bwl-kb'), 'std' => '#000000'));
  $options_panel->addColor('bkb_heading_link_color',array('name'=> __('Heading Link Color ','bwl-kb'), 'std' => '#0074A2'));
  $options_panel->addColor('bkb_heading_link_hover_color',array('name'=> __('Heading Link Hover Color ','bwl-kb'), 'std' => '#004F6C'));
//  $options_panel->addColor('bkb_link_color',array('name'=> __('Link Color ','bwl-kb'), 'std' => '#2C2C2C'));
//  $options_panel->addColor('bkb_link_hover_color',array('name'=> __('Link Hover Color ','bwl-kb'), 'std' => '#EEEEEE'));
  
  $options_panel->CloseTab();
  
  $options_panel->OpenTab('options_voting');
 
  //title
  $options_panel->Title(__('Voting Options','bwl-kb'));
  
    
  //Like Thumb Icon.

  $options_panel->addSelect('bkb_like_thumb_icon',array('fa-thumbs-o-up'=>'Transparent Thumbs Up', 
                                                                             'fa-thumbs-up'=>'Filled Thumbs Up',
                                                                             'fa-heart-o'=>'Transparent Heart',
                                                                             'fa-heart'=>'Filled Heart',
                                                                             'fa-smile-o'=>'Smile Face',
                                                                             'fa-level-up'=>'Level up',
                                                                             'fa-arrow-circle-up'=>'Circle up',
                                                                             'fa-arrow-up'=>'Arrow up',
                                                                             'fa-angle-up'=>'Angle up',
                                                                             'fa-angle-double-up'=>'Double Angle up'),
          
                                array('name'=> __('Like Thumb Icon','bwl-kb'), 'std'=> array('fa-thumbs-o-up')));
 
  
  //Like Thumb Color
  $options_panel->addColor('bkb_like_thumb_color',array('name'=> __('Like Thumb Color','bwl-kb'), 'std' => '#559900',  'desc' => ''));

  //Like Custom Icon.
  $bkb_like_conditinal_fields[] = $options_panel->addImage('bkb_custom_like_icon',array('name'=> __('Upload Like Icon ','bwl-kb')),true);
  
 
  //conditinal block
  $options_panel->addCondition('bkb_like_conditinal_fields',
      array(
        'name' => __('Upload Custom Like Icon? ','bwl-kb'),
        'desc' => __('<small>You can upload custom icon for like button. Best size 16x16 PX</small>','bwl-kb'),
        'fields' => $bkb_like_conditinal_fields,
        'std' => false
      ));
  
  //Disable Down Vote
   $options_panel->addCheckbox('bkb_disable_feedback_status',array('name'=> __('Disable Feedback From? ','bwl-kb'), 'std' => FALSE, 'desc' => __('You can disable feedback from for down vote.', 'bwl-kb')));
  
  //Disable Down Vote
   $options_panel->addCheckbox('bkb_disable_down_vote_status',array('name'=> __('Disable Down Vote? ','bwl-kb'), 'std' => FALSE, 'desc' => __('You can disable down voting option', 'bwl-kb')));
   
  //dislike Thumb Icon.

  $options_panel->addSelect('bkb_dislike_thumb_icon',array('fa-thumbs-o-down'=>'Transparent Thumbs Down', 
                                                                                'fa-thumbs-down'=>'Filled Thumbs Down',
                                                                                'fa-frown-o'=>'Sad Face ',
                                                                                'fa-level-down'=>'Level Down',
                                                                                'fa-arrow-circle-down'=>'Circle Down',
                                                                                'fa-arrow-down'=>'Arrow Down',
                                                                                'fa-angle-down'=>'Angle Down',
                                                                                'fa-angle-double-down'=>'Double Angle Down'),
          
                                array('name'=> __('Dislike Thumb Icon','bwl-kb'), 'std'=> array('fa-thumbs-o-down')));
  
  
  
  //Dislike Thumb field
  $options_panel->addColor('bkb_dislike_thumb_color',array('name'=> __('Dislike Thumb Color ','bwl-kb'), 'std' => '#C9231A',  'desc' => ''));
  
  //Dislike Custom Icon.
  $bkb_dislike_conditinal_fields[] = $options_panel->addImage('bkb_custom_dislike_icon',array('name'=> __('Upload Dislike Icon ','bwl-kb')),true);

  //conditinal block
  $options_panel->addCondition('bkb_dislike_conditinal_fields',
      array(
        'name' => __('Upload Custom Dislike Icon? ','bwl-kb'),
        'desc' => __('<small>You can upload custom icon for dislike button. Best size 16x16 PX</small>','bwl-kb'),
        'fields' => $bkb_dislike_conditinal_fields,
        'std' => false
      ));
  
  //Like Bar Color
  $options_panel->addColor('bkb_like_bar_color',array('name'=> __('Like Bar Color','bwl-kb'), 'std' => '#559900',  'desc' => ''));
  
 //Dislike Color field
  $options_panel->addColor('bkb_dislike_bar_color',array('name'=> __('Dislike Bar Color ','bwl-kb'), 'std' => '#C9231A',  'desc' => ''));
  
  //is_numeric
    $options_panel->addText('bkb_vote_interval',
      array(
        'name'     => __('Voting Interval ','bwl-kb'),
        'std'      => '120',
        'desc'     => __("e.g: we set 120 min(2 hours) interval between repeated votes in a same post",'bwl-kb'),
        'validate' => array(
            'numeric' => array('param' => '','message' => __("must be number. e.g: 120",'bwl-kb'))
        )
      )
    );
  
  $options_panel->CloseTab();
  
   
  $options_panel->OpenTab('options_advance');
  
  //title
 
  $options_panel->Title(__("Advance Setting",'bwl-kb'));
  
  //IP Filter Options
  $options_panel->addCheckbox('bkb_ip_filter_status',array('name'=> __('IP Filter Status: ','bwl-kb'), 'std' => TRUE, 'desc' => __('If you disable this option then your can submit multiple votes from single IP address.', 'bwl-kb') ));
 
  $options_panel->addText('bkb_custom_slug', array('name'=> __('Custom Slug','bwl-kb'), 'std'=> 'bwl-knowledge-base' , 'desc' => __('<b>Example:</b> http://yourdomain.com/custom-slug/faq-4/ <br /><b>Note:</b> You may face 404 issue after changing slug value. To solve that, Go to Settings>Permalinks. Select "Default" from Common Settings, click save. Then again select "Post name" radio button and click save. Issue will be solved.', 'bwl-kb')));
 
  //Custom Category Page Title (Introduced in version 1.0.1)
  $bkb_cat_conditinal_fields[] = $options_panel->addText('bkb_cat_additional_title_text',array('name'=> __('Additional Title Text ','bwl-kb'), 'desc' =>__('<b>Tips</b> : You can add seperators like Vertical bar (|) , Hyphen (-) before/after additional text.', 'bwl-kb')),true);
  $bkb_cat_conditinal_fields[] = $options_panel->addCheckbox('bkb_cat_additional_title_prefix_status',array('name'=> __('Additional text display before Category title ? ','bwl-kb'),  'std' => FALSE),true);
  
  $options_panel->addCondition('bkb_custom_cat_page_title_status', array('name'=> __('Display Only Category Name in page title ? ','bwl-kb'), 'std' => FALSE, 
                                                                                                     'fields' => $bkb_cat_conditinal_fields,
                                                                                                     'desc' => __('If you enable(ON) this option then only category title will display in page title', 'bwl-kb' )));
  
  //Custom Tag Page Title (Introduced in version 1.0.1)
  
  $bkb_tag_conditinal_fields[] = $options_panel->addText('bkb_tag_additional_title_text',array('name'=> __('Additional Title Text ','bwl-kb'), 'desc' => __('<b>Tips</b> : You can add seperators like Vertical bar (|) , Hyphen (-) before/after additional text.', 'bwl-kb')),true);
  $bkb_tag_conditinal_fields[] = $options_panel->addCheckbox('bkb_tag_additional_title_prefix_status',array('name'=> __('Additional text display before Tag Title ? ','bwl-kb'),  'std' => FALSE),true);
  
  $options_panel->addCondition('bkb_custom_tag_page_title_status',array('name'=> __('Display Only Tag Name in page title ? ','bwl-kb'), 'std' => FALSE, 
                                                                                                      'fields' => $bkb_tag_conditinal_fields,
                                                                                                      'desc' => __('If you enable(ON) this option then only tag title will display in page title.', 'bwl-kb')));

  //Enable File Uploader
  $options_panel->addCheckbox('bkb_attachment_status',array('name'=> __('Disable Attachment Uploader','bwl-kb'), 'std' => FALSE, 'desc' => __('You can disable attachment uploader for knowledgebase contents', 'bwl-kb')));
  
  $options_panel->addCode('bkb_custom_css',array('name'=> __('Custom CSS ','bwl-kb'), 'syntax' => 'css', 'desc' => __('You can write custom css code in here.','bwl-kb')));
 
  //Auto Update Notification
  $options_panel->addCheckbox('bkb_auto_update_status',array('name'=> __('Auto Update Notification: ','bwl-kb'), 'std' => FALSE, 'desc' => __('If you enable this option then you will get notification while we release new version. <b style="color: #e32e31;">We strongly recommend to take a backup of your language file/custom css code/custom scripts before applying updates.</b>', 'bwl-kb')));
  
  $options_panel->CloseTab();
 
  
  $options_panel->OpenTab('options_tipsy');

  //title
  $options_panel->Title(__("Tipsy Options",'bwl-kb'));
  
  //Disable Tipsy
  $options_panel->addCheckbox('bkb_tipsy_status',array('name'=> __('Show Tool Tip ','bwl-kb'), 'std' => TRUE, 'desc' => __('You can disable Like/Dislike tooltip text.', 'bwl-kb') ));

  //Tipsy Like Hover Title
  $options_panel->addText('bkb_tipsy_like_title', array('name'=> __('Like Hover Title','bwl-kb'), 'std'=> __('Like The Post', 'bwl-kb') , 'desc' => ''));
  
  //Tipsy Dislike Hover Title
  $options_panel->addText('bkb_tipsy_dislike_title', array('name'=> __('Dislike Hover Title','bwl-kb'), 'std'=> __('Dislike The Post', 'bwl-kb') , 'desc' => ''));
  
  //Tipsy Background
  $options_panel->addColor('bkb_tipsy_bg',array('name'=> __('Tipsy Background','bwl-kb'), 'std' => '#000000',  'desc' => ''));

   //Tipsy Background
   $options_panel->addColor('bkb_tipsy_text_color',array('name'=> __('Tipsy Text Color','bwl-kb'), 'std' => '#FFFFFF',  'desc' => ''));
  
  $options_panel->CloseTab();
  
  /*-----------------------------Icon Tab----------------------------------*/
  
  $options_panel->OpenTab('options_icons');
 
  $options_panel->Title(__("Icons","bwl-kb"));
  
  $options_panel->addSelect('bkb_cat_icon', bkb_get_fa_icons(), array('name'=> __('Category Icon','bwl-kb'), 'std'=> array('fa fa-file-o')));
  $options_panel->addSelect('bkb_tag_icon', bkb_get_fa_icons(), array('name'=> __('Tag Icon','bwl-kb'), 'std'=> array('fa fa-th')));
    
 
  $options_panel->CloseTab();
  
  
  /*---------------------------Single Page Settings ------------------------------------*/
  
//  $options_panel->OpenTab('options_breadcrumb');
// 
//  $options_panel->Title(__("Breadcrumb Settings","bwl-kb"));
//  
//  $options_panel->addCheckbox('bkb_display_date',array('name'=> __('Display Date: ','bwl-kb'), 'std' => TRUE, 'desc' => ''));
//  $options_panel->addCheckbox('bkb_display_post_view',array('name'=> __('Display View Counter: ','bwl-kb'), 'std' => TRUE, 'desc' => ''));
//  $options_panel->addCheckbox('bkb_display_author_name',array('name'=> __('Display Author Name: ','bwl-kb'), 'std' => TRUE, 'desc' => ''));
//  $options_panel->addCheckbox('bkb_display_categories',array('name'=> __('Display Categories: ','bwl-kb'), 'std' => TRUE, 'desc' => ''));
//  $options_panel->addCheckbox('bkb_display_tags',array('name'=> __('Display Tags: ','bwl-kb'), 'std' => TRUE, 'desc' => ''));
 
//  $options_panel->CloseTab();
 
  /*---------------------------Knowledege Base Page Settings ------------------------------------*/
  
  $options_panel->OpenTab('options_kb_page');
 
  $options_panel->Title(__("Knowledege Base Page","bwl-kb"));
  
//  $options_panel->addSortable('bkb_tab_fields',array('1' => 'Featured','2'=> 'Popular', '3' => 'Recent'),array('name' => __('Sort Tab Fields','bwl-kb')));
  
  $options_panel->addColor('bkb_list_text_color',array('name'=> __('KB List Text Color','bwl-kb'), 'std' => '#2C2C2C',  'desc' => ''));
  $options_panel->addColor('bkb_list_bg',array('name'=> __('KB List Background','bwl-kb'), 'std' => '#EBEBEB',  'desc' => ''));
  
  $options_panel->addColor('bkb_list_hover_text_color',array('name'=> __('KB List Hover Text Color','bwl-kb'), 'std' => '#5c5c5c',  'desc' => ''));
  $options_panel->addColor('bkb_list_hover_bg',array('name'=> __('KB List Hover Background','bwl-kb'), 'std' => '#DDDDDD',  'desc' => ''));
  
  $options_panel->addSelect('bkb_list_style_type',array('rounded'=>'Rounded Box', 
                                                                             'rectangle'=>'Square Box',
                                                                             'none'=>'None'),
                                                                    array('name'=> __('KB List Style Type','bwl-kb'), 
                                                                    'std'=> array('rounded')));
 
  $options_panel->addColor('bkb_rounded_box_text_color',array('name'=> __('KB List Box Text Color','bwl-kb'), 'std' => '#2C2C2C',  'desc' => ''));
  $options_panel->addColor('bkb_rounded_box_bg',array('name'=> __('KB List Box Background','bwl-kb'), 'std' => '#CDCDCD',  'desc' => ''));
  
  $options_panel->addColor('bkb_tab_border_color',array('name'=> __('Tab Border Color ','bwl-kb'), 'std' => '#2C2C2C'));
  
  //Comment Section
  // Introduced Version: 1.0.3
  $options_panel->Title(__("Comment Display Settings",'bwl-kb'));
  
  //Meta info display settings.
  $options_panel->addCheckbox('bkb_comment_status',array('name'=> __('Enable Comment? ','bwl-kb'), 'std' => FALSE,  'desc' => __('Theme support required to display comment box after knowledgebase details.', 'bwl-kb') ));
  
  
  //title
  // Introduced Version: 1.0.3
  $options_panel->Title(__("Meta Information Display Settins",'bwl-kb'));
  
  //Meta info display settings.
  $options_panel->addCheckbox('bkb_meta_date_status',array('name'=> __('Display Date? ','bwl-kb'), 'std' => true ));
  $options_panel->addCheckbox('bkb_meta_view_status',array('name'=> __('Display View Counter? ','bwl-kb'), 'std' => true ));
  $options_panel->addCheckbox('bkb_meta_author_status',array('name'=> __('Display Author Name? ','bwl-kb'), 'std' => true ));
  $options_panel->addCheckbox('bkb_meta_category_status',array('name'=> __('Display Category? ','bwl-kb'), 'std' => true ));
  $options_panel->addCheckbox('bkb_meta_topics_status',array('name'=> __('Display Topics? ','bwl-kb'), 'std' => true ));
  
  $options_panel->CloseTab();