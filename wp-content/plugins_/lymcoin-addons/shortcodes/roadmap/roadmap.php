<?php
/**
 * Shortcode: Roadmap block
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

	
// Merge shortcode's specific styles into single stylesheet
if ( !function_exists( 'trx_addons_sc_roadmap_styles' ) ) {
    add_action("wp_enqueue_scripts", 'trx_addons_sc_roadmap_styles');
    function trx_addons_sc_roadmap_styles() {
        // Main plugin's styles
        wp_enqueue_style( 'sc_roadmap_styles', lymcoin_addons_get_file_url('shortcodes/roadmap/roadmap.css'), array(), null );
    }
}



// trx_sc_roadmap
//-------------------------------------------------------------
/*
[trx_sc_roadmap id="unique_id" title="Our plan" link="#" link_text="Buy now"]Description[/trx_sc_roadmap]
*/
if ( !function_exists( 'trx_addons_sc_roadmap' ) ) {
	function trx_addons_sc_roadmap($atts, $content=null){
		$atts = trx_addons_sc_prepare_atts('trx_sc_roadmap', $atts, array(
			// Individual params
			"type" => 'default',
			"columns" => "",
			"slider" => 0,
			"slider_pagination" => "none",
			"slider_controls" => "none",
			"slides_space" => 0,
			"roadmaps" => "",
			"title" => "",
			"subtitle" => "",
			"description" => "",
			"link" => '',
			"link_style" => 'default',
			"link_image" => '',
			"link_text" => esc_html__('Learn more', 'lymcoin-addons'),
			"title_align" => "left",
			"title_style" => "default",
			"title_tag" => '',
			// Common params
			"id" => "",
			"class" => "",
			"css" => ""
			)
		);

		if (function_exists('vc_param_group_parse_atts') && !is_array($atts['roadmaps']))
			$atts['roadmaps'] = (array) vc_param_group_parse_atts( $atts['roadmaps'] );

		$output = '';
		if (is_array($atts['roadmaps']) && count($atts['roadmaps']) > 0) {
			if (empty($atts['columns'])) $atts['columns'] = count($atts['roadmaps']);
			$atts['columns'] = max(1, min(count($atts['roadmaps']), $atts['columns']));
			$atts['slider'] = $atts['slider'] > 0 && count($atts['roadmaps']) > $atts['columns'];
			$atts['slides_space'] = max(0, (int) $atts['slides_space']);
			if ($atts['slider'] > 0 && (int) $atts['slider_pagination'] > 0) $atts['slider_pagination'] = 'bottom';
	
			foreach ($atts['roadmaps'] as $k=>$v) {
				if (!empty($v['description'])) 
					$atts['roadmaps'][$k]['description'] = preg_replace( '/\\[(.*)\\]/', '<b>$1</b>', function_exists('vc_value_from_safe') ? vc_value_from_safe( $v['description'] ) : $v['description'] );
			}

            ob_start();
            lymcoin_addons_get_template_part(array(
                                            LYMCOIN_ADDONS_PLUGIN_SHORTCODES . 'roadmap/tpl.'.trx_addons_esc($atts['type']).'.php',
                                            LYMCOIN_ADDONS_PLUGIN_SHORTCODES . 'roadmap/tpl.default.php'
											),
											'trx_addons_args_sc_roadmap',
											$atts
										);
			$output = ob_get_contents();
            ob_end_clean();
        }
		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_roadmap', $atts, $content);
	}
}


// Add [trx_sc_roadmap] in the VC shortcodes list
if (!function_exists('trx_addons_sc_roadmap_add_in_vc')) {
	function trx_addons_sc_roadmap_add_in_vc() {
		
		add_shortcode("trx_sc_roadmap", "trx_addons_sc_roadmap");
		
		if (!trx_addons_exists_visual_composer()) return;
		
		vc_lean_map("trx_sc_roadmap", 'trx_addons_sc_roadmap_add_in_vc_params');
		class WPBakeryShortCode_Trx_Sc_Roadmap extends WPBakeryShortCode {}
	}
	add_action('init', 'trx_addons_sc_roadmap_add_in_vc', 20);
}

