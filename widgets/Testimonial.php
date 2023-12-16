<?php

namespace EliteKit\Widgets;

defined( 'ABSPATH' ) || exit;

use Elementor\Widget_Base;

class Testimonial extends Widget_Base {

	public function get_name() {
		return 'elite_kit_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'elite-kit' );
	}

	public function get_icon() {
		return 'elite-kit-icon eicon-testimonial-carousel';
	}

	public function get_categories() {
		return array( 'elite-kit-widgets' );
	}

	public function get_style_depends() {
		return array( 'fontawesome-css' );
	}

	public function get_script_depends() {
		return array( 'fontawesome' );
	}

	public function get_keywords() {
		return array(
			'testimonial',
			'carousel',
			'review',
			'recommendation',
			'feedback',
		);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tm_quote_sec',
			array(
				'label' => esc_html__( 'Review/Quote', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'tm_quote_icon',
			array(
				'label'   => esc_html__( 'Quote Icon', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-quote-left',
					'library' => 'solid',
				),
			)
		);

		$this->add_control(
			'tm_quote',
			array(
				'label'   => esc_html__( 'Review Text', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'rows'    => 4,
				'default' => esc_html__( ' The most well-known dummy text is the Lorem Ipsum, which is said to have originated in the 16th century.', 'elite-kit' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tm_user_data',
			array(
				'label' => esc_html__( 'Author information', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'tm_user_image',
			array(
				'label'   => esc_html__( 'Author picture', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'tm_user_name',
			array(
				'label'   => esc_html__( 'Name of the author', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Jhone Doe', 'elite-kit' ),
			)
		);

		$this->add_control(
			'tm_user_designation',
			array(
				'label'       => esc_html__( 'Author designation', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'CEO', 'elite-kit' ),
				'placeholder' => esc_html__( 'e.g - CEO, Manager, Market etc.', 'elite-kit' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tm_rating',
			array(
				'label' => esc_html__( 'Rating', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'rating_value',
			array(
				'label'   => esc_html__( 'Rating', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 5,
				'step'    => 0.1,
				'default' => 5,
				'dynamic' => array(
					'active' => true,
				),
			)
		);

		$this->end_controls_section();

		// Additional Settings

		$this->start_controls_section(
			'tc_additional_settings',
			array(
				'label' => esc_html__( 'Additional Settings', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'icon_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_quote_icon',
			array(
				'label'        => esc_html__( 'Show Quote Icon', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'name_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_author_name',
			array(
				'label'        => esc_html__( 'Show Name', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'job_title_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_job_title',
			array(
				'label'        => esc_html__( 'Show Job Title', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'rating_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_rating',
			array(
				'label'        => esc_html__( 'Show Rating', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'tc_rating_position',
			array(
				'label'     => esc_html__( 'Rating Position', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'before_review_text',
				'options'   => array(
					'before_review_text' => esc_html__( 'Before Review text', 'elite-kit' ),
					'after_review_text'  => esc_html__( 'After Review text', 'elite-kit' ),
				),
				'condition' => array(
					'layout_style' => 'testimonial-2',
					'tc_is_rating' => 'yes',
				),
			)
		);

		$this->add_control(
			'review_text_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_review_text',
			array(
				'label'        => esc_html__( 'Show Review Text', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'author_image_hr',
			array(
				'type' => \Elementor\Controls_Manager::DIVIDER,
			)
		);

		$this->add_control(
			'tc_is_author_image',
			array(
				'label'        => esc_html__( 'Show Author Image', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'elite-kit' ),
				'label_off'    => esc_html__( 'Hide', 'elite-kit' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		// Item Box
		$this->start_controls_section(
			'tc_item_box_style',
			array(
				'label'     => esc_html__( 'Items', 'elite-kit' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'layout_style' => 'testimonial-2',
				),
			)
		);

		$this->start_controls_tabs(
			'tc_item_box_tabs'
		);

		$this->start_controls_tab(
			'tc_item_box_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit' ),
			)
		);

		$this->add_control(
			'tc__item_text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elite-kit' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elite-kit' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elite-kit' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'left',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'tc_item_box_background',
				'label'    => esc_html__( 'Background Box', 'elite-kit' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'tc_normal_item_border',
				'label'    => esc_html__( 'Border', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper',
			)
		);

		$this->add_responsive_control(
			'tc_item_border_radius',
			array(
				'label'      => esc_html__( 'Border radius', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tc_normal_item_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper',
			)
		);

		$this->add_responsive_control(
			'tc_item_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tc_item_box_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kt' ),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'tc_hover_item_box_background',
				'label'    => esc_html__( 'Background Box', 'elite-kit' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper:hover',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'tc_hover_item_border',
				'label'    => esc_html__( 'Border', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'tc_item_hover_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area-2 .ek-testimonial-wrapper:hover',
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		// Quote Box style.
		$this->start_controls_section(
			'quote_box_style',
			array(
				'label'     => esc_html__( 'Quote Box Style', 'elite-kit' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'layout_style' => 'testimonial-1',
				),
			)
		);

		$this->start_controls_tabs(
			'box_style_tabs',
		);

		$this->start_controls_tab(
			'box_normal_style',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit' ),
			)
		);

		$this->add_control(
			'content_alignment',
			array(
				'label'     => esc_html__( 'Alignment', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elite-kit' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elite-kit' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elite-kit' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'box_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box'        => 'background: {{VALUE}}',
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box:before' => 'border-bottom-color: {{VALUE}};border-inline-end-color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'box_border',
				'label'    => esc_html__( 'Border', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box',
			)
		);

		$this->add_control(
			'box_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_normal_shadow',
				'label'    => esc_html__( 'Box Shadow', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box',
			)
		);

		$this->add_control(
			'box_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'space_between_quote_box',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover_style',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit' ),
			)
		);

		$this->add_control(
			'box_hover_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-quote-box'        => 'background: {{VALUE}}',
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-quote-box:before' => 'border-bottom-color: {{VALUE}};border-inline-end-color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'box_hover_border',
				'label'    => esc_html__( 'Border', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-quote-box',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'box_hover_shadow',
				'label'    => esc_html__( 'Box Shadow', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-quote-box',
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Quote Icon Style
		$this->start_controls_section(
			'tc_quote_icon_style',
			array(
				'label'     => esc_html__( 'Quote Icon', 'elite-kit' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => array(
					'layout_style'     => 'testimonial-1',
					'tc_is_quote_icon' => 'yes',
				),
			)
		);

		$this->add_control(
			'quote_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-icon i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'quote_icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Hover Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-quote-icon i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'quote_icon_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'quote_svg_option',
			array(
				'label'     => esc_html__( 'SVG', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'quote_svg_size_width',
			array(
				'label'      => esc_html__( 'SVG Size Width', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'quote_svg_size_height',
			array(
				'label'      => esc_html__( 'SVG Size', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'space_quote',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-quote-icon' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Image.
		$this->start_controls_section(
			'tc_author_image',
			array(
				'label' => esc_html__( 'Image', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'author_image_size',
			array(
				'label'      => esc_html__( 'Image Size', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->add_responsive_control(
			'author_image_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'label'    => esc_html__( 'Border', 'elite-kit' ),
				'name'     => 'tc_image_border',
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img',
			)
		);

		$this->add_responsive_control(
			'tc_author_img_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'author_image_gap',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			array(
				'name'     => 'tc_author_css_filters',
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'img_shadow',
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-img img',
			)
		);

		$this->add_control(
			'image_offset_toggle',
			array(
				'label'        => __( 'Offset', 'elite-kit' ),
				'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => __( 'None', 'elite-kit' ),
				'label_on'     => __( 'Custom', 'elite-kit' ),
				'return_value' => 'yes',
			)
		);

		$this->start_popover();

		$this->add_responsive_control(
			'image_horizontal_offset',
			array(
				'label'     => esc_html__( 'Horizontal', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => - 200,
						'max' => 200,
					),
				),
				'condition' => array(
					'image_offset_toggle' => 'yes',
				),
				'selectors' => array(
					'{{WRAPPER}} ' => '--ek-carousel-image-h-offset: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'image_vertical_offset',
			array(
				'label'     => esc_html__( 'Vertical', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => - 200,
						'max' => 200,
					),
				),
				'condition' => array(
					'image_offset_toggle' => 'yes',
				),
				'selectors' => array(
					'{{WRAPPER}} ' => '--ek-carousel-image-v-offset: {{SIZE}}px;',
				),
			)
		);

		$this->end_popover();

		$this->end_controls_section();

		// Author Style.
		$this->start_controls_section(
			'author_style',
			array(
				'label' => esc_html__( 'Author Style', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'author_tabs',
		);

		$this->start_controls_tab(
			'author_normal_tabs',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit' ),
			)
		);

		$this->add_control(
			'author_name_option',
			array(
				'label'     => esc_html__( 'Author Name', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'author_name_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details .ek-name' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'author_name_typography',
				'label'    => esc_html__( 'Typography', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details .ek-name',
			)
		);

		$this->add_control(
			'author_designation_option',
			array(
				'label'     => esc_html__( 'Author Designation', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'author_designation_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details .ek-author-designation' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'author_designation_typography',
				'label'    => esc_html__( 'Typography', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details .ek-author-designation',
			)
		);

		$this->add_control(
			'author_details_gap',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-details .ek-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'author_box_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-author-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'author_hover_tabs',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit' ),
			)
		);

		$this->add_control(
			'author_name_hover_option',
			array(
				'label'     => esc_html__( 'Author Name', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'author_name_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-author-details .ek-name' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'author_designation_hover_option',
			array(
				'label'     => esc_html__( 'Author Designation', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'author_designation_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-author-details .ek-author-designation' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Text
		$this->start_controls_section(
			'quote_text_style',
			array(
				'label' => esc_html__( 'Text', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'quote_text_normal_color',
			array(
				'label'     => esc_html__( 'Quote Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .quote' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'quote_text_hover_color',
			array(
				'label'     => esc_html__( 'Hover Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .quote' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'quote_text_typography',
				'label'    => esc_html__( 'Quote Typography', 'elite-kit' ),
				'selector' => '{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .quote',
			)
		);

		$this->add_control(
			'tc_text_space',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .quote' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
				'condition'  => array(
					'layout_style' => 'testimonial-carousel-2',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tm_rating_sec',
			array(
				'label' => esc_html__( 'Rating', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'tm_rating_style_tabs',
		);

		$this->start_controls_tab(
			'tm_rating_normal',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit' ),
			)
		);

		$this->add_control(
			'tm_rating_icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-rating i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'rating_icon_size',
			array(
				'label'      => esc_html__( 'Icon Size', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-rating i' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'rating_icon_space',
			array(
				'label'      => esc_html__( 'Space Between Rating', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-rating li' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'rating_space',
			array(
				'label'      => esc_html__( 'Space Between', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper .ek-rating' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tm_rating_hover',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit' ),
			)
		);

		$this->add_control(
			'tm_rating_icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-testimonial-area .ek-testimonial-wrapper:hover .ek-rating i' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	public function render_quote() {
		$settings       = $this->get_settings_for_display();
		$quote          = $settings['tm_quote'];
		$is_review_text = $settings['tc_is_review_text'] ?? 'yes';

		if ( ! $is_review_text ) {
			return;
		}
		?>
		<?php if ( $quote ) : ?>
		<p class="quote ek-transition- "><?php echo esc_html( $quote ); ?></p>
		<?php endif; ?>
		<?php
	}

	public function quote_icon() {
		$settings      = $this->get_settings_for_display();
		$is_quote_icon = $settings['tc_is_quote_icon'] ?? 'yes';

		if ( ! $is_quote_icon ) {
			return;
		}

		if ( 'yes' == $is_quote_icon ) {
			?>
			<div class="ek-quote-icon ">
				<?php \Elementor\Icons_Manager::render_icon( $settings['tm_quote_icon'], array( 'aria-hidden' => 'true' ) ); ?>
			</div>
			<?php
		}
	}

	public function render_author_name() {
		$settings       = $this->get_settings_for_display();
		$author_name    = $settings['tm_user_name'];
		$is_author_name = $settings['tc_is_author_name'] ?? 'yes';
		if ( ! $is_author_name ) {
			return;
		}
		?>
		<?php if ( $author_name ) : ?>
		<h5 class="ek-name ek-transition-4"><?php echo esc_html( $author_name ); ?></h5>
		<?php endif; ?>
		<?php
	}

	public function render_author_designation() {
		$settings              = $this->get_settings_for_display();
		$author_designation    = $settings['tm_user_designation'];
		$is_author_designation = $settings['tc_is_job_title'] ?? 'yes';

		if ( ! $is_author_designation ) {
			return;
		}
		?>
		<?php if ( $author_designation ) : ?>
		<span class="ek-author-designation ek-transition-4"><?php echo esc_html( $author_designation ); ?></span>
		<?php endif; ?>
		<?php
	}

	public function author_image() {
		$settings        = $this->get_settings_for_display();
		$is_author_image = $settings['tc_is_author_image'] ?? 'yes';
		if ( ! $is_author_image ) {
			return;
		}
		?>
		<?php if ( $settings['tm_user_image']['url'] ) : ?>
		<img src="<?php echo esc_url( $settings['tm_user_image']['url'] ); ?>" alt="">
		<?php endif; ?>

		<?php
	}

	protected function get_rating() {
		$settings     = $this->get_settings_for_display();
		$rating_scale = 5;
		$rating       = (float) $settings['rating_value'] > $rating_scale ? $rating_scale : $settings['rating_value'];

		return array( $rating, $rating_scale );
	}

	public function reviewIcon() {
		$settings       = $this->get_settings_for_display();
		$rating_data    = $this->get_rating();
		$rating         = (float) $rating_data[0];
		$floored_rating = floor( $rating );
		$stars_html     = '';
		$is_rating      = $settings['tc_is_rating'] ?? 'yes';

		if ( ! $is_rating ) {
			return;
		}

		for ( $stars = 1.0; $stars <= $rating_data[1]; $stars++ ) {
			if ( $stars <= $floored_rating ) {
				$stars_html .= '<li><i class="fa-solid fa-star"></i></li>';
			} elseif ( $floored_rating + 1 === $stars && $rating !== $floored_rating ) {
				$stars_html .= '<li><i class="fa-solid fa-star-half-stroke"></i></li>';
			} else {
				$stars_html .= '<li><i class="fa-regular fa-star"></i></li>';
			}
		}

		?>
		<div class="ek-rating mt-[10px]">
		<ul><?php echo $stars_html; ?></ul>
		</div>
		<?php
	}

	protected function render() {
		$settings     = $this->get_settings_for_display();
		$layout_style = 'testimonial-1';

		include __DIR__ . '/testimonial/' . $layout_style . '.php';
	}
}
