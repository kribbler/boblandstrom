<?php

//add extra fields to category edit form hook
add_action ( 'bkb_category_edit_category_form_fields', 'extra_category_fields', 10, 1);
//add extra fields to category edit form callback function
function extra_category_fields( $tag ) {    //check for existing featured ID
    
    die();
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
    
    echo "<pre>";
    print_r($cat_meta);
    echo "</pre>";
?>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Category Image Url'); ?></label></th>
<td>
<input type="text" name="Cat_meta[img]" id="Cat_meta[img]" size="3" style="width:60%;" value="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"><br />
            <span class="description"><?php _e('Image for category: use full url with http://'); ?></span>
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra1"><?php _e('extra field'); ?></label></th>
<td>
<input type="text" name="Cat_meta[extra1]" id="Cat_meta[extra1]" size="25" style="width:60%;" value="<?php echo $cat_meta['extra1'] ? $cat_meta['extra1'] : ''; ?>"><br />
            <span class="description"><?php _e('extra field'); ?></span>
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra2"><?php _e('extra field'); ?></label></th>
<td>
<input type="text" name="Cat_meta[extra2]" id="Cat_meta[extra2]" size="25" style="width:60%;" value="<?php echo $cat_meta['extra2'] ? $cat_meta['extra2'] : ''; ?>"><br />
            <span class="description"><?php _e('extra field'); ?></span>
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="extra3"><?php _e('extra field'); ?></label></th>
<td>
            <textarea name="Cat_meta[extra3]" id="Cat_meta[extra3]" style="width:60%;"><?php echo $cat_meta['extra3'] ? $cat_meta['extra3'] : ''; ?></textarea><br />
            <span class="description"><?php _e('extra field'); ?></span>
        </td>
</tr>
<?php
}


// save extra category extra fields hook
add_action ( 'edited_category_bkb_category', 'save_extra_category_fileds');
   // save extra category extra fields callback function
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}