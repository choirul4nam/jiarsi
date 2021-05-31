<div class="front_page_section front_page_section_about<?php
			$lymcoin_scheme = lymcoin_get_theme_option('front_page_about_scheme');
			if (!lymcoin_is_inherit($lymcoin_scheme)) echo ' scheme_'.esc_attr($lymcoin_scheme);
			echo ' front_page_section_paddings_'.esc_attr(lymcoin_get_theme_option('front_page_about_paddings'));
		?>"<?php
		$lymcoin_css = '';
		$lymcoin_bg_image = lymcoin_get_theme_option('front_page_about_bg_image');
		if (!empty($lymcoin_bg_image)) 
			$lymcoin_css .= 'background-image: url('.esc_url(lymcoin_get_attachment_url($lymcoin_bg_image)).');';
		if (!empty($lymcoin_css))
			echo ' style="' . esc_attr($lymcoin_css) . '"';
?>><?php
	// Add anchor
	$lymcoin_anchor_icon = lymcoin_get_theme_option('front_page_about_anchor_icon');	
	$lymcoin_anchor_text = lymcoin_get_theme_option('front_page_about_anchor_text');	
	if ((!empty($lymcoin_anchor_icon) || !empty($lymcoin_anchor_text)) && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="front_page_section_about"'
										. (!empty($lymcoin_anchor_icon) ? ' icon="'.esc_attr($lymcoin_anchor_icon).'"' : '')
										. (!empty($lymcoin_anchor_text) ? ' title="'.esc_attr($lymcoin_anchor_text).'"' : '')
										. ']');
	}
	?>
	<div class="front_page_section_inner front_page_section_about_inner<?php
			if (lymcoin_get_theme_option('front_page_about_fullheight'))
				echo ' lymcoin-full-height sc_layouts_flex sc_layouts_columns_middle';
			?>"<?php
			$lymcoin_css = '';
			$lymcoin_bg_mask = lymcoin_get_theme_option('front_page_about_bg_mask');
			$lymcoin_bg_color = lymcoin_get_theme_option('front_page_about_bg_color');
			if (!empty($lymcoin_bg_color) && $lymcoin_bg_mask > 0)
				$lymcoin_css .= 'background-color: '.esc_attr($lymcoin_bg_mask==1
																	? $lymcoin_bg_color
																	: lymcoin_hex2rgba($lymcoin_bg_color, $lymcoin_bg_mask)
																).';';
			if (!empty($lymcoin_css))
				echo ' style="' . esc_attr($lymcoin_css) . '"';
	?>>
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$lymcoin_caption = lymcoin_get_theme_option('front_page_about_caption');
			if (!empty($lymcoin_caption) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo !empty($lymcoin_caption) ? 'filled' : 'empty'; ?>"><?php echo wp_kses($lymcoin_caption, 'lymcoin_kses_content'); ?></h2><?php
			}
		
			// Description (text)
			$lymcoin_description = lymcoin_get_theme_option('front_page_about_description');
			if (!empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo !empty($lymcoin_description) ? 'filled' : 'empty'; ?>"><?php echo wp_kses(wpautop($lymcoin_description), 'lymcoin_kses_content'); ?></div><?php
			}
			
			// Content
			$lymcoin_content = lymcoin_get_theme_option('front_page_about_content');
			if (!empty($lymcoin_content) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo !empty($lymcoin_content) ? 'filled' : 'empty'; ?>"><?php
					$lymcoin_page_content_mask = '%%CONTENT%%';
					if (strpos($lymcoin_content, $lymcoin_page_content_mask) !== false) {
						$lymcoin_content = preg_replace(
									'/(\<p\>\s*)?'.$lymcoin_page_content_mask.'(\s*\<\/p\>)/i',
									sprintf('<div class="front_page_section_about_source">%s</div>',
												apply_filters('the_content', get_the_content())),
									$lymcoin_content
									);
					}
					lymcoin_show_layout($lymcoin_content);
				?></div><?php
			}
			?>
		</div>
	</div>
</div>