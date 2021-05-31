<div class="front_page_section front_page_section_contacts<?php
			$lymcoin_scheme = lymcoin_get_theme_option('front_page_contacts_scheme');
			if (!lymcoin_is_inherit($lymcoin_scheme)) echo ' scheme_'.esc_attr($lymcoin_scheme);
			echo ' front_page_section_paddings_'.esc_attr(lymcoin_get_theme_option('front_page_contacts_paddings'));
		?>"<?php
		$lymcoin_css = '';
		$lymcoin_bg_image = lymcoin_get_theme_option('front_page_contacts_bg_image');
		if (!empty($lymcoin_bg_image)) 
			$lymcoin_css .= 'background-image: url('.esc_url(lymcoin_get_attachment_url($lymcoin_bg_image)).');';
		if (!empty($lymcoin_css))
			echo ' style="' . esc_attr($lymcoin_css) . '"';
?>><?php
	// Add anchor
	$lymcoin_anchor_icon = lymcoin_get_theme_option('front_page_contacts_anchor_icon');	
	$lymcoin_anchor_text = lymcoin_get_theme_option('front_page_contacts_anchor_text');	
	if ((!empty($lymcoin_anchor_icon) || !empty($lymcoin_anchor_text)) && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="front_page_section_contacts"'
										. (!empty($lymcoin_anchor_icon) ? ' icon="'.esc_attr($lymcoin_anchor_icon).'"' : '')
										. (!empty($lymcoin_anchor_text) ? ' title="'.esc_attr($lymcoin_anchor_text).'"' : '')
										. ']');
	}
	?>
	<div class="front_page_section_inner front_page_section_contacts_inner<?php
			if (lymcoin_get_theme_option('front_page_contacts_fullheight'))
				echo ' lymcoin-full-height sc_layouts_flex sc_layouts_columns_middle';
			?>"<?php
			$lymcoin_css = '';
			$lymcoin_bg_mask = lymcoin_get_theme_option('front_page_contacts_bg_mask');
			$lymcoin_bg_color = lymcoin_get_theme_option('front_page_contacts_bg_color');
			if (!empty($lymcoin_bg_color) && $lymcoin_bg_mask > 0)
				$lymcoin_css .= 'background-color: '.esc_attr($lymcoin_bg_mask==1
																	? $lymcoin_bg_color
																	: lymcoin_hex2rgba($lymcoin_bg_color, $lymcoin_bg_mask)
																).';';
			if (!empty($lymcoin_css))
				echo ' style="' . esc_attr($lymcoin_css) . '"';
	?>>
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$lymcoin_caption = lymcoin_get_theme_option('front_page_contacts_caption');
			$lymcoin_description = lymcoin_get_theme_option('front_page_contacts_description');
			if (!empty($lymcoin_caption) || !empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				// Caption
				if (!empty($lymcoin_caption) || (current_user_can('edit_theme_options') && is_customize_preview())) {
					?><h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo !empty($lymcoin_caption) ? 'filled' : 'empty'; ?>"><?php
						echo wp_kses($lymcoin_caption, 'lymcoin_kses_content');
					?></h2><?php
				}
			
				// Description
				if (!empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
					?><div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo !empty($lymcoin_description) ? 'filled' : 'empty'; ?>"><?php
						echo wp_kses(wpautop($lymcoin_description), 'lymcoin_kses_content');
					?></div><?php
				}
			}

			// Content (text)
			$lymcoin_content = lymcoin_get_theme_option('front_page_contacts_content');
			$lymcoin_layout = lymcoin_get_theme_option('front_page_contacts_layout');
			if ($lymcoin_layout == 'columns' && (!empty($lymcoin_content) || (current_user_can('edit_theme_options') && is_customize_preview()))) {
				?><div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ((!empty($lymcoin_content) || (current_user_can('edit_theme_options') && is_customize_preview()))) {
				?><div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo !empty($lymcoin_content) ? 'filled' : 'empty'; ?>"><?php
					echo wp_kses($lymcoin_content, 'lymcoin_kses_content');
				?></div><?php
			}

			if ($lymcoin_layout == 'columns' && (!empty($lymcoin_content) || (current_user_can('edit_theme_options') && is_customize_preview()))) {
				?></div><div class="column-2_3"><?php
			}
		
			// Shortcode output
			$lymcoin_sc = lymcoin_get_theme_option('front_page_contacts_shortcode');
			if (!empty($lymcoin_sc) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				?><div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo !empty($lymcoin_sc) ? 'filled' : 'empty'; ?>"><?php
					lymcoin_show_layout(do_shortcode($lymcoin_sc));
				?></div><?php
			}

			if ($lymcoin_layout == 'columns' && (!empty($lymcoin_content) || (current_user_can('edit_theme_options') && is_customize_preview()))) {
				?></div></div><?php
			}
			?>			
		</div>
	</div>
</div>