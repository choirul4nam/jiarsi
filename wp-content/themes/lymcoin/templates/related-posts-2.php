<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_link = get_permalink();
$lymcoin_post_format = get_post_format();
$lymcoin_post_format = empty($lymcoin_post_format) ? 'standard' : str_replace('post-format-', '', $lymcoin_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_2 post_format_'.esc_attr($lymcoin_post_format) ); ?>><?php
	lymcoin_show_post_featured(array(
		'thumb_size' => apply_filters('lymcoin_filter_related_thumb_size', lymcoin_get_thumb_size( (int) lymcoin_get_theme_option('related_posts') == 1 ? 'huge' : 'big' )),
		'show_no_image' => lymcoin_get_theme_setting('allow_no_image'),
		'singular' => false
		)
	);
	?><div class="post_header entry-header">
        <h4 class="post_title entry-title"><a href="<?php echo esc_url($lymcoin_link); ?>"><?php the_title(); ?></a></h4>
        <?php
		if ( in_array(get_post_type(), array( 'post', 'attachment' ) ) ) {
			?><span class="post_date"><a href="<?php echo esc_url($lymcoin_link); ?>"><?php echo wp_kses_data(lymcoin_get_date()); ?></a></span><?php
		}
		?>
	</div>
</div>