// Return params
if (!function_exists('trx_addons_sc_roadmap_add_in_vc_params')) {
	function trx_addons_sc_roadmap_add_in_vc_params() {
		return apply_filters('trx_addons_sc_map', array(
				"base" => "trx_sc_roadmap",
				"name" => esc_html__("Roadmap", 'lymcoin-addons'),
				"description" => wp_kses_data( __("Add block with roadmaps", 'lymcoin-addons') ),
				"category" => esc_html__('ThemeREX', 'lymcoin-addons'),
				"icon" => 'icon_trx_sc_roadmap',
				"class" => "trx_sc_roadmap",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array_merge(
					array(
						array(
							"param_name" => "type",
							"heading" => esc_html__("Layout", 'lymcoin-addons'),
							"description" => wp_kses_data( __("Select shortcodes's layout", 'lymcoin-addons') ),
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "default",
							"value" => array(
                                esc_html__('Default', 'lymcoin-addons') => 'default'
                            ), // array_flip(apply_filters('trx_addons_sc_type', trx_addons_components_get_allowed_layouts('sc', 'roadmap'), 'trx_sc_roadmap')),
							"type" => "dropdown"
						),
						array(
							'type' => 'param_group',
							'param_name' => 'roadmaps',
							'heading' => esc_html__( 'Roadmaps', 'lymcoin-addons' ),
							"description" => wp_kses_data( __("Select icon, specify roadmap, title and/or description for each item", 'lymcoin-addons') ),
							'value' => urlencode( json_encode( apply_filters('trx_addons_sc_param_group_value', array(
											array(
												'title' => esc_html__( 'One', 'lymcoin-addons' ),
												'date' => ''
											),
										), 'trx_sc_action') ) ),
							'params' => apply_filters('trx_addons_sc_param_group_params', array_merge(array(
									array(
										'param_name' => 'title',
										'heading' => esc_html__( 'Title', 'lymcoin-addons' ),
										'description' => esc_html__( 'Title of the roadmap', 'lymcoin-addons' ),
										'admin_label' => true,
										'type' => 'textfield',
									),
									array(
										'param_name' => 'date',
										'heading' => esc_html__( 'Date', 'lymcoin-addons' ),
										'description' => esc_html__( 'Roadmap date. Example: March 2021', 'lymcoin-addons' ),
										'type' => 'textfield',
									)
								),
								array()
							), 'trx_sc_roadmap')
						)
					),
					trx_addons_vc_add_title_param(),
					trx_addons_vc_add_id_param()
				)
			), 'trx_sc_roadmap' );
	}
}




