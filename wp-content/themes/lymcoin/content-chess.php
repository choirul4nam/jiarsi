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
$lymcoin_columns = empty($lymcoin_blog_style[1]) ? 1 : max(1, $lymcoin_blog_style[1]);
$lymcoin_expanded = !lymcoin_sidebar_present() && lymcoin_is_on(lymcoin_get_theme_option('expand_content'));
$lymcoin_post_format = get_post_format();
$lymcoin_post_format = empty($lymcoin_post_format) ? 'standard' : str_replace('post-format-', '', $lymcoin_post_format);
$lymcoin_animation = lymcoin_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($lymcoin_columns).' post_format_'.esc_attr($lymcoin_post_format) ); ?>
	<?php echo (!lymcoin_is_off($lymcoin_animation) ? ' data-animation="'.esc_attr(lymcoin_get_animation_classes($lymcoin_animation)).'"' : ''); ?>>

	<?php
	// Add anchor
	if ($lymcoin_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.the_title_attribute( array( 'echo' => false ) ).'" icon="'.esc_attr(lymcoin_get_post_icon()).'"]');
	}

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	lymcoin_show_post_featured( array(
											'class' => $lymcoin_columns == 1 ? 'lymcoin-full-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => lymcoin_get_thumb_size(
																	strpos(lymcoin_get_theme_option('body_style'), 'full')!==false
																		? ( $lymcoin_columns > 1 ? 'huge' : 'original' )
																		: (	$lymcoin_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('lymcoin_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('lymcoin_action_before_post_meta'); 

			// Post meta
			$lymcoin_components = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('meta_parts'));
			$lymcoin_counters = lymcoin_array_get_keys_by_value(lymcoin_get_theme_option('counters'));
			$lymcoin_post_meta = empty($lymcoin_components) 
										? '' 
										: lymcoin_show_post_meta(apply_filters('lymcoin_filter_post_meta_args', array(
												'components' => $lymcoin_components,
												'counters' => $lymcoin_counters,
												'seo' => false,
												'echo' => false
												), $lymcoin_blog_style[0], $lymcoin_columns)
											);
			lymcoin_show_layout($lymcoin_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$lymcoin_show_learn_more = !in_array($lymcoin_post_format, array('link', 'aside', 'status', 'quote'));
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
				} else if (substr(get_the_content(), 0, 4)!='[vc_') {
					the_excerpt();
				}
				?>
			</div>
			<?php
			// Post meta
			if (in_array($lymcoin_post_format, array('link', 'aside', 'status', 'quote'))) {
				lymcoin_show_layout($lymcoin_post_meta);
			}
			// More button
			if ( $lymcoin_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'lymcoin'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>