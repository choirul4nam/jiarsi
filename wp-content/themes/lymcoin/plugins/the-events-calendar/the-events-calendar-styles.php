<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( !function_exists( 'lymcoin_tribe_events_get_css' ) ) {
	add_filter( 'lymcoin_filter_get_css', 'lymcoin_tribe_events_get_css', 10, 4 );
	function lymcoin_tribe_events_get_css($css, $colors, $fonts, $scheme='') {
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
			
.tribe-events-list .tribe-events-list-event-title {
	{$fonts['h3_font-family']}
}

.tribe-common .tribe-common-c-btn,
.tribe-events .tribe-events-c-view-selector__list-item-text,
.tribe-common .tribe-common-c-btn-border, 
.tribe-common a.tribe-common-c-btn-border,
.tribe-common .tribe-common-h3,
.tribe-common .tribe-common-h4,
#tribe-bar-form button, #tribe-bar-form a,
.tribe-events-read-more,
.tribe-common .tribe-events-c-ical__link,

#tribe-bar-form .tribe-bar-submit input[type="submit"],
#tribe-bar-form button,
#tribe-bar-form a,
#tribe-bar-form input,
#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a,
.tribe-bar-mini #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a,
#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a,
.tribe-events-read-more,
#tribe-events-footer ~ a.tribe-events-ical.tribe-events-button,
#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
#tribe-bar-form button, #tribe-bar-form a,
.tribe-events-read-more {
	{$fonts['button_font-family']}
	{$fonts['button_letter-spacing']}
}
.tribe-events-list .tribe-events-list-separator-month,
.tribe-events-calendar thead th,
.tribe-events-schedule, .tribe-events-schedule h2 {
	{$fonts['h5_font-family']}
}

#tribe-bar-collapse-toggle,
#tribe-bar-form input[type="text"],
#tribe-bar-form input[type="text"]::placeholder,
#tribe-bar-form input, #tribe-events-content.tribe-events-month,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title,
#tribe-mobile-container .type-tribe_events,
.tribe-events-list-widget ol li .tribe-event-title {
	{$fonts['p_font-family']}
}
.tribe-events-loop .tribe-event-schedule-details,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dt,
#tribe-mobile-container .type-tribe_events .tribe-event-date-start {
	{$fonts['info_font-family']};
}




.tribe-common .tribe-common-h7, 
.tribe-common .tribe-common-h8,
.tribe-common .tribe-events-calendar-month__calendar-event-tooltip-title.tribe-common-h7,
.tribe-common .tribe-events-calendar-day__event-title.tribe-common-h6,
.tribe-common .tribe-events-calendar-list__event .tribe-common-h6,
.tribe-common .tribe-events-calendar-month__header-row .tribe-common-b3,
#tribe-bar-form label {
	{$fonts['h5_font-family']}
}

.tribe-events .datepicker .datepicker-switch,
.tribe-events .datepicker .month, 
.tribe-events .datepicker .year,
.tribe-events .tribe-events-calendar-month__calendar-event-tooltip-datetime,
.tribe-common .tribe-common-b2,
.tribe-common--breakpoint-medium.tribe-common .tribe-common-form-control-text__input, 
.tribe-common .tribe-common-form-control-text__input,
.tribe-common .tribe-common-b3,
.tribe-common .tribe-common-h5,
.tribe-common .tribe-events-calendar-list__event .tribe-common-b2,
#tribe-bar-form input, #tribe-events-content.tribe-events-month,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title,
#tribe-mobile-container .type-tribe_events,
.tribe-events-list-widget ol li .tribe-event-title {
	{$fonts['p_font-family']}
}
.tribe-events-loop .tribe-event-schedule-details,
#tribe-mobile-container .type-tribe_events .tribe-event-date-start {
	{$fonts['info_font-family']};
}


.tribe-common .tribe-common-h8{
	{$fonts['button_font-family']}
	{$fonts['button_letter-spacing']}
	{$fonts['button_font-weight']}
}


CSS;
		}


		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Filters bar */
#tribe-bar-form {
	color: {$colors['text_dark']};
}
#tribe-bar-collapse-toggle,
#tribe-bar-form input[type="text"] {
	color: {$colors['text']};
	border-color: {$colors['alter_bg_color']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-bar-views-list {
	background-color: {$colors['text_link']};
}

.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
	color: {$colors['text_link']};
	background: {$colors['text_dark']};
}

/* Content */
.tribe-events-calendar thead th {
	color: {$colors['bg_color']};
	background: {$colors['text_dark']} !important;
	border-color: {$colors['text_dark']} !important;
}
.tribe-events-calendar thead th + th:before {
	background: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td {
	border-color: {$colors['bd_color']} !important;
}
.tribe-events-calendar td div[id*="tribe-events-daynum-"],
.tribe-events-calendar td div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth {
	color: {$colors['alter_light']};
	background: {$colors['alter_bg_color']} !important;
}
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"] > a {
	color: {$colors['alter_light']};
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"], .tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_light']};
}
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-present:before {
	border-color: {$colors['text_link']};
}
.tribe-events-calendar .tribe-events-has-events:after {
	background-color: {$colors['text']};
}
.tribe-events-calendar .mobile-active.tribe-events-has-events:after {
	background-color: {$colors['text']};
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
	color: {$colors['text_dark']};
}
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a:hover {
	color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active,
#tribe-events-content .tribe-events-calendar td.mobile-active:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active div[id*="tribe-events-daynum-"] {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}
#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*="tribe-events-daynum-"] a,
.tribe-events-calendar .mobile-active div[id*="tribe-events-daynum-"] a {
	background-color: transparent;
	color: {$colors['bg_color']};
}

/* Tooltip */
.recurring-info-tooltip,
.tribe-events-calendar .tribe-events-tooltip,
.tribe-events-week .tribe-events-tooltip,
.tribe-events-tooltip .tribe-events-arrow {
	color: {$colors['alter_text']};
	background: {$colors['alter_bg_color']};
}
#tribe-events-content .tribe-events-tooltip h3,
#tribe-events-content .tribe-events-tooltip h4 { 
	color: {$colors['text_link']};
	background: {$colors['text_dark']};
}
.tribe-events-tooltip .tribe-event-duration {
	color: {$colors['text_light']};
}

