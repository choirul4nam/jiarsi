<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($lymcoin_columns).' post_format_'.esc_attr($lymcoin_post_format).(is_sticky() && !is_paged() ? ' sticky' : '') ); ?>
	<?php echo (!lymcoin_is_off($lymcoin_animation) ? ' data-animation="'.esc_attr(lymcoin_get_animation_classes($lymcoin_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$lymcoin_image_hover = lymcoin_get_theme_option('image_hover');
	// Featured image
	lymcoin_show_post_featured(array(
		'thumb_size' => lymcoin_get_thumb_size(strpos(lymcoin_get_theme_option('body_style'), 'full')!==false || $lymcoin_columns < 3 
								? 'masonry-big' 
								: 'masonry'),
		'show_no_image' => true,
		'class' => $lymcoin_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $lymcoin_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>