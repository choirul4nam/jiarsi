<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

lymcoin_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	lymcoin_show_layout(get_query_var('blog_archive_start'));

	$lymcoin_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$lymcoin_sticky_out = lymcoin_get_theme_option('sticky_style')=='columns' 
							&& is_array($lymcoin_stickies) && count($lymcoin_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$lymcoin_cat = lymcoin_get_theme_option('parent_cat');
	$lymcoin_post_type = lymcoin_get_theme_option('post_type');
	$lymcoin_taxonomy = lymcoin_get_post_type_taxonomy($lymcoin_post_type);
	$lymcoin_show_filters = lymcoin_get_theme_option('show_filters');
	$lymcoin_tabs = array();
	if (!lymcoin_is_off($lymcoin_show_filters)) {
		$lymcoin_args = array(
			'type'			=> $lymcoin_post_type,
			'child_of'		=> $lymcoin_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $lymcoin_taxonomy,
			'pad_counts'	=> false
		);
		$lymcoin_portfolio_list = get_terms($lymcoin_args);
		if (is_array($lymcoin_portfolio_list) && count($lymcoin_portfolio_list) > 0) {
			$lymcoin_tabs[$lymcoin_cat] = esc_html__('All', 'lymcoin');
			foreach ($lymcoin_portfolio_list as $lymcoin_term) {
				if (isset($lymcoin_term->term_id)) $lymcoin_tabs[$lymcoin_term->term_id] = $lymcoin_term->name;
			}
		}
	}
	if (count($lymcoin_tabs) > 0) {
		$lymcoin_portfolio_filters_ajax = true;
		$lymcoin_portfolio_filters_active = $lymcoin_cat;
		$lymcoin_portfolio_filters_id = 'portfolio_filters';
		?>
		<div class="portfolio_filters lymcoin_tabs lymcoin_tabs_ajax">
			<ul class="portfolio_titles lymcoin_tabs_titles">
				<?php
				foreach ($lymcoin_tabs as $lymcoin_id=>$lymcoin_title) {
					?><li><a href="<?php echo esc_url(lymcoin_get_hash_link(sprintf('#%s_%s_content', $lymcoin_portfolio_filters_id, $lymcoin_id))); ?>" data-tab="<?php echo esc_attr($lymcoin_id); ?>"><?php echo esc_html($lymcoin_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$lymcoin_ppp = lymcoin_get_theme_option('posts_per_page');
			if (lymcoin_is_inherit($lymcoin_ppp)) $lymcoin_ppp = '';
			foreach ($lymcoin_tabs as $lymcoin_id=>$lymcoin_title) {
				$lymcoin_portfolio_need_content = $lymcoin_id==$lymcoin_portfolio_filters_active || !$lymcoin_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $lymcoin_portfolio_filters_id, $lymcoin_id)); ?>"
					class="portfolio_content lymcoin_tabs_content"
					data-blog-template="<?php echo esc_attr(lymcoin_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(lymcoin_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($lymcoin_ppp); ?>"
					data-post-type="<?php echo esc_attr($lymcoin_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($lymcoin_taxonomy); ?>"
					data-cat="<?php echo esc_attr($lymcoin_id); ?>"
					data-parent-cat="<?php echo esc_attr($lymcoin_cat); ?>"
					data-need-content="<?php echo (false===$lymcoin_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($lymcoin_portfolio_need_content) 
						lymcoin_show_portfolio_posts(array(
							'cat' => $lymcoin_id,
							'parent_cat' => $lymcoin_cat,
							'taxonomy' => $lymcoin_taxonomy,
							'post_type' => $lymcoin_post_type,
							'page' => 1,
							'sticky' => $lymcoin_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		lymcoin_show_portfolio_posts(array(
			'cat' => $lymcoin_cat,
			'parent_cat' => $lymcoin_cat,
			'taxonomy' => $lymcoin_taxonomy,
			'post_type' => $lymcoin_post_type,
			'page' => 1,
			'sticky' => $lymcoin_sticky_out
			)
		);
	}

	lymcoin_show_layout(get_query_var('blog_archive_end'));

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>