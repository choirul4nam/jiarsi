<?php
// Add plugin-specific colors and fonts to the custom EOT
if (!function_exists('lymcoin_trx_addons_get_css')) {
	add_filter('lymcoin_filter_get_css', 'lymcoin_trx_addons_get_css', 10, 4);
	function lymcoin_trx_addons_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<EOT

.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title,
.sc_dishes_compact .sc_services_item_title,
.sc_services_iconed .sc_services_item_title {
	{$fonts['p_font-family']}
}
.toc_menu_item .toc_menu_description,
.sc_recent_news .post_item .post_footer .post_counters .post_counters_item,
.sc_item_subtitle.sc_item_title_style_shadow,
.sc_icons_item_title,
.sc_price_item_title, .sc_price_item_price,
.sc_courses_default .sc_courses_item_price,
.sc_courses_default .trx_addons_hover_content .trx_addons_hover_links a,
.sc_promo_modern .sc_promo_link2 span+span,
.sc_skills_counter .sc_skills_total,
.sc_skills_pie.sc_skills_compact_off .sc_skills_total,
.slider_container .slide_info.slide_info_large .slide_title,
.slider_style_modern .slider_controls_label span + span,
.slider_pagination_wrap,
.sc_slider_controller_info {
	{$fonts['h5_font-family']}
}
.sc_item_subtitle,
.sc_recent_news .post_item .post_meta,
.sc_action_item_description,
.sc_price_item_description,
.sc_price_item_details,
.sc_courses_default .sc_courses_item_date,
.courses_single .courses_page_meta,
.sc_promo_modern .sc_promo_link2 span,
.sc_skills_counter .sc_skills_item_title,
.slider_style_modern .slider_controls_label span,
.slider_titles_outside_wrap .slide_cats,
.slider_titles_outside_wrap .slide_subtitle,
.sc_team .sc_team_item_subtitle,
.sc_dishes .sc_dishes_item_subtitle,
.sc_services .sc_services_item_subtitle,
.team_member_page .team_member_brief_info_text,
.sc_testimonials_item_author_title,
.sc_testimonials_item_content:before {
	{$fonts['info_font-family']}
}
.sc_button,
.sc_button_simple,
.sc_form button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.sc_promo_modern .sc_promo_link2 {
	{$fonts['button_font-family']}
}

/* Rubik */
.sc_icons_default.sc_icons_size_medium .sc_icons_item_title,
.sc_blogger_upcoming_events_date .sc_events_item_day,
big, .trx_addons_big_font,
.comments_list_wrap .comment_author,
body .vc_tta.vc_tta-accordion .vc_tta-panel-title .vc_tta-title-text,
.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title,
.format-audio .post_featured .post_audio_author, .trx_addons_audio_player .audio_author,
table th,
.trx_addons_dropcap {
    {$fonts['h1_font-family']}
}

/* Hind */
.sc_icons_default .sc_icons_item_title {
    {$fonts['p_font-family']}
}

EOT;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<EOT


/* User styles
------------------------------------------ */
.trx_addons_accent,
.trx_addons_accent > a,
.trx_addons_accent > * {
	color: {$colors['text_link']};
}
.trx_addons_accent > a:hover {
	color: {$colors['text_dark']};
}
.sidebar .trx_addons_accent,
.scheme_self.sidebar .trx_addons_accent,
.sidebar .trx_addons_accent > a,
.scheme_self.sidebar .trx_addons_accent > a,
.sidebar .trx_addons_accent > *,
.scheme_self.sidebar .trx_addons_accent > *,
.footer_wrap .trx_addons_accent,
.scheme_self.footer_wrap .trx_addons_accent,
.footer_wrap .trx_addons_accent > a,
.scheme_self.footer_wrap .trx_addons_accent > a,
.footer_wrap .trx_addons_accent > *,
.scheme_self.footer_wrap .trx_addons_accent > * {
	color: {$colors['alter_link']};
}
.sidebar .trx_addons_accent > a:hover,
.scheme_self.sidebar .trx_addons_accent > a:hover,
.footer_wrap .trx_addons_accent > a:hover,
.scheme_self.footer_wrap .trx_addons_accent > a:hover {
	color: {$colors['alter_dark']};
}

.trx_addons_hover,
.trx_addons_hover > * {
	color: {$colors['text_hover']};
}
.trx_addons_accent_bg {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
.trx_addons_inverse {
	color: {$colors['bg_color']};
	background-color: transparent;
}
.trx_addons_dark,
.trx_addons_dark > a {
	color: {$colors['text_dark']};
}
.trx_addons_dark > a:hover {
	color: {$colors['text_link']};
}

.trx_addons_inverse,
.trx_addons_inverse > a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.trx_addons_inverse > a:hover {
	color: {$colors['inverse_hover']};
}
.trx_addons_inverse .trx_addons_dark {
	color: {$colors['extra_light']};
} 

.trx_addons_dropcap_style_1 {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_dropcap_style_2 {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_hover']};
}

ul[class*="trx_addons_list"] > li:before {
	color: {$colors['text_link']};
}
ul[class*="trx_addons_list"][class*="_circled"] > li:before {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_list_parameters > li + li {
	border-color: {$colors['bd_color']};
}

.trx_addons_tooltip {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.trx_addons_tooltip:before {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.trx_addons_tooltip:after {
	border-top-color: {$colors['text_dark']};
}

blockquote.trx_addons_blockquote_style_1:before,
blockquote.trx_addons_blockquote_style_1 {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
blockquote.trx_addons_blockquote_style_1 b {
	color: {$colors['bg_color']};
}
blockquote.trx_addons_blockquote_style_1 a,
blockquote.trx_addons_blockquote_style_1 cite {
	color: {$colors['text_link']};
}
blockquote.trx_addons_blockquote_style_1 a:hover {
	color: {$colors['bg_color']};
}
blockquote.trx_addons_blockquote_style_2 {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}
blockquote.trx_addons_blockquote_style_2:before,
blockquote.trx_addons_blockquote_style_2 a,
blockquote.trx_addons_blockquote_style_2 cite {
	color: {$colors['inverse_link']};
}
blockquote.trx_addons_blockquote_style_2 a:hover {
	color: {$colors['inverse_hover']};
}

.trx_addons_hover_mask {
	background-color: {$colors['extra_bg_color_07']};
}
.trx_addons_hover_title {
	color: {$colors['extra_dark']};
}
.trx_addons_hover_text {
	color: {$colors['extra_text']};
}
.trx_addons_hover_icon,
.trx_addons_hover_links a {
	color: {$colors['inverse_link']};
	background-color: {$colors['extra_link']};
}
.trx_addons_hover_icon:hover,
.trx_addons_hover_links a:hover {
	color: {$colors['inverse_hover']} !important;
	background-color: {$colors['extra_hover']};
}


/* Tabs */
.widget .trx_addons_tabs .trx_addons_tabs_titles li a {
	color: {$colors['text']};
	background-color: {$colors['bd_color']};
}
.widget .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active a,
.widget .trx_addons_tabs .trx_addons_tabs_titles li a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.scheme_self.sidebar .widget .trx_addons_tabs .trx_addons_tabs_titles li a {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bd_color']};
}
.scheme_self.sidebar .widget .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active a,
.scheme_self.sidebar .widget .trx_addons_tabs .trx_addons_tabs_titles li a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}


/* Posts emotions */
.trx_addons_emotions_item {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
	color: {$colors['text_light']};
}
.trx_addons_emotions_item:hover {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_bd_hover']};
	background-color: {$colors['alter_bg_hover']};
}
.trx_addons_emotions_active {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.trx_addons_emotions_item_number {
	color: {$colors['text']};
}


/* Posts slider */
.slider_container .slide_info.slide_info_large {
	background-color: {$colors['bg_color_07']};
}
.slider_container .slide_info.slide_info_large:hover {
	background-color: {$colors['bg_color']};
}
.slider_container .slide_info.slide_info_large .slide_cats a {
	color: {$colors['text_link']};
}
.slider_container .slide_info.slide_info_large .slide_title a {
	color: {$colors['text_dark']};
}
.slider_container .slide_info.slide_info_large .slide_date {
	color: {$colors['text']};
}
.slider_container .slide_info.slide_info_large:hover .slide_date {
	color: {$colors['text_light']};
}
.slider_container .slide_info.slide_info_large .slide_cats a:hover,
.slider_container .slide_info.slide_info_large .slide_title a:hover {
	color: {$colors['text_hover']};
}
.slider_container.slider_multi .slide_cats a:hover,
.slider_container.slider_multi .slide_title a:hover,
.slider_container.slider_multi a:hover .slide_title {
	color: {$colors['text_hover']};
}

.sc_slider_controls .slider_controls_wrap > a,
.slider_container.slider_controls_side .slider_controls_wrap > a,
.slider_outer_controls_side .slider_controls_wrap > a {
	color: {$colors['text_link']};
	background-color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.sc_slider_controls .slider_controls_wrap > a:hover,
.slider_container.slider_controls_side .slider_controls_wrap > a:hover,
.slider_outer_controls_side .slider_controls_wrap > a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_slider_controls .slider_progress {
	background-color: {$colors['bd_color']};
}
.sc_slider_controls .slider_progress_bar {
	background-color: {$colors['text_link']};
}

.slider_container.slider_controls_top .slider_controls_wrap > a,
.slider_container.slider_controls_bottom .slider_controls_wrap > a,
.slider_outer_controls_top .slider_controls_wrap > a,
.slider_outer_controls_bottom .slider_controls_wrap > a {
	color: {$colors['extra_dark']};
	background-color: {$colors['extra_bg_color']};
	border-color: {$colors['extra_bd_color']};
}
.slider_container.slider_controls_top .slider_controls_wrap > a:hover,
.slider_container.slider_controls_bottom .slider_controls_wrap > a:hover,
.slider_outer_controls_top .slider_controls_wrap > a:hover,
.slider_outer_controls_bottom .slider_controls_wrap > a:hover {
	color: {$colors['extra_link']};
	border-color: {$colors['extra_bd_hover']};
	background-color: {$colors['extra_bg_hover']};
}

.slider_container .slider_pagination_wrap .swiper-pagination-bullet,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet,
.swiper-pagination-custom .swiper-pagination-button {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.swiper-pagination-custom .swiper-pagination-button.swiper-pagination-button-active,
.slider_container .slider_pagination_wrap .swiper-pagination-bullet.swiper-pagination-bullet-active,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet.swiper-pagination-bullet-active,
.slider_container .slider_pagination_wrap .swiper-pagination-bullet:hover,
.slider_outer .slider_pagination_wrap .swiper-pagination-bullet:hover {
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}
.slider_container .swiper-pagination-progress .swiper-pagination-progressbar,
.slider_outer .swiper-pagination-progress .swiper-pagination-progressbar {
	background-color: {$colors['text_link']};
}
.slider_outer > .swiper-pagination-fraction {
	color: {$colors['text_dark']};
}

.slider_titles_outside_wrap .slide_title a {
	color: {$colors['text_dark']};
}
.slider_titles_outside_wrap .slide_title a:hover {
	color: {$colors['text_link']};
}
.slider_titles_outside_wrap .slide_cats,
.slider_titles_outside_wrap .slide_subtitle {
	color: {$colors['text_link']};
}

.slider_style_modern .slider_controls_label {
	color: {$colors['bg_color']};
}
.slider_style_modern .slider_pagination_wrap {
	color: {$colors['text_light']};
}
.slider_style_modern .swiper-pagination-current {
	color: {$colors['text_dark']};
}

.sc_slider_controller .slider-slide.swiper-slide-active {
	border-color: {$colors['text_link']};
}
.sc_slider_controller_titles .slider-slide {
	background-color: {$colors['alter_bg_color']};
}
.sc_slider_controller_titles .slider-slide:after {
	background-color: {$colors['alter_bd_color']};
}
.sc_slider_controller_titles .slider-slide.swiper-slide-active {
	background-color: {$colors['bg_color']};
}
.sc_slider_controller_titles .sc_slider_controller_info_title {
	color: {$colors['alter_dark']};
}
.sc_slider_controller_titles .sc_slider_controller_info_number {
	color: {$colors['alter_light']};
}
.sc_slider_controller_titles .slider_controls_wrap > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.sc_slider_controller_titles .slider_controls_wrap > a:hover {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}


/* Widgets 
--------------------------------------------------- */

/* Categories list */
.widget_categories_list .categories_list_style_3 .categories_list_item {
	background-color: {$colors['alter_bg_color']};
}
.widget_categories_list .categories_list_style_1 .categories_list_item:hover .categories_list_title,
.widget_categories_list .categories_list_style_3 .categories_list_item:hover .categories_list_title {
	color: {$colors['text_link']};
}
.widget_categories_list .categories_list_style_2 .categories_list_title {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color_07']};
}
.widget_categories_list .categories_list_style_2 .categories_list_item:hover .categories_list_title {
	color: {$colors['alter_link']};
	background-color: {$colors['alter_bg_hover']};
}

/* Contacts */
.widget_contacts .contacts_info {
	color: {$colors['text']};
}
.widget_contacts .contacts_info span:before,
.widget_contacts .contacts_info > div > a:before,
.widget_contacts .contacts_info > a:before {
	color: {$colors['text_link']};
}
.widget_contacts .contacts_info span a,
.widget_contacts .contacts_info > div > a,
.widget_contacts .contacts_info > a {
	color: {$colors['text_dark']};
}
.widget_contacts .contacts_info span a:hover,
.widget_contacts .contacts_info > div > a:hover,
.widget_contacts .contacts_info > a:hover {
	color: {$colors['text_link']};
}
.scheme_self.sidebar .widget_contacts .contacts_info,
.scheme_self.footer_wrap .widget_contacts .contacts_info {
	color: {$colors['alter_text']};
}
.scheme_self.sidebar .widget_contacts .contacts_info span:before,
.scheme_self.sidebar .widget_contacts .contacts_info > div > a:before,
.scheme_self.sidebar .widget_contacts .contacts_info > a:before,
.scheme_self.footer_wrap .widget_contacts .contacts_info span:before,
.scheme_self.footer_wrap .widget_contacts .contacts_info > div > a:before,
.scheme_self.footer_wrap .widget_contacts .contacts_info > a:before {
	color: {$colors['alter_link']};
}
.scheme_self.sidebar .widget_contacts .contacts_info span a,
.scheme_self.sidebar .widget_contacts .contacts_info > div > a,
.scheme_self.sidebar .widget_contacts .contacts_info > a,
.scheme_self.footer_wrap .widget_contacts .contacts_info span a,
.scheme_self.footer_wrap .widget_contacts .contacts_info > div > a,
.scheme_self.footer_wrap .widget_contacts .contacts_info > a {
	color: {$colors['alter_dark']};
}
.scheme_self.sidebar .widget_contacts .contacts_info span a:hover,
.scheme_self.sidebar .widget_contacts .contacts_info > div > a:hover,
.scheme_self.sidebar .widget_contacts .contacts_info > a:hover,
.scheme_self.footer_wrap .widget_contacts .contacts_info span a:hover,
.scheme_self.footer_wrap .widget_contacts .contacts_info > div > a:hover,
.scheme_self.footer_wrap .widget_contacts .contacts_info > a:hover {
	color: {$colors['alter_link']};
}

/* Recent News */
/* Attention! This widget placed in the content area and should use main text colors */
.sc_recent_news_header {
	border-color: {$colors['text_dark']};
}
.sc_recent_news_header_category_item_more {
	color: {$colors['text_link']};
}
.sc_recent_news_header_more_categories {
	border-color: {$colors['extra_bd_color']};
	background-color:{$colors['extra_bg_color']};
}
.sc_recent_news_header_more_categories > a {
	color:{$colors['extra_link']};
}
.sc_recent_news_header_more_categories > a:hover {
	color:{$colors['extra_hover']};
	background-color:{$colors['extra_bg_hover']};
}
.sc_recent_news .post_counters_item,
.sc_recent_news .post_counters .post_counters_edit a {
	color:{$colors['inverse_link']};
	background-color:{$colors['text_link']};
}
.sc_recent_news .post_counters_item:hover,
.sc_recent_news .post_counters .post_counters_edit a:hover {
	color:{$colors['bg_color']};
	background-color:{$colors['text_dark']};
}
.sidebar_inner .sc_recent_news .post_counters_item:hover,
.sidebar_inner .sc_recent_news .post_counters .post_counters_edit a:hover {
	color:{$colors['alter_dark']};
	background-color:{$colors['alter_bg_color']};
}
.sc_recent_news_style_news-magazine .post_accented_border {
	border-color: {$colors['bd_color']};
}
.sc_recent_news_style_news-excerpt .post_item {
	border-color: {$colors['bd_color']};
}

/* Twitter */
.widget_twitter .widget_content .sc_twitter_item,
.widget_twitter .widget_content li {
	color: {$colors['text']};
}
.widget_twitter .widget_content .sc_twitter_item .sc_twitter_item_icon {
	color: {$colors['text_link']} !important;
}
.widget_twitter .swiper-pagination-bullet {
	background-color: {$colors['text_light']};
}
.widget_twitter .swiper-pagination-bullet-active {
	background-color: {$colors['text_link']};
}

.widget_twitter .widget_content .sc_twitter_list li {
	color: {$colors['text']};
}
.widget_twitter .widget_content .sc_twitter_list li:before {
	color: {$colors['text_link']} !important;
}
.scheme_self.sidebar .widget_twitter .widget_content .sc_twitter_list li {
	color: {$colors['alter_text']};
}
.scheme_self.sidebar .widget_twitter .widget_content .sc_twitter_list li:before {
	color: {$colors['alter_link']} !important;
}


/* Shortcodes
--------------------------------------------------- */

.sc_item_subtitle {
	color:{$colors['text_link']};
}
.color_style_link2 .sc_item_subtitle {
	color:{$colors['text_link2']};
}
.color_style_link3 .sc_item_subtitle {
	color:{$colors['text_link3']};
}
.sc_item_subtitle.sc_item_title_style_shadow {
	color:{$colors['text_light']};
}

.theme_scroll_down:hover {
	color: {$colors['text_link']};
}


/* Action */
.sc_action_item .sc_action_item_subtitle {						color:{$colors['text_link']}; }
.sc_action_item.color_style_link2 .sc_action_item_subtitle {	color:{$colors['text_link2']}; }
.sc_action_item.color_style_link3 .sc_action_item_subtitle {	color:{$colors['text_link3']}; }
.sc_action_item.color_style_dark .sc_action_item_subtitle {		color:{$colors['text_dark']}; }

.sc_action_item_event .sc_action_item_date,
.sc_action_item_event .sc_action_item_info {
	color:{$colors['text_dark']};
	border-color:{$colors['text']};
}
.sc_action_item_event .sc_action_item_description {
	color:{$colors['text']};
}
.sc_action_item_event.with_image .sc_action_item_inner {
	background-color:{$colors['bg_color']};
}


/* Blogger */
.sc_blogger.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_blogger_item {
	background-color: {$colors['bg_color']};
}
.sc_blogger_item_title a {
	color: {$colors['text_dark']};
}
.sc_blogger_item_title a:hover {
	color: {$colors['text_link']};
}


/* Cars */
.sc_cars_item,
.sc_cars_item_params {
	border-color: {$colors['bd_color']};
}
.sc_cars_item_param {
	color: {$colors['text_light']};
}
.sc_cars_item_param .sc_cars_item_param_text,
.sc_cars_item_footer {
	color: {$colors['text']};
}
.sc_cars_columns_1 .sc_cars_item,
.sc_cars_item .sc_cars_item_thumb {
	background-color: {$colors['alter_bg_color']};
}
.sc_cars_item_status > a,
.sc_cars_item_type > a,
.sc_cars_item_compare {
	color: {$colors['text_light']};
}
.sc_cars_item_compare.in_compare_list {
	color: {$colors['text_link']};
}
.sc_cars_item_status > a:hover,
.sc_cars_item_type > a:hover,
.sc_cars_item_compare:hover,
.sc_cars_item_compare.in_compare_list:hover {
	color: {$colors['text_dark']};
}
.sc_cars_item_options .sc_cars_item_row_address,
.sc_cars_item_options .sc_cars_item_row_meta {
	color: {$colors['text_light']};
}
.cars_page_title .cars_page_status > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.cars_page_title .cars_page_status > a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_link_blend']};
}
.cars_page_title_address {
	color: {$colors['text_light']};
}
.cars_price {
	color: {$colors['text_light']};
}
.cars_page_attachments_list > a:before,
.cars_page_features_list > a:before {
	color: {$colors['text_link']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles {
	border-color: {$colors['alter_bd_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li > a {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	border-bottom-color: {$colors['alter_bd_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['bg_color']};
	border-bottom-color: {$colors['bg_color']};
}
.cars_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li:not(.ui-state-active) > a:hover {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']} {$colors['alter_bg_hover']} {$colors['alter_bd_color']};
}

.cars_page_section_title {
	border-color: {$colors['bd_color']};
}

.cars_page_agent_info_position {
	color: {$colors['text_light']};
}
.cars_page_agent_info_phones > span,
.cars_page_agent_info_phones > a {
	color: {$colors['text']};
}
.cars_page_agent_info_phones > a:hover {
	color: {$colors['text_link']};
}
.cars_page_agent_info_address:before,
.cars_page_agent_info_phones > :before {
	color: {$colors['text_dark']};
}
.cars_page_agent_info_profiles.socials_wrap .social_item .social_icon {
	color: {$colors['text']};
}

.cars_search_form .cars_search_basic .cars_search_show_advanced {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_color']};
}
.cars_search_form .cars_search_basic .cars_search_show_advanced:hover {
	color: {$colors['input_dark']};
}

.sc_cars_compare_data .cars_feature_present {
	color: {$colors['text_link']};
}


/* Content area */
.sc_content_number {
	color: {$colors['alter_bg_hover']};
}


/* Countdown */
.sc_countdown_default .sc_countdown_digits span {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_hover']};
	background-color: {$colors['text_link']};
}
.sc_countdown_circle .sc_countdown_digits {
	color: {$colors['alter_link']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}

/* Courses */
.sc_courses.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_courses_default .sc_courses_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_courses_default .sc_courses_item_categories {
	background-color: {$colors['alter_dark']};
}
.sc_courses_default .sc_courses_item_categories a {
	color: {$colors['bg_color']};
}
.sc_courses_default .sc_courses_item_categories a:hover {
	color: {$colors['alter_link']};
}
.sc_courses_default .sc_courses_item_meta {
	color: {$colors['alter_light']};
}
.sc_courses_default .sc_courses_item_date {
	color: {$colors['alter_dark']};
}
.sc_courses_default .sc_courses_item_price {
	color: {$colors['alter_link']};
}
.sc_courses_default .sc_courses_item_period {
	color: {$colors['alter_light']};
}
.courses_single .courses_page_meta {
	color: {$colors['text_light']};
}
.courses_single .courses_page_meta_item_date {
	color: {$colors['text_dark']};
}
.courses_single .courses_page_period {
	color: {$colors['text_light']};
}


/* Dishes */
.sc_dishes_default .sc_dishes_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_dishes_default .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_dishes_default .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle a {
	color: {$colors['alter_dark']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_subtitle a:hover {
	color: {$colors['alter_link']};
}
.sc_dishes_default .sc_dishes_item_featured_left,
.sc_dishes_default .sc_dishes_item_featured_right {
	color: {$colors['text']};
	background-color: transparent;
}
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_dishes_default .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_link2 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover2']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_link3 .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_hover3']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle a,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle a {
	color: {$colors['text_dark']};
}
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_left .sc_dishes_item_subtitle a:hover,
.sc_dishes_default.color_style_dark .sc_dishes_item_featured_right .sc_dishes_item_subtitle a:hover {
	color: {$colors['text_link']};
}

.sc_dishes_compact .sc_dishes_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_dishes_compact .sc_dishes_item_header {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.sc_dishes_compact .sc_dishes_item_price,
.sc_dishes_compact .sc_dishes_item_subtitle a {
	color: {$colors['bg_color']};
}
.sc_dishes_compact .sc_dishes_item_price:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_dishes_compact.color_style_link2 .sc_dishes_item_price:hover,
.sc_dishes_compact.color_style_link2 .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact.color_style_link2 .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact.color_style_link2 .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_dishes_compact.color_style_link3 .sc_dishes_item_price:hover,
.sc_dishes_compact.color_style_link3 .sc_dishes_item:hover .sc_dishes_item_price,
.sc_dishes_compact.color_style_link3 .sc_dishes_item_subtitle a:hover,
.sc_dishes_compact.color_style_link3 .sc_dishes_item:hover .sc_dishes_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_dishes_compact .sc_dishes_item_title a {
	color: {$colors['text_link']};
}
.sc_dishes_compact.color_style_link2 .sc_dishes_item_title a {
	color: {$colors['text_link2']};
}
.sc_dishes_compact.color_style_link3 .sc_dishes_item_title a {
	color: {$colors['text_link3']};
}
.sc_dishes_compact .sc_dishes_item_title a:hover,
.sc_dishes_compact .sc_dishes_item:hover .sc_dishes_item_title a {
	color: {$colors['bg_color']};
}
.sc_dishes.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}


/* Events */
.sc_events.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_events_default .sc_events_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_events_default .sc_events_item_date {
	background-color: {$colors['alter_link']};
	color: {$colors['inverse_link']};
}
.sc_events_default .sc_events_item:hover .sc_events_item_date {
	background-color: {$colors['alter_dark']};
}
.sc_events_default .sc_events_item_title {
	color: {$colors['alter_dark']};
}
.sc_events_default .sc_events_item:hover .sc_events_item_title {
	color: {$colors['alter_link']};
}
.sc_events_default .sc_events_item_button {
	color: {$colors['alter_link']};
}
.sc_events_default .sc_events_item:hover .sc_events_item_button {
	color: {$colors['alter_dark']};
}

.sc_events_detailed .sc_events_item,
.sc_events_detailed .sc_events_item_date_wrap,
.sc_events_detailed .sc_events_item_time_wrap:before,
.sc_events_detailed .sc_events_item_button_wrap:before {
	border-color: {$colors['text_link']};
}
.sc_events_detailed .sc_events_item_date,
.sc_events_detailed .sc_events_item_button {
	color: {$colors['text_link']};
}
.sc_events_detailed .sc_events_item_title {
	color: {$colors['text_dark']};
}
.sc_events_detailed .sc_events_item_time {
	color: {$colors['text']};
}
.sc_events_detailed .sc_events_item:hover {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_link']};
}
.sc_events_detailed .sc_events_item:hover,
.sc_events_detailed .sc_events_item:hover .sc_events_item_date,
.sc_events_detailed .sc_events_item:hover .sc_events_item_button,
.sc_events_detailed .sc_events_item:hover .sc_events_item_title,
.sc_events_detailed .sc_events_item:hover .sc_events_item_time {
	color: {$colors['inverse_hover']};
}
.sc_events_detailed .sc_events_item:hover,
.sc_events_detailed .sc_events_item:hover .sc_events_item_date_wrap,
.sc_events_detailed .sc_events_item:hover .sc_events_item_time_wrap:before,
.sc_events_detailed .sc_events_item:hover .sc_events_item_button_wrap:before {
	border-color: {$colors['inverse_hover']};
}

/* Form */
.scheme_self.sc_form {
	background-color: {$colors['bg_color']};
}
span.sc_form_field_title {
	color: {$colors['text_dark']};
}
.sc_form .sc_form_info_icon {
	color: {$colors['text_link']};
}
.sc_form .sc_form_info_data > a,
.sc_form .sc_form_info_data > span {
	color: {$colors['text_dark']};
}
.sc_form .sc_form_info_data > a:hover {
	color: {$colors['text_link']};
}


/* input hovers */
[class*="sc_input_hover_"] .sc_form_field_hover {
	color: {$colors['text_dark']};
}
.sc_input_hover_accent input[type="text"]:focus,
.sc_input_hover_accent input[type="number"]:focus,
.sc_input_hover_accent input[type="email"]:focus,
.sc_input_hover_accent input[type="password"]:focus,
.sc_input_hover_accent input[type="search"]:focus,
.sc_input_hover_accent select:focus,
.sc_input_hover_accent .select2-container.select2-container--focus span.select2-selection,
.sc_input_hover_accent .select2-container.select2-container--open span.select2-selection,
.sc_input_hover_accent textarea:focus {
	border-color: {$colors['text_link']} !important;
}
.sc_input_hover_accent .sc_form_field_hover:before {
	color: {$colors['text_link_02']};
}

.sc_input_hover_path .sc_form_field_graphic {
	stroke: {$colors['input_bd_color']};
}

.sc_input_hover_jump .sc_form_field_hover {
	color: {$colors['input_light']};
}
.sc_input_hover_jump .sc_form_field_content:before {
	color: {$colors['text_link']};
}
.sc_input_hover_jump input[type="text"],
.sc_input_hover_jump input[type="number"],
.sc_input_hover_jump input[type="email"],
.sc_input_hover_jump input[type="password"],
.sc_input_hover_jump input[type="search"],
.sc_input_hover_jump textarea {
	border-color: {$colors['input_bd_color']};
}
.sc_input_hover_jump input[type="text"]:focus,
.sc_input_hover_jump input[type="number"]:focus,
.sc_input_hover_jump input[type="email"]:focus,
.sc_input_hover_jump input[type="password"]:focus,
.sc_input_hover_jump input[type="search"]:focus,
.sc_input_hover_jump textarea:focus {
	border-color: {$colors['text_link']} !important;
}

.sc_input_hover_underline .sc_form_field_hover:before {
	background-color: {$colors['input_bd_color']};
}
.sc_input_hover_underline input:focus + .sc_form_field_hover:before,
.sc_input_hover_underline textarea:focus + .sc_form_field_hover:before,
.sc_input_hover_underline input.filled + .sc_form_field_hover:before,
.sc_input_hover_underline textarea.filled + .sc_form_field_hover:before {
	background-color: {$colors['text_link']};
}
.sc_input_hover_underline .sc_form_field_content {
	color: {$colors['input_dark']};
}
.sc_input_hover_underline input:focus,
.sc_input_hover_underline textarea:focus,
.sc_input_hover_underline input.filled,
.sc_input_hover_underline textarea.filled,
.sc_input_hover_underline input:focus + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline textarea:focus + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline input.filled + .sc_form_field_hover > .sc_form_field_content,
.sc_input_hover_underline textarea.filled + .sc_form_field_hover > .sc_form_field_content {
	color: {$colors['text_link']} !important;
}

.sc_input_hover_iconed .sc_form_field_hover {
	color: {$colors['input_light']};
}
.sc_input_hover_iconed input:focus + .sc_form_field_hover,
.sc_input_hover_iconed textarea:focus + .sc_form_field_hover,
.sc_input_hover_iconed input.filled + .sc_form_field_hover,
.sc_input_hover_iconed textarea.filled + .sc_form_field_hover {
	color: {$colors['input_dark']};
}

/* Googlemap */
.sc_googlemap_content,
.scheme_self.sc_googlemap_content {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
}
.sc_googlemap_content b,
.sc_googlemap_content strong,
.scheme_self.sc_googlemap_content b,
.scheme_self.sc_googlemap_content strong {
	color: {$colors['text_dark']};
}
.sc_googlemap_content_detailed:before {
	color: {$colors['text_link']};
}

/* Icons */
.sc_icons .sc_icons_icon {
	color: {$colors['text_link']};
}
.sc_icons .sc_icons_item_linked:hover .sc_icons_icon {
	color: {$colors['text_dark']};
}
.sc_icons .sc_icons_item_title {
	color: {$colors['text_link']};
}
.scheme_self.footer_wrap .sc_icons .sc_icons_item_title {
	color: {$colors['text_dark']};
}
.scheme_self.footer_wrap .sc_icons .sc_icons_item_description {
	color: {$colors['text']};
}
.sc_icons_item_description,
.sc_icons_modern .sc_icons_item_description {
	color: {$colors['text_dark']};
}
.sc_icons_default.sc_icons_size_medium .sc_icons_item_linked:hover .sc_icons_item_title,
.sc_icons_default.sc_icons_size_medium .sc_icons_item_linked:hover .sc_icons_icon,
.sc_icons_default.sc_icons_size_medium .sc_icons_icon {
	color: {$colors['text_link']};
}
.sc_icons_default.sc_icons_size_medium .sc_icons_item_title {
	color: {$colors['text_dark']};
}


/* Sports: Matches and Players */
.sc_sport_default .sc_sport_item_subtitle .sc_sport_item_date {
	color: {$colors['text_light']};
}

.sc_matches_main .swiper-pagination .swiper-pagination-bullet {
	border-color: {$colors['bd_color']};
}
.sc_matches_main .sc_matches_item_score a {
	color: {$colors['text_dark']};
}
.sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link']};
}
.color_style_link2 .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link2']};
}
.color_style_link3 .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_link3']};
}
.color_style_dark .sc_matches_main .sc_matches_item_score a:hover {
	color: {$colors['text_dark']};
}

.sc_matches_other .sc_matches_item_link {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}
.sc_matches_other .sc_matches_item_club {
	color: {$colors['alter_light']};
}
.sc_matches_other .sc_matches_item_date {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bd_color']};
}
.sc_matches_other .sc_matches_item_link:hover {
	background-color: {$colors['alter_bg_hover']};
}
.sc_matches_other .sc_matches_item_link:hover .sc_matches_item_date {
	background-color: {$colors['alter_bd_hover']};
}

.sc_points_table td a {
	color: {$colors['alter_dark']};
}
.sc_points_table tr:hover td {
	background-color: {$colors['alter_hover']} !important;
}
.sc_points_table tr:hover a,
.sc_points_table td a:hover {
	color: {$colors['inverse_hover']} !important;
}
.sc_points_table tr.sc_points_table_accented_top td {
	background-color: {$colors['text_link_07']};
}
.sc_points_table tr.sc_points_table_accented_bottom td {
	background-color: {$colors['alter_bg_color']};
}


/* Portfolio */
.sc_portfolio_default .sc_portfolio_item {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}
.sc_portfolio_default .sc_portfolio_item a {
	color: {$colors['alter_link']};
}
.sc_portfolio_default .sc_portfolio_item a:hover {
	color: {$colors['alter_hover']};
}
.sc_portfolio_default .sc_portfolio_item:hover {
	background-color: {$colors['alter_bg_hover']};
}
.sc_portfolio_default .sc_portfolio_item_title {
	color: {$colors['alter_dark']};
}

/* Price */
.sc_price_item {
	color: {$colors['extra_text']};
	background-color: {$colors['extra_bg_color']};
	border-color: {$colors['extra_bd_color']};
}
.sc_price_item:hover {
	background-color: {$colors['extra_bg_hover']};
	border-color: {$colors['extra_bd_hover']};
}
.sc_price_item .sc_price_item_icon {
	color: {$colors['extra_link']};
}
.sc_price_item:hover .sc_price_item_icon {
	color: {$colors['extra_hover']};
}
.sc_price_item .sc_price_item_label {
	background-color: {$colors['extra_link']};
	color: {$colors['inverse_text']};
}
.sc_price_item:hover .sc_price_item_label {
	background-color: {$colors['extra_hover']};
	color: {$colors['inverse_text']};
}
.sc_price_item .sc_price_item_subtitle {
	color: {$colors['extra_dark']};
}
.sc_price_item .sc_price_item_title,
.sc_price_item .sc_price_item_title a {
	color: {$colors['extra_link']};
}
.sc_price_item:hover .sc_price_item_title,
.sc_price_item:hover .sc_price_item_title a {
	color: {$colors['extra_hover']};
}
.sc_price_item .sc_price_item_price {
	color: {$colors['extra_dark']};
}
.sc_price_item .sc_price_item_description,
.sc_price_item .sc_price_item_details {
	color: {$colors['extra_dark']};
}

/* Promo */
.sc_promo_icon {
	color:{$colors['text_link']};
}
.sc_promo .sc_promo_title,
.sc_promo .sc_promo_descr {
	color:{$colors['text_dark']};
}
.sc_promo .sc_promo_content {
	color:{$colors['text']};
}
.sc_promo_modern .sc_promo_link2 {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']} !important;
}
.sc_promo_modern .sc_promo_link2:hover {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
.scheme_self.sc_promo .sc_promo_text.trx_addons_stretch_height,
.scheme_self.sc_promo .sc_promo_text_inner {
	background-color: {$colors['alter_bg_color']};
}
.scheme_self.sc_promo .sc_promo_title {
	color:{$colors['alter_link']};
}
.scheme_self.sc_promo .sc_promo_subtitle {
	color:{$colors['alter_hover']};
}
.scheme_self.sc_promo .sc_promo_descr {
	color:{$colors['alter_dark']};
}
.scheme_self.sc_promo .sc_promo_content {
	color:{$colors['alter_text']};
}


/* Properties */
.sc_properties_columns_1 .sc_properties_item {
	background-color: {$colors['alter_bg_color']};
}
.sc_properties_item_status > a,
.sc_properties_item_type > a,
.sc_properties_item_compare {
	color: {$colors['text_light']};
}
.sc_properties_item_compare.in_compare_list {
	color: {$colors['text_link']};
}
.sc_properties_item_status > a:hover,
.sc_properties_item_type > a:hover,
.sc_properties_item_compare:hover,
.sc_properties_item_compare.in_compare_list:hover {
	color: {$colors['text_dark']};
}
.sc_properties_item_options .sc_properties_item_row_address,
.sc_properties_item_options .sc_properties_item_row_meta {
	color: {$colors['text_light']};
}
.properties_page_title .properties_page_status > a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.properties_page_title .properties_page_status > a:hover {
	color: {$colors['inverse_hover']};
	background-color: {$colors['text_link_blend']};
}
.properties_page_title_address {
	color: {$colors['text_light']};
}
.properties_price {
	color: {$colors['text_light']};
}
.properties_page_section_title {
	border-color: {$colors['bd_color']};
}
.properties_page_attachments_list > a:before,
.properties_page_features_list > a:before {
	color: {$colors['text_link']};
}
.properties_page_floor_plans_list .properties_page_floor_plans_list_item_title {
	background-color: {$colors['alter_bg_color']} !important;
	color: {$colors['alter_text']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles {
	border-color: {$colors['alter_bd_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li > a {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
	border-bottom-color: {$colors['alter_bd_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['bg_color']};
	border-bottom-color: {$colors['bg_color']};
}
.properties_page_tabs.trx_addons_tabs .trx_addons_tabs_titles li:not(.ui-state-active) > a:hover {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']} {$colors['alter_bg_hover']} {$colors['alter_bd_color']};
}

.properties_page_agent_info_position {
	color: {$colors['text_light']};
}
.properties_page_agent_info_phones > span,
.properties_page_agent_info_phones > a {
	color: {$colors['text']};
}
.properties_page_agent_info_phones > a:hover {
	color: {$colors['text_link']};
}
.properties_page_agent_info_address:before,
.properties_page_agent_info_phones > :before {
	color: {$colors['text_dark']};
}
.properties_page_agent_info_profiles.socials_wrap .social_item .social_icon {
	color: {$colors['text']};
}

.properties_search_form .properties_search_basic .properties_search_show_advanced {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_color']};
}
.properties_search_form .properties_search_basic .properties_search_show_advanced:hover {
	color: {$colors['input_dark']};
}

.sc_properties_compare_data .properties_feature_present {
	color: {$colors['text_link']};
}


/* Services */
.sc_services .sc_services_item_number {
	color: {$colors['alter_bg_hover']};
}

.sc_services_default .sc_services_item {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
}
.sc_services_default .sc_services_item_icon,
.sc_services_default .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_light_05']};
}
.sc_services_default.color_style_link2 .sc_services_item_icon {
	color: {$colors['alter_link2']};
	border-color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_link2']};
	border-color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link3 .sc_services_item_icon {
	color: {$colors['alter_link3']};
	border-color: {$colors['alter_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_link3']};
	border-color: {$colors['alter_link3']};
}
.sc_services_default.color_style_dark .sc_services_item_icon {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.sc_services_default.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.sc_services_default .sc_services_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_services_default .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_services_default.color_style_link2 .sc_services_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_services_default.color_style_link3 .sc_services_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_services_default.color_style_dark .sc_services_item_subtitle a {
	color: {$colors['alter_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_subtitle a:hover {
	color: {$colors['alter_link']};
}
.sc_services_default .sc_services_item_featured_left,
.sc_services_default .sc_services_item_featured_right,
.sc_services_list .sc_services_item {
	color: {$colors['text']};
	background-color: transparent;
}

.sc_services_default .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list .sc_services_item_icon {
	color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_services_list .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover']};
}
.sc_services_default .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}
.sc_services_default .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_services_default .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
	border-color: {$colors['text_link2']};
}
.sc_services_list.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_link2 .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_link2 .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link2']};
	border-color: {$colors['text_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_services_default.color_style_link2 .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_link2 .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover2']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
	border-color: {$colors['text_link3']};
}
.sc_services_list.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_link3 .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_link3 .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_link3']};
	border-color: {$colors['text_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_services_default.color_style_link3 .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_link3 .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_hover3']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_icon,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.sc_services_list.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_default.color_style_dark .sc_services_item_featured_right:hover .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_featured_left:hover .sc_services_item_icon,
.sc_services_list.color_style_dark .sc_services_item_featured_right:hover .sc_services_item_icon {
	color: {$colors['inverse_dark']};
	background-color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_subtitle a,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_subtitle a {
	color: {$colors['text_dark']};
}
.sc_services_default.color_style_dark .sc_services_item_featured_left .sc_services_item_subtitle a:hover,
.sc_services_default.color_style_dark .sc_services_item_featured_right .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}


.sc_services_light .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_light .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover']};
}
.sc_services_light.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
}
.sc_services_light.color_style_link2 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover2']};
}
.sc_services_light.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
}
.sc_services_light.color_style_link3 .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_hover3']};
}
.sc_services_light.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
}
.sc_services_light.color_style_dark .sc_services_item:hover .sc_services_item_icon {
	color: {$colors['text_link']};
}


.sc_services_callouts .sc_services_item {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_callouts .sc_services_item_marker {
	border-color: {$colors['bg_color']};
	background-color:{$colors['alter_link']};
	color: {$colors['inverse_link']};
}
.sc_services_callouts .sc_services_item .sc_services_item_marker_back {
	border-color: {$colors['bg_color']};
	background-color:{$colors['alter_hover']};
	color: {$colors['inverse_hover']};
}
.sc_services_callouts.color_style_link2 .sc_services_item_marker {
	background-color:{$colors['alter_link2']};
}
.sc_services_callouts.color_style_link2 .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_hover2']};
}
.sc_services_callouts.color_style_link3 .sc_services_item_marker {
	background-color:{$colors['alter_link3']};
}
.sc_services_callouts.color_style_link3 .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_hover3']};
}
.sc_services_callouts.color_style_dark .sc_services_item_marker {
	background-color:{$colors['alter_dark']};
}
.sc_services_callouts.color_style_dark .sc_services_item .sc_services_item_marker_back {
	background-color:{$colors['alter_link']};
}
.sc_services_callouts .sc_services_item_marker_bg {
	border-color: {$colors['bg_color']};
	background-color:{$colors['bg_color']};
}

.sc_services_timeline .sc_services_item_timeline {
	border-color: {$colors['bd_color']};
}
.sc_services_timeline .sc_services_item_marker {
	border-color: {$colors['text_link']};
	background-color:{$colors['text_link']};
	color: {$colors['inverse_link']};
}
.sc_services_timeline .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_hover']};
	background-color:{$colors['text_hover']};
	color: {$colors['inverse_hover']};
}
.sc_services_timeline.color_style_link2 .sc_services_item_marker {
	border-color: {$colors['text_link2']};
	background-color:{$colors['text_link2']};
}
.sc_services_timeline.color_style_link2 .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_hover2']};
	background-color:{$colors['text_hover2']};
}
.sc_services_timeline.color_style_link3 .sc_services_item_marker {
	border-color: {$colors['text_link3']};
	background-color:{$colors['text_link3']};
}
.sc_services_timeline.color_style_link3 .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_hover3']};
	background-color:{$colors['text_hover3']};
}
.sc_services_timeline.color_style_dark .sc_services_item_marker {
	border-color: {$colors['text_dark']};
	background-color:{$colors['text_dark']};
}
.sc_services_timeline.color_style_dark .sc_services_item:hover .sc_services_item_marker {
	border-color: {$colors['text_link']};
	background-color:{$colors['text_link']};
}

.sc_services_iconed .sc_services_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_services_iconed .sc_services_item_icon:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_icon:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed.color_style_link2 .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_icon:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_icon,
.sc_services_iconed.color_style_link3 .sc_services_item_header .sc_services_item_subtitle a:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_header .sc_services_item_title a {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_header .sc_services_item_title a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_title a {
	color: #fff;
}
.sc_services_iconed .sc_services_item .sc_services_item_header .sc_services_item_subtitle a {
	color: #fff;
}
.sc_services_iconed .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed.color_style_link2 .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_header .sc_services_item_subtitle a,
.sc_services_iconed.color_style_link3 .sc_services_item .sc_services_item_header .sc_services_item_subtitle a:hover {
	color: {$colors['text_link3']};
}
.sc_services_iconed .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services_iconed .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link']};
}
.sc_services_iconed.color_style_link2 .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_link2 .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link2']};
}
.sc_services_iconed.color_style_link3 .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_link3 .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_link3']};
}
.sc_services_iconed.color_style_dark .sc_services_item_content .sc_services_item_title a:hover,
.sc_services_iconed.color_style_dark .sc_services_item:hover .sc_services_item_content .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}

.sc_services_list .sc_services_item_featured_left .sc_services_item_number,
.sc_services_list .sc_services_item_featured_right .sc_services_item_number {
	color: {$colors['text_light']};
}

.sc_services_hover .sc_services_item_icon,
.sc_services_hover .sc_services_item_title a:hover,
.sc_services_hover .sc_services_item_subtitle a:hover {
	color: {$colors['text_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item_icon,
.sc_services_hover.color_style_link2 .sc_services_item_title a:hover,
.sc_services_hover.color_style_link2 .sc_services_item_subtitle a:hover {
	color: {$colors['text_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item_icon,
.sc_services_hover.color_style_link3 .sc_services_item_title a:hover,
.sc_services_hover.color_style_link3 .sc_services_item_subtitle a:hover {
	color: {$colors['text_link3']};
}
.sc_services_hover [class*="column-"]:nth-child(2n) .sc_services_item.with_image .sc_services_item_header.without_image,
.sc_services_hover .slider-slide:nth-child(2n) .sc_services_item.with_image .sc_services_item_header.without_image {
	background-color:{$colors['alter_bg_hover']};
}
.sc_services_hover [class*="column-"]:nth-child(2n+1) .sc_services_item.with_image .sc_services_item_header.without_image,
.sc_services_hover .slider-slide:nth-child(2n+1) .sc_services_item.with_image .sc_services_item_header.without_image {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_icon,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_number {
	color: {$colors['alter_light']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a {
	color: {$colors['alter_dark']};
}
.sc_services_hover .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_title a,
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_title a:hover {
	color: {$colors['alter_link3']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle,
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle,
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a {
	color: {$colors['alter_link3']};
}
.sc_services_hover .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover']};
}
.sc_services_hover.color_style_link2 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover.color_style_link2 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover2']};
}
.sc_services_hover.color_style_link3 .sc_services_item.with_image:hover .sc_services_item_header.without_image .sc_services_item_subtitle a,
.sc_services_hover.color_style_link3 .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_subtitle a:hover {
	color: {$colors['alter_hover3']};
}
.sc_services_hover .sc_services_item.with_image .sc_services_item_header.without_image .sc_services_item_text {
	color: {$colors['alter_text']};
}

.sc_services_chess .sc_services_item {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.sc_services_chess .sc_services_item_title,
.sc_services_chess .sc_services_item_title a {
	color:{$colors['alter_dark']};
}
.sc_services_chess .sc_services_item_title a:hover {
	color:{$colors['alter_link']};
}
.sc_services_chess.color_style_link2 .sc_services_item_title a:hover {
	color:{$colors['alter_link2']};
}
.sc_services_chess.color_style_link3 .sc_services_item_title a:hover {
	color:{$colors['alter_link3']};
}
.sc_services_chess .sc_services_item:hover {
	color:{$colors['extra_light']};
	background-color:{$colors['extra_bg_color']};
}
.sc_services_chess .sc_services_item:hover .sc_services_item_title,
.sc_services_chess .sc_services_item:hover .sc_services_item_title a {
	color:{$colors['extra_dark']};
}
.sc_services_chess .sc_services_item:hover .sc_services_item_title a:hover {
	color:{$colors['extra_link']};
}


.sc_services_tabs_simple .sc_services_item_icon {
	color: {$colors['text_link']};
}
.sc_services_tabs_simple.color_style_link2 .sc_services_item_icon {
	color: {$colors['text_link2']};
}
.sc_services_tabs_simple.color_style_link3 .sc_services_item_icon {
	color: {$colors['text_link3']};
}
.sc_services_tabs_simple.color_style_dark .sc_services_item_icon {
	color: {$colors['text_dark']};
}
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover']};
}
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple.color_style_link2 .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple.color_style_link2 .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover2']};
}
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_title,
.sc_services_tabs_simple.color_style_link3 .sc_services_item:hover .sc_services_item_subtitle,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_title,
.sc_services_tabs_simple.color_style_link3 .sc_services_tabs_list_item_active .sc_services_item_subtitle {
	color: {$colors['text_hover3']};
}

.sc_services_tabs .sc_services_item_content {
	color:{$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.sc_services_tabs .sc_services_item_title a {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_item_title a:hover {
	color:{$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_item_title a:hover {
	color:{$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_item_title a:hover {
	color:{$colors['alter_link3']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item .sc_services_item_icon {
	color: {$colors['alter_link3']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_number {
	color: {$colors['alter_light']};
}
.sc_services_tabs .sc_services_tabs_list_item {
	background-color:{$colors['alter_bg_color']};
}
.sc_services_tabs .sc_services_tabs_list_item:nth-child(2n+2) {
	background-color:{$colors['alter_bg_hover']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover,
.sc_services_tabs .sc_services_tabs_list_item:nth-child(2n+2):hover {
	background-color:{$colors['alter_bd_hover']};
}
.sc_services_tabs .sc_services_tabs_list_item .sc_services_item_title {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_link3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item:hover .sc_services_item_title {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_hover3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item:hover .sc_services_item_icon {
	color:{$colors['alter_dark']};
}
.sc_services_tabs .sc_services_tabs_list_item:hover .sc_services_item_number {
	color: {$colors['alter_text']};
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active {
	background-color:{$colors['alter_dark']} !important;
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_title {
	color: {$colors['bg_color']};
}
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link']};
}
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_link2 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link2']};
}
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_link3 .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_link3']};
}
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_icon,
.sc_services_tabs.color_style_dark .sc_services_tabs_list_item.sc_services_tabs_list_item_active .sc_services_item_number {
	color: {$colors['alter_dark']};
}


/* Skills (Counters) */
.sc_skills_counter .sc_skills_icon {
	color:{$colors['text_dark']};
}
.sc_skills .sc_skills_total {
	color:{$colors['text_link']};
}
.sc_skills.color_style_link2 .sc_skills_total {
	color:{$colors['text_link2']};
}
.sc_skills.color_style_link3 .sc_skills_total {
	color:{$colors['text_link3']};
}
.sc_skills.color_style_dark .sc_skills_total {
	color:{$colors['text_dark']};
}
.sc_skills .sc_skills_item_title,
.sc_skills .sc_skills_legend_title,
.sc_skills .sc_skills_legend_value {
	color:{$colors['text_dark']};
}
.sc_skills_counter .sc_skills_column + .sc_skills_column:before {
	background-color: {$colors['bd_color']};
}

/* Socials */
.socials_wrap .social_item .social_icon {
	background-color: {$colors['alter_bg_color']};
}
.socials_wrap .social_item .social_icon,
.socials_wrap .social_item .social_icon i {
	color: {$colors['alter_dark']};
}
.socials_wrap .social_item:hover .social_icon {
	background-color: {$colors['alter_bg_hover']};
}
.socials_wrap .social_item:hover .social_icon,
.socials_wrap .social_item:hover .social_icon i {
	color: {$colors['alter_link']};
}
.sidebar_inner .socials_wrap .social_item .social_icon {
	background-color: {$colors['alter_bg_hover']};
}
.sidebar_inner .socials_wrap .social_item:hover .social_icon,
.sidebar_inner .socials_wrap .social_item:hover .social_icon i {
	color: {$colors['inverse_link']};
}
.sidebar_inner .socials_wrap .social_item:hover .social_icon {
	background-color: {$colors['alter_hover']};
}
.scheme_self.sidebar .socials_wrap .social_item .social_icon,
.scheme_self.footer_wrap .socials_wrap .social_item .social_icon {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}
.scheme_self.sidebar .socials_wrap .social_item:hover .social_icon,
.scheme_self.footer_wrap .socials_wrap .social_item:hover .social_icon {
	color: {$colors['inverse_hover']};
	background-color: {$colors['alter_hover']};
}
.scheme_self.sidebar .sc_layouts_row_type_compact .socials_wrap .social_item .social_icon,
.scheme_self.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item .social_icon {
	color: {$colors['text_dark']};
	background-color: transparent;
}
.scheme_self.sidebar .sc_layouts_row_type_compact .socials_wrap .social_item:hover .social_icon,
.scheme_self.footer_wrap .sc_layouts_row_type_compact .socials_wrap .social_item:hover .social_icon {
	color: {$colors['text_link']};
	background-color: transparent;
}

/* Share */
.socials_share.socials_type_drop .social_item > .social_icon > i {
	color: {$colors['text_light']};
}
.socials_share.socials_type_drop .social_item:hover > .social_icon > i {
	color: {$colors['text_dark']};
}


/* Testimonials */
.sc_testimonials_item_content {
	color: {$colors['text_dark']};
}
.sc_testimonials_item_content:before,
.sc_testimonials_item_author_title {
	color: {$colors['text_link']};
}
.color_style_link2 .sc_testimonials_item_content:before,
.color_style_link2 .sc_testimonials_item_author_title {
	color: {$colors['text_link2']};
}
.color_style_link3 .sc_testimonials_item_content:before,
.color_style_link3 .sc_testimonials_item_author_title {
	color: {$colors['text_link3']};
}
.color_style_dark .sc_testimonials_item_content:before,
.color_style_dark .sc_testimonials_item_author_title {
	color: {$colors['text_dark']};
}
.sc_testimonials_item_author_subtitle {
	color: {$colors['text_light']};
}
.sc_testimonials_simple .sc_testimonials_item_author_data:before  {
	background-color: {$colors['text_light']};
}
.sc_testimonials_simple [class*="column"] .sc_testimonials_item_author_data {
	border-color: {$colors['text_light']};
}

/* Team */
.sc_team_default .sc_team_item {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
}
.sc_team .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link']};
}
.sc_team.color_style_link2 .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link2']};
}
.sc_team.color_style_link3 .sc_team_item_thumb .sc_team_item_title a:hover {
	color: {$colors['alter_link3']};
}
.sc_team_default .sc_team_item_subtitle {
	color: {$colors['alter_link']};
}
.sc_team_default.color_style_link2 .sc_team_item_subtitle {
	color: {$colors['alter_link2']};
}
.sc_team_default.color_style_link3 .sc_team_item_subtitle {
	color: {$colors['alter_link3']};
}
.sc_team_default.color_style_dark .sc_team_item_subtitle {
	color: {$colors['alter_dark']};
}
.sc_team_default .sc_team_item_socials .social_item .social_icon,
.team_member_page .team_member_socials .social_item .social_icon {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}
.sc_team_default.color_style_link2 .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_link2']};
}
.sc_team_default.color_style_link3 .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_link3']};
}
.sc_team_default.color_style_dark .sc_team_item_socials .social_item .social_icon {
	background-color: {$colors['alter_dark']};
}
.sc_team_default .sc_team_item_socials .social_item:hover .social_icon,
.team_member_page .team_member_socials .social_item:hover .social_icon {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_dark']};
}
.sc_team_default.color_style_link2 .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_hover2']};
}
.sc_team_default.color_style_link3 .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_hover3']};
}
.sc_team_default.color_style_dark .sc_team_item_socials .social_item:hover .social_icon {
	background-color: {$colors['alter_link']};
}
.sc_team .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon {
	color: {$colors['inverse_link']};
	border-color: {$colors['inverse_link']};
}
.sc_team .sc_team_item_thumb .sc_team_item_socials .social_item:hover .social_icon {
	color: {$colors['text_link']};
	background-color: {$colors['inverse_link']};
}
.team_member_page .team_member_featured .team_member_avatar {
	border-color: {$colors['bd_color']};
}
.sc_team_short .sc_team_item_thumb {
	border-color: {$colors['text_link']};
}
.sc_team_short.color_style_link2 .sc_team_item_thumb {
	border-color: {$colors['text_link2']};
}
.sc_team_short.color_style_link3 .sc_team_item_thumb {
	border-color: {$colors['text_link3']};
}
.sc_team_short.color_style_dark .sc_team_item_thumb {
	border-color: {$colors['text_dark']};
}
.sc_team.slider_container .swiper-pagination-bullet {
	border-color: {$colors['text_light']};
}



/* CPT Sport
--------------------------------------------------- */

.sport_page_list {
	border-color: {$colors['bd_color']};
}
.sport_page_list li+li {
	border-color: {$colors['bd_color']};
}
.sport_page_list li:nth-child(2n+1) {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['alter_text']};
}


/* Utils
--------------------------------------------------- */

/* Scroll to top */
.trx_addons_scroll_to_top,
.trx_addons_cv .trx_addons_scroll_to_top {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']};
	background-color: {$colors['text_link']};
}
.trx_addons_scroll_to_top:hover,
.trx_addons_cv .trx_addons_scroll_to_top:hover {
	color: {$colors['inverse_hover']};
	border-color: {$colors['text_link_blend']};
	background-color: {$colors['text_link_blend']};
}


/* Login and Register */
.trx_addons_popup {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_text']};
}
.trx_addons_popup button.mfp-close {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
	color:{$colors['alter_text']};
}
.trx_addons_popup button.mfp-close:hover {
	background-color: {$colors['alter_dark']};
	color: {$colors['alter_bg_color']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title {
	background-color:{$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active {
	background-color:{$colors['alter_bg_color']};
	border-bottom-color: transparent;
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a > i {
	color:{$colors['alter_text']};
}
.trx_addons_popup li.trx_addons_tabs_title a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a:hover > i {
	color:{$colors['alter_link']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a > i,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title[data-disabled="true"] a:hover > i {
	color:{$colors['alter_light']};
}
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a > i,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a:hover,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title.ui-tabs-active a:hover > i {
	color:{$colors['alter_dark']};
}

/* Profiler */
.trx_addons_profiler {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_hover']};
}
.trx_addons_profiler_title {
	color: {$colors['alter_dark']};
}
.trx_addons_profiler table td,
.trx_addons_profiler table th {
	border-color: {$colors['alter_bd_color']};
}
.trx_addons_profiler table td {
	color: {$colors['alter_text']};
}
.trx_addons_profiler table th {
	background-color: {$colors['alter_bg_hover']};
	color: {$colors['alter_dark']};
}




/* Themes Market */
.sc_edd_add_to_cart_default,
.sc_edd_details {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_hover']};
	color: {$colors['alter_text']};
}
.sc_edd_add_to_cart_default a,
.sc_edd_details a {
	color: {$colors['alter_link']};
}
.sc_edd_add_to_cart_default a:hover,
.sc_edd_details a:hover {
	color: {$colors['alter_hover']};
}
.edd_price_options ul > li > label > input[type="checkbox"] + span:before {
	border-color: {$colors['alter_bd_color']};
}
.single-download .edd_download_purchase_form .trx_addons_edd_purchase_subtotal {
	border-color: {$colors['alter_bd_color']};
}



/* CV */
.trx_addons_cv,
.trx_addons_cv_body_wrap {
	color: {$colors['alter_text']};
	background-color:{$colors['alter_bg_color']};
}
.trx_addons_cv a {
	color: {$colors['alter_link']};
}
.trx_addons_cv a:hover {
	color: {$colors['alter_hover']};
}

.trx_addons_cv_header {
	background-color: {$colors['bg_color']};
}
.trx_addons_cv_header_image img {
	border-color: {$colors['text_dark']};
}
.trx_addons_cv_header .trx_addons_cv_header_letter,
.trx_addons_cv_header .trx_addons_cv_header_text {
	color: {$colors['text_dark']};
}
.trx_addons_cv_header .trx_addons_cv_header_socials .social_item > .social_icon {
	color: {$colors['text_dark_07']};	
}
.trx_addons_cv_header .trx_addons_cv_header_socials .social_item:hover > .social_icon {
	color: {$colors['text_dark']};	
}

.trx_addons_cv_header_letter,
.trx_addons_cv_header_text,
.trx_addons_cv_header_socials .social_item > .social_icon {
	text-shadow: 1px 1px 6px {$colors['bg_color']};
}

.trx_addons_cv_tint_dark .trx_addons_cv_header_letter,
.trx_addons_cv_tint_dark .trx_addons_cv_header_text,
.trx_addons_cv_tint_dark .trx_addons_cv_header_socials .social_item > .social_icon {
	color: {$colors['bg_color']};	
	text-shadow: 1px 1px 3px {$colors['text_dark']};
}
.trx_addons_cv_tint_dark .trx_addons_cv_header_socials .social_item:hover > .social_icon {
	color: {$colors['text_hover']};	
}

.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item {
	color: {$colors['alter_light']};
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['bg_color']};
}
.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item_active,
.trx_addons_cv_navi_buttons .trx_addons_cv_navi_buttons_area .trx_addons_cv_navi_buttons_item:hover {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_bg_color']};
}


.trx_addons_cv .trx_addons_cv_section_title,
.trx_addons_cv .trx_addons_cv_section_title a {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_section_title.ui-state-active {
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li > a {
	color: {$colors['alter_light']};
}
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li.ui-state-active > a,
.trx_addons_cv_section_content .trx_addons_tabs .trx_addons_tabs_titles li > a:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_section .trx_addons_pagination > * {
	color:{$colors['alter_text']};
}
.trx_addons_cv_section .trx_addons_pagination > a:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_pagination > span.active {
	color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_breadcrumbs .trx_addons_cv_breadcrumbs_item {
	color: {$colors['alter_light']};
}
.trx_addons_cv_breadcrumbs a.trx_addons_cv_breadcrumbs_item:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_single .trx_addons_cv_single_title {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_single .trx_addons_cv_single_subtitle {
	color: {$colors['alter_light']};
}

.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+2) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+3) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_2 .trx_addons_cv_resume_column:nth-child(2n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+4) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+5) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_3 .trx_addons_cv_resume_column:nth-child(3n+6) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+5) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+6) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+7) .trx_addons_cv_resume_item,
.trx_addons_tabs_content_delimiter .trx_addons_cv_resume_columns_4 .trx_addons_cv_resume_column:nth-child(4n+8) .trx_addons_cv_resume_item {
	border-color: {$colors['alter_bd_color']};
}
.trx_addons_cv_resume_item_meta {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title,
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title a {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_item .trx_addons_cv_resume_item_title a:hover {
	color: {$colors['alter_link']};
}
.trx_addons_cv_resume_item_subtitle {
	color: {$colors['alter_light']};
}
.trx_addons_cv_resume_style_skills .trx_addons_cv_resume_item_skills {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_skills .trx_addons_cv_resume_item_skill:after {
	border-color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_education .trx_addons_cv_resume_item_number {
	color: {$colors['alter_light']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_icon {
	color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_icon:hover,
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_text a:hover {
	color: {$colors['text_hover']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_title > a:hover:after {
	border-color: {$colors['text_hover']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_title > a:after {
	border-top-color: {$colors['alter_dark']};
}
.trx_addons_cv_resume_style_services .trx_addons_cv_resume_item_text a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_portfolio_item .trx_addons_cv_portfolio_item_title,
.trx_addons_cv_portfolio_item .trx_addons_cv_portfolio_item_title a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_testimonials_item .trx_addons_cv_testimonials_item_title,
.trx_addons_cv_testimonials_item .trx_addons_cv_testimonials_item_title a {
	color: {$colors['alter_dark']};
}

.trx_addons_cv_certificates_item .trx_addons_cv_certificates_item_title,
.trx_addons_cv_certificates_item .trx_addons_cv_certificates_item_title a {
	color: {$colors['alter_dark']};
}

/* Contact form */
.trx_addons_cv .trx_addons_contact_form .trx_addons_contact_form_title {
	color: {$colors['alter_dark']};
}
.trx_addons_cv .trx_addons_contact_form_field_title {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form .trx_addons_contact_form_field input[type="text"],
.trx_addons_contact_form .trx_addons_contact_form_field textarea {
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_text']};
}
.trx_addons_contact_form .trx_addons_contact_form_field input[type="text"]:focus,
.trx_addons_contact_form .trx_addons_contact_form_field textarea:focus {
	background-color: {$colors['alter_bg_hover']};
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_field button {
	background-color: {$colors['alter_dark']};
	border-color: {$colors['alter_dark']};
	color: {$colors['bg_color']};
}
.trx_addons_contact_form_field button:hover {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_info_icon {
	color: {$colors['alter_light']};
}
.trx_addons_contact_form_info_area {
	color: {$colors['alter_dark']};
}
.trx_addons_contact_form_info_item_phone .trx_addons_contact_form_info_data {
	color: {$colors['alter_dark']} !important;
}

/* Page About Me */
.trx_addons_cv_about_page .trx_addons_cv_single_title {
	color: {$colors['alter_dark']};
}


/* WooCommerce Additional attributes for Variations */
.trx_addons_attrib_item.trx_addons_attrib_button,
.trx_addons_attrib_item.trx_addons_attrib_image,
.trx_addons_attrib_item.trx_addons_attrib_color {
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.trx_addons_attrib_item.trx_addons_attrib_button:hover,
.trx_addons_attrib_item.trx_addons_attrib_image:hover,
.trx_addons_attrib_item.trx_addons_attrib_color:hover {
	border-color: {$colors['alter_bd_hover']};
	background-color: {$colors['alter_bg_hover']};
}
.trx_addons_attrib_item.trx_addons_attrib_selected {
	border-color: {$colors['alter_link']} !important;
	background-color: {$colors['alter_bg_hover']};
}
.trx_addons_attrib_item.trx_addons_attrib_disabled span:before,
.trx_addons_attrib_item.trx_addons_attrib_disabled span:after {
	background-color: {$colors['alter_hover']};
}


/* Range slider */
.trx_addons_range_slider_label_min {
	color: {$colors['alter_text']};
}
.trx_addons_range_slider_label_max {
	color: {$colors['alter_text']};
}
div.ui-slider {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
}
div.ui-slider .ui-slider-handle {
	border-color: {$colors['alter_bd_hover']};
	background-color: {$colors['alter_bg_hover']};
}
div.ui-slider .ui-slider-range {
	background-color: {$colors['alter_bg_hover']};
}


EOT;
		}


		// Add additional plugin-specific colors and fonts to the custom CSS
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<EOT
		
/* Add Styles
-------------------------------------------------------------- */

/* Line */
.sc_item_subtitle:before,
.widget .widget_title:before, .widget .widgettitle:before {
    background-color: {$colors['text_link']};
}



/* General styles
-------------------------------------------------------------- */

.widget li.current-menu-item a {
	color: {$colors['text_link']};
}

/* Services: Light */
.sc_services_light .sc_services_item_icon, .sc_services_light .sc_services_item_pictogram{
	background-color: {$colors['bg_color']};
}

/* Donate: Info */
.sc_donations_info .sc_donations_info_inner .sc_donations_icon_info {
	color: {$colors['text_link']};
}

/* Blogger: Plain (Events) */
.sc_blogger_upcoming_events_date .sc_events_item_day,
.sc_blogger_upcoming_events_date .sc_events_item_month {
	color: {$colors['text_link']};
}
.sc_blogger_plain .sc_blogger_item {
	background-color: {$colors['bg_color']};
}

/* Team */
.sc_team.sc_team_short .trx_addons_hover_mask {
	background-color: {$colors['bg_color_07']};
}
.sc_team.sc_team_short .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon {
	color: {$colors['text_dark']};
}
.sc_team.sc_team_short .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon:hover {
	color: {$colors['text_link']};
}
.sc_team.sc_team_short .sc_team_item_thumb .sc_team_item_socials .social_item,
.sc_team.sc_team_short .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon,
.sc_team.sc_team_short .sc_team_item_thumb .sc_team_item_socials .social_item .social_icon:hover {
	background-color: transparent !important;
}

/* Inverse Color */
.color_style_inverse *,
.color_style_inverse *.sc_item_subtitle{
    color: {$colors['inverse_text']};
}
.color_style_inverse.sc_skills_pie.sc_skills_compact_off .sc_skills_total,
.color_style_inverse.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title {
    color: {$colors['inverse_text']};
}
.color_style_inverse *.sc_item_subtitle b,
.color_style_inverse *.sc_item_descr *{
    color: {$colors['extra_light']} !important;
}
.sc_button.sc_button_default.color_style_inverse,
.sc_button.sc_button_default.color_style_inverse[class*="sc_button_hover_slide"]{
    background-color: {$colors['bg_color']} !important;
}
.sc_button_size_large.sc_button_default .sc_button_title,
.sc_button.sc_button_default.color_style_inverse .sc_button_title,
.sc_button.sc_button_default.color_style_inverse[class*="sc_button_hover_slide"] .sc_button_title {
    color: {$colors['text_dark']} !important;
}
.sc_button.sc_button_default .sc_button_subtitle,
.sc_button.sc_button_default.color_style_inverse .sc_button_subtitle,
.sc_button.sc_button_default.color_style_inverse[class*="sc_button_hover_slide"] .sc_button_subtitle{
    color: {$colors['text']} !important;
}
.sc_button.sc_button_default.color_style_inverse .sc_button_icon *,
.sc_button.sc_button_default.color_style_inverse .sc_button_icon *,
.sc_button.sc_button_default.color_style_inverse[class*="sc_button_hover_slide"] .sc_button_icon *{
    color: {$colors['text_link']} !important;
}
.sc_button_size_large.sc_button_default .sc_button_title {
    color: {$colors['inverse_text']} !important;
}
.sc_button_size_large.sc_button_default .sc_button_subtitle {
    color: {$colors['text']} !important;
}
.sc_button_size_large.sc_button_default .sc_button_icon * {
    color: {$colors['text_link']} !important;
}
.color_style_inverse.sc_button_bordered:not(.sc_button_bg_image),
.color_style_inverse.sc_button_bordered:not(.sc_button_bg_image) * {
    color: {$colors['inverse_text']};
    border-color: {$colors['inverse_text']};
}
.color_style_inverse.sc_button_bordered:not(.sc_button_bg_image):hover,
.color_style_inverse.sc_button_bordered:not(.sc_button_bg_image):hover * {
    color: {$colors['text_link']} !important;
    border-color: {$colors['text_link']} !important;
}

/* RoadMap */
.sc_roadmap .roadmap_bar,
.sc_roadmap .sc_roadmap_item_circle {
    background-color: {$colors['bd_color']};
}
.sc_roadmap .sc_roadmap_item_circle:before {
    background-color: {$colors['bg_color']};
}
.sc_roadmap .roadmap_bar .roadmap_bar-bar,
.sc_roadmap .sc_roadmap_item_circle.circle_date_now,
.sc_roadmap .sc_roadmap_item_circle.circle_date_prev {
    background-color: {$colors['text_link']};
}
.sc_roadmap .sc_roadmap_item_circle.circle_date_now:before,
.sc_roadmap .sc_roadmap_item_circle.circle_date_next:before {
    background-color: {$colors['alter_bg_hover']};
}

/* Icons */
.sc_icons .sc_icons_item_title,
.sc_icons .sc_icons_icon,
.sc_icons .sc_icons_item_description a {
    color: {$colors['text']};
}
.sc_icons .sc_icons_item_linked:hover .sc_icons_icon,
.sc_icons .sc_icons_item_linked:hover .sc_icons_item_title,
.sc_icons .sc_icons_item_description a:hover {
    color: {$colors['text_link']};
}
.sc_icons_modern .sc_icons_item_title,
.sc_icons_modern .sc_icons_item_title a,
.sc_icons_modern .sc_icons_item_linked:hover .icon-number,
.sc_icons_modern .sc_icons_item_linked:hover .sc_icons_item_title{
	color: {$colors['text_dark']};
}
.sc_icons_modern .sc_icons_icon,
.sc_icons_modern .sc_icons_item_title a:hover{
	color: {$colors['text_link']};
}
.sc_icons_modern .sc_icons_item .icon-number,
.sc_icons_modern .sc_icons_item_description {
	color: {$colors['text']};
}
.sc_icons_modern .sc_icons_item:hover {
	background-color: {$colors['bg_color']};
}

/* Price */
.sc_price_item,
.sc_price_item:hover {
	color: {$colors['text']};
	background-color: {$colors['bg_color']};
	border-color: {$colors['bg_color']};
}
.sc_price_item .sc_price_item_icon {
	color: {$colors['text_link']};
}
.sc_price_item:hover .sc_price_item_icon {
	color: {$colors['text_hover']};
}
.sc_price_item .sc_price_item_label {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_text']};
}
.sc_price_item:hover .sc_price_item_label {
	background-color: {$colors['text_hover']};
	color: {$colors['inverse_text']};
}
.sc_price_item .sc_price_item_subtitle {
	color: {$colors['text']};
}
.sc_price_item .sc_price_item_title,
.sc_price_item .sc_price_item_title a {
	color: {$colors['text_dark']};
}
.sc_price_item:hover .sc_price_item_title,
.sc_price_item:hover .sc_price_item_title a {
	color: {$colors['text_link']};
}
.sc_price_item .sc_price_item_price {
	color: {$colors['text_dark']};
}
.sc_price_item .sc_price_item_description,
.sc_price_item .sc_price_item_details {
	color: {$colors['text']};
}

/* Title */
.sc_item_subtitle {
    color: {$colors['text_dark']};			
}
.sc_item_subtitle b{
    color: {$colors['text']};
    font-weight: inherit;
}

/* Blog & Single Post*/
.post_meta_item.post_date:before, .post_counters_item:before {
    color: {$colors['text_link']};			
}
.post_layout_excerpt.sticky{
    color: {$colors['inverse_text']};
    background-color: {$colors['alter_bg_hover']};
}
.post_layout_excerpt.sticky,
.post_layout_excerpt.sticky .post_meta_item,
.post_layout_excerpt.sticky .post_meta_item a,
.post_layout_excerpt.sticky .post_content {
    color: {$colors['extra_light']};
}
.post_layout_excerpt.sticky .post_title a {
    color: {$colors['inverse_dark']};
}
.post_layout_excerpt.sticky a.post_meta_item:hover,
.post_layout_excerpt.sticky .post_meta_item a:hover,
.post_layout_excerpt.sticky .post_title a:hover {
    color: {$colors['text_link']};
}
.post_item_single .post_content .post_meta_label,
.post_item_single .post_content .post_meta_item:hover .post_meta_label {
	color: {$colors['text_link']};
}
.post_item_single .post_content .post_tags,
.post_item_single .post_content .post_tags a {
	color: {$colors['text_dark']};
}
.post_item_single .post_content .post_tags a:hover {
	color: {$colors['text_link']};
}
.post_item_single .post_content .post_meta .post_share .social_item .social_icon {
	color: {$colors['text_dark']} !important;
	background-color: {$colors['alter_bg_color']};
}
.post_item_single .post_content .post_meta .post_share .social_item:hover .social_icon {
	color: {$colors['inverse_text']} !important;
	background-color: {$colors['text_link']};
}
.post_item_single .post_content > .post_meta_single .post_tags {
	border-color: {$colors['bd_color']};
}
.author_info .author_title{
	color: {$colors['inverse_text']};
}
.author_info{
	color: {$colors['extra_light']};
	background-color: {$colors['extra_bg_hover']};
}
.author_bio .author_link:hover{
	color: {$colors['extra_light']};
}
.related_wrap .related_item_style_2 .post_date,
.related_wrap .related_item_style_2 .post_date a{
    color: {$colors['text']};
}
.related_wrap .related_item_style_2 .post_date:before,
.related_wrap .related_item_style_2 .post_date a:hover{
    color: {$colors['text_link']};
}
.comments_list_wrap .comment_info {
    color: {$colors['text']};
}
.comments_list_wrap .comment_reply a{
    color: {$colors['text_dark']};
    background-color: {$colors['alter_bg_color']};
}
.comments_list_wrap .comment_reply a:hover {
    color: {$colors['inverse_text']};
    background-color: {$colors['text_link']};
}
			
/* Menu */
.sc_layouts_menu_nav > li > a{
    color: {$colors['text_dark']};
}
.sc_layouts_menu_nav > li > a:hover,
.sc_layouts_menu_nav > li.sfHover > a {
    color: {$colors['text_link']} !important;
}
.sc_layouts_menu_nav > li.current-menu-item > a,
.sc_layouts_menu_nav > li.current-menu-parent > a,
.sc_layouts_menu_nav > li.current-menu-ancestor > a {
    color: {$colors['text_dark']} !important;
}
.sc_layouts_menu_nav .menu-collapse > a:before {
    color: {$colors['text_dark']};
}
.sc_layouts_menu_nav .menu-collapse > a:after {
    background-color: {$colors['alter_bg_color']};
}
.sc_layouts_menu_nav .menu-collapse > a:hover:before {
    color: {$colors['text_link']};
}
.sc_layouts_menu_nav .menu-collapse > a:hover:after {
    background-color: {$colors['alter_bg_hover']};
}
.top_panel.with_bg_image .sc_layouts_menu_nav > li > a{
    color: {$colors['inverse_text']};
}
.top_panel.with_bg_image .sc_layouts_menu_nav > li > a:hover,
.top_panel.with_bg_image .sc_layouts_menu_nav > li.sfHover > a {
    color: {$colors['text_link']} !important;
}
.top_panel.with_bg_image .sc_layouts_menu_nav > li.current-menu-item > a,
.top_panel.with_bg_image .sc_layouts_menu_nav > li.current-menu-parent > a,
.top_panel.with_bg_image .sc_layouts_menu_nav > li.current-menu-ancestor > a{
    color: {$colors['inverse_text']} !important;
}

/* Submenu */
.sc_layouts_menu_popup .sc_layouts_menu_nav,
.sc_layouts_menu_nav > li ul {
    background-color: {$colors['bg_color']};
}
.widget_nav_menu li.menu-delimiter,
.sc_layouts_menu_nav > li li.menu-delimiter {
    border-color: {$colors['extra_bd_color']};
}
.sc_layouts_menu_popup .sc_layouts_menu_nav > li > a,
.sc_layouts_menu_nav > li li > a {
    color: {$colors['text_dark']} !important;
}
.sc_layouts_menu_popup .sc_layouts_menu_nav > li > a:hover,
.sc_layouts_menu_popup .sc_layouts_menu_nav > li.sfHover > a,
.sc_layouts_menu_nav > li li > a:hover,
.sc_layouts_menu_nav > li li.sfHover > a {
    color: {$colors['text_link']} !important;
    background-color: transparent;
}
.sc_layouts_menu_nav > li li > a:hover:after {
    color: {$colors['text_link']} !important;
}
.sc_layouts_menu_nav li[class*="columns-"] li.menu-item-has-children > a:hover,
.sc_layouts_menu_nav li[class*="columns-"] li.menu-item-has-children.sfHover > a {
    color: {$colors['text_link']} !important;
    background-color: transparent;
}
.sc_layouts_menu_nav > li li[class*="icon-"]:before {
    color: {$colors['text_link']};
}
.sc_layouts_menu_nav > li li[class*="icon-"]:hover:before,
.sc_layouts_menu_nav > li li[class*="icon-"].shHover:before {
    color: {$colors['text_link']};
}
.sc_layouts_menu_nav > li li.current-menu-item > a,
.sc_layouts_menu_nav > li li.current-menu-parent > a,
.sc_layouts_menu_nav > li li.current-menu-ancestor > a {
    color: {$colors['text_link']} !important;
}
.sc_layouts_menu_nav > li li.current-menu-item:before,
.sc_layouts_menu_nav > li li.current-menu-parent:before,
.sc_layouts_menu_nav > li li.current-menu-ancestor:before {
    color: {$colors['text_link']} !important;
}

/* Breadcrumbs */
.top_panel.with_bg_image .sc_layouts_title_breadcrumbs,
.top_panel.with_bg_image .sc_layouts_title_title > .sc_layouts_title_caption {
    color: {$colors['inverse_text']};
}
.top_panel.with_bg_image .sc_layouts_title_breadcrumbs a {
    color: {$colors['inverse_text']} !important;        
}
.top_panel.with_bg_image .sc_layouts_title_breadcrumbs a:hover {
    color: {$colors['text_link']} !important;        
}
.sc_layouts_title_title + .sc_layouts_title_breadcrumbs:before {
    background-color: {$colors['text_link']};
}

/* Header */
.sc_current_price {
    color: {$colors['inverse_text']};
}
.sc_current_price:before {
    background-color: {$colors['bg_color_02']};
}
.without_bg_image .sc_current_price,
.top_panel_custom_lymcoin-header-home-2 .sc_current_price {
    color: {$colors['text_dark']};
}
.without_bg_image .sc_current_price:before,
.top_panel_custom_lymcoin-header-home-2 .sc_current_price:before {
    background-color: {$colors['alter_bg_hover_02']};
}
.sc_layouts_menu_nav > .menu-item-button:not(.menu-collapse) > a {
    background-color: {$colors['text_hover']};        
}
.sc_layouts_menu_nav > .menu-item-button:not(.menu-collapse) > a:hover {
    background-color: {$colors['text_link']};        
}
.sc_layouts_menu_nav > .menu-item-button:not(.menu-collapse) > a,
.sc_layouts_menu_nav > .menu-item-button:not(.menu-collapse) > a:hover,        	
.top_panel.with_bg_image .sc_layouts_menu_nav>li.menu-item-button>a:hover{
    color: {$colors['inverse_text']} !important;        
}
.top_panel.with_bg_image .sc_layouts_row_fixed_on {
    background-color: {$colors['extra_bg_color']};
}

/* Sidebar */
.widget .widget_title:before, .widget .widgettitle:before {
    background-color: {$colors['text_link']};        
}
.widget_search form:after, .woocommerce.widget_product_search form:after, .widget_display_search form:after, #bbpress-forums #bbp-search-form:after {
    color: {$colors['text_link']};
}
li a,
widget .post_title a,
widget_categories li,
widget_categories li a,
.widget_area .post_item .post_title, aside .post_item .post_title,
.widget_area .post_item .post_title a, aside .post_item .post_title a{
    color: {$colors['text']};
}

.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a,
.trx_addons_popup .trx_addons_tabs_titles li.trx_addons_tabs_title a>i{
    color: {$colors['text']};
}

li a:hover,
widget .post_title a:hover,
widget_categories li a:hover,
.widget_area .post_item .post_title a:hover, aside .post_item .post_title a:hover,
.widget_area .post_item .post_info a:hover, aside .post_item .post_info a:hover,
.widget_area .post_item .post_info a, aside .post_item .post_info a  {
    color: {$colors['text_link']};
}
.widget_area .post_item .post_info a:hover, aside .post_item .post_info a:hover  {
    color: {$colors['text_hover']};
}
.wp-block-calendar caption,
.widget_calendar caption {
    background-color: {$colors['alter_bg_color']};        
}
.widget_calendar th{
    color: {$colors['text']};        
}
.widget_calendar td#today:before {
    background-color: {$colors['extra_bg_hover']};        
}
.widget_calendar td#prev a, .widget_calendar td#next a {
    color: {$colors['text_dark']};        
}
.widget_calendar td#prev a:hover, .widget_calendar td#next a:hover {
    color: {$colors['text_link']};        
}

/* Footer */
.sc_footer_with_image .sc_item_title {
    color: {$colors['inverse_text']};        
}
.sc_footer_with_image .textwidget a {
    color: {$colors['text']};        
}
.sc_footer_with_image .textwidget a:hover {
    color: {$colors['text_link']};        
}

/* Socials */
.socials_wrap .social_item .social_icon {
    background-color: {$colors['extra_bg_hover']};
}
.socials_wrap .social_item .social_icon,
.socials_wrap .social_item .social_icon i {
    color: {$colors['extra_text']};
}
.socials_wrap .social_item:hover .social_icon {
    background-color: {$colors['text_link']};
}
.socials_wrap .social_item:hover .social_icon,
.socials_wrap .social_item:hover .social_icon i {
    color: {$colors['extra_text']};
}

/* Dropcaps */
.trx_addons_dropcap_style_1 {
    color: {$colors['text_link']};
    background-color: {$colors['bg_color']};
}
.trx_addons_dropcap_style_2 {
    color: {$colors['inverse_text']};
    background-color: {$colors['text_link']};
}

/* Image */
figure figcaption,
.wp-caption .wp-caption-text,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd {
    color: {$colors['inverse_text']};
    background-color: {$colors['extra_bg_hover_08']};
}
figure figcaption a{
    color: {$colors['text_link']};
}
figure figcaption a:hover{
    color: {$colors['inverse_text']};
}

/* Table */
table:not(.tribe-events-calendar) th, table:not(.tribe-events-calendar) th + th, table:not(.tribe-events-calendar) td + th  {
    border-color: {$colors['bg_color_02']};
}
table:not(.tribe-events-calendar) td, table th + td, table:not(.tribe-events-calendar) td + td {
    color: {$colors['text']};
    border-color: {$colors['bd_color']};
}
table:not(.tribe-events-calendar) th {
    color: {$colors['inverse_text']};
    background-color: {$colors['extra_bg_hover']};
}
table:not(.tribe-events-calendar) th b, table:not(.tribe-events-calendar) th strong {
    color: {$colors['text']};
}
table:not(.tribe-events-calendar) > tbody > tr:nth-child(2n+1) > td {
    background-color: {$colors['alter_bg_color']};
}
table:not(.tribe-events-calendar) > tbody > tr:nth-child(2n) > td {
    background-color: {$colors['bg_color']};
}
table:not(.tribe-events-calendar) th a:hover {
    color: {$colors['text_link']};
}
 
/* Slider */
.sc_slider_controls .slider_controls_wrap > a,
.slider_container.slider_controls_side .slider_controls_wrap > a,
.slider_outer_controls_side .slider_controls_wrap > a {
    color: {$colors['text_light']};
    background-color: transparent;
    border-color: {$colors['text_light']};
}
.widget_slider .sc_slider_controls .slider_controls_wrap > a,
.widget_slider .slider_container.slider_controls_side .slider_controls_wrap > a,
.widget_slider .slider_outer_controls_side .slider_controls_wrap > a {
    color: {$colors['inverse_text']};
    background-color: transparent;
    border-color: {$colors['inverse_text']};
}
.sc_slider_controls .slider_controls_wrap > a:hover,
.slider_container.slider_controls_side .slider_controls_wrap > a:hover,
.slider_outer_controls_side .slider_controls_wrap > a:hover,
.widget_slider .sc_slider_controls .slider_controls_wrap > a:hover,
.widget_slider .slider_container.slider_controls_side .slider_controls_wrap > a:hover,
.widget_slider .slider_outer_controls_side .slider_controls_wrap > a:hover {
    color: {$colors['inverse_text']};
    background-color: {$colors['text_link']};
    border-color: {$colors['text_link']};
}
.widget_slider .slider_engine_elastistack .slider_outer_controls_side .slider_controls_wrap > a {
    color: {$colors['inverse_text']};
    background-color: {$colors['text_hover']};
    border-color: {$colors['text_hover']};
}
.widget_slider .slider_engine_elastistack .slider_outer_controls_side .slider_controls_wrap > a:hover {
    color: {$colors['inverse_text']};
    background-color: {$colors['text_link']};
    border-color: {$colors['text_link']};
}

/* Audio */
.mejs-controls .mejs-time-rail .mejs-time-total,
.mejs-controls .mejs-time-rail .mejs-time-loaded,
.mejs-controls .mejs-time-rail .mejs-time-hovered,
.mejs-controls .mejs-volume-slider .mejs-volume-total,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
    background: {$colors['bg_color_02']};
}
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-volume-slider .mejs-volume-current,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.mejs-controls .mejs-time-rail .mejs-time-handle-content {
    border-color: {$colors['text_link']};
}
.mejs-controls .mejs-volume-slider .mejs-volume-handle,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-handle {
    background: {$colors['extra_link']};
}
.trx_addons_audio_player.without_cover,
.format-audio .post_featured.without_thumb .post_audio {
    border-color: {$colors['extra_bg_hover']};
    background-color: {$colors['extra_bg_hover']};
}
.trx_addons_audio_player.without_cover .audio_author,
.format-audio .post_featured.without_thumb .post_audio_author {
    color: {$colors['extra_light']};
}
.mejs-time{
    color: {$colors['extra_light']} !important;
}
.trx_addons_audio_player.without_cover .audio_caption,
.format-audio .post_featured.without_thumb .post_audio_title {
    color: {$colors['inverse_text']};
}
.trx_addons_audio_player.without_cover .mejs-controls, .format-audio .post_featured.without_thumb .mejs-controls {
   background-color: {$colors['extra_bg_hover']};
}
.mejs-controls .mejs-button>button:hover, .mejs-controls .mejs-button>button:focus{
    color: {$colors['inverse_text']};
}

/* Skills: Pie */
.sc_skills_pie.sc_skills_compact_off .sc_skills_total,
.sc_skills_pie.sc_skills_compact_off .sc_skills_item_title {
    color: {$colors['text_dark']};
}

/* Counter */
.sc_skills .sc_skills_item_title, .sc_skills .sc_skills_legend_title, .sc_skills .sc_skills_legend_value{
    color: {$colors['text']};
}

/* Tabs */
.wpb-js-composer .vc_tta.vc_general .vc_tta-tabs-list{
    background-color: {$colors['alter_bg_color']};
}
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a {
	color: {$colors['text_dark']};
	background-color: transparent;
}
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab > a:hover{
	color: {$colors['text_link']};
	background-color: transparent;
}
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tabs-list .vc_tta-tab.vc_active > a {
	color: {$colors['inverse_text']};
	background-color: {$colors['text_link']};
}

/* Accordion */
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title>a,
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a{
	color: {$colors['text_dark']};
}
.wpb-js-composer .vc_tta.vc_tta-accordion.vc_general .vc_tta-panel,
.wpb-js-composer .vc_tta.vc_tta-accordion.vc_general .vc_tta-panel:last-child{
	border-color: {$colors['bd_color']};
}
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a .vc_tta-controls-icon:before, 
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a .vc_tta-controls-icon:after,
body .vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:before, 
body .vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:after {
	border-color: {$colors['text_dark']};
}
body .vc_tta.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon,
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a .vc_tta-controls-icon, 
body .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title>a:hover .vc_tta-controls-icon{
	background-color: transparent !important;
    background: none !important;
}

.rev_slider .rev_slider_line {
	background-color: {$colors['text_link']};
}
body:not(.body_style_boxed),
.footer_wrap,
.body_style_boxed .footer_wrap {
	background-color: {$colors['bg_color']} !important;
}

.highcharts-background{
	fill: {$colors['bg_color_0']};
}

/* Contact Form 7 */
form .error_field,
div.wpcf7-validation-errors, div.wpcf7-acceptance-missing {
	border-color: {$colors['text_link']};
}
div.wpcf7-mail-sent-ok {
	border-color: {$colors['text_hover']};
}
span.wpcf7-not-valid-tip {
	color: {$colors['text_link']};
}

EOT;
		}

		return $css;
	}
}
?>