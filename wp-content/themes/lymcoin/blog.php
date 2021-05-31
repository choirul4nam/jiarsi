<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WordPress editor or any Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$lymcoin_content = '';
$lymcoin_blog_archive_mask = '%%CONTENT%%';
$lymcoin_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $lymcoin_blog_archive_mask);
if ( have_posts() ) {
	the_post();
	if (($lymcoin_content = apply_filters('the_content', get_the_content())) != '') {
		if (($lymcoin_pos = strpos($lymcoin_content, $lymcoin_blog_archive_mask)) !== false) {
			$lymcoin_content = preg_replace('/(\<p\>\s*)?'.$lymcoin_blog_archive_mask.'(\s*\<\/p\>)/i', $lymcoin_blog_archive_subst, $lymcoin_content);
		} else
			$lymcoin_content .= $lymcoin_blog_archive_subst;
		$lymcoin_content = explode($lymcoin_blog_archive_mask, $lymcoin_content);
		// Add VC custom styles to the inline CSS
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( !empty( $vc_custom_css ) ) lymcoin_add_inline_css(strip_tags($vc_custom_css));
	}
}

// Prepare args for a new query
$lymcoin_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$lymcoin_args = lymcoin_query_add_posts_and_cats($lymcoin_args, '', lymcoin_get_theme_option('post_type'), lymcoin_get_theme_option('parent_cat'));
$lymcoin_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($lymcoin_page_number > 1) {
	$lymcoin_args['paged'] = $lymcoin_page_number;
	$lymcoin_args['ignore_sticky_posts'] = true;
}
$lymcoin_ppp = lymcoin_get_theme_option('posts_per_page');
if ((int) $lymcoin_ppp != 0)
	$lymcoin_args['posts_per_page'] = (int) $lymcoin_ppp;
// Make a new main query
$GLOBALS['wp_the_query']->query($lymcoin_args);


// Add internal query vars in the new query!
if (is_array($lymcoin_content) && count($lymcoin_content) == 2) {
	set_query_var('blog_archive_start', $lymcoin_content[0]);
	set_query_var('blog_archive_end', $lymcoin_content[1]);
}

get_template_part('index');
?>