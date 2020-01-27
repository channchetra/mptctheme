<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Relateds extends Controller
{
    // private method to get Related Post:
    // https://learnedia.com/show-related-posts-wordpress-blog-no-plugin/
    public static function relatedbyTag()
    {
        global $post; //contains data from the current post in the WP loop
        $tags = wp_get_post_tags($post->ID); //retrieve a list of tags for current post
        $tag_ids = array();
        $data = [];
        foreach ($tags as $individual_tag) {
            $tag_ids[] = $individual_tag->term_id; //loop through list of tags and store term_id of each
        }
        // build argument list for WP_Query
        $args = [
          'tag__in' => $tag_ids, //use tag ids that are within $tag_ids array
          'post__not_in' => [$post->ID], //don’t retrieve current post
          'post_type' => 'post', //specify post type to retrieve
          'post_status' => 'publish', //retrieve only published posts
          'posts_per_page' => 2, //specify number of related posts to show
          'orderby' => ['date' => 'DESC'], //how you want to order your posts
          'no_found_rows' => true, //use for better query performance
          'cache_results' => false //use for better query performance
        ];
        $query_related_posts = new \WP_query($args);
        if ($query_related_posts->have_posts()) {
            while ($query_related_posts->have_posts()) {
                $query_related_posts->the_post();
                array_push(
                    $data,
                    [
                        'title'     => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'date'      => get_the_date(),
                        'post_thumbnail'    => App::mptcthumbnail()
                    ]
                );
            }
        }
        wp_reset_postdata();
        return $data;
    }
    public static function relatedbyCat()
    {
        global $post;
        $cat = get_the_category($post->ID);
        $data = [];
        $args = [
        'category__in' => $cat[0],
        'post__not_in' => [$post->ID],
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 2,
        'orderby' => ['date' => 'DESC'],
        'no_found_rows' => true,
        'cache_results' => false
        ];
        $query_related_posts = new \WP_query($args);
        if ($query_related_posts->have_posts()) {
            while ($query_related_posts->have_posts()) {
                $query_related_posts->the_post();
                array_push(
                    $data,
                    [
                        'title'     => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'date'      => get_the_date(),
                        'post_thumbnail'    => App::mptcthumbnail()
                    ]
                );
            }
        }
        wp_reset_postdata();
        return $data;
    }
}