/* Events list */
.tribe-events-list-separator-month {
	color: {$colors['text_dark']};
}
.tribe-events-list-separator-month:after {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .type-tribe_events + .type-tribe_events,
.tribe-events-day .tribe-events-day-time-slot + .tribe-events-day-time-slot + .tribe-events-day-time-slot {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .tribe-events-event-cost span {
	color: {$colors['bg_color']};
	border-color: {$colors['text_dark']};
	background: {$colors['text_dark']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a {
	color: {$colors['alter_link']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a:hover {
	color: {$colors['alter_hover']};
}
.tribe-mobile .tribe-events-list .tribe-events-venue-details {
	border-color: {$colors['alter_bd_color']};
}

/* Events day */
.tribe-events-day .tribe-events-day-time-slot h5 {
	color: {$colors['bg_color']};
	background: {$colors['text_dark']};
}

/* Single Event */
.single-tribe_events .tribe-events-venue-map {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_hover']};
	background: {$colors['alter_bg_hover']};
}
.single-tribe_events .tribe-events-schedule .tribe-events-cost {
	color: {$colors['text_dark']};
}
.single-tribe_events .type-tribe_events {
	border-color: {$colors['bd_color']};
}

.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*=tribe-events-daynum-], 
.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*=tribe-events-daynum-]>a,
.tribe-events-calendar td div[id*="tribe-events-daynum-"] {
	background: {$colors['alter_bg_color']};
}
.tribe-events-calendar thead th+th {
	border-color: {$colors['extra_bg_color']} !important;
}
#tribe-events-content .tribe-events-calendar tbody tr+tr td,
#tribe-events-content .tribe-events-calendar td + td {
	border-color: {$colors['bd_color']};
}



#tribe-bar-views .tribe-bar-views-list {
    background-color:  {$colors['text_link']} !important;
}



/*--------new----*/

.tribe-common .tribe-common-anchor-thin-alt:hover,
.tribe-common .tribe-common-anchor-thin-alt:focus,
.tribe-common .tribe-common-anchor-thin-alt:active,
.tribe-events-c-top-bar__datepicker > button,
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date, 
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date-link,
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_link']};
}

.tribe-common .tribe-common-anchor-thin-alt,
.tribe-common .tribe-common-anchor-thin-alt:focus{
    border-color: {$colors['text_link']};
}
.tribe-events .datepicker .day.active,
.tribe-events .tribe-events-c-events-bar__search-button:before,
.tribe-events .tribe-events-c-view-selector__button:before,
.tribe-events .datepicker .year.active,
.tribe-events .datepicker .month.active:hover,
.tribe-events .datepicker .month.active, .tribe-events .datepicker .month.active.focused{
    background-color: {$colors['text_link']};
}

.tribe-events-calendar-day-nav button:hover,
.tribe-events-calendar-list-nav button:hover,
.tribe-events-c-top-bar__datepicker > button:focus,
.tribe-events-c-top-bar__datepicker > button:hover{
    color: {$colors['text_dark']}!important;
}


.tribe-events .tribe-events-calendar-month__multiday-event-bar-inner {	
	 background-color: {$colors['text_link']};
}

.tribe-common .tribe-common-c-loader__dot,
.tribe-events .tribe-events-calendar-month__mobile-events-icon--event,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-c-view-selector--tabs .tribe-events-c-view-selector__list-item--active .tribe-events-c-view-selector__list-item-link:after{
    background-color: {$colors['text_link']};
}

.tribe-common--breakpoint-medium.tribe-events .tribe-events-c-events-bar--border{
    border-color: {$colors['input_bg_color']};
}

.tribe-common .tribe-events-calendar-month__day--past .tribe-common-h4{
	color: {$colors['text_light']};
}

.tribe-common .tribe-events-calendar-month__day--current .tribe-common-h4{
	color: {$colors['text_link']};
}

.tribe-events .tribe-events-calendar-month__multiday-event-bar-inner .tribe-common-h8{
    color: {$colors['extra_dark']};
}

.tribe-events-calendar-month__calendar-event-tooltip-title > a,
.tribe-common .tribe-events-calendar-day__event-title.tribe-common-h6 > a,
.tribe-common .tribe-events-calendar-list__event .tribe-common-h6 > a{
	color: {$colors['text_dark']};
}
.tribe-events-calendar-month__calendar-event-tooltip-title > a:hover,
.tribe-common .tribe-events-calendar-day__event-title.tribe-common-h6 > a:hover,
.tribe-common .tribe-events-calendar-list__event .tribe-common-h6 > a:hover{
	color: {$colors['text_link']};
}


.tribe-common .tribe-events-calendar-month__calendar-event-tooltip-datetime,
.tribe-common .tribe-events-calendar-day__event-datetime,
.tribe-common .tribe-events-calendar-day__event-header address,
.tribe-common .tribe-events-calendar-day__event-description,
.tribe-common .tribe-events-calendar-list__event-datetime,
.tribe-common .tribe-events-calendar-list__event-header address,
.tribe-common .tribe-events-calendar-list__event-description,
.tribe-events-calendar-month__calendar-event-tooltip-description{
    color: {$colors['text']};
}



CSS;
		}
		
		return $css;
	}
}
?>