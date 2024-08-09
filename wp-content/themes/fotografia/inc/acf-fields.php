<?php
if (!function_exists('acf_add_local_field_group'))
	return;

$settings_pages = ['settings' => 'General', 'menu' => 'Menu'];

acf_add_options_page();


foreach ($settings_pages as $file => $label):
	$file = get_template_directory() . '/inc/acf/' . $file . '.php';
	if (file_exists($file) === false)
		continue;

	acf_add_options_sub_page($label);

	include_once($file);
endforeach;

// Enable local json acf
function fotografia_acf_json_save_point($path)
{
	return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'fotografia_acf_json_save_point');



function fotografia_acf_description($field)
{
	if (!empty($field['instructions']))
		$field['instructions'] = '<span><em>' . $field['instructions'] . '</em></span>';
	return $field;
}
add_filter('acf/pre_render_field', 'fotografia_acf_description');

/**
 * Enable behavior early for escaping html
 */
add_filter('acf/the_field/escape_html_optin', '__return_true');

/**
 * Disable acf shortcode 
 */
add_action('acf/init', function () {
	acf_update_setting('enable_shortcode', false);
});
