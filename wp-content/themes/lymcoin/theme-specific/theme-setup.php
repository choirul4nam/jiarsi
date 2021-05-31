<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0.22
 */

if (!defined("LYMCOIN_THEME_FREE"))		define("LYMCOIN_THEME_FREE", false);
if (!defined("LYMCOIN_THEME_FREE_WP"))	define("LYMCOIN_THEME_FREE_WP", false);

// Theme storage
$LYMCOIN_STORAGE = array(
	// Theme required plugin's slugs
	'required_plugins' => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'					=> esc_html__('ThemeREX Addons', 'lymcoin'),
			'lymcoin-addons'				=> esc_html__('Lymcoin Addons', 'lymcoin'),
			
			// Recommended (supported) plugins fot both (lite and full) versions
			// If plugin not need - comment (or remove) it
			'contact-form-7'				=> esc_html__('Contact Form 7', 'lymcoin'),
			'mailchimp-for-wp'				=> esc_html__('MailChimp for WP', 'lymcoin'),
            'gdpr-framework'				=> esc_html__('GDPR Framework', 'lymcoin'),
            'trx_updater'				    => esc_html__('ThemeREX Updater', 'lymcoin'),
		),

		// List of plugins for the FREE version only
		//-----------------------------------------------------
		LYMCOIN_THEME_FREE 
			? array(
					// Recommended (supported) plugins for the FREE (lite) version
					)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
					// Recommended (supported) plugins for the PRO (full) version
					// If plugin not need - comment (or remove) it
					'bbpress'					=> esc_html__('BBPress and BuddyPress', 'lymcoin'),
					'essential-grid'			=> esc_html__('Essential Grid', 'lymcoin'),
					'revslider'					=> esc_html__('Revolution Slider', 'lymcoin'),
					'the-events-calendar'		=> esc_html__('The Events Calendar', 'lymcoin'),
					'trx_donations'				=> esc_html__('ThemeREX Donations', 'lymcoin'),
					'js_composer'				=> esc_html__('WPBakery Page Builder', 'lymcoin'),
					'm-chart'				    => esc_html__('M Chart', 'lymcoin'),
					'm-chart-highcharts-library'				    => esc_html__('M Chart Highcharts Library', 'lymcoin'),
					)
	),
	
	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'		=> LYMCOIN_THEME_FREE 
								? 'env-ancora'
								: '',

	// Theme-specific URLs (will be escaped in place of the output)
    'theme_demo_url'    => 'http://lymcoin.ancorathemes.com',
    'theme_doc_url'     => 'http://lymcoin.ancorathemes.com/doc/',
    'theme_download_url'=> 'https://1.envato.market/c/1262870/275988/4415?subId1=ancora&u=themeforest.net/item/lymcoin-cryptocurrency-mining-wordpress-theme/21990843',
    'theme_support_url'	=> 'https://themerex.net/support/',
    'theme_video_url'	=> 'https://www.youtube.com/channel/UCdIjRh7-lPVHqTTKpaf8PLA',

	// Responsive resolutions
	// Parameters to create css media query: min, max, 
	'responsive' => array(
						// By device
						'desktop'	=> array('min' => 1680),
						'notebook'	=> array('min' => 1280, 'max' => 1679),
						'tablet'	=> array('min' =>  768, 'max' => 1279),
						'mobile'	=> array('max' =>  767),
						// By size
						'xxl'		=> array('max' => 1679),
						'xl'		=> array('max' => 1439),
						'lg'		=> array('max' => 1279),
						'md'		=> array('max' => 1023),
						'sm'		=> array('max' =>  767),
						'sm_wp'		=> array('max' =>  600),
						'xs'		=> array('max' =>  479)
						)
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( !function_exists('lymcoin_customizer_theme_setup1') ) {
	add_action( 'after_setup_theme', 'lymcoin_customizer_theme_setup1', 1 );
	function lymcoin_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		lymcoin_storage_set('settings', array(
			
			'duplicate_options'		=> 'child',		// none  - use separate options for the main and the child-theme
													// child - duplicate theme options from the main theme to the child-theme only
													// both  - sinchronize changes in the theme options between main and child themes

			'customize_refresh'		=> 'auto',		// Refresh method for preview area in the Appearance - Customize:
													// auto - refresh preview area on change each field with Theme Options
													// manual - refresh only obn press button 'Refresh' at the top of Customize frame

			'max_load_fonts'		=> 5,			// Max fonts number to load from Google fonts or from uploaded fonts

			'comment_maxlength'		=> 1000,		// Max length of the message from contact form

			'comment_after_name'	=> true,		// Place 'comment' field before the 'name' and 'email'

			'socials_type'			=> 'icons',		// Type of socials:
													// icons - use font icons to present social networks
													// images - use images from theme's folder trx_addons/css/icons.png

			'icons_type'			=> 'icons',		// Type of other icons:
													// icons - use font icons to present icons
													// images - use images from theme's folder trx_addons/css/icons.png

			'icons_selector'		=> 'internal',	// Icons selector in the shortcodes:

													// internal - internal popup with plugin's or theme's icons list (fast)
			'check_min_version'		=> true,		// Check if exists a .min version of .css and .js and return path to it
													// instead the path to the original file
													// (if debug_mode is off and modification time of the original file < time of the .min file)
			'autoselect_menu'		=> true,		// Show any menu if no menu selected in the location 'main_menu'
													// (for example, the theme is just activated)
			'disable_jquery_ui'		=> false,		// Prevent loading custom jQuery UI libraries in the third-party plugins
		
			'use_mediaelements'		=> true,		// Load script "Media Elements" to play video and audio
			
			'tgmpa_upload'			=> false,		// Allow upload not pre-packaged plugins via TGMPA
			
			'allow_no_image'		=> false		// Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.
		));


		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		lymcoin_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Hind',
				'family' => 'sans-serif',
                'styles' => '300,600'		// Parameter 'style' used only for the Google fonts
            ),
			array(
				'name'	 => 'Rubik',
				'family' => 'sans-serif',
                'styles' => '300,400,500'		// Parameter 'style' used only for the Google fonts
                )
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		lymcoin_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!


		lymcoin_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'lymcoin'),
				'font-family'		=> '"Hind",sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '300',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.4em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '2.667em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.0417em',
				'margin-bottom'		=> '0.5833em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '1.999em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.0952em',
				'margin-bottom'		=> '0.7619em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '1.667em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.4545em',
				'margin-bottom'		=> '0.7879em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '1.333em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.6923em',
				'margin-bottom'		=> '1em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.7em',
				'margin-bottom'		=> '1.3em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'lymcoin'),
				'font-family'		=> '"Hind",sans-serif',
				'font-size' 		=> '0.889em',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.1em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.4706em',
				'margin-bottom'		=> '0.9412em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'lymcoin'),
				'font-family'		=> '"Rubik",sans-serif',
				'font-size' 		=> '1.646em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'lymcoin'),
				'font-family'		=> '"Hind",sans-serif',
				'font-size' 		=> '13px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5385em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.1em'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'lymcoin'),
				'font-family'		=> 'inherit',
				'font-size' 		=> '1em',
				'font-weight'		=> 'inherit',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',	// Attention! Firefox don't allow line-height less then 1.5em in the select
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'lymcoin'),
				'font-family'		=> 'inherit',
				'font-size' 		=> '16px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the main menu items', 'lymcoin'),
				'font-family'		=> '"Hind",sans-serif',
				'font-size' 		=> '13px',//'0.722em',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.1em'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'lymcoin'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'lymcoin'),
				'font-family'		=> '"Hind",sans-serif',
				'font-size' 		=> '13px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.1em'
				)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		lymcoin_storage_set('scheme_color_groups', array(
			'main'	=> array(
							'title'			=> esc_html__('Main', 'lymcoin'),
							'description'	=> esc_html__('Colors of the main content area', 'lymcoin')
							),
			'alter'	=> array(
							'title'			=> esc_html__('Alter', 'lymcoin'),
							'description'	=> esc_html__('Colors of the alternative blocks (sidebars, etc.)', 'lymcoin')
							),
			'extra'	=> array(
							'title'			=> esc_html__('Extra', 'lymcoin'),
							'description'	=> esc_html__('Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'lymcoin')
							),
			'inverse' => array(
							'title'			=> esc_html__('Inverse', 'lymcoin'),
							'description'	=> esc_html__('Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'lymcoin')
							),
			'input'	=> array(
							'title'			=> esc_html__('Input', 'lymcoin'),
							'description'	=> esc_html__('Colors of the form fields (text field, textarea, select, etc.)', 'lymcoin')
							),
			)
		);
		lymcoin_storage_set('scheme_color_names', array(
			'bg_color'	=> array(
							'title'			=> esc_html__('Background color', 'lymcoin'),
							'description'	=> esc_html__('Background color of this block in the normal state', 'lymcoin')
							),
			'bg_hover'	=> array(
							'title'			=> esc_html__('Background hover', 'lymcoin'),
							'description'	=> esc_html__('Background color of this block in the hovered state', 'lymcoin')
							),
			'bd_color'	=> array(
							'title'			=> esc_html__('Border color', 'lymcoin'),
							'description'	=> esc_html__('Border color of this block in the normal state', 'lymcoin')
							),
			'bd_hover'	=>  array(
							'title'			=> esc_html__('Border hover', 'lymcoin'),
							'description'	=> esc_html__('Border color of this block in the hovered state', 'lymcoin')
							),
			'text'		=> array(
							'title'			=> esc_html__('Text', 'lymcoin'),
							'description'	=> esc_html__('Color of the plain text inside this block', 'lymcoin')
							),
			'text_dark'	=> array(
							'title'			=> esc_html__('Text dark', 'lymcoin'),
							'description'	=> esc_html__('Color of the dark text (bold, header, etc.) inside this block', 'lymcoin')
							),
			'text_light'=> array(
							'title'			=> esc_html__('Text light', 'lymcoin'),
							'description'	=> esc_html__('Color of the light text (post meta, etc.) inside this block', 'lymcoin')
							),
			'text_link'	=> array(
							'title'			=> esc_html__('Link', 'lymcoin'),
							'description'	=> esc_html__('Color of the links inside this block', 'lymcoin')
							),
			'text_hover'=> array(
							'title'			=> esc_html__('Link hover', 'lymcoin'),
							'description'	=> esc_html__('Color of the hovered state of links inside this block', 'lymcoin')
							),
			'text_link2'=> array(
							'title'			=> esc_html__('Link 2', 'lymcoin'),
							'description'	=> esc_html__('Color of the accented texts (areas) inside this block', 'lymcoin')
							),
			'text_hover2'=> array(
							'title'			=> esc_html__('Link 2 hover', 'lymcoin'),
							'description'	=> esc_html__('Color of the hovered state of accented texts (areas) inside this block', 'lymcoin')
							),
			'text_link3'=> array(
							'title'			=> esc_html__('Link 3', 'lymcoin'),
							'description'	=> esc_html__('Color of the other accented texts (buttons) inside this block', 'lymcoin')
							),
			'text_hover3'=> array(
							'title'			=> esc_html__('Link 3 hover', 'lymcoin'),
							'description'	=> esc_html__('Color of the hovered state of other accented texts (buttons) inside this block', 'lymcoin')
							)
			)
		);
		lymcoin_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'lymcoin'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#ffffff',//
					'bd_color'			=> '#eeeef0',//
		
					// Text and links colors
					'text'				=> '#8d949e',//
					'text_light'		=> '#c9cdd1',//
					'text_dark'			=> '#002140',//
					'text_link'			=> '#ffb506',//
					'text_hover'		=> '#00264c',//
					'text_link2'		=> '#f5f5f6',//
					'text_hover2'		=> '#ffb506',//
					'text_link3'		=> '#ddb837',
					'text_hover3'		=> '#eec432',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#f5f5f6',//
					'alter_bg_hover'	=> '#002140',//
					'alter_bd_color'	=> '#e5e5e5',
					'alter_bd_hover'	=> '#dadada',
					'alter_text'		=> '#333333',
					'alter_light'		=> '#b7b7b7',
					'alter_dark'		=> '#1d1d1d',
					'alter_link'		=> '#ffb506',
					'alter_hover'		=> '#00264c',
					'alter_link2'		=> '#8be77c',
					'alter_hover2'		=> '#80d572',
					'alter_link3'		=> '#eec432',
					'alter_hover3'		=> '#ddb837',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#003167',//
					'extra_bg_hover'	=> '#00264c',//
					'extra_bd_color'	=> '#313131',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#ffffff',//
					'extra_light'		=> '#cdd9ea',//
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffb506',
					'extra_hover'		=> '#00264c',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',

					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#f5f5f6',//
					'input_bg_hover'	=> '#f5f5f6',//
					'input_bd_color'	=> '#f5f5f6',//
					'input_bd_hover'	=> '#00264c',//
					'input_text'		=> '#8d949e',//
					'input_light'		=> '#8d949e',
					'input_dark'		=> '#002140',//

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#67bcc1',
					'inverse_bd_hover'	=> '#5aa4a9',
					'inverse_text'		=> '#ffffff',//
					'inverse_light'		=> '#333333',
					'inverse_dark'		=> '#ffffff',//
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			),

			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'lymcoin'),
				'colors' => array(

					// Whole block border and background
					'bg_color'			=> '#001b3e',//
					'bd_color'			=> '#023869',//

					// Text and links colors
					'text'				=> '#b7b7b7',
					'text_light'		=> '#5f5f5f',
					'text_dark'			=> '#ffffff',
                    'text_link'			=> '#ffb506',//
                    'text_hover'		=> '#f5f5f6',//
					'text_link2'		=> '#ffb506',
					'text_hover2'		=> '#f5f5f6',
					'text_link3'		=> '#ddb837',
					'text_hover3'		=> '#eec432',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#00122d',//
					'alter_bg_hover'	=> '#333333',
					'alter_bd_color'	=> '#464646',
					'alter_bd_hover'	=> '#4a4a4a',
					'alter_text'		=> '#a6a6a6',
					'alter_light'		=> '#5f5f5f',
					'alter_dark'		=> '#ffffff',
					'alter_link'		=> '#ffaa5f',
					'alter_hover'		=> '#fe7259',
					'alter_link2'		=> '#8be77c',
					'alter_hover2'		=> '#80d572',
					'alter_link3'		=> '#eec432',
					'alter_hover3'		=> '#ddb837',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#00122d',//
					'extra_bg_hover'	=> '#5f5f5f',
					'extra_bd_color'	=> '#464646',
					'extra_bd_hover'	=> '#4a4a4a',
					'extra_text'		=> '#a6a6a6',
					'extra_light'		=> '#ffb506',//
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffb506',//
					'extra_hover'		=> '#fe7259',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',

					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#00122d',//
					'input_bg_hover'	=> '#00122d',//
					'input_bd_color'	=> '#00122d',//
					'input_bd_hover'	=> '#353535',
					'input_text'		=> '#b7b7b7',
					'input_light'		=> '#5f5f5f',
					'input_dark'		=> '#ffffff',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#e36650',
					'inverse_bd_hover'	=> '#cb5b47',
					'inverse_text'		=> '#b7b7b7',//
					'inverse_light'		=> '#5f5f5f',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#000000',//
					'inverse_hover'		=> '#1d1d1d'
				)
			)
		
		));
		
		// Simple schemes substitution
		lymcoin_storage_set('schemes_simple', array(
			// Main color	// Slave elements and it's darkness koef.
			'text_link'		=> array('alter_hover' => 1,	'extra_link' => 1, 'inverse_bd_color' => 0.85, 'inverse_bd_hover' => 0.7),
			'text_hover'	=> array('alter_link' => 1,		'extra_hover' => 1),
			'text_link2'	=> array('alter_hover2' => 1,	'extra_link2' => 1),
			'text_hover2'	=> array('alter_link2' => 1,	'extra_hover2' => 1),
			'text_link3'	=> array('alter_hover3' => 1,	'extra_link3' => 1),
			'text_hover3'	=> array('alter_link3' => 1,	'extra_hover3' => 1)
		));

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		lymcoin_storage_set('scheme_colors_add', array(
			'bg_color_0'		=> array('color' => 'bg_color',			'alpha' => 0),
			'bg_color_02'		=> array('color' => 'bg_color',			'alpha' => 0.2),
			'bg_color_04'		=> array('color' => 'bg_color',			'alpha' => 0.4),
			'bg_color_07'		=> array('color' => 'bg_color',			'alpha' => 0.7),
			'bg_color_08'		=> array('color' => 'bg_color',			'alpha' => 0.8),
			'bg_color_09'		=> array('color' => 'bg_color',			'alpha' => 0.9),
			'alter_bg_color_07'	=> array('color' => 'alter_bg_color',	'alpha' => 0.7),
			'alter_bg_color_04'	=> array('color' => 'alter_bg_color',	'alpha' => 0.4),
			'alter_bg_color_02'	=> array('color' => 'alter_bg_color',	'alpha' => 0.2),
			'alter_bd_color_02'	=> array('color' => 'alter_bd_color',	'alpha' => 0.2),
            'alter_bg_hover_02'	=> array('color' => 'alter_bg_hover',	'alpha' => 0.2),
            'alter_link_02'		=> array('color' => 'alter_link',		'alpha' => 0.2),
			'alter_link_07'		=> array('color' => 'alter_link',		'alpha' => 0.7),
			'extra_bg_color_07'	=> array('color' => 'extra_bg_color',	'alpha' => 0.7),
			'extra_bg_hover_08'	=> array('color' => 'extra_bg_hover',	'alpha' => 0.8),
			'extra_link_02'		=> array('color' => 'extra_link',		'alpha' => 0.2),
			'extra_link_07'		=> array('color' => 'extra_link',		'alpha' => 0.7),
			'text_dark_07'		=> array('color' => 'text_dark',		'alpha' => 0.7),
			'text_light_05'		=> array('color' => 'text_light',		'alpha' => 0.5),
			'text_link_02'		=> array('color' => 'text_link',		'alpha' => 0.2),
			'text_link_07'		=> array('color' => 'text_link',		'alpha' => 0.7),
			'text_link_blend'	=> array('color' => 'text_link',		'hue' => 2, 'saturation' => -5, 'brightness' => 5),
			'alter_link_blend'	=> array('color' => 'alter_link',		'hue' => 2, 'saturation' => -5, 'brightness' => 5)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		lymcoin_storage_set('theme_thumbs', apply_filters('lymcoin_filter_add_thumb_sizes', array(
			// Width of the image is equal to the content area width (without sidebar)
			// Height is fixed
			'lymcoin-thumb-huge'		=> array(
												'size'	=> array(1280, 680, true),
												'title' => esc_html__( 'Huge image', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-huge'
												),
			// Width of the image is equal to the content area width (with sidebar)
			// Height is fixed
			'lymcoin-thumb-big' 		=> array(
												'size'	=> array( 840, 440, true),
												'title' => esc_html__( 'Large image', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-big'
												),

			// Width of the image is equal to the 1/3 of the content area width (without sidebar)
			// Height is fixed
			'lymcoin-thumb-med' 		=> array(
												'size'	=> array( 370, 208, true),
												'title' => esc_html__( 'Medium image', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-medium'
												),

			// Small square image (for avatars in comments, etc.)
			'lymcoin-thumb-tiny' 		=> array(
												'size'	=> array(  90,  90, true),
												'title' => esc_html__( 'Small square avatar', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-tiny'
												),

			// Width of the image is equal to the content area width (with sidebar)
			// Height is proportional (only downscale, not crop)
			'lymcoin-thumb-masonry-big' => array(
												'size'	=> array( 840,   0, false),		// Only downscale, not crop
												'title' => esc_html__( 'Masonry Large (scaled)', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-masonry-big'
												),

			// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
			// Height is proportional (only downscale, not crop)
			'lymcoin-thumb-masonry'		=> array(
												'size'	=> array( 370,   0, false),		// Only downscale, not crop
												'title' => esc_html__( 'Masonry (scaled)', 'lymcoin' ),
												'subst'	=> 'trx_addons-thumb-masonry'
												)
			))
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( !function_exists( 'lymcoin_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'lymcoin_importer_set_options', 9 );
	function lymcoin_importer_set_options($options=array()) {
		if (is_array($options)) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url(lymcoin_get_protocol() . '://demofiles.ancorathemes.com/lymcoin/');
			// Required plugins
			$options['required_plugins'] = array_keys(lymcoin_storage_get('required_plugins'));
			// Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 3;
			// Default demo
			$options['files']['default']['title'] = esc_html__('Lymcoin Demo', 'lymcoin');
			$options['files']['default']['domain_dev'] = esc_url(lymcoin_get_protocol().'://lymcoin.dv.ancorathemes.com');	// Developers domain
			$options['files']['default']['domain_demo']= esc_url(lymcoin_get_protocol().'://lymcoin.ancorathemes.com');		// Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter

			// Banners
			$options['banners'] = array(
				array(
					'image' => lymcoin_get_file_url('theme-specific/theme-about/images/frontpage.png'),
					'title' => esc_html__('Front Page Builder', 'lymcoin'),
					'content' => wp_kses(__("Create your front page right in the WordPress Customizer. There's no need in WPBakery Page Builder, or any other builder. Simply enable/disable sections, fill them out with content, and customize to your liking.", 'lymcoin'), 'lymcoin_kses_content'),
					'link_url' => esc_url('//www.youtube.com/watch?v=VT0AUbMl_KA'),
					'link_caption' => esc_html__('Watch Video Introduction', 'lymcoin'),
					'duration' => 20
					),
				array(
					'image' => lymcoin_get_file_url('theme-specific/theme-about/images/layouts.png'),
					'title' => esc_html__('Layouts Builder', 'lymcoin'),
					'content' => wp_kses(__('Use Layouts Builder to create and customize header and footer styles for your website. With a flexible page builder interface and custom shortcodes, you can create as many header and footer layouts as you want with ease.', 'lymcoin'), 'lymcoin_kses_content'),
					'link_url' => esc_url('//www.youtube.com/watch?v=pYhdFVLd7y4'),
					'link_caption' => esc_html__('Learn More', 'lymcoin'),
					'duration' => 20
					),
				array(
					'image' => lymcoin_get_file_url('theme-specific/theme-about/images/documentation.png'),
					'title' => esc_html__('Read Full Documentation', 'lymcoin'),
					'content' => wp_kses(__('Need more details? Please check our full online documentation for detailed information on how to use Lymcoin.', 'lymcoin'), 'lymcoin_kses_content'),
					'link_url' => esc_url(lymcoin_storage_get('theme_doc_url')),
					'link_caption' => esc_html__('Online Documentation', 'lymcoin'),
					'duration' => 15
					),
				array(
					'image' => lymcoin_get_file_url('theme-specific/theme-about/images/video-tutorials.png'),
					'title' => esc_html__('Video Tutorials', 'lymcoin'),
					'content' => wp_kses(__('No time for reading documentation? Check out our video tutorials and learn how to customize Lymcoin in detail.', 'lymcoin'), 'lymcoin_kses_content'),
					'link_url' => esc_url(lymcoin_storage_get('theme_video_url')),
					'link_caption' => esc_html__('Video Tutorials', 'lymcoin'),
					'duration' => 15
					),
				array(
					'image' => lymcoin_get_file_url('theme-specific/theme-about/images/studio.jpg'),
					'title' => esc_html__('Website Customization', 'lymcoin'),
					'content' => wp_kses(__("Need a website fast? Order our custom service, and we'll build a website based on this theme for a very fair price. We can also implement additional functionality such as website translation, setting up WPML, and much more.", 'lymcoin'), 'lymcoin_kses_content'),
					'link_url' => esc_url('//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash'),
					'link_caption' => esc_html__('Contact Us', 'lymcoin'),
					'duration' => 25
					)
				);
		}
		return $options;
	}
}




// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('lymcoin_create_theme_options')) {

	function lymcoin_create_theme_options() {

		// Message about options override. 
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__('Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages', 'lymcoin');
		
		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count(lymcoin_storage_get('schemes')) < 2;
		
		lymcoin_storage_set('options', array(
		
			// 'Logo & Site Identity'
			'title_tagline' => array(
				"title" => esc_html__('Logo & Site Identity', 'lymcoin'),
				"desc" => '',
				"priority" => 10,
				"type" => "section"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo in the header', 'lymcoin'),
				"desc" => '',
				"priority" => 20,
				"type" => "info",
				),
			'logo_text' => array(
				"title" => esc_html__('Use Site Name as Logo', 'lymcoin'),
				"desc" => wp_kses_data( __('Use the site title and tagline as a text logo if no image is selected', 'lymcoin') ),
				"class" => "lymcoin_column-1_2 lymcoin_new_row",
				"priority" => 30,
				"std" => 1,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'logo_retina_enabled' => array(
				"title" => esc_html__('Allow retina display logo', 'lymcoin'),
				"desc" => wp_kses_data( __('Show fields to select logo images for Retina display', 'lymcoin') ),
				"class" => "lymcoin_column-1_2",
				"priority" => 40,
				"refresh" => false,
				"std" => 0,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'logo_zoom' => array(
				"title" => esc_html__('Logo zoom', 'lymcoin'),
				"desc" => wp_kses_data( __("Zoom the logo. 1 - original size. Maximum size of logo depends on the actual size of the picture", 'lymcoin') ),
				"std" => 1,
				"min" => 0.2,
				"max" => 2,
				"step" => 0.1,
				"refresh" => false,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "slider"
				),
			// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lymcoin') ),
				"class" => "lymcoin_column-1_2",
				"priority" => 70,
				"dependency" => array(
					'logo_retina_enabled' => array(1)
				),
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "image"
				),
			'logo_mobile_header' => array(
				"title" => esc_html__('Logo for the mobile header', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'lymcoin') ),
				"class" => "lymcoin_column-1_2 lymcoin_new_row",
				"std" => '',
				"type" => "image"
				),
			'logo_mobile_header_retina' => array(
				"title" => esc_html__('Logo for the mobile header for Retina', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lymcoin') ),
				"class" => "lymcoin_column-1_2",
				"dependency" => array(
					'logo_retina_enabled' => array(1)
				),
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "image"
				),
			'logo_mobile' => array(
				"title" => esc_html__('Logo mobile', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the mobile menu', 'lymcoin') ),
				"class" => "lymcoin_column-1_2 lymcoin_new_row",
				"std" => '',
				"type" => "image"
				),
			'logo_mobile_retina' => array(
				"title" => esc_html__('Logo mobile for Retina', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'lymcoin') ),
				"class" => "lymcoin_column-1_2",
				"dependency" => array(
					'logo_retina_enabled' => array(1)
				),
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'lymcoin') ),
				"class" => "lymcoin_column-1_2 lymcoin_new_row",
				"std" => '',
				"type" => "image"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'lymcoin') ),
				"class" => "lymcoin_column-1_2",
				"dependency" => array(
					'logo_retina_enabled' => array(1)
				),
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "image"
				),
			
		
		
			// 'General settings'
			'general' => array(
				"title" => esc_html__('General Settings', 'lymcoin'),
				"desc" => wp_kses_data( $msg_override ),
				"priority" => 20,
				"type" => "section",
				),

			'general_layout_info' => array(
				"title" => esc_html__('Layout', 'lymcoin'),
				"desc" => '',
				"type" => "info",
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'lymcoin'),
				"desc" => wp_kses_data( __('Select width of the body content', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'lymcoin')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => lymcoin_get_list_body_styles(),
				"type" => "select"
				),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'lymcoin') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'lymcoin')
				),
				"std" => '',
				"hidden" => true,
				"type" => "image"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'lymcoin'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'lymcoin')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),

			'general_sidebar_info' => array(
				"title" => esc_html__('Sidebar', 'lymcoin'),
				"desc" => '',
				"type" => "info",
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'lymcoin'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"std" => 'right',
				"options" => array(),
				"type" => "switch"
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'lymcoin'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"dependency" => array(
					'sidebar_position' => array('left', 'right')
				),
				"std" => 'sidebar_widgets',
				"options" => array(),
				"type" => "select"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'lymcoin'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'lymcoin') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),


			'general_widgets_info' => array(
				"title" => esc_html__('Additional widgets', 'lymcoin'),
				"desc" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "info",
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets at the top of the page', 'lymcoin'),
				"desc" => wp_kses_data( __('Select widgets to show at the top of the page (above content and sidebar)', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'lymcoin'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'lymcoin'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets at the bottom of the page', 'lymcoin'),
				"desc" => wp_kses_data( __('Select widgets to show at the bottom of the page (below content and sidebar)', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'lymcoin')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
				),

			'general_effects_info' => array(
				"title" => esc_html__('Design & Effects', 'lymcoin'),
				"desc" => '',
				"type" => "info",
				),
			'border_radius' => array(
				"title" => esc_html__('Border radius', 'lymcoin'),
				"desc" => wp_kses_data( __('Specify the border radius of the form fields and buttons in pixels or other valid CSS units', 'lymcoin') ),
				"std" => 0,
				"type" => "hidden"
				),

			'general_misc_info' => array(
				"title" => esc_html__('Miscellaneous', 'lymcoin'),
				"desc" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "info",
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'lymcoin'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'lymcoin') ),
				"std" => 0,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
            'privacy_text' => array(
                "title" => esc_html__("Text with Privacy Policy link", 'lymcoin'),
                "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'lymcoin') ),
                "std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'lymcoin'), 'lymcoin_kses_content' ),
                "type"  => "text"
            ),
		
		
			// 'Header'
			'header' => array(
				"title" => esc_html__('Header', 'lymcoin'),
				"desc" => wp_kses_data( $msg_override ),
				"priority" => 30,
				"type" => "section"
				),

			'header_style_info' => array(
				"title" => esc_html__('Header style', 'lymcoin'),
				"desc" => '',
				"type" => "info"
				),
			'header_type' => array(
				"title" => esc_html__('Header style', 'lymcoin'),
				"desc" => wp_kses_data( __('Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => 'default',
				"options" => lymcoin_get_list_header_footer_types(),
				"type" => LYMCOIN_THEME_FREE || !lymcoin_exists_trx_addons() ? "hidden" : "switch"
				),
			'header_style' => array(
				"title" => esc_html__('Select custom layout', 'lymcoin'),
				"desc" => wp_kses( __("Select custom header from Layouts Builder", 'lymcoin'), 'lymcoin_kses_content' ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"dependency" => array(
					'header_type' => array('custom')
				),
				"std" => 'header-custom-header-default',
				"options" => array(),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'lymcoin'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => 'default',
				"options" => array(),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'lymcoin'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => 0,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_zoom' => array(
				"title" => esc_html__('Header zoom', 'lymcoin'),
				"desc" => wp_kses_data( __("Zoom the header title. 1 - original size", 'lymcoin') ),
				"std" => 1,
				"min" => 0.3,
				"max" => 2,
				"step" => 0.1,
				"refresh" => false,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "slider"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwidth', 'lymcoin'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"dependency" => array(
					'header_type' => array('default')
				),
				"std" => 1,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),

			'header_widgets_info' => array(
				"title" => esc_html__('Header widgets', 'lymcoin'),
				"desc" => wp_kses_data( __('Here you can place a widget slider, advertising banners, etc.', 'lymcoin') ),
				"type" => "info"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'lymcoin'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'lymcoin') ),
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'lymcoin'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"dependency" => array(
					'header_type' => array('default'),
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => lymcoin_get_list_range(0,6),
				"type" => "select"
				),

			'menu_info' => array(
				"title" => esc_html__('Main menu', 'lymcoin'),
				"desc" => wp_kses_data( __('Select main menu style, position and other parameters', 'lymcoin') ),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "info"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'lymcoin'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'lymcoin'),
					'left'	=> esc_html__('Left',	'lymcoin'),
					'right'	=> esc_html__('Right',	'lymcoin')
				),
				"type" => "hidden"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'lymcoin'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 0,
				"type" => "hidden"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'lymcoin'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "hidden"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'lymcoin'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'lymcoin') ),
				"std" => 1,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),

			'header_image_info' => array(
				"title" => esc_html__('Header image', 'lymcoin'),
				"desc" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "info"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'lymcoin'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'lymcoin') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => 0,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),

			'header_mobile_info' => array(
				"title" => esc_html__('Mobile header', 'lymcoin'),
				"desc" => wp_kses_data( __("Configure the mobile version of the header", 'lymcoin') ),
				"priority" => 500,
				"dependency" => array(
					'header_type' => array('default')
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "info"
				),
			'header_mobile_enabled' => array(
				"title" => esc_html__('Enable the mobile header', 'lymcoin'),
				"desc" => wp_kses_data( __("Use the mobile version of the header (if checked) or relayout the current header on mobile devices", 'lymcoin') ),
				"dependency" => array(
					'header_type' => array('default')
				),
				"std" => 0,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_mobile_additional_info' => array(
				"title" => esc_html__('Additional info', 'lymcoin'),
				"desc" => wp_kses_data( __('Additional info to show at the top of the mobile header', 'lymcoin') ),
				"std" => '',
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"refresh" => false,
				"teeny" => false,
				"rows" => 20,
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "text_editor"
				),
			'header_mobile_hide_info' => array(
				"title" => esc_html__('Hide additional info', 'lymcoin'),
				"std" => 0,
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_mobile_hide_logo' => array(
				"title" => esc_html__('Hide logo', 'lymcoin'),
				"std" => 0,
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_mobile_hide_login' => array(
				"title" => esc_html__('Hide login/logout', 'lymcoin'),
				"std" => 0,
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_mobile_hide_search' => array(
				"title" => esc_html__('Hide search', 'lymcoin'),
				"std" => 0,
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),
			'header_mobile_hide_cart' => array(
				"title" => esc_html__('Hide cart', 'lymcoin'),
				"std" => 0,
				"dependency" => array(
					'header_type' => array('default'),
					'header_mobile_enabled' => array(1)
				),
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
				),


		
			// 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'lymcoin'),
				"desc" => wp_kses_data( $msg_override ),
				"priority" => 50,
				"type" => "section"
				),
			'footer_type' => array(
				"title" => esc_html__('Footer style', 'lymcoin'),
				"desc" => wp_kses_data( __('Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'lymcoin')
				),
				"std" => 'default',
				"options" => lymcoin_get_list_header_footer_types(),
				"type" => LYMCOIN_THEME_FREE || !lymcoin_exists_trx_addons() ? "hidden" : "switch"
				),
			'footer_style' => array(
				"title" => esc_html__('Select custom layout', 'lymcoin'),
				"desc" => wp_kses( __("Select custom footer from Layouts Builder", 'lymcoin'), 'lymcoin_kses_content' ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'lymcoin')
				),
				"dependency" => array(
					'footer_type' => array('custom')
				),
				"std" => 'footer-custom-footer-default',
				"options" => array(),
				"type" => "select"
				),
			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'lymcoin'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'lymcoin')
				),
				"dependency" => array(
					'footer_type' => array('default')
				),
				"std" => 'footer_widgets',
				"options" => array(),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'lymcoin'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'lymcoin')
				),
				"dependency" => array(
					'footer_type' => array('default'),
					'footer_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => lymcoin_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwidth', 'lymcoin'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'lymcoin') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'lymcoin')
				),
				"dependency" => array(
					'footer_type' => array('default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'lymcoin'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'lymcoin') ),
				'refresh' => false,
				"dependency" => array(
					'footer_type' => array('default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'lymcoin') ),
				"dependency" => array(
					'footer_type' => array('default'),
					'logo_in_footer' => array(1)
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'lymcoin') ),
				"dependency" => array(
					'footer_type' => array('default'),
					'logo_in_footer' => array(1),
					'logo_retina_enabled' => array(1)
				),
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'lymcoin'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'lymcoin') ),
				"dependency" => array(
					'footer_type' => array('default')
				),
				"std" => 0,
				"type" => !lymcoin_exists_trx_addons() ? "hidden" : "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'lymcoin'),
				"desc" => wp_kses_data( __('Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'lymcoin') ),
				"translate" => true,
				"std" => esc_html__('AncoraThemes &copy; {Y}. All rights reserved.', 'lymcoin'),
				"dependency" => array(
					'footer_type' => array('default')
				),
				"refresh" => false,
				"type" => "textarea"
				),
			
		
		
			// 'Blog'
			'blog' => array(
				"title" => esc_html__('Blog', 'lymcoin'),
				"desc" => wp_kses_data( __('Options of the the blog archive', 'lymcoin') ),
				"priority" => 70,
				"type" => "panel",
				),
		
				// Blog - Posts page
				'blog_general' => array(
					"title" => esc_html__('Posts page', 'lymcoin'),
					"desc" => wp_kses_data( __('Style and components of the blog archive', 'lymcoin') ),
					"type" => "section",
					),
				'blog_general_info' => array(
					"title" => esc_html__('General settings', 'lymcoin'),
					"desc" => '',
					"type" => "info",
					),
				'blog_style' => array(
					"title" => esc_html__('Blog style', 'lymcoin'),
					"desc" => '',
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"std" => 'excerpt',
					"options" => array(),
					"type" => "select"
					),
				'first_post_large' => array(
					"title" => esc_html__('First post large', 'lymcoin'),
					"desc" => wp_kses_data( __('Make your first post stand out by making it bigger', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array('classic', 'masonry')
					),
					"std" => 0,
					"type" => "checkbox"
					),
				"blog_content" => array( 
					"title" => esc_html__('Posts content', 'lymcoin'),
					"desc" => wp_kses_data( __("Display either post excerpts or the full post content", 'lymcoin') ),
					"std" => "excerpt",
					"dependency" => array(
						'blog_style' => array('excerpt')
					),
					"options" => array(
						'excerpt'	=> esc_html__('Excerpt',	'lymcoin'),
						'fullpost'	=> esc_html__('Full post',	'lymcoin')
					),
					"type" => "switch"
					),
				'excerpt_length' => array(
					"title" => esc_html__('Excerpt length', 'lymcoin'),
					"desc" => wp_kses_data( __("Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged", 'lymcoin') ),
					"dependency" => array(
						'blog_style' => array('excerpt'),
						'blog_content' => array('excerpt')
					),
					"std" => 60,
					"type" => "text"
					),
				'blog_columns' => array(
					"title" => esc_html__('Blog columns', 'lymcoin'),
					"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'lymcoin') ),
					"std" => 2,
					"options" => lymcoin_get_list_range(2,4),
					"type" => "hidden"
					),
				'post_type' => array(
					"title" => esc_html__('Post type', 'lymcoin'),
					"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					"linked" => 'parent_cat',
					"refresh" => false,
					"hidden" => true,
					"std" => 'post',
					"options" => array(),
					"type" => "select"
					),
				'parent_cat' => array(
					"title" => esc_html__('Category to show', 'lymcoin'),
					"desc" => wp_kses_data( __('Select category to show in the blog archive', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					"refresh" => false,
					"hidden" => true,
					"std" => '0',
					"options" => array(),
					"type" => "select"
					),
				'posts_per_page' => array(
					"title" => esc_html__('Posts per page', 'lymcoin'),
					"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"hidden" => true,
					"std" => '',
					"type" => "text"
					),
				"blog_pagination" => array( 
					"title" => esc_html__('Pagination style', 'lymcoin'),
					"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"std" => "pages",
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"options" => array(
						'pages'	=> esc_html__("Page numbers", 'lymcoin'),
						'links'	=> esc_html__("Older/Newest", 'lymcoin'),
						'more'	=> esc_html__("Load more", 'lymcoin'),
						'infinite' => esc_html__("Infinite scroll", 'lymcoin')
					),
					"type" => "select"
					),
				'show_filters' => array(
					"title" => esc_html__('Show filters', 'lymcoin'),
					"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array('portfolio', 'gallery')
					),
					"hidden" => true,
					"std" => 0,
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "checkbox"
					),
	
				'blog_sidebar_info' => array(
					"title" => esc_html__('Sidebar', 'lymcoin'),
					"desc" => '',
					"type" => "info",
					),
				'sidebar_position_blog' => array(
					"title" => esc_html__('Sidebar position', 'lymcoin'),
					"desc" => wp_kses_data( __('Select position to show sidebar', 'lymcoin') ),
					"std" => 'right',
					"options" => array(),
					"type" => "switch"
					),
				'sidebar_widgets_blog' => array(
					"title" => esc_html__('Sidebar widgets', 'lymcoin'),
					"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'lymcoin') ),
					"dependency" => array(
						'sidebar_position_blog' => array('left', 'right')
					),
					"std" => 'sidebar_widgets',
					"options" => array(),
					"type" => "select"
					),
				'expand_content_blog' => array(
					"title" => esc_html__('Expand content', 'lymcoin'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'lymcoin') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
	
	
				'blog_widgets_info' => array(
					"title" => esc_html__('Additional widgets', 'lymcoin'),
					"desc" => '',
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "info",
					),
				'widgets_above_page_blog' => array(
					"title" => esc_html__('Widgets at the top of the page', 'lymcoin'),
					"desc" => wp_kses_data( __('Select widgets to show at the top of the page (above content and sidebar)', 'lymcoin') ),
					"std" => 'hide',
					"options" => array(),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				'widgets_above_content_blog' => array(
					"title" => esc_html__('Widgets above the content', 'lymcoin'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'lymcoin') ),
					"std" => 'hide',
					"options" => array(),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				'widgets_below_content_blog' => array(
					"title" => esc_html__('Widgets below the content', 'lymcoin'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'lymcoin') ),
					"std" => 'hide',
					"options" => array(),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				'widgets_below_page_blog' => array(
					"title" => esc_html__('Widgets at the bottom of the page', 'lymcoin'),
					"desc" => wp_kses_data( __('Select widgets to show at the bottom of the page (below content and sidebar)', 'lymcoin') ),
					"std" => 'hide',
					"options" => array(),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),

				'blog_advanced_info' => array(
					"title" => esc_html__('Advanced settings', 'lymcoin'),
					"desc" => '',
					"type" => "info",
					),
				'no_image' => array(
					"title" => esc_html__('Image placeholder', 'lymcoin'),
					"desc" => wp_kses_data( __('Select or upload an image used as placeholder for posts without a featured image', 'lymcoin') ),
					"std" => '',
					"type" => "image"
					),
				'time_diff_before' => array(
					"title" => esc_html__('Easy Readable Date Format', 'lymcoin'),
					"desc" => wp_kses_data( __("For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'lymcoin') ),
					"std" => 5,
					"type" => "text"
					),
				'sticky_style' => array(
					"title" => esc_html__('Sticky posts style', 'lymcoin'),
					"desc" => wp_kses_data( __('Select style of the sticky posts output', 'lymcoin') ),
					"std" => 'inherit',
					"options" => array(
						'inherit' => esc_html__('Decorated posts', 'lymcoin'),
						'columns' => esc_html__('Mini-cards',	'lymcoin')
					),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				"blog_animation" => array( 
					"title" => esc_html__('Animation for the posts', 'lymcoin'),
					"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"std" => "none",
					"options" => array(),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				'meta_parts' => array(
					"title" => esc_html__('Post meta', 'lymcoin'),
					"desc" => wp_kses_data( __("If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Counters and Share Links are available only if plugin ThemeREX Addons is active", 'lymcoin') )
								. '<br>'
								. wp_kses_data( __("<b>Tip:</b> Drag items to change their order.", 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"dir" => 'vertical',
					"sortable" => true,
					"std" => 'categories=0|date=1|counters=1|author=0|share=0|edit=0',
					"options" => array(
						'categories' => esc_html__('Categories', 'lymcoin'),
						'date'		 => esc_html__('Post date', 'lymcoin'),
						'author'	 => esc_html__('Post author', 'lymcoin'),
						'counters'	 => esc_html__('Views, Likes and Comments', 'lymcoin'),
						'share'		 => esc_html__('Share links', 'lymcoin'),
						'edit'		 => esc_html__('Edit link', 'lymcoin')
					),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "checklist"
				),
				'counters' => array(
					"title" => esc_html__('Views, Likes and Comments', 'lymcoin'),
					"desc" => wp_kses_data( __("Likes and Views are available only if ThemeREX Addons is active", 'lymcoin') ),
					"override" => array(
						'mode' => 'page',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"dependency" => array(
                        '#page_template' => array( 'blog.php' ),
                        '.editor-page-attributes__template select' => array( 'blog.php' )
					),
					"dir" => 'vertical',
					"sortable" => true,
					"std" => 'views=0|likes=0|comments=1',
					"options" => array(
						'views' => esc_html__('Views', 'lymcoin'),
						'likes' => esc_html__('Likes', 'lymcoin'),
						'comments' => esc_html__('Comments', 'lymcoin')
					),
					"type" => LYMCOIN_THEME_FREE || !lymcoin_exists_trx_addons() ? "hidden" : "checklist"
				),

				
				// Blog - Single posts
				'blog_single' => array(
					"title" => esc_html__('Single posts', 'lymcoin'),
					"desc" => wp_kses_data( __('Settings of the single post', 'lymcoin') ),
					"type" => "section",
					),
				'hide_featured_on_single' => array(
					"title" => esc_html__('Hide featured image on the single post', 'lymcoin'),
					"desc" => wp_kses_data( __("Hide featured image on the single post's pages", 'lymcoin') ),
					"override" => array(
						'mode' => 'page,post',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"std" => 0,
					"type" => "checkbox"
					),
				'hide_sidebar_on_single' => array(
					"title" => esc_html__('Hide sidebar on the single post', 'lymcoin'),
					"desc" => wp_kses_data( __("Hide sidebar on the single post's pages", 'lymcoin') ),
					"std" => 0,
					"type" => "checkbox"
					),
				'show_post_meta' => array(
					"title" => esc_html__('Show post meta', 'lymcoin'),
					"desc" => wp_kses_data( __("Display block with post's meta: date, categories, counters, etc.", 'lymcoin') ),
					"std" => 1,
					"type" => "checkbox"
					),
				'meta_parts_post' => array(
					"title" => esc_html__('Post meta', 'lymcoin'),
					"desc" => wp_kses_data( __("Meta parts for single posts. Counters and Share Links are available only if plugin ThemeREX Addons is active", 'lymcoin') )
								. '<br>'
								. wp_kses_data( __("<b>Tip:</b> Drag items to change their order.", 'lymcoin') ),
					"dependency" => array(
						'show_post_meta' => array(1)
					),
					"dir" => 'vertical',
					"sortable" => true,
					"std" => 'categories=0|date=1|counters=1|author=0|share=0|edit=0',
					"options" => array(
						'categories' => esc_html__('Categories', 'lymcoin'),
						'date'		 => esc_html__('Post date', 'lymcoin'),
						'author'	 => esc_html__('Post author', 'lymcoin'),
						'counters'	 => esc_html__('Views, Likes and Comments', 'lymcoin'),
						'share'		 => esc_html__('Share links', 'lymcoin'),
						'edit'		 => esc_html__('Edit link', 'lymcoin')
					),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "checklist"
				),
				'counters_post' => array(
					"title" => esc_html__('Views, Likes and Comments', 'lymcoin'),
					"desc" => wp_kses_data( __("Likes and Views are available only if plugin ThemeREX Addons is active", 'lymcoin') ),
					"dependency" => array(
						'show_post_meta' => array(1)
					),
					"dir" => 'vertical',
					"sortable" => true,
					"std" => 'views=0|likes=0|comments=1',
					"options" => array(
						'views' => esc_html__('Views', 'lymcoin'),
						'likes' => esc_html__('Likes', 'lymcoin'),
						'comments' => esc_html__('Comments', 'lymcoin')
					),
					"type" => LYMCOIN_THEME_FREE || !lymcoin_exists_trx_addons() ? "hidden" : "checklist"
				),
				'show_share_links' => array(
					"title" => esc_html__('Show share links', 'lymcoin'),
					"desc" => wp_kses_data( __("Display share links on the single post", 'lymcoin') ),
					"std" => 1,
					"type" => !lymcoin_exists_trx_addons() ? "hidden" : "checkbox"
					),
				'show_author_info' => array(
					"title" => esc_html__('Show author info', 'lymcoin'),
					"desc" => wp_kses_data( __("Display block with information about post's author", 'lymcoin') ),
					"std" => 1,
					"type" => "checkbox"
					),
				'blog_single_related_info' => array(
					"title" => esc_html__('Related posts', 'lymcoin'),
					"desc" => '',
					"type" => "info",
					),
				'show_related_posts' => array(
					"title" => esc_html__('Show related posts', 'lymcoin'),
					"desc" => wp_kses_data( __("Show section 'Related posts' on the single post's pages", 'lymcoin') ),
					"override" => array(
						'mode' => 'page,post',
						'section' => esc_html__('Content', 'lymcoin')
					),
					"std" => 1,
					"type" => "checkbox"
					),
				'related_posts' => array(
					"title" => esc_html__('Related posts', 'lymcoin'),
					"desc" => wp_kses_data( __('How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'lymcoin') ),
					"dependency" => array(
						'show_related_posts' => array(1)
					),
					"std" => 2,
					"options" => lymcoin_get_list_range(1,9),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
					),
				'related_columns' => array(
					"title" => esc_html__('Related columns', 'lymcoin'),
					"desc" => wp_kses_data( __('How many columns should be used to output related posts in the single page (from 2 to 4)?', 'lymcoin') ),
					"dependency" => array(
						'show_related_posts' => array(1)
					),
					"std" => 2,
					"options" => lymcoin_get_list_range(1,4),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
					),
				'related_style' => array(
					"title" => esc_html__('Related posts style', 'lymcoin'),
					"desc" => wp_kses_data( __('Select style of the related posts output', 'lymcoin') ),
					"dependency" => array(
						'show_related_posts' => array(1)
					),
					"std" => 2,
					"options" => lymcoin_get_list_styles(1,2),
					"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
					),
			'blog_end' => array(
				"type" => "panel_end",
				),
			
		
		
			// 'Colors'
			'panel_colors' => array(
				"title" => esc_html__('Colors', 'lymcoin'),
				"desc" => '',
				"priority" => 300,
				"type" => "section"
				),

			'color_schemes_info' => array(
				"title" => esc_html__('Color schemes', 'lymcoin'),
				"desc" => wp_kses_data( __('Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'lymcoin') ),
				"hidden" => $hide_schemes,
				"type" => "info",
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'lymcoin'),
				"desc" => '',
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Colors', 'lymcoin')
				),
				"std" => 'default',
				"options" => array(),
				"refresh" => false,
				"type" => $hide_schemes ? 'hidden' : "switch"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'lymcoin'),
				"desc" => '',
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Colors', 'lymcoin')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => $hide_schemes ? 'hidden' : "switch"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Sidemenu Color Scheme', 'lymcoin'),
				"desc" => '',
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Colors', 'lymcoin')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => "hidden"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Sidebar Color Scheme', 'lymcoin'),
				"desc" => '',
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Colors', 'lymcoin')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => $hide_schemes ? 'hidden' : "switch"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'lymcoin'),
				"desc" => '',
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Colors', 'lymcoin')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => $hide_schemes ? 'hidden' : "switch"
				),

			'color_scheme_editor_info' => array(
				"title" => esc_html__('Color scheme editor', 'lymcoin'),
				"desc" => wp_kses_data(__('Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'lymcoin') ),
				"type" => "info",
				),
			'scheme_storage' => array(
				"title" => esc_html__('Color scheme editor', 'lymcoin'),
				"desc" => '',
				"std" => '$lymcoin_get_scheme_storage',
				"refresh" => false,
				"colorpicker" => "tiny",
				"type" => "scheme_editor"
				),


			// 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'lymcoin'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'lymcoin') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Content', 'lymcoin')
				),
				"hidden" => true,
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'lymcoin'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'lymcoin') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Content', 'lymcoin')
				),
				"hidden" => true,
				"std" => '',
				"type" => LYMCOIN_THEME_FREE ? "hidden" : "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			// Use huge priority to call render this elements after all options!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"priority" => 10000,
				"type" => "hidden",
				),

			'last_option' => array(		// Need to manually call action to include Tiny MCE scripts
				"title" => '',
				"desc" => '',
				"std" => 1,
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(
		
			// 'Fonts'
			'fonts' => array(
				"title" => esc_html__('Typography', 'lymcoin'),
				"desc" => '',
				"priority" => 200,
				"type" => "panel"
				),

			// Fonts - Load_fonts
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'lymcoin'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'lymcoin') )
						. '<br>'
						. wp_kses_data( __('Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'lymcoin') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'lymcoin'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'lymcoin') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'lymcoin') ),
				"class" => "lymcoin_column-1_3 lymcoin_new_row",
				"refresh" => false,
				"std" => '$lymcoin_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=lymcoin_get_theme_setting('max_load_fonts'); $i++) {
			if (lymcoin_get_value_gp('page') != 'theme_options') {
				$fonts["load_fonts-{$i}-info"] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					"title" => esc_html(sprintf(esc_html__('Font %s', 'lymcoin'), $i)),
					"desc" => '',
					"type" => "info",
					);
			}
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'lymcoin'),
				"desc" => '',
				"class" => "lymcoin_column-1_3 lymcoin_new_row",
				"refresh" => false,
				"std" => '$lymcoin_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'lymcoin'),
				"desc" => $i==1 
							? wp_kses_data( __('Select font family to use it if font above is not available', 'lymcoin') )
							: '',
				"class" => "lymcoin_column-1_3",
				"refresh" => false,
				"std" => '$lymcoin_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'lymcoin'),
					'serif' => esc_html__('serif', 'lymcoin'),
					'sans-serif' => esc_html__('sans-serif', 'lymcoin'),
					'monospace' => esc_html__('monospace', 'lymcoin'),
					'cursive' => esc_html__('cursive', 'lymcoin'),
					'fantasy' => esc_html__('fantasy', 'lymcoin')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'lymcoin'),
				"desc" => $i==1 
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'lymcoin') )
								. '<br>'
								. wp_kses_data( __('Attention! Each weight and style increase download size! Specify only used weights and styles.', 'lymcoin') )
							: '',
				"class" => "lymcoin_column-1_3",
				"refresh" => false,
				"std" => '$lymcoin_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = lymcoin_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title']) 
								? $v['title'] 
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html(sprintf(esc_html__('%s settings', 'lymcoin'), $tag)),
				"desc" => !empty($v['description']) 
								? $v['description'] 
								// Translators: Add tag's name to make description
								: wp_kses( sprintf(__('Font settings of the "%s" tag.', 'lymcoin'), $tag), 'lymcoin_kses_content' ),
				"type" => "section",
				);
	
			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$load_order = 1;
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = array();
					$load_order = 2;		// Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'lymcoin'),
						'100' => esc_html__('100 (Light)', 'lymcoin'), 
						'200' => esc_html__('200 (Light)', 'lymcoin'), 
						'300' => esc_html__('300 (Thin)',  'lymcoin'),
						'400' => esc_html__('400 (Normal)', 'lymcoin'),
						'500' => esc_html__('500 (Semibold)', 'lymcoin'),
						'600' => esc_html__('600 (Semibold)', 'lymcoin'),
						'700' => esc_html__('700 (Bold)', 'lymcoin'),
						'800' => esc_html__('800 (Black)', 'lymcoin'),
						'900' => esc_html__('900 (Black)', 'lymcoin')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'lymcoin'),
						'normal' => esc_html__('Normal', 'lymcoin'), 
						'italic' => esc_html__('Italic', 'lymcoin')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'lymcoin'),
						'none' => esc_html__('None', 'lymcoin'), 
						'underline' => esc_html__('Underline', 'lymcoin'),
						'overline' => esc_html__('Overline', 'lymcoin'),
						'line-through' => esc_html__('Line-through', 'lymcoin')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'lymcoin'),
						'none' => esc_html__('None', 'lymcoin'), 
						'uppercase' => esc_html__('Uppercase', 'lymcoin'),
						'lowercase' => esc_html__('Lowercase', 'lymcoin'),
						'capitalize' => esc_html__('Capitalize', 'lymcoin')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"class" => "lymcoin_column-1_5",
					"refresh" => false,
					"load_order" => $load_order,
					"std" => '$lymcoin_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}
			
			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters to Theme Options
		lymcoin_storage_set_array_before('options', 'panel_colors', $fonts);


		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if (!function_exists('get_header_video_url')) {
			lymcoin_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'lymcoin'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'lymcoin') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'lymcoin')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}


		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is 'Theme Options'
		// ------------------------------------------------------
		if (!function_exists('the_custom_logo') || (isset($_REQUEST['page']) && $_REQUEST['page']=='theme_options')) {
			lymcoin_storage_set_array_before('options', 'logo_retina', function_exists('the_custom_logo') ? 'custom_logo' : 'logo', array(
				"title" => esc_html__('Logo', 'lymcoin'),
				"desc" => wp_kses_data( __('Select or upload the site logo', 'lymcoin') ),
				"class" => "lymcoin_column-1_2 lymcoin_new_row",
				"priority" => 60,
				"std" => '',
				"type" => "image"
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if (!function_exists('lymcoin_options_get_list_cpt_options')) {
	function lymcoin_options_get_list_cpt_options($cpt, $title='') {
		if (empty($title)) $title = ucfirst($cpt);
		return array(
					"header_info_{$cpt}" => array(
						"title" => esc_html__('Header', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					"header_type_{$cpt}" => array(
						"title" => esc_html__('Header style', 'lymcoin'),
						"desc" => wp_kses_data( __('Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'lymcoin') ),
						"std" => 'inherit',
						"options" => lymcoin_get_list_header_footer_types(true),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
						),
					"header_style_{$cpt}" => array(
						"title" => esc_html__('Select custom layout', 'lymcoin'),
						// Translators: Add CPT name to the description
						"desc" => wp_kses_data( sprintf(__('Select custom layout to display the site header on the %s pages', 'lymcoin'), $title) ),
						"dependency" => array(
							"header_type_{$cpt}" => array('custom')
						),
						"std" => 'inherit',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						),
					"header_position_{$cpt}" => array(
						"title" => esc_html__('Header position', 'lymcoin'),
						// Translators: Add CPT name to the description
						"desc" => wp_kses_data( sprintf(__('Select position to display the site header on the %s pages', 'lymcoin'), $title) ),
						"std" => 'inherit',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
						),
					"header_image_override_{$cpt}" => array(
						"title" => esc_html__('Header image override', 'lymcoin'),
						"desc" => wp_kses_data( __("Allow override the header image with the post's featured image", 'lymcoin') ),
						"std" => 'inherit',
						"options" => array(
							'inherit' => esc_html__('Inherit', 'lymcoin'),
							1 => esc_html__('Yes', 'lymcoin'),
							0 => esc_html__('No', 'lymcoin'),
						),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
						),
					"header_widgets_{$cpt}" => array(
						"title" => esc_html__('Header widgets', 'lymcoin'),
						// Translators: Add CPT name to the description
						"desc" => wp_kses_data( sprintf(__('Select set of widgets to show in the header on the %s pages', 'lymcoin'), $title) ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
						
					"sidebar_info_{$cpt}" => array(
						"title" => esc_html__('Sidebar', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					"sidebar_position_{$cpt}" => array(
						"title" => esc_html__('Sidebar position', 'lymcoin'),
						// Translators: Add CPT name to the description
						"desc" => wp_kses_data( sprintf(__('Select position to show sidebar on the %s pages', 'lymcoin'), $title) ),
						"std" => 'left',
						"options" => array(),
						"type" => "switch"
						),
					"sidebar_widgets_{$cpt}" => array(
						"title" => esc_html__('Sidebar widgets', 'lymcoin'),
						// Translators: Add CPT name to the description
						"desc" => wp_kses_data( sprintf(__('Select sidebar to show on the %s pages', 'lymcoin'), $title) ),
						"dependency" => array(
							"sidebar_position_{$cpt}" => array('left', 'right')
						),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"hide_sidebar_on_single_{$cpt}" => array(
						"title" => esc_html__('Hide sidebar on the single pages', 'lymcoin'),
						"desc" => wp_kses_data( __("Hide sidebar on the single page", 'lymcoin') ),
						"std" => 'inherit',
						"options" => array(
							'inherit' => esc_html__('Inherit', 'lymcoin'),
							1 => esc_html__('Hide', 'lymcoin'),
							0 => esc_html__('Show', 'lymcoin'),
						),
						"type" => "switch"
						),
						
					"footer_info_{$cpt}" => array(
						"title" => esc_html__('Footer', 'lymcoin'),
						"desc" => '',
						"type" => "info",
						),
					"footer_type_{$cpt}" => array(
						"title" => esc_html__('Footer style', 'lymcoin'),
						"desc" => wp_kses_data( __('Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'lymcoin') ),
						"std" => 'inherit',
						"options" => lymcoin_get_list_header_footer_types(true),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "switch"
						),
					"footer_style_{$cpt}" => array(
						"title" => esc_html__('Select custom layout', 'lymcoin'),
						"desc" => wp_kses_data( __('Select custom layout to display the site footer', 'lymcoin') ),
						"std" => 'inherit',
						"dependency" => array(
							"footer_type_{$cpt}" => array('custom')
						),
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						),
					"footer_widgets_{$cpt}" => array(
						"title" => esc_html__('Footer widgets', 'lymcoin'),
						"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'lymcoin') ),
						"dependency" => array(
							"footer_type_{$cpt}" => array('default')
						),
						"std" => 'footer_widgets',
						"options" => array(),
						"type" => "select"
						),
					"footer_columns_{$cpt}" => array(
						"title" => esc_html__('Footer columns', 'lymcoin'),
						"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'lymcoin') ),
						"dependency" => array(
							"footer_type_{$cpt}" => array('default'),
							"footer_widgets_{$cpt}" => array('^hide')
						),
						"std" => 0,
						"options" => lymcoin_get_list_range(0,6),
						"type" => "select"
						),
					"footer_wide_{$cpt}" => array(
						"title" => esc_html__('Footer fullwidth', 'lymcoin'),
						"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'lymcoin') ),
						"dependency" => array(
							"footer_type_{$cpt}" => array('default')
						),
						"std" => 0,
						"type" => "checkbox"
						),
						
					"widgets_info_{$cpt}" => array(
						"title" => esc_html__('Additional panels', 'lymcoin'),
						"desc" => '',
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "info",
						),
					"widgets_above_page_{$cpt}" => array(
						"title" => esc_html__('Widgets at the top of the page', 'lymcoin'),
						"desc" => wp_kses_data( __('Select widgets to show at the top of the page (above content and sidebar)', 'lymcoin') ),
						"std" => 'hide',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						),
					"widgets_above_content_{$cpt}" => array(
						"title" => esc_html__('Widgets above the content', 'lymcoin'),
						"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'lymcoin') ),
						"std" => 'hide',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						),
					"widgets_below_content_{$cpt}" => array(
						"title" => esc_html__('Widgets below the content', 'lymcoin'),
						"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'lymcoin') ),
						"std" => 'hide',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						),
					"widgets_below_page_{$cpt}" => array(
						"title" => esc_html__('Widgets at the bottom of the page', 'lymcoin'),
						"desc" => wp_kses_data( __('Select widgets to show at the bottom of the page (below content and sidebar)', 'lymcoin') ),
						"std" => 'hide',
						"options" => array(),
						"type" => LYMCOIN_THEME_FREE ? "hidden" : "select"
						)
					);
	}
}


// Return lists with choises when its need in the admin mode
if (!function_exists('lymcoin_options_get_list_choises')) {
	add_filter('lymcoin_filter_options_get_list_choises', 'lymcoin_options_get_list_choises', 10, 2);
	function lymcoin_options_get_list_choises($list, $id) {
		if (is_array($list) && count($list)==0) {
			if (strpos($id, 'header_style')===0)
				$list = lymcoin_get_list_header_styles(strpos($id, 'header_style_')===0);
			else if (strpos($id, 'header_position')===0)
				$list = lymcoin_get_list_header_positions(strpos($id, 'header_position_')===0);
			else if (strpos($id, 'header_widgets')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'header_widgets_')===0, true);
			else if (strpos($id, '_scheme') > 0)
				$list = lymcoin_get_list_schemes($id!='color_scheme');
			else if (strpos($id, 'sidebar_widgets')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'sidebar_widgets_')===0, true);
			else if (strpos($id, 'sidebar_position')===0)
				$list = lymcoin_get_list_sidebars_positions(strpos($id, 'sidebar_position_')===0);
			else if (strpos($id, 'widgets_above_page')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'widgets_above_page_')===0, true);
			else if (strpos($id, 'widgets_above_content')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'widgets_above_content_')===0, true);
			else if (strpos($id, 'widgets_below_page')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'widgets_below_page_')===0, true);
			else if (strpos($id, 'widgets_below_content')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'widgets_below_content_')===0, true);
			else if (strpos($id, 'footer_style')===0)
				$list = lymcoin_get_list_footer_styles(strpos($id, 'footer_style_')===0);
			else if (strpos($id, 'footer_widgets')===0)
				$list = lymcoin_get_list_sidebars(strpos($id, 'footer_widgets_')===0, true);
			else if (strpos($id, 'blog_style')===0)
				$list = lymcoin_get_list_blog_styles(strpos($id, 'blog_style_')===0);
			else if (strpos($id, 'post_type')===0)
				$list = lymcoin_get_list_posts_types();
			else if (strpos($id, 'parent_cat')===0)
				$list = lymcoin_array_merge(array(0 => esc_html__('- Select category -', 'lymcoin')), lymcoin_get_list_categories());
			else if (strpos($id, 'blog_animation')===0)
				$list = lymcoin_get_list_animations_in();
			else if ($id == 'color_scheme_editor')
				$list = lymcoin_get_list_schemes();
			else if (strpos($id, '_font-family') > 0)
				$list = lymcoin_get_list_load_fonts(true);
		}
		return $list;
	}
}
?>