// Elementor Widget
//------------------------------------------------------
if (!function_exists('trx_addons_sc_roadmap_add_in_elementor')) {
	add_action( 'elementor/widgets/widgets_registered', 'trx_addons_sc_roadmap_add_in_elementor' );
	function trx_addons_sc_roadmap_add_in_elementor() {
		class TRX_Addons_Elementor_Widget_Roadmap extends TRX_Addons_Elementor_Widget {

			/**
			 * Retrieve widget name.
			 *
			 * @since 1.6.41
			 * @access public
			 *
			 * @return string Widget name.
			 */
			public function get_name() {
				return 'trx_sc_roadmap';
			}

			/**
			 * Retrieve widget title.
			 *
			 * @since 1.6.41
			 * @access public
			 *
			 * @return string Widget title.
			 */
			public function get_title() {
				return __( 'Roadmap', 'lymcoin-addons' );
			}

			/**
			 * Retrieve widget icon.
			 *
			 * @since 1.6.41
			 * @access public
			 *
			 * @return string Widget icon.
			 */
			public function get_icon() {
				return 'eicon-roadmap-table';
			}

			/**
			 * Retrieve the list of categories the widget belongs to.
			 *
			 * Used to determine where to display the widget in the editor.
			 *
			 * @since 1.6.41
			 * @access public
			 *
			 * @return array Widget categories.
			 */
			public function get_categories() {
				return ['trx_addons-elements'];
			}

			/**
			 * Register widget controls.
			 *
			 * Adds different input fields to allow the user to change and customize the widget settings.
			 *
			 * @since 1.6.41
			 * @access protected
			 */
			protected function _register_controls() {
				$this->start_controls_section(
					'section_sc_roadmap',
					[
						'label' => __( 'Roadmap', 'lymcoin-addons' ),
					]
				);

				$this->add_control(
					'type',
					[
						'label' => __( 'Layout', 'lymcoin-addons' ),
						'label_block' => false,
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => apply_filters('trx_addons_sc_type', trx_addons_components_get_allowed_layouts('sc', 'roadmap'), 'trx_sc_roadmap'),
						'default' => 'default',
					]
				);
				
				$this->add_control(
					'columns',
					[
						'label' => __( 'Columns', 'lymcoin-addons' ),
						'description' => wp_kses_data( __("Specify number of columns for icons. If empty - auto detect by items number", 'lymcoin-addons') ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'default' => [
							'size' => 0
						],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 12
							]
						]
					]
				);
				
				$this->add_control(
					'roadmaps',
					[
						'label' => '',
						'type' => \Elementor\Controls_Manager::REPEATER,
						'default' => apply_filters('trx_addons_sc_param_group_value', [
							[
								'title' => esc_html__( 'Light', 'lymcoin-addons' ),
								'subtitle' => $this->get_default_subtitle(),
								'description' => $this->get_default_description(),
								'details' => '',
								'link' => ['url' => '#'],
								'link_text' => esc_html__('Get this plan', 'lymcoin-addons'),
								'label' => '',
								'roadmap' => '99.99',
								'before_roadmap' => '$',
								'after_roadmap' => '',
								'image' => ['url' => ''],
								'bg_color' => '#aa0000',
								'bg_image' => ['url' => ''],
								'icon' => 'icon-star-empty'
							],
							[
								'title' => esc_html__( 'Premium', 'lymcoin-addons' ),
								'subtitle' => $this->get_default_subtitle(),
								'description' => $this->get_default_description(),
								'details' => '',
								'link' => ['url' => '#'],
								'link_text' => esc_html__('Get this plan', 'lymcoin-addons'),
								'label' => '',
								'roadmap' => '199.99',
								'before_roadmap' => '$',
								'after_roadmap' => '',
								'image' => ['url' => ''],
								'bg_color' => '#0000aa',
								'bg_image' => ['url' => ''],
								'icon' => 'icon-heart-empty'
							],
							[
								'title' => esc_html__( 'Unlimited', 'lymcoin-addons' ),
								'subtitle' => $this->get_default_subtitle(),
								'description' => $this->get_default_description(),
								'details' => '',
								'link' => ['url' => '#'],
								'link_text' => esc_html__('Get this plan', 'lymcoin-addons'),
								'label' => '',
								'roadmap' => '399.99',
								'before_roadmap' => '$',
								'after_roadmap' => '',
								'image' => ['url' => ''],
								'bg_color' => '#00aa00',
								'bg_image' => ['url' => ''],
								'icon' => 'icon-clock-empty'
							],
						], 'trx_sc_roadmap'),
						'fields' => apply_filters('trx_addons_sc_param_group_params', array_merge(
							[
								[
									'name' => 'title',
									'label' => __( 'Title', 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'label_block' => true,
									'placeholder' => __( "Item's title", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'subtitle',
									'label' => __( 'Subtitle', 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'label_block' => true,
									'placeholder' => __( "Item's subtitle", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'label',
									'label' => __( "Label", 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'description' => __( 'If not empty - colored band with this text is showed at the top corner of roadmap block', 'lymcoin-addons' ),
									'placeholder' => __( "Label's text", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'description',
									'label' => __( 'Description', 'lymcoin-addons' ),
									'label_block' => true,
									'type' => \Elementor\Controls_Manager::TEXT,
									'placeholder' => __( "Short description of this item", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'before_roadmap',
									'label' => __( "Before roadmap", 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'placeholder' => __( "Before roadmap", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'roadmap',
									'label' => __( "Roadmap", 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'placeholder' => __( "Roadmap value", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'after_roadmap',
									'label' => __( "After roadmap", 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'placeholder' => __( "After roadmap", 'lymcoin-addons' ),
									'default' => ''
								],
								[
									'name' => 'details',
									'label' => __( 'Details', 'lymcoin-addons' ),
									'label_block' => true,
									'type' => \Elementor\Controls_Manager::WYSIWYG,
									'default' => '',
									'separator' => 'none'
								],
								[
									'name' => 'link',
									'label' => __( 'Link', 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::URL,
									'placeholder' => __( 'http://your-link.com', 'lymcoin-addons' ),
								],
								[
									'name' => 'link_text',
									'label' => __( "Link's text", 'lymcoin-addons' ),
									'label_block' => false,
									'type' => \Elementor\Controls_Manager::TEXT,
									'placeholder' => __( "Link's text", 'lymcoin-addons' ),
									'default' => ''
								]
							],
							$this->get_icon_param(),
							[
								[
									'name' => 'image',
									'label' => __( 'Image', 'lymcoin-addons' ),
									'type' => \Elementor\Controls_Manager::MEDIA,
									'default' => [
										'url' => '',
									],
								],
								[
									'name' => 'bg_color',
									'label' => __( 'Background Color', 'lymcoin-addons' ),
									'type' => \Elementor\Controls_Manager::COLOR,
									'default' => '',
									'scheme' => [
										'type' => \Elementor\Scheme_Color::get_type(),
										'value' => \Elementor\Scheme_Color::COLOR_2,
									],
								],
								[
									'name' => 'bg_image',
									'label' => __( 'Background Image', 'lymcoin-addons' ),
									'type' => \Elementor\Controls_Manager::MEDIA,
									'default' => [
										'url' => '',
									],
								]
							]),
							'trx_sc_roadmap'),
						'title_field' => '{{{ title }}}',
					]
				);

				$this->end_controls_section();

				$this->add_slider_param();
				$this->add_title_param();
			}

			/**
			 * Render widget's template for the editor.
			 *
			 * Written as a Backbone JavaScript template and used to generate the live preview.
			 *
			 * @since 1.6.41
			 * @access protected
			 */
			protected function _content_template() {
				lymcoin_addons_get_template_part(LYMCOIN_ADDONS_PLUGIN_SHORTCODES . "roadmap/tpe.roadmap.php",
										'trx_addons_args_sc_roadmap',
										array('element' => $this)
									);
			}
		}
		
		// Register widget
		\Elementor\Plugin::$instance->widgets_manager->register_widget_type( new TRX_Addons_Elementor_Widget_Roadmap() );
	}
}




// SOW Widget
//------------------------------------------------------
if (class_exists('TRX_Addons_SOW_Widget')) {
	class TRX_Addons_SOW_Widget_Roadmap extends TRX_Addons_SOW_Widget {
		
		function __construct() {
			parent::__construct(
				'trx_addons_sow_widget_roadmap',
				esc_html__('ThemeREX Roadmap', 'lymcoin-addons'),
				array(
					'classname' => 'widget_roadmap',
					'description' => __('Display roadmap table', 'lymcoin-addons')
				),
				array(),
				false,
                LYMCOIN_ADDONS_PLUGIN_DIR
			);
	
		}


		// Return array with all widget's fields
		function get_widget_form() {
			return apply_filters('trx_addons_sow_map', array_merge(
				array(
					'type' => array(
						'label' => __('Layout', 'lymcoin-addons'),
						"description" => wp_kses_data( __("Select shortcodes's layout", 'lymcoin-addons') ),
						'default' => 'default',
						'options' => apply_filters('trx_addons_sc_type', trx_addons_components_get_allowed_layouts('sc', 'roadmap'), $this->get_sc_name(), 'sow'),
						'type' => 'select'
					),
					"columns" => array(
						"label" => esc_html__("Columns", 'lymcoin-addons'),
						"description" => wp_kses_data( __("Specify number of columns for icons. If empty - auto detect by items number", 'lymcoin-addons') ),
						"type" => "number"
					),
					'roadmaps' => array(
						'label' => __('Roadmaps', 'lymcoin-addons'),
						'item_name'  => __( 'Roadmap', 'lymcoin-addons' ),
						'item_label' => array(
							'selector'     => "[name*='title']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'type' => 'repeater',
						'fields' => apply_filters('trx_addons_sc_param_group_fields', array_merge(array(
								'title' => array(
									'label' => __('Title', 'lymcoin-addons'),
									'description' => esc_html__( 'Enter title of the item', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'subtitle' => array(
									'label' => __('Subtitle', 'lymcoin-addons'),
									'description' => esc_html__( 'Enter subtitle of the item', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'label' => array(
									'label' => __('Label', 'lymcoin-addons'),
									'description' => esc_html__( 'If not empty - colored band with this text is showed at the top corner of roadmap block', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'description' => array(
									'rows' => 5,
									'label' => __('Description', 'lymcoin-addons'),
									'description' => esc_html__( 'Enter short description of the item', 'lymcoin-addons' ),
									'type' => 'tinymce'
								),
								'before_roadmap' => array(
									'label' => __('Before roadmap', 'lymcoin-addons'),
									'description' => esc_html__( 'Any text before the roadmap value', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'roadmap' => array(
									'label' => __('Roadmap', 'lymcoin-addons'),
									'description' => esc_html__( 'Roadmap value', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'after_roadmap' => array(
									'label' => __('After roadmap', 'lymcoin-addons'),
									'description' => esc_html__( 'Any text after the roadmap value', 'lymcoin-addons' ),
									'type' => 'text'
								),
								'details' => array(
									'rows' => 5,
									'label' => __('Details', 'lymcoin-addons'),
									'description' => esc_html__( 'Roadmap details', 'lymcoin-addons' ),
									'type' => 'tinymce'
								),
								'link' => array(
									'label' => __('Link', 'lymcoin-addons'),
									'description' => esc_html__( 'Specify URL of the button under details', 'lymcoin-addons' ),
									'type' => 'link'
								),
								'link_text' => array(
									'label' => __('Link text', 'lymcoin-addons'),
									"description" => wp_kses_data( __("Specify caption of the button under details", 'lymcoin-addons') ),
									'type' => 'text'
								)
							),
							trx_addons_sow_add_icon_param(''),
							array(
								'image' => array(
									'label' => __('or Icon image', 'lymcoin-addons'),
									"description" => wp_kses_data( __("Select or upload image to display it at top of this item", 'lymcoin-addons') ),
									'type' => 'media'
								),
								'bg_image' => array(
									'label' => __('Background image', 'lymcoin-addons'),
									"description" => wp_kses_data( __("Select or upload image to use it as background of this item", 'lymcoin-addons') ),
									'type' => 'media'
								),
								'bg_color' => array(
									'label' => __('Background color', 'lymcoin-addons'),
									'description' => esc_html__( 'Select custom background color of this item', 'lymcoin-addons' ),
									'type' => 'color'
								)
							)
						), $this->get_sc_name())
					)
				),
				trx_addons_sow_add_slider_param(),
				trx_addons_sow_add_title_param(),
				trx_addons_sow_add_id_param()
			), $this->get_sc_name());
		}

	}
	siteorigin_widget_register('trx_addons_sow_widget_roadmap', __FILE__, 'TRX_Addons_SOW_Widget_Roadmap');
}
?>