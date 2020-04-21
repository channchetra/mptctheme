<?php

namespace App;

use Roots\Sage\Container;

/**
 * Custom Function for mptctheme
 */
function mptc_kilo_mega_giga($number)
{
    $number_format = number_format_i18n($number);
    $exploded = explode(',', $number_format);
    $count = count($exploded);

    switch ($count) {
        case 2:
            $value = number_format_i18n($number/1000, 1).'K';
            break;
        case 3:
            $value = number_format_i18n($number/1000000, 1).'M';
            break;
        case 4:
            $value = number_format_i18n($number/1000000000, 1).'G';
            break;
        default:
            $value = $number;
    }
    return $value;
}

function mptc_track_post_views($post_id)
{
    if (is_singular()) {
        if (empty($post_id)) {
            global $post;
            $post_id = $post->ID;
        }

        $countKey = 'post_views_count';
        $count = get_post_meta($post_id, $countKey, true);
        if ($count == '') {
            $count = 0;
            delete_post_meta($post_id, $countKey);
            add_post_meta($post_id, $countKey, '0');
        } else {
            $count++;
            update_post_meta($post_id, $countKey, $count);
        }
    }
}
// add_action('wp_head', 'mptc_track_post_views');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function mptc_get_the_posted_view_count()
{
    $view = get_post_meta(get_the_ID(), 'post_views_count');
    if ($view) {
        return mptc_kilo_mega_giga($view[0]);
    }
    return 0;
}

function mptc_template_seletor()
{
    $cat_layout = get_term_meta(get_queried_object_id(), '_mptc_layout_type', true);
    return $cat_layout;
}

function mptc_check_pdf_data()
{
    $document = get_post_meta(get_the_ID(), '_mptc_document_file', true);
    $url = get_site_url();
    return strpos($document, $url) !== false;
}
function mptc_cat_listing()
{
        
    $categories = get_categories([
        'orderby' => 'name',
        'order'   => 'ASC'
     ] );
    $array = array_column($categories, 'name', 'term_id');
    // print_r ($array);
    $data = array();
    foreach( $array as $key => $arr ) {
        $val = array('key'=>$key,'value'=>$arr);
        array_push($data, $val);
    }     
    return $data;
}
