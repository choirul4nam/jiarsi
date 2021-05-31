<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_link = get_permalink();
$lymcoin_post_format = get_post_format();
$lymcoin_post_format = empty($lymcoin_post_format) ? 'standard' : str_replace('post-format-', '', $lymcoin_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($lymcoin_post_format) ); ?>><?php
	lymcoin_show_post_featured(array(
		'thumb_size' => apply_filters('lymcoin_filter_related_thumb_size', lymcoin_get_thumb_size( (int) lymcoin_get_theme_option('related_posts') == 1 ? 'huge' : 'big' )),
		'show_no_image' => lymcoin_get_theme_setting('allow_no_image'),
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">'.wp_kses(lymcoin_get_post_categories(''), 'lymcoin_kses_content').'</div>'
							. '<h6 class="post_title entry-title"><a href="'.esc_url($lymcoin_link).'">'.esc_html(get_the_title()).'</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="'.esc_url($lymcoin_link).'">'.wp_kses_data(lymcoin_get_date()).'</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>