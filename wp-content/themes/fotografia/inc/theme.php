<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Fotografia
 */
/**
 * Link a Home Page.
 */
add_action(
    'admin_menu',
    function () {

        if (get_option('page_on_front')) {
            // Add home page.
            add_menu_page(
                'Home Page',
                __('Home Page', 'fotografia'),
                'edit_posts',
                '/post.php?post=' . get_option('page_on_front') . '&action=edit',
                null,
                'dashicons-admin-home',
                5
            );
        }
    }
);


// Ocultar Posts
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// permitir svg
function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

function safe_svg_upload($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    if ($filetype['ext'] === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext'] = 'svg';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'safe_svg_upload', 10, 4);

function add_svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_mime_types');

function fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_display');


//Cache con API Transients
function get_custom_cached_data() {
    $cached_data = get_transient('my_custom_data');

    if ($cached_data === false) {
        global $wpdb;
        $cached_data = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_status = 'publish' LIMIT 10");

        set_transient('my_custom_data', $cached_data, 12 * HOUR_IN_SECONDS);
    }

    return $cached_data;
}
