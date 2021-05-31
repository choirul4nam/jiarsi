<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

if ( false ) {
	$lymcoin_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($lymcoin_src[0])) {
		lymcoin_sc_layouts_showed('featured', true);
		?><div class="sc_layouts_featured with_image without_content <?php echo esc_attr(lymcoin_add_inline_css_class('background-image:url('.esc_url($lymcoin_src[0]).');')); ?>"></div><?php
	}
}
?>