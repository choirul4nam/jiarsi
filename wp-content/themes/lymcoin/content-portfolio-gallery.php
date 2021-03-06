<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_blog_style = explode('_', lymcoin_get_theme_option('blog_style'));
$lymcoin_columns = empty($lymcoin_blog_style[1]) ? 2 : max(2, $lymcoin_blog_style[1]);
$lymcoin_post_format = get_post_format();
$lymcoin_post_format = empty($lymcoin_post_format) ? 'standard' : str_replace('post-format-', '', $lymcoin_post_format);
$lymcoin_animation = lymcoin_get_theme_option('blog_animation');
$lymcoin_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($lymcoin_columns).' post_format_'.esc_attr($lymcoin_post_format) ); ?>
	<?php echo (!lymcoin_is_off($lymcoin_animation) ? ' data-animation="'.esc_attr(lymcoin_get_animation_classes($lymcoin_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($lymcoin_image[1]) && !empty($lymcoin_image[2])) echo intval($lymcoin_image[1]) .'x' . intval($lymcoin_image[2]); ?>"
	data-src="<?php if (!empty($lymcoin_image[0])) echo esc_url($lymcoin_image[0]); ?>"
	>

	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$lymcoin_image_hover = 'icon';
	if (in_array($lymcoin_image_hover, array('icons', 'zoom'))) $lymcoin_image_hover = 'dots';
	$lymcoin_components = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('meta_parts'));
	$lymcoin_counters = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('counters'));
	lymcoin_show_post_featured(array(
		'hover' => $lymcoin_image_hover,
		'thumb_size' => lymcoin_get_thumb_size( strpos(lymcoin_get_theme_option('body_style'), 'full')!==false || $lymcoin_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. (!empty($lymcoin_components)
										? lymcoin_show_post_meta(apply_filters('lymcoin_filter_post_meta_args', array(
											'components' => $lymcoin_components,
											'counters' => $lymcoin_counters,
											'seo' => false,
											'echo' => false
											), $lymcoin_blog_style[0], $lymcoin_columns))
										: '')
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'lymcoin') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>