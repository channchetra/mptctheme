<?php

namespace App;

/**
 * Add the slider shortcodes
 */
add_action('init', function () {
    add_shortcode('creator', function ($atts, $content = null) {
    // Extract the shortcode attributes
        $atts = shortcode_atts(array(
        "slug"    => false,
        ), $atts);
    // Start object caching or output
        ob_start();
    // Set the template we're going to use for the Shortcode
        $template = 'partials/shortcodes/block-slider';
    // Set up template data
        $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
            return apply_filters("sage/template/{$class}/data", $data, $template);
        }, []);

    /** **********************
    * This is the new part
    ********************** **/
    // Get the term, by slug, and append it to the data array
        // $data['creator'] = get_term_by('slug', $atts['slug'], 'creator');

    /** **********************
    * End new part
    ************************/

    // Echo the shortcode blade template
        echo template($template, $data);
    // Return cached object
        return ob_get_clean();
    });
});
