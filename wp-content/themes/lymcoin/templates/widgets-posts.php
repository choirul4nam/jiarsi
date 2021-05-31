<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_post_id    = get_the_ID();
$lymcoin_post_date  = lymcoin_get_date();
$lymcoin_post_title = get_the_title();
$lymcoin_post_link  = get_permalink();
$lymcoin_post_author_id   = get_the_author_meta('ID');
$lymcoin_post_author_name = get_the_author_meta('display_name');
$lymcoin_post_author_url  = get_author_posts_url($lymcoin_post_author_id, '');

$lymcoin_args = get_query_var('lymcoin_args_widgets_posts');
$lymcoin_show_date = isset($lymcoin_args['show_date']) ? (int) $lymcoin_args['show_date'] : 1;
$lymcoin_show_image = isset($lymcoin_args['show_image']) ? (int) $lymcoin_args['show_image'] : 1;
$lymcoin_show_author = isset($lymcoin_args['show_author']) ? (int) $lymcoin_args['show_author'] : 1;
$lymcoin_show_counters = isset($lymcoin_args['show_counters']) ? (int) $lymcoin_args['show_counters'] : 1;
$lymcoin_show_categories = isset($lymcoin_args['show_categories']) ? (int) $lymcoin_args['show_categories'] : 1;

$lymcoin_output = lymcoin_storage_get('lymcoin_output_widgets_posts');

$lymcoin_post_counters_output = '';
if ( $lymcoin_show_counters ) {
	$lymcoin_post_counters_output = '<span class="post_info_item post_info_counters">'
								. lymcoin_get_post_counters('comments')
							. '</span>';
}


$lymcoin_output .= '<article class="post_item with_thumb">';

if ($lymcoin_show_image) {
	$lymcoin_post_thumb = get_the_post_thumbnail($lymcoin_post_id, lymcoin_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($lymcoin_post_thumb) $lymcoin_output .= '<div class="post_thumb">' . ($lymcoin_post_link ? '<a href="' . esc_url($lymcoin_post_link) . '">' : '') . ($lymcoin_post_thumb) . ($lymcoin_post_link ? '</a>' : '') . '</div>';
}

$lymcoin_output .= '<div class="post_content">'
			. ($lymcoin_show_categories 
					? '<div class="post_categories">'
						. lymcoin_get_post_categories()
						. $lymcoin_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($lymcoin_post_link ? '<a href="' . esc_url($lymcoin_post_link) . '">' : '') . ($lymcoin_post_title) . ($lymcoin_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('lymcoin_filter_get_post_info', 
								'<div class="post_info">'
									. ($lymcoin_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($lymcoin_post_link ? '<a href="' . esc_url($lymcoin_post_link) . '" class="post_info_date">' : '') 
											. esc_html($lymcoin_post_date) 
											. ($lymcoin_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($lymcoin_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'lymcoin') . ' ' 
											. ($lymcoin_post_link ? '<a href="' . esc_url($lymcoin_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($lymcoin_post_author_name) 
											. ($lymcoin_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$lymcoin_show_categories && $lymcoin_post_counters_output
										? $lymcoin_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
lymcoin_storage_set('lymcoin_output_widgets_posts', $lymcoin_output);
?>