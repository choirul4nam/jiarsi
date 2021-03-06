<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.14
 */
$lymcoin_header_video = lymcoin_get_header_video();
$lymcoin_embed_video = '';
if (!empty($lymcoin_header_video) && !lymcoin_is_from_uploads($lymcoin_header_video)) {
	if (lymcoin_is_youtube_url($lymcoin_header_video) && preg_match('/[=\/]([^=\/]*)$/', $lymcoin_header_video, $matches) && !empty($matches[1])) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr($matches[1]); ?>"></div><?php
	} else {
		global $wp_embed;
		if (false && is_object($wp_embed)) {
			$lymcoin_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($lymcoin_header_video) . '[/embed]' ));
			$lymcoin_embed_video = lymcoin_make_video_autoplay($lymcoin_embed_video);
		} else {
			$lymcoin_header_video = str_replace('/watch?v=', '/embed/', $lymcoin_header_video);
			$lymcoin_header_video = lymcoin_add_to_url($lymcoin_header_video, array(
				'feature' => 'oembed',
				'controls' => 0,
				'autoplay' => 1,
				'showinfo' => 0,
				'modestbranding' => 1,
				'wmode' => 'transparent',
				'enablejsapi' => 1,
				'origin' => home_url(),
				'widgetid' => 1
			));
			$lymcoin_embed_video = '<iframe src="' . esc_url($lymcoin_header_video) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?><div id="background_video"><?php lymcoin_show_layout($lymcoin_embed_video); ?></div><?php
	}
}
?>