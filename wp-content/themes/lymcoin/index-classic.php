<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

lymcoin_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	lymcoin_show_layout(get_query_var('blog_archive_start'));

	$lymcoin_classes = 'posts_container '
						. (substr(lymcoin_get_theme_option('blog_style'), 0, 7) == 'classic' ? 'columns_wrap columns_padding_bottom' : 'masonry_wrap');
	$lymcoin_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$lymcoin_sticky_out = lymcoin_get_theme_option('sticky_style')=='columns' 
							&& is_array($lymcoin_stickies) && count($lymcoin_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($lymcoin_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$lymcoin_sticky_out) {
		if (lymcoin_get_theme_option('first_post_large') && !is_paged() && !in_array(lymcoin_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="<?php echo esc_attr($lymcoin_classes); ?>"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($lymcoin_sticky_out && !is_sticky()) {
			$lymcoin_sticky_out = false;
			?></div><div class="<?php echo esc_attr($lymcoin_classes); ?>"><?php
		}
		get_template_part( 'content', $lymcoin_sticky_out && is_sticky() ? 'sticky' : 'classic' );
	}
	
	?></div><?php

	lymcoin_show_pagination();

	lymcoin_show_layout(get_query_var('blog_archive_end'));

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>