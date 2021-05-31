<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

lymcoin_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	lymcoin_show_layout(get_query_var('blog_archive_start'));

	?><div class="posts_container"><?php
	
	$lymcoin_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$lymcoin_sticky_out = lymcoin_get_theme_option('sticky_style')=='columns' 
							&& is_array($lymcoin_stickies) && count($lymcoin_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($lymcoin_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($lymcoin_sticky_out && !is_sticky()) {
			$lymcoin_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $lymcoin_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($lymcoin_sticky_out) {
		$lymcoin_sticky_out = false;
		?></div><?php
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