<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( !function_exists( 'lymcoin_bbpress_get_css' ) ) {
	add_filter( 'lymcoin_filter_get_css', 'lymcoin_bbpress_get_css', 10, 4 );
	function lymcoin_bbpress_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

/* Buttons */
#buddypress .comment-reply-link,
#buddypress .generic-button a,
#buddypress a.button,
#buddypress button,
#buddypress input[type="button"],
#buddypress input[type="reset"],
#buddypress input[type="submit"],
#buddypress ul.button-nav li a,
a.bp-title-button,
#buddypress #item-nav ul li {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
#bbpress-forums li.bbp-header,
#bbpress-forums li.bbp-footer,
li.bbp-topic-title .bbp-topic-permalink {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_line-height']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
}
.bbp-forums .bbp-forum-title {
	{$fonts['h5_font-family']}
	{$fonts['h5_font-size']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_font-style']}
	{$fonts['h5_line-height']}
	{$fonts['h5_text-decoration']}
	{$fonts['h5_text-transform']}
	{$fonts['h5_letter-spacing']}
}
#bbpress-forums .bbp-author-name,
#bbpress-forums .bbp-body li.bbp-forum-topic-count,
#bbpress-forums .bbp-body li.bbp-forum-reply-count {
	{$fonts['h6_font-size']}
	{$fonts['h5_font-family']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_font-style']}
}
.bbp-meta .bbp-reply-post-date,
#buddypress table.profile-fields tr td.data,
#buddypress .current-visibility-level,
#buddypress div#item-header div#item-meta,
#buddypress .activity-list .activity-content .activity-inner  {
	{$fonts['info_font-family']}
}
#buddypress div.dir-search input[type="search"],
#buddypress div.dir-search input[type="text"],
#buddypress li.groups-members-search input[type="search"],
#buddypress li.groups-members-search input[type="text"],
#buddypress .standard-form input[type="color"],
#buddypress .standard-form input[type="date"],
#buddypress .standard-form input[type="datetime-local"],
#buddypress .standard-form input[type="datetime"],
#buddypress .standard-form input[type="email"],
#buddypress .standard-form input[type="month"],
#buddypress .standard-form input[type="number"],
#buddypress .standard-form input[type="password"],
#buddypress .standard-form input[type="range"],
#buddypress .standard-form input[type="search"],
#buddypress .standard-form input[type="tel"],
#buddypress .standard-form input[type="text"],
#buddypress .standard-form input[type="time"],
#buddypress .standard-form input[type="url"],
#buddypress .standard-form input[type="week"],
#buddypress .standard-form select,
#buddypress .standard-form textarea,
#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}

CSS;
		}



		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* BBPress
---------------------------------------------------- */

/* Forums list */
#bbpress-forums ul.bbp-lead-topic,
#bbpress-forums ul.bbp-topics,
#bbpress-forums ul.bbp-forums,
#bbpress-forums ul.bbp-replies,
#bbpress-forums ul.bbp-search-results {
	border-color: {$colors['bd_color']};
}
#bbpress-forums li.bbp-header,
#bbpress-forums li.bbp-footer {
	background: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bg_hover']};
	color: {$colors['inverse_text']};
}
.bbpress_style_light #bbpress-forums li.bbp-header,
.bbpress_style_light #bbpress-forums li.bbp-footer,
.bbpress_style_callouts #bbpress-forums li.bbp-header,
.bbpress_style_callouts #bbpress-forums li.bbp-footer {
	background: {$colors['alter_bg_color']};
}
#bbpress-forums li.bbp-body ul.forum,
#bbpress-forums li.bbp-body ul.topic {
    border-color: {$colors['bg_color']};
}
.bbpress_style_light #bbpress-forums li.bbp-body ul.forum,
.bbpress_style_light #bbpress-forums li.bbp-body ul.topic,
.bbpress_style_callouts #bbpress-forums li.bbp-body ul.forum,
.bbpress_style_callouts #bbpress-forums li.bbp-body ul.topic {
    border-color: {$colors['bd_color']};
}
#bbpress-forums div.odd,
#bbpress-forums ul.odd,
#bbpress-forums div.even,
#bbpress-forums ul.even,
.bbpress_style_light #bbpress-forums div.odd,
.bbpress_style_light #bbpress-forums ul.odd,
.bbpress_style_light #bbpress-forums div.even,
.bbpress_style_light #bbpress-forums ul.even,
.bbpress_style_callouts #bbpress-forums div.odd,
.bbpress_style_callouts #bbpress-forums ul.odd,
.bbpress_style_callouts #bbpress-forums div.even,
.bbpress_style_callouts #bbpress-forums ul.even {
	color: {$colors['text']};
	background-color: transparent;
}

