<div class="front_page_section front_page_section_woocommerce<?php
			$lymcoin_scheme = lymcoin_get_theme_option('front_page_woocommerce_scheme');
			if (!lymcoin_is_inherit($lymcoin_scheme)) echo ' scheme_'.esc_attr($lymcoin_scheme);
			echo ' front_page_section_paddings_'.esc_attr(lymcoin_get_theme_option('front_page_woocommerce_paddings'));
		?>"<?php
		$lymcoin_css = '';
		$lymcoin_bg_image = lymcoin_get_theme_option('front_page_woocommerce_bg_image');
		if (!empty($lymcoin_bg_image)) 
			$lymcoin_css .= 'background-image: url('.esc_url(lymcoin_get_attachment_url($lymcoin_bg_image)).');';
		if (!empty($lymcoin_css))
			echo ' style="' . esc_attr($lymcoin_css) . '"';
?>><?php
	// Add anchor
	$lymcoin_anchor_icon = lymcoin_get_theme_option('front_page_woocommerce_anchor_icon');	
	$lymcoin_anchor_text = lymcoin_get_theme_option('front_page_woocommerce_anchor_text');	
	if ((!empty($lymcoin_anchor_icon) || !empty($lymcoin_anchor_text)) && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="front_page_section_woocommerce"'
										. (!empty($lymcoin_anchor_icon) ? ' icon="'.esc_attr($lymcoin_anchor_icon).'"' : '')
										. (!empty($lymcoin_anchor_text) ? ' title="'.esc_attr($lymcoin_anchor_text).'"' : '')
										. ']');
	}
	?>
	<div class="front_page_section_inner front_page_section_woocommerce_inner<?php
			if (lymcoin_get_theme_option('front_page_woocommerce_fullheight'))
				echo ' lymcoin-full-height sc_layouts_flex sc_layouts_columns_middle';
			?>"<?php
			$lymcoin_css = '';
			$lymcoin_bg_mask = lymcoin_get_theme_option('front_page_woocommerce_bg_mask');
			$lymcoin_bg_color = lymcoin_get_theme_option('front_page_woocommerce_bg_color');
			if (!empty($lymcoin_bg_color) && $lymcoin_bg_mask > 0)
				$lymcoin_css .= 'background-color: '.esc_attr($lymcoin_bg_mask==1
																	? $lymcoin_bg_color
																	: lymcoin_hex2rgba($lymcoin_bg_color, $lymcoin_bg_mask)
																).';';
			if (!empty($lymcoin_css))
				echo ' style="' . esc_attr($lymcoin_css) . '"';
	?>>
		<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
			<?php
			// Content wrap with title and description
			$lymcoin_caption = lymcoin_get_theme_option('front_page_woocommerce_caption');
			$lymcoin_description = lymcoin_get_theme_option('front_page_woocommerce_description');
			if (!empty($lymcoin_caption) || !empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
				// Caption
				if (!empty($lymcoin_caption) || (current_user_can('edit_theme_options') && is_customize_preview())) {
					?><h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo !empty($lymcoin_caption) ? 'filled' : 'empty'; ?>"><?php
						echo wp_kses($lymcoin_caption, 'lymcoin_kses_content');
					?></h2><?php
				}
			
				// Description (text)
				if (!empty($lymcoin_description) || (current_user_can('edit_theme_options') && is_customize_preview())) {
					?><div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo !empty($lymcoin_description) ? 'filled' : 'empty'; ?>"><?php
						echo wp_kses(wpautop($lymcoin_description), 'lymcoin_kses_content');
					?></div><?php
				}
			}
		
			// Content (widgets)
			?><div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs"><?php 
				$lymcoin_woocommerce_sc = lymcoin_get_theme_option('front_page_woocommerce_products');
				if ($lymcoin_woocommerce_sc == 'products') {
					$lymcoin_woocommerce_sc_ids = lymcoin_get_theme_option('front_page_woocommerce_products_per_page');
					$lymcoin_woocommerce_sc_per_page = count(explode(',', $lymcoin_woocommerce_sc_ids));
				} else {
					$lymcoin_woocommerce_sc_per_page = max(1, (int) lymcoin_get_theme_option('front_page_woocommerce_products_per_page'));
				}
				$lymcoin_woocommerce_sc_columns = max(1, min($lymcoin_woocommerce_sc_per_page, (int) lymcoin_get_theme_option('front_page_woocommerce_products_columns')));
				echo do_shortcode("[{$lymcoin_woocommerce_sc}"
									. ($lymcoin_woocommerce_sc == 'products' 
											? ' ids="'.esc_attr($lymcoin_woocommerce_sc_ids).'"' 
											: '')
									. ($lymcoin_woocommerce_sc == 'product_category' 
											? ' category="'.esc_attr(lymcoin_get_theme_option('front_page_woocommerce_products_categories')).'"' 
											: '')
									. ($lymcoin_woocommerce_sc != 'best_selling_products' 
											? ' orderby="'.esc_attr(lymcoin_get_theme_option('front_page_woocommerce_products_orderby')).'"'
											  . ' order="'.esc_attr(lymcoin_get_theme_option('front_page_woocommerce_products_order')).'"' 
											: '')
									. ' per_page="'.esc_attr($lymcoin_woocommerce_sc_per_page).'"' 
									. ' columns="'.esc_attr($lymcoin_woocommerce_sc_columns).'"' 
									. ']');
			?></div>
		</div>
	</div>
</div>