<?php

namespace EliteKit\Widgets;

defined( 'ABSPATH' ) || exit;

use Elementor\Widget_Base;

class Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'elite_kit_pricing_table';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'elite-kit-lite' );
	}

	public function get_icon() {
		return 'elite-kit-icon eicon-price-table';
	}

	public function get_categories() {
		return array( 'elite-kit-widgets' );
	}

	public function get_keywords() {
		return array( 'pricing', 'table', 'catalog', 'price', 'plan' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'pt_data',
			array(
				'label' => esc_html__( 'Pricing Heading', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'is_header_icon',
			array(
				'label'        => esc_html__( 'Icon Visibility', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);

		$this->add_control(
			'pt_icon',
			array(
				'label'     => esc_html__( 'Main Icon', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'condition' => array(
					'is_header_icon' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_heading',
			array(
				'label'       => esc_html__( 'Pricing Table Title', 'elite-kit-lite' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Beginner', 'elite-kit-lite' ),
				'placeholder' => esc_html__( 'Pricing table main heading, e.g - Beginner', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'pt_subtitle',
			array(
				'label'   => esc_html__( 'Pricing Subtitle', 'elite-kit-lite' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'rows'    => 8,
				'default' => esc_html__( 'A tag line here', 'elite-kit-lite' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_pricing_section',
			array(
				'label' => esc_html__( 'Pricing', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pt_currency',
			array(
				'label'   => esc_html__( 'Currency', 'elite-kit-lite' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'pt_price',
			array(
				'label'   => esc_html__( 'Price', 'elite-kit-lite' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '299', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'sale_price_divider',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,

			)
		);

		$this->add_control(
			'sale_price_heading',
			array(
				'label'     => esc_html__( 'Sale Price', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
				'condition' => array(
					'pt_sale_price_visibility' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_sale_price_visibility',
			array(
				'label'        => esc_html__( 'Sale Price Visibility', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);

		$this->add_control(
			'pt_sale_price',
			array(
				'label'     => esc_html__( 'Sale Price', 'core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => esc_html__( '199', 'elite-kit-lite' ),
				'condition' => array(
					'pt_sale_price_visibility' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_duration_divider',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_duration',
			array(
				'label'       => esc_html__( 'Duration', 'elite-kit-lite' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Month', 'elite-kit-lite' ),
				'placeholder' => esc_html__( 'Time limit, e.g - Month, Year etc.', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'pt_separator',
			array(
				'label'   => esc_html__( 'Period separator', 'elite-kit-lite' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '/', 'elite-kit-lite' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_features_section',
			array(
				'label' => esc_html__( 'Features', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_icon',
			array(
				'label' => esc_html__( 'Feature', 'elite-kit-lite' ),
				'type'  => \Elementor\Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'pt_feature_name',
			array(
				'label'       => esc_html__( 'Feature name', 'elite-kit-lite' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$this->add_control(
			'pt_features',
			array(
				'label'       => esc_html__( 'Pricing plan features', 'elite-kit-lite' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'pt_feature_name' => esc_html__( '100 GB Space', 'elite-kit-lite' ),
						'feature_icon'    => array(
							'value'   => 'fas fa-check',
							'library' => 'solid',
						),
					),
					array(
						'pt_feature_name' => esc_html__( 'Up to 100 Email Accounts', 'elite-kit-lite' ),
						'feature_icon'    => array(
							'value'   => 'fas fa-check',
							'library' => 'solid',
						),
					),
					array(
						'pt_feature_name' => esc_html__( 'Up to 1000 GB Bandwidth', 'elite-kit-lite' ),
						'feature_icon'    => array(
							'value'   => 'fas fa-check',
							'library' => 'solid',
						),
					),
					array(
						'pt_feature_name' => esc_html__( 'Up to 3 Domains', 'elite-kit-lite' ),
						'feature_icon'    => array(
							'value'   => 'fas fa-check',
							'library' => 'solid',
						),
					),

				),
				'title_field' => '{{{ pt_feature_name }}}',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_button',
			array(
				'label' => esc_html__( 'Button', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'is_price_btn',
			array(
				'label'        => esc_html__( 'Display Button', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'pt_button_text',
			array(
				'label'     => esc_html__( 'Button Text', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => esc_html__( 'Buy Now', 'elite-kit-lite' ),
				'condition' => array(
					'is_price_btn' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_button_url',
			array(
				'label'     => esc_html__( 'Button Link', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => esc_html__( '#', 'elite-kit-lite' ),
				'condition' => array(
					'is_price_btn' => 'yes',
				),
			)
		);

		$this->add_control(
			'is_pt_button_icon',
			array(
				'label'        => esc_html__( 'Button Icon Visibility', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'no',
			)
		);

		$this->add_control(
			'pt_button_icon',
			array(
				'label'     => esc_html__( 'Button Icon', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'condition' => array(
					'is_pt_button_icon' => 'yes',
				),
			)
		);

		$this->add_control(
			'icon_position',
			array(
				'label'     => esc_html__( 'Icon Position', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'after'  => esc_html__( 'After', 'elite-kit-lite' ),
					'before' => esc_html__( 'Before', 'elite-kit-lite' ),
				),
				'default'   => 'after',
				'condition' => array(
					'is_pt_button_icon' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'icon_spacing_after',
			array(
				'label'     => esc_html__( 'Icon Spacing', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 1,
					),
				),
				'default'   => array(
					'unit' => 'px',
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button i' => 'margin-left: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'icon_position'     => 'after',
					'is_pt_button_icon' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'icon_spacing_before',
			array(
				'label'     => esc_html__( 'Icon Spacing', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 60,
						'step' => 1,
					),
				),
				'default'   => array(
					'unit' => 'px',
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button i' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'icon_position'     => 'before',
					'is_pt_button_icon' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pt_ribbon',
			array(
				'label' => esc_html__( 'Ribbon', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'is_featured',
			array(
				'label'     => esc_html__( 'Featured?', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elite-kit-lite' ),
				'label_off' => esc_html__( 'No', 'elite-kit-lite' ),
				'default'   => 'no',
			)
		);

		$this->add_control(
			'featured_style',
			array(
				'label'     => esc_html__( 'Ribbon Style', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => array(
					'style-1' => esc_html__( 'Style One', 'elite-kit-lite' ),
					'style-2' => esc_html__( 'Style two', 'elite-kit-lite' ),
				),
				'default'   => 'style-1',
				'condition' => array(
					'is_featured' => 'yes',
				),
			)
		);

		$this->add_control(
			'featured_text',
			array(
				'label'     => esc_html__( 'Featured text', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => esc_html__( 'Featured', 'elite-kit-lite' ),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table.featured:before' => 'content: "{{VALUE}}";',
				),
				'condition' => array(
					'is_featured' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'ribbon_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'  => array(
						'title' => esc_html__( 'Left', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'right',
				'toggle'    => true,
				'condition' => array(
					'is_featured' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		// Additional Option
		$this->start_controls_section(
			'pt_additional_option',
			array(
				'label' => esc_html__( 'Additional Option', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pt_additional_header_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_show_title',
			array(
				'label'        => esc_html__( 'Show Title', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'pt_additional_subtitle_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_show_subtitle',
			array(
				'label'        => esc_html__( 'Show Subtitle', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'pt_additional_price_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_show_price',
			array(
				'label'        => esc_html__( 'Show Price', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'pt_show_duration',
			array(
				'label'        => esc_html__( 'Show Duration', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'pt_show_price' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_additional_features_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_show_features',
			array(
				'label'        => esc_html__( 'Show Features', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'pt_additional_button_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_show_button',
			array(
				'label'        => esc_html__( 'Show Button', 'elite-kit-lite' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit-lite' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		// Style Section.

		// layout style
		$this->start_controls_section(
			'layout_bg_style',
			array(
				'label' => esc_html__( 'Pricing Body', 'elite-kit-lite' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'body_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-item' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'layout_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->start_controls_tabs(
			'layout_tabs'
		);

		$this->start_controls_tab(
			'layout_style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'layout_bg',
				'label'    => esc_html__( 'Background', 'elite-kit-lite' ),
				'types'    => array( 'classic', 'gradient', 'video' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'layout_border',
				'label'    => esc_html__( 'Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'layout_box_shadow',
				'label'    => esc_html__( 'Layout Box Shadow', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'layout_style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'layout_hover_bg',
				'label'    => esc_html__( 'Background', 'elite-kit-lite' ),
				'types'    => array( 'classic', 'gradient', 'video' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table:hover',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'layout_hover_border',
				'label'    => esc_html__( 'Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table:hover',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'layout_hover_box_shadow',
				'label'    => esc_html__( 'Layout Box Shadow', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table:hover',
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Title
		$this->start_controls_section(
			'pt_title_section',
			array(
				'label'     => esc_html__( 'Pricing Title', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_show_title' => 'yes',
				),
			)
		);

		$this->add_control(
			'table_title_normal_color',
			array(
				'label'     => esc_html__( 'Title Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-header .title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'table_title_hover_color',
			array(
				'label'     => esc_html__( 'Title Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .ek-header .title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => esc_html__( 'Title Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-header .title',
			)
		);

		$this->add_responsive_control(
			'table_title_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-header .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'table_title_border',
				'label'    => esc_html__( 'Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-header .title',
			)
		);

		$this->end_controls_section();

		// Table Subtitle
		$this->start_controls_section(
			'subtitle_section',
			array(
				'label'     => esc_html__( 'Pricing Subtitle', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_show_subtitle' => 'yes',
				),
			)
		);

		$this->add_control(
			'table_subtitle_normal_color',
			array(
				'label'     => esc_html__( 'Subtitle Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-header .subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'table_subtitle_hover_color',
			array(
				'label'     => esc_html__( 'Subtitle Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .ek-header .subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'label'    => esc_html__( 'Subtitle Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-header .subtitle',
			)
		);

		$this->add_responsive_control(
			'table_subtitle_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-header .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'table_subtitle_border',
				'label'    => esc_html__( 'Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .item_class',
			)
		);

		$this->add_control(
			'pricing_subtitle_border_color',
			array(
				'label'     => esc_html__( 'Border Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .your-class' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();

		// Header Icon style.
		$this->start_controls_section(
			'header_icon_style',
			array(
				'label'     => esc_html__( 'Header Icon', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'is_header_icon' => 'yes',
				),
			)
		);

		$this->start_controls_tabs(
			'header_icon_tabs'
		);

		$this->start_controls_tab(
			'header_icon_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'header_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .icon' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'header_icon_bg_color',
			array(
				'label'     => esc_html__( 'BG Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .icon' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'header_icon_border',
				'label'    => esc_html__( 'Icon Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table .icon',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'header_icon_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'header_icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .icon' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'header_icon_hover_bg_color',
			array(
				'label'     => esc_html__( 'BG Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .icon' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'header_icon_hover__border',
				'label'    => esc_html__( 'Icon Border', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table:hover .icon',
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'header_icon_dimension',
			array(
				'label'      => esc_html__( 'Border Radius', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'icon_size',
			array(
				'label'     => esc_html__( 'Size', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-icon .icon i'   => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-icon .icon svg' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'icon_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-icon .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'icon_margin',
			array(
				'label'     => esc_html__( 'Margin Bottom', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-icon .icon' => 'margin-bottom: {{SIZE}}px;',
				),
			)
		);

		$this->end_controls_section();

		// Price Style.
		$this->start_controls_section(
			'price_style',
			array(
				'label'     => esc_html__( 'Price Tag', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_show_price' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'price_padding',
			array(
				'label'      => esc_html__( 'padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->start_controls_tabs(
			'price_tag_tabs'
		);

		$this->start_controls_tab(
			'price_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'currency_option',
			array(
				'label'     => esc_html__( 'Currency', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'currency_color',
			array(
				'label'     => esc_html__( 'Currency Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .price-currency' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'currency_typography',
				'label'    => esc_html__( 'Currency Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table .price-currency',
			)
		);

		$this->add_responsive_control(
			'currency_space',
			array(
				'label'     => esc_html__( 'Spacing', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .price-currency' => 'margin-right: {{SIZE}}px;',
				),
			)
		);

		$this->add_control(
			'price_option',
			array(
				'label'     => esc_html__( 'Price', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'price_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'price_typography',
				'label'    => esc_html__( 'Price Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table .price',
			)
		);

		$this->add_control(
			'price_period_option',
			array(
				'label'     => esc_html__( 'Price Period', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'price_period_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .price-period' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'price_period_typography',
				'label'    => esc_html__( 'Price Period Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table .price-period',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'price_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'currency_hover_option',
			array(
				'label'     => esc_html__( 'Currency', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'currency_hover_color',
			array(
				'label'     => esc_html__( 'Currency Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .price-currency' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'price_hover_option',
			array(
				'label'     => esc_html__( 'Price', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'price_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'price_period_hover_option',
			array(
				'label'     => esc_html__( 'Price Period', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'price_period_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .price-period' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Sale Price Style.

		$this->start_controls_section(
			'pt_sale_price_style',
			array(
				'label'     => esc_html__( 'Sale Price', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_sale_price_visibility' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_sale_currency_style_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_sale_currency_style_option',
			array(
				'label'     => esc_html__( 'Currency', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			)
		);

		$this->add_control(
			'pt_sale_currency_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-sale-price .ek-currency' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'pt_sale_currency_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .ek-sale-price .ek-currency' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'pt_sale_currency_typography',
				'selector' => '{{WRAPPER}} .ek-pricing-table .ek-sale-price .ek-currency',
			)
		);

		$this->add_responsive_control(
			'pt_sale_currency_offset',
			array(
				'label'      => esc_html__( 'Vertical Offset', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => - 100,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => - 100,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-sale-price .ek-currency' => 'top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'pt_sale_price_style_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_sale_price_style_option',
			array(
				'label'     => esc_html__( 'Sale Price', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			)
		);

		$this->add_control(
			'pt_sale_price_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-sale-price .ek-price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'pt_sale_price_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .ek-sale-price .ek-price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'pt_sale_price_typography',
				'selector' => '{{WRAPPER}} .ek-pricing-table .ek-sale-price .ek-price',
			)
		);

		$this->add_control(
			'pt_sale_original_price_style_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'pt_sale_original_price_style_option',
			array(
				'label'     => esc_html__( 'Sale Original Price', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			)
		);

		$this->add_control(
			'pt_sale_original_price_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .sale-original-price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'pt_sale_original_price_hover_color',
			array(
				'label'     => esc_html__( 'Text Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .sale-original-price' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'pt_sale_original_price_typography',
				'selector' => '{{WRAPPER}} .ek-pricing-table .sale-original-price',
			)
		);
		$this->add_responsive_control(
			'pt_sale_original_price_offset',
			array(
				'label'      => esc_html__( 'Vertical Offset', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => - 150,
						'max'  => 150,
						'step' => 1,
					),
					'%'  => array(
						'min' => - 100,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .sale-original-price' => 'top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Feature.
		$this->start_controls_section(
			'feature_style',
			array(
				'label'     => esc_html__( 'Features', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_show_features' => 'yes',
				),
			)
		);

		$this->add_control(
			'pt_features_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-feature' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'feature_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->start_controls_tabs(
			'feature_tab'
		);

		$this->start_controls_tab(
			'feature_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'feature_icon_option',
			array(
				'label'     => esc_html__( 'Icon', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'fe-icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .feature-item .feature-icon' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_responsive_control(
			'feature_icon_size',
			array(
				'label'     => esc_html__( 'Icon Size', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-feature .feature-icon i'   => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .ek-pricing-table .ek-feature .feature-icon svg' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'feature_icon_spacing',
			array(
				'label'     => esc_html__( 'Icon Spacing', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .feature-item .feature-icon' => 'margin-right: {{SIZE}}px;',
				),
			)
		);

		$this->add_control(
			'feature_text_option',
			array(
				'label'     => esc_html__( 'Feature Text', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'feature_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .feature-item .feature-text' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'feature_text_typography',
				'label'    => esc_html__( 'Feature Text Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .item_class',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'feature_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'feature_icon_hover_option',
			array(
				'label'     => esc_html__( 'Icon', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'fe-icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Hover Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .feature-item .feature-icon' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'feature_text_hover_option',
			array(
				'label'     => esc_html__( 'Feature Text', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'feature_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table:hover .feature-item .feature-text' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'feature_element_space',
			array(
				'label'     => esc_html__( 'Feature Element Space', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .feature-item' => 'padding-bottom: {{SIZE}}px;',
				),
			)
		);

		$this->end_controls_section();

		// Button Style.
		$this->start_controls_section(
			'button_style',
			array(
				'label'     => esc_html__( 'Button', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'pt_show_button' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'pt_button_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elite-kit-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'label'    => esc_html__( 'Text Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table .ek-pricing-button',
			)
		);

		$this->add_responsive_control(
			'button_icon_size',
			array(
				'label'     => esc_html__( 'Icon Size', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button i'   => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button svg' => 'height: {{SIZE}}px; width: {{SIZE}}px;',
				),
			)
		);

		$this->start_controls_tabs(
			'button_tabs'
		);

		$this->start_controls_tab(
			'button_style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'button_bg',
			array(
				'label'     => esc_html__( 'Background', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button svg' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'button_hove_rbg',
			array(
				'label'     => esc_html__( 'Background', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button:hover' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button:hover i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .ek-pricing-table .ek-pricing-button:hover svg' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->add_responsive_control(
			'button_space',
			array(
				'label'      => esc_html__( 'Spacing', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),

				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table .ek-footer' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_tabs();

		$this->end_controls_section();

		// Ribbon Style.
		$this->start_controls_section(
			'ribbon_section',
			array(
				'label'     => esc_html__( 'Ribbon', 'elite-kit-lite' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'is_featured' => 'yes',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'ribbon_typography',
				'label'    => esc_html__( 'Text Typography', 'elite-kit-lite' ),
				'selector' => '{{WRAPPER}} .ek-pricing-table.featured:before ',
			)
		);

		$this->start_controls_tabs(
			'ribbon_tabs'
		);

		$this->start_controls_tab(
			'ribbon_style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'ribbon_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table.featured:before' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'ribbon_text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table.featured:before' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'pt_ribbon_border',
				'selector' => '{{WRAPPER}} .ek-pricing-table.featured:before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'pt_ribbon_box_shadow',
				'selector' => '{{WRAPPER}} .ek-pricing-table.featured:before',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ribbon_style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit-lite' ),
			)
		);

		$this->add_control(
			'ribbon_bg_hover_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table.featured:hover:before' => 'background: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'ribbon_text_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit-lite' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-pricing-table.featured:hover:before' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'pt_ribbon_hover_border',
				'selector' => '{{WRAPPER}} .ek-pricing-table.featured:hover:before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'pt_ribbon_hover_box_shadow',
				'selector' => '{{WRAPPER}} .ek-pricing-table.featured:hover:before',
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'pt_ribbon_offset-divider',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_responsive_control(
			'pt_ribbon_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table.featured:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'pt_ribbon_horizontal_offset',
			array(
				'label'      => esc_html__( 'Horizontal Offset', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => - 150,
						'max'  => 150,
						'step' => 1,
					),
					'%'  => array(
						'min' => - 100,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table.featured:before' => 'top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'pt_ribbon_vertical_left_offset',
			array(
				'label'      => esc_html__( 'Vertical Offset', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => - 150,
						'max'  => 150,
						'step' => 1,
					),
					'%'  => array(
						'min' => - 100,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table.featured.alignment-left::before' => 'left: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'ribbon_alignment' => 'left',
				),
			)
		);

		$this->add_responsive_control(
			'pt_ribbon_vertical_right_offset',
			array(
				'label'      => esc_html__( 'Vertical Offset', 'elite-kit-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => - 150,
						'max'  => 150,
						'step' => 1,
					),
					'%'  => array(
						'min' => - 100,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-pricing-table.featured.alignment-right::before' => 'right: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'ribbon_alignment' => 'right',
				),
			)
		);

		$this->end_controls_section();
	}

	public function render_pricing_title() {
		$settings = $this->get_settings_for_display();

		return $settings['pt_heading'];
	}

	public function render_pricing_subtitle() {
		$settings = $this->get_settings_for_display();

		return $settings['pt_subtitle'];
	}

	public function render_header_icon() {
		$settings         = $this->get_settings_for_display();
		$pt_icon          = $settings['pt_icon'];
		$header_icon_html = \Elementor\Icons_Manager::render_icon( $pt_icon, array( 'aria-hidden' => 'true' ) );

		return $header_icon_html;
	}

	public function render_currency() {
		$settings    = $this->get_settings_for_display();
		$pt_currency = $settings['pt_currency'] ?? '$';

		return $pt_currency;
	}

	public function render_sale_price_class() {
		$settings      = $this->get_settings_for_display();
		$is_sale_price = $settings['pt_sale_price_visibility'] ?? 'no';
		$sale_class    = '';

		if ( 'yes' == $is_sale_price && ! empty( $settings['pt_sale_price'] ) ) {
			$sale_class = 'sale-original-price';
		} else {
			$sale_class = 'ek-original-price';
		}

		return $sale_class;
	}

	public function render_separator() {
		$settings     = $this->get_settings_for_display();
		$pt_separator = $settings['pt_separator'];

		return $pt_separator;
	}

	public function render_duration() {
		$settings    = $this->get_settings_for_display();
		$pt_duration = $settings['pt_duration'];

		return $pt_duration;
	}

	public function render_original_price() {
		$settings = $this->get_settings_for_display();
		$pt_price = $settings['pt_price'] ?? '299';

		return $pt_price;
	}

	public function render_sale_price() {
		$settings = $this->get_settings_for_display();

		return $settings['pt_sale_price'];
	}

	public function render_features_icon( $items ) {
		$settings     = $this->get_settings_for_display();
		$feature_icon = \Elementor\Icons_Manager::render_icon( $items['feature_icon'], array( 'aria-hidden' => 'true' ) );

		return $feature_icon;
	}

	public function render_features_content( $items ) {
		$settings = $this->get_settings_for_display();

		return $items['pt_feature_name'];
	}

	public function render_ribbon() {
		$settings         = $this->get_settings_for_display();
		$is_featured      = $settings['is_featured'] ?? 'no';
		$featured_style   = $settings['featured_style'] ?? 'style-1';
		$ribbon_alignment = $settings['ribbon_alignment'] ?? 'right';

		if ( $is_featured ) {
			if ( $featured_style == 'style-1' ) {
				echo 'feature-1';
			} elseif ( $featured_style == 'style-2' ) {
				echo 'feature-2';
			}

			if ( $ribbon_alignment == 'left' ) {
				echo ' alignment-left';
			} else {
				echo ' alignment-right';
			}
		}
	}

	protected function render() {
		$settings     = $this->get_settings_for_display();
		$layout_style = 'pricing-table-1';

		include __DIR__ . '/pricing-table/' . $layout_style . '.php';
	}
}
