<?php
/**
 * ==================================
 * Filter: pmxi_custom_field
 * ==================================
 *
 * Custom field values can be filtered before save using this hook.
 * 
 * [IMPORTANT NOTE]: THE $original_value parameter is new in WP All Import v4.5.6-beta-4.8 and should be excluded
 * in older versions of WP All Import.
 *
 * @param $value              string - The new custom field value from the data file
 * @param $post_id            int    - The id of the post
 * @param $key                string - The custom field key
 * @param $original_value     string - Original, unserialized, value. (NOTE: NEW IN WP All Import v4.5.6-beta-4.8)
 * @param $existing_meta_keys mixed  - ??? TODO: Document
 * @param $import_id          int    - The id of the import
 *
 * @return mixed
 */
function my_custom_field($value, $post_id, $key, $original_value, $existing_meta_keys, $import_id)
{
    // Unless you want this code to execute for every import, check the import id
    // if ($import_id === 5) { ... }

    return $value;
}

add_filter('pmxi_custom_field', 'my_custom_field', 10, 6);


// ----------------------------
// Example uses below
// ----------------------------


/**
 * Only update the custom field if the new value is not empty
 *
 *
 */
function keep_existing_if_empty($value, $post_id, $key, $original_value, $existing_meta, $import_id)
{
    if ($key == 'ENTER-YOUR-CUSTOM-FIELD-NAME-HERE') {
        if (empty($value)) {
            $value = isset($existing_meta[$key][0]) ? $existing_meta[$key][0] : $value;
        }
    }
    return $value;
}

add_filter('pmxi_custom_field', 'keep_existing_if_empty', 10, 6);


