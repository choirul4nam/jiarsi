<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

$lymcoin_blog_style = explode('_', lymcoin_get_theme_option('blog_style'));
$lymcoin_columns = empty($lymcoin_blog_style[1]) ? 2 : max(2, $lymcoin_blog_style[1]);
$lymcoin_expanded = !lymcoin_sidebar_present() && lymcoin_is_on(lymcoin_get_theme_option('expand_content'));
$lymcoin_post_format = get_post_format();
$lymcoin_post_format = empty($lymcoin_post_format) ? 'standard' : str_replace('post-format-', '', $lymcoin_post_format);
$lymcoin_animation = lymcoin_get_theme_option('blog_animation');
$lymcoin_components = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('meta_parts'));
$lymcoin_counters = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('counters'));

?><div class="<?php echo esc_attr($lymcoin_blog_style[0] == 'classic' ? 'column' : 'masonry_item masonry_item'); ?>-1_<?php echo esc_attr($lymcoin_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_format_'.esc_attr($lymcoin_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($lymcoin_columns)
					. ' post_layout_'.esc_attr($lymcoin_blog_style[0]) 
					. ' post_layout_'.esc_attr($lymcoin_blog_style[0]).'_'.esc_attr($lymcoin_columns)
					); ?>
	<?php echo (!lymcoin_is_off($lymcoin_animation) ? ' data-animation="'.esc_attr(lymcoin_get_animation_classes($lymcoin_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	lymcoin_show_post_featured( array( 'thumb_size' => lymcoin_get_thumb_size($lymcoin_blog_style[0] == 'classic'
													? (strpos(lymcoin_get_theme_option('body_style'), 'full')!==false 
															? ( $lymcoin_columns > 2 ? 'big' : 'huge' )
															: (	$lymcoin_columns > 2
																? ($lymcoin_expanded ? 'med' : 'small')
																: ($lymcoin_expanded ? 'big' : 'med')
																)
														)
													: (strpos(lymcoin_get_theme_option('body_style'), 'full')!==false 
															? ( $lymcoin_columns > 2 ? 'masonry-big' : 'full' )
															: (	$lymcoin_columns <= 2 && $lymcoin_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($lymcoin_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('lymcoin_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('lymcoin_action_before_post_meta'); 

			// Post meta
			if (!empty($lymcoin_components))
				lymcoin_show_post_meta(apply_filters('lymcoin_filter_post_meta_args', array(
					'components' => $lymcoin_components,
					'counters' => $lymcoin_counters,
					'seo' => false
					), $lymcoin_blog_style[0], $lymcoin_columns)
				);

			do_action('lymcoin_action_after_post_meta'); 
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$lymcoin_show_learn_more = false;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($lymcoin_post_format, array('link', 'aside', 'status'))) {
				the_content();
			} else if ($lymcoin_post_format == 'quote') {
				if (($quote = lymcoin_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))!='')
					lymcoin_show_layout(wpautop($quote));
				else
					the_excerpt();
			} else if (substr(get_the_content(), 0, 4)!='[vc_' && substr(get_the_content(), 3, 4)!='[vc_') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($lymcoin_post_format, array('link', 'aside', 'status', 'quote'))) {
			if (!empty($lymcoin_components))
				lymcoin_show_post_meta(apply_filters('lymcoin_filter_post_meta_args', array(
					'components' => $lymcoin_components,
					'counters' => $lymcoin_counters
					), $lymcoin_blog_style[0], $lymcoin_columns)
				);
		}
		// More button
		if ( $lymcoin_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'lymcoin'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>