<?php
/**
 * The style "default" of the Roadmap block
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

$args = get_query_var('trx_addons_args_sc_roadmap');
$current_date = strtotime(date('F j, Y'));

?><div <?php if (!empty($args['id'])) echo ' id="'.esc_attr($args['id']).'"'; ?>
	class="sc_roadmap sc_roadmap_<?php
		echo esc_attr($args['type']);
		if (!empty($args['class'])) echo ' '.esc_attr($args['class']); 
		?>"<?php
	if (!empty($args['css'])) echo ' style="'.esc_attr($args['css']).'"';
	?>><?php

	trx_addons_sc_show_titles('sc_roadmap', $args);

    if ($args['columns'] > 1) {
		?><div class="sc_roadmap_columns_wrap sc_item_columns <?php echo esc_attr(trx_addons_get_columns_wrap_class()); ?> columns_padding_bottom"><?php
	} else {
		?><div class="sc_roadmap_content sc_item_content"><?php
	}

    foreach ($args['roadmaps'] as $item) {
	    if ($args['columns'] > 1) {
			?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $args['columns'])); ?>"><?php
		}
        if (!empty($item['date'])) {
            $item_date = strtotime($item['date']);
            if ($item_date > $current_date) {
                $item_date_class = ' item_date_next';
            } else if ($item_date < $current_date) {
                $item_date_class = ' item_date_prev';
            } else {
                $item_date_class = ' item_date_now';
            }
        }
		?><div class="sc_roadmap_item sc_roadmap_item_<?php
			echo esc_attr($args['type']);
			if (isset($item_date_class)) echo esc_attr($item_date_class);
		?>">
			<?php
			?><div class="sc_roadmap_item_info"><?php
				if (!empty($item['title'])) {
					$item['title'] = explode('|', $item['title']);
					?><h6 class="sc_roadmap_item_title"><?php
						foreach ($item['title'] as $str) {
							?><span><?php echo esc_html($str); ?></span><?php
						}
					?></h6><?php
				}
				if (!empty($item['date'])) {
					?><div class="sc_roadmap_item_date"><?php trx_addons_show_layout($item['date']); ?></div><?php
				}
			?></div><!-- /.sc_roadmap_item_info --><?php
			// Link over whole block - if 'link' is not empty and 'link_text' is empty
			if (!empty($item['link']) && empty($item['link_text'])) {
				?><a href="<?php echo esc_url($item['link']); ?>" class="<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_link_classes', 'sc_roadmap_item_link sc_roadmap_item_link_over', 'sc_roadmap', $args, $item)); ?>"></a><?php
			}
        ?></div><?php

		if ($args['columns'] > 1) {
			?></div><?php
		}
	}

    if ($args['columns'] > 1) {
        ?><div class="roadmap_bar"><div class="roadmap_bar-bar"></div></div><?php
    }

	?></div><?php

	trx_addons_sc_show_links('sc_roadmap', $args);

?></div><!-- /.sc_roadmap -->