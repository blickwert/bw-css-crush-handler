<?php
/**
 * Plugin Name: BW CSS Crush Handler
 * Description: Integrates CSSCrush into WordPress to preprocess enqueued CSS files.
 * Version: 1.1
 * Author: Your Name
 * License: MIT
 */

// Ensure CSSCrush library is included
if (!class_exists('CssCrush')) {
    require_once plugin_dir_path(__FILE__) . 'lib/css-crush-master/CssCrush.php';
}

// Hook into WordPress enqueue process
add_filter('style_loader_tag', 'bw_process_enqueued_styles_with_csscrush', 10, 4);

function bw_process_enqueued_styles_with_csscrush($html, $handle, $href, $media) {
    if (is_admin()) {
        return $html; // Don't process in the admin dashboard
    }

    $cache_dir = wp_upload_dir()['basedir'] . '/bw-css-crush-cache/';
    if (!file_exists($cache_dir)) {
        mkdir($cache_dir, 0755, true);
    }

    $options = [
        'cache' => true,
        'debug' => false,
        'minify' => true,
        'versioning' => true,
        'output_dir' => $cache_dir,
    ];

    try {
        // Use csscrush_tag to process and generate the CSS tag
        $processed_tag = csscrush_tag($href, $options);

        if ($processed_tag) {
            return $processed_tag; // Return the processed tag
        }
    } catch (Exception $e) {
        // Handle exceptions and fallback
        if (!current_user_can('manage_options')) {
            $cached_file = $cache_dir . basename($href);
            if (file_exists($cached_file)) {
                $cached_url = str_replace(wp_upload_dir()['basedir'], wp_upload_dir()['baseurl'], $cached_file);
                return "<link rel='stylesheet' id='{$handle}-css' href='{$cached_url}' media='{$media}' />";
            }
        }
    }

    // On failure, return the original HTML tag
    return $html;
}
