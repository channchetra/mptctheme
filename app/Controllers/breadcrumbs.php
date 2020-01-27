<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Breadcrumbs extends Controller
{
    // private method to get term parent as list code from:
    // https://developer.wordpress.org/reference/functions/get_term_parents_list/

    private static function getTermParentsList($term_id, $taxonomy, $args = array())
    {
        $list = '';
        $term = get_term($term_id, $taxonomy);
     
        if (is_wp_error($term)) {
            return $term;
        }
     
        if (! $term) {
            return $list;
        }
     
        $term_id = $term->term_id;
     
        $defaults = array(
            'format'    => 'name',
            'separator' => '/',
            'link'      => true,
            'inclusive' => true,
        );
     
        $args = wp_parse_args($args, $defaults);
     
        foreach (array( 'link', 'inclusive' ) as $bool) {
            $args[ $bool ] = wp_validate_boolean($args[ $bool ]);
        }
     
        $parents = get_ancestors($term_id, $taxonomy, 'taxonomy');
     
        if ($args['inclusive']) {
            array_unshift($parents, $term_id);
        }
     
        foreach (array_reverse($parents) as $term_id) {
            $parent = get_term($term_id, $taxonomy);
            $name   = ( 'slug' === $args['format'] ) ? $parent->slug : $parent->name;
     
            if ($args['link']) {
                $list .= '<li><a href="' . esc_url(get_term_link($parent->term_id, $taxonomy)) . '">' . $name . '</a></li>';
            } else {
                $list .= '<li>' . $name . '</li>';
            }
        }
     
        return $list;
    }


    // Method ដំណើរការបង្កើត Breadcrumbs
    public static function mptcBreadcrumbs()
    {
            $delimiter = '&raquo;';
            $name = __('ទំព័រដើម', 'sage');
            $breadcrumb_output = '';
            $currentBefore = '<span class="current">';
            $currentAfter = '</span>';
            
        if (!is_home() && !is_front_page() || is_paged()) {
            $breadcrumb_output .= '<ul>';
            
            global $post;
            $home = get_bloginfo('url');
            $breadcrumb_output .= '<li><a href="' . $home . '">' . $name . '</a></li>';
            
            if (is_category()) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);

                if ($thisCat->parent != 0) {
                    $breadcrumb_output .= self::getTermParentsList($thisCat, 'category', array( 'inclusive' => false ));
                }
                $breadcrumb_output .= '<li><a href="'. esc_url(get_category_link($thisCat)) .'">';
                $breadcrumb_output .= $thisCat->name;
                $breadcrumb_output .= '</a></li>';
            } elseif (is_day()) {
                $breadcrumb_output .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
                $breadcrumb_output .= '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
                $breadcrumb_output .= '<li>' . get_the_time('d') . '</li>';
            } elseif (is_month()) {
                $breadcrumb_output .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
                $breadcrumb_output .= '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
            } elseif (is_year()) {
                $breadcrumb_output .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            } elseif (is_single() && !is_attachment()) {
                $cat = get_the_category();
                $cat = $cat[0];
                $breadcrumb_output .= self::getTermParentsList($cat, 'category');
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                $breadcrumb_output .= self::getTermParentsList($cat, 'category');
                $breadcrumb_output .= '<a href="' . get_permalink($parent) . '">' . mb_strimwidth($parent->post_title, 0, 50, '...') . '</a>';
            } elseif (is_page() && !$post->post_parent) {
                $breadcrumb_output .= '<li><a href="#">' . get_the_title() . '</a></li>';
            } elseif (is_page() && $post->post_parent) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id  = $page->post_parent;
                }
                    $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    $breadcrumb_output .= $crumb;
                }
                $breadcrumb_output .= '<li><a href="#">' . get_the_title() . '</a></li>';
            } elseif (is_search()) {
                $breadcrumb_output .= '<li>';
                $breadcrumb_output .= __('លទ្ធផលស្វែងរកនៃពាក្យ៖ ', 'sage');
                $breadcrumb_output .= get_search_query();
                $breadcrumb_output .= '</li>';
            } elseif (is_tag()) {
                $breadcrumb_output .= '<li>';
                $breadcrumb_output .= single_tag_title('', false);
                $breadcrumb_output .= '</li>';
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                $breadcrumb_output .= '<li>';
                $breadcrumb_output .= __('អត្ថបទដែលបានបង្ហោះដោយ ៖ ', 'sage');
                $breadcrumb_output .= $userdata->display_name;
                $breadcrumb_output .= '</li>';
            } elseif (is_404()) {
                $breadcrumb_output .= '<li><a href="#">' . __('ទំព័រមានបញ្ហា', 'sage') . '</a></li>';
            }
            
            if (get_query_var('paged')) {
                $breadcrumb_output .= '<li>';
                $breadcrumb_output .= __('ទំព័រទី៖', 'sage') . ' ' . get_query_var('paged');
                $breadcrumb_output .= '</li>';
            }
                $breadcrumb_output .= '</ul>';
                return $breadcrumb_output;
        }
    }
}
