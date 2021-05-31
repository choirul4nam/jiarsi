<?php
/**
 * The style "plain" of the Blogger
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.4.3
 */

$args = get_query_var('trx_addons_args_sc_blogger');

if ($args['slider']) {
	?><div class="slider-slide swiper-slide"><?php
} else if ($args['columns'] > 1) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $args['columns'])); ?>"><?php
}

$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$post_link = empty($args['no_links']) ? get_permalink() : '';
$post_title = get_the_title();
$is_event = $args['post_type'] === 'tribe_events';

?><div <?php post_class( 'sc_blogger_item post_format_'.esc_attr($post_format) . (empty($post_link) ? ' no_links' : '') ); ?>><?php

	// Post content
	?><div class="sc_blogger_item_content entry-content"><?php

		// Post categories
        if (!$is_event) {
            $post_meta = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
                    'components' => 'categories',
                    'echo' => false
                ), 'sc_blogger_plain', $args['columns'])
            );
            if (empty($post_link)) $post_meta = trx_addons_links_to_span($post_meta);
            trx_addons_show_layout($post_meta);
        }

		// Post meta
        if ($is_event) {
            // Event's date
            $date = tribe_get_start_date(null, true, 'd-F-Y');
            if (empty($date)) $date = get_the_date('d-F-Y');
            $date = explode('-', $date);
            ?>
            <div class="sc_blogger_upcoming_events_date">
            <div class="sc_events_item_date">
                <span class="sc_events_item_day"><?php echo esc_html($date[0]); ?></span>
                <span class="sc_events_item_month"><?php echo esc_html($date[1]) . ' ' . esc_html($date[2]); ?></span>
            </div></div><?php
        } else if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
            $post_meta = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
                'components' => 'date',
                'counters' => '',
                'echo' => false
                ), 'sc_blogger_plain', $args['columns'])
            );
            if (empty($post_link)) $post_meta = trx_addons_links_to_span($post_meta);
            trx_addons_show_layout($post_meta);
        }

        // Post title
        the_title( '<h5 class="sc_blogger_item_title entry-title">'
            . (!empty($post_link)
                ? sprintf( '<a href="%s" rel="bookmark">', esc_url( $post_link ) )
                : ''),
            (!empty($post_link) ? '</a>' : '') . '</h5>' );

		// Post excerpt
		if (!isset($args['hide_excerpt']) || $args['hide_excerpt']==0) {
			?><div class="sc_blogger_item_excerpt">
				<div class="sc_blogger_item_excerpt_text">
					<?php
					$show_more = !in_array($post_format, array('link', 'aside', 'status', 'quote'));
					if (has_excerpt()) {
						the_excerpt();
					} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
						the_content( '' );
					} else if (!$show_more) {
						the_content();
					} else {
						the_excerpt();
					}
					?>
				</div>
				<?php
				// Post meta
				if (in_array($post_format, array('link', 'aside', 'status', 'quote'))) {
					$post_meta = trx_addons_sc_show_post_meta('sc_blogger', apply_filters('trx_addons_filter_show_post_meta', array(
						'components' => 'date',
						'echo' => false
						), 'sc_blogger_plain', $args['columns'])
					);
					if (empty($post_link)) $post_meta = trx_addons_links_to_span($post_meta);
					trx_addons_show_layout($post_meta);
				}
				// More button
				if ( $show_more && !empty($post_link) && !empty($args['more_text']) ) {
					?><div class="sc_blogger_item_button sc_item_button"><a href="<?php echo esc_url($post_link); ?>" class="<?php echo esc_attr(apply_filters('trx_addons_filter_sc_item_link_classes', 'sc_button sc_button_default sc_button_size_small', 'sc_blogger', $args)); ?>"><span class="sc_button_text"><span class="sc_button_title"><?php
						echo esc_html($args['more_text']);
					?></span></span></a></div><?php
				}
			?></div><!-- .sc_blogger_item_excerpt --><?php
		}
		
	?></div><!-- .entry-content --><?php
	
?></div><!-- .sc_blogger_item --><?php

if ($args['slider'] || $args['columns'] > 1) {
	?></div><?php
}
?>