/* Single forum */
#bbpress-forums div.bbp-forum-header,
#bbpress-forums div.bbp-topic-header{
	color: {$colors['alter_text']};
	border-color: {$colors['bd_color']};
	background-color: {$colors['alter_bg_color']};
}
#bbpress-forums div.bbp-reply-header {
	color: {$colors['text']};
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bg_color']};
}
.bbpress_style_callouts #bbpress-forums div.bbp-reply-header {
	color: {$colors['text_light']};
	background-color: transparent;
}
.bbpress_style_callouts #bbpress-forums div.bbp-reply-header a,
.bbpress_style_callouts #bbpress-forums div.bbp-reply-header .bbp-admin-links {
	color: {$colors['text_light']};
}
.bbpress_style_callouts #bbpress-forums div.bbp-reply-header a:hover {
	color: {$colors['text_dark']};
}
.bbpress_style_callouts #bbpress-forums .bbp-body div.bbp-reply-content {
	border-color: {$colors['bd_color']};
}
.bbpress_style_callouts.type-topic #bbpress-forums ul.bbp-replies .bbp-body .bbp-reply-content:before {
	border-color: {$colors['bd_color']};
	background-color: {$colors['bg_color']};
}

.bbp-forums .bbp-forum-title,
#bbpress-forums .bbp-author-name,
#bbpress-forums .bbp-body li.bbp-forum-topic-count,
#bbpress-forums .bbp-body li.bbp-forum-reply-count {
	color: {$colors['text_dark']};
}
.bbp-forums .bbp-forum-title:hover,
#bbpress-forums .bbp-author-name:hover{
	color: {$colors['text_link']};
}


span.bbp-admin-links {
	color: {$colors['alter_text']};
}
.bbp-forum-header a.bbp-forum-permalink,
.bbp-topic-header a.bbp-topic-permalink,
.bbp-reply-header a.bbp-reply-permalink {
	color: {$colors['alter_link']};
}
.bbp-forum-header a.bbp-forum-permalink:hover,
.bbp-topic-header a.bbp-topic-permalink:hover,
.bbp-reply-header a.bbp-reply-permalink:hover {
	color: {$colors['alter_hover']};
}

#bbpress-forums fieldset.bbp-form {
	border-color: {$colors['bd_color']};
}
.quicktags-toolbar {
    background: {$colors['alter_bg_hover']};
    border-color: {$colors['alter_bd_hover']};
}


/* Buddy Press
---------------------------------------------------- */

/* Tabs */
#buddypress div.item-list-tabs ul li a {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}
#buddypress div.item-list-tabs ul li a:hover,
#buddypress div.item-list-tabs ul li.current a,
#buddypress div.item-list-tabs ul li.selected a {
	color: {$colors['inverse_dark']};
	background-color: {$colors['alter_link']};
}

#buddypress #header-cover-image {
	background-color: {$colors['alter_bg_color']};
}
#buddypress div#item-header-cover-image .user-nicename a, 
#buddypress div#item-header-cover-image .user-nicename {
	color: {$colors['alter_dark']};
}
#buddypress #item-header-cover-image #item-header-avatar img.avatar {
	border-color: {$colors['alter_bd_color']};
}

#buddypress div#item-header div#item-meta {
	color: {$colors['alter_light']};
}

#buddypress table.notifications,
#buddypress table.notifications tr td,
#buddypress table.notifications tr th {
	border-color: {$colors['alter_bd_color']};
}
#buddypress table.notifications tr th {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}
#buddypress table.profile-fields tr td,
#buddypress table.profile-fields tr th {
	color: {$colors['text_dark']};
}

#buddypress ul.item-list,
#buddypress ul.item-list li,
#buddypress table.forum tr td.label,
#buddypress table.messages-notices tr td.label,
#buddypress table.notifications tr td.label,
#buddypress table.notifications-settings tr td.label,
#buddypress table.profile-fields tr td.label,
#buddypress table.wp-profile-fields tr td.label,
.activity-list li.bbp_topic_create .activity-content .activity-inner,
.activity-list li.bbp_reply_create .activity-content .activity-inner {
	border-color: {$colors['bd_color']};
}

/* Widgets
----------------------------------- */
.widget_bp_core_login_widget .bp-login-widget-user-link a {
	color: {$colors['alter_dark']};
}
.widget_bp_core_login_widget .bp-login-widget-user-link a:hover {
	color: {$colors['alter_link']};
}

.widget_bp_core_members_widget #members-list li .item-title a {
	color: {$colors['alter_dark']};
}
.widget_bp_core_members_widget #members-list li .item-title a:hover {
	color: {$colors['alter_link']};
}
.widget_bp_core_members_widget #members-list-options a {
	color: {$colors['bg_color']};
	background-color: {$colors['alter_dark']};
}
.widget_bp_core_members_widget #members-list-options a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_link']};
}
.widget_bp_core_members_widget #members-list-options a.selected,
.widget_bp_core_members_widget #members-list-options a.selected:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['alter_hover']};
}

#bbpress-forums div.bbp-reply-content {
	color: {$colors['text_dark']};
}
#buddypress span.activity {
	color: {$colors['text_dark']};
}

CSS;
		}
		
		return $css;
	}
}
?>