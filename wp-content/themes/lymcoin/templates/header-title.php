<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

// Page (category, tag, archive, author) title

if ( lymcoin_need_page_title() ) {
	lymcoin_sc_layouts_showed('title', true);
	lymcoin_sc_layouts_showed('postmeta', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$lymcoin_blog_title = lymcoin_get_blog_title();
							$lymcoin_blog_title_text = $lymcoin_blog_title_class = $lymcoin_blog_title_link = $lymcoin_blog_title_link_text = '';
							if (is_array($lymcoin_blog_title)) {
								$lymcoin_blog_title_text = $lymcoin_blog_title['text'];
								$lymcoin_blog_title_class = !empty($lymcoin_blog_title['class']) ? ' '.$lymcoin_blog_title['class'] : '';
								$lymcoin_blog_title_link = !empty($lymcoin_blog_title['link']) ? $lymcoin_blog_title['link'] : '';
								$lymcoin_blog_title_link_text = !empty($lymcoin_blog_title['link_text']) ? $lymcoin_blog_title['link_text'] : '';
							} else
								$lymcoin_blog_title_text = $lymcoin_blog_title;
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr($lymcoin_blog_title_class); ?>"><?php
								$lymcoin_top_icon = lymcoin_get_category_icon();
								if (!empty($lymcoin_top_icon)) {
									$lymcoin_attr = lymcoin_getimagesize($lymcoin_top_icon);
                                    ?><img src="<?php echo esc_url($lymcoin_top_icon); ?>" alt="<?php esc_attr_e('Site icon', 'lymcoin'); ?>" <?php if (!empty($lymcoin_attr[3])) lymcoin_show_layout($lymcoin_attr[3]);?>><?php
								}
								echo wp_kses($lymcoin_blog_title_text, 'lymcoin_kses_content');
							?></h1>
							<?php
							if (!empty($lymcoin_blog_title_link) && !empty($lymcoin_blog_title_link_text)) {
								?><a href="<?php echo esc_url($lymcoin_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($lymcoin_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'lymcoin_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>