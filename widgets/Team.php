<?php

namespace EliteKit\Widgets;

defined( 'ABSPATH' ) || exit;

use Elementor\Widget_Base;

class Team extends Widget_Base {

	public function get_name() {
		return 'elite_kit_team';
	}

	public function get_title() {
		return esc_html__( 'Team', 'elite-kit' );
	}

	public function get_icon() {
		return 'elite-kit-icon eicon-person';
	}

	public function get_categories() {
		return array( 'elite-kit-widgets' );
	}

	public function get_script_depends() {
		return array( 'elite-kit-team', 'fontawesome' );
	}

	public function get_keywords() {
		return array( 'team', 'people', 'member' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'member_info',
			array(
				'label' => esc_html__( 'Member Information', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'member_image',
			array(
				'label'   => esc_html__( 'Choose Image', 'elite-kit' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			array(
				'name'    => 'image',
				'exclude' => array(
					'width'  => '',
					'height' => '',
				),
				'include' => array(),
				'default' => 'large',
			)
		);

		$this->add_control(
			'member_name',
			array(
				'label'       => esc_html__( 'Name', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Elite Kit Member', 'elite-kit' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'member_designation',
			array(
				'label'       => esc_html__( 'Designation', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Elite Kit Officer', 'elite-kit' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'member_description',
			array(
				'label'       => esc_html__( 'Description', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 4,
				'placeholder' => esc_html__( 'Write something amazing about the elite kit member', 'elite-kit' ),
				'condition'   => array(
					'layout_style' => 'team-1',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'member_socials',
			array(
				'label' => esc_html__( 'Social Profile', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon',
			array(
				'label' => esc_html__( 'Social Icon', 'elite-kit' ),
				'type'  => \Elementor\Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'social_website_name',
			array(
				'label'       => esc_html__( 'Social Website Name', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'social_link',
			array(
				'label'       => esc_html__( 'URL', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$this->add_control(
			'member_social_icons',
			array(
				'label'       => esc_html__( 'Soicial Icons', 'elite-kit' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'social_website_name' => esc_html__( 'Facebook', 'elite-kit' ),
						'social_icon'         => array(
							'value'   => 'fab fa-facebook-f',
							'library' => 'solid',
						),
						'social_link'         => '#',
					),
					array(
						'social_website_name' => esc_html__( 'Twitter', 'elite-kit' ),
						'social_icon'         => array(
							'value'   => 'fab fa-twitter',
							'library' => 'solid',
						),
						'social_link'         => '#',
					),
					array(
						'social_website_name' => esc_html__( 'Instagram', 'elite-kit' ),
						'social_icon'         => array(
							'value'   => 'fab fa-instagram',
							'library' => 'solid',
						),
						'social_link'         => '#',
					),
					array(
						'social_website_name' => esc_html__( 'Behance', 'elite-kit' ),
						'social_icon'         => array(
							'value'   => 'fab fa-behance',
							'library' => 'solid',
						),
						'social_link'         => '#',
					),

				),
				'title_field' => '{{{ social_website_name }}}',
			)
		);

		$this->end_controls_section();

		// Style Section.
		$this->start_controls_section(
			'member_style',
			array(
				'label' => esc_html__( 'Member style', 'elite-kit' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'information_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'elite-kit' ),
			)
		);

		$this->add_control(
			'name_options',
			array(
				'label'     => esc_html__( 'Member Name', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'name_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .ek-team-area .team-title',
			)
		);

		$this->add_control(
			'designation_options',
			array(
				'label'     => esc_html__( 'Designation', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'text_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-position span' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'designation_typography',
				'selector' => '{{WRAPPER}} .ek-team-area .team-position span',
			)
		);

		$this->add_control(
			'description_options',
			array(
				'label'     => esc_html__( 'Description', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-description span' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .ek-team-area .team-description span',
			)
		);

		$this->add_control(
			'meta_options',
			array(
				'label'     => esc_html__( 'Meta', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'meta_hover_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-holder' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'meta_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-team-area .team-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'social_options',
			array(
				'label'     => esc_html__( 'Social Icon', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'      => 'social_bgbackground',
				'types'     => array( 'classic', 'gradient' ),
				'selector'  => '{{WRAPPER}} .ek-team-area-2 .social-item',
				'condition' => array(
					'layout_style' => 'team-2',
				),
			)
		);

		$this->add_control(
			'icon_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .social-item a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'social_typography',
				'selector' => '{{WRAPPER}} .ek-team-area .social-item a',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'elite-kit' ),
			)
		);

		$this->add_control(
			'name_hover_options',
			array(
				'label'     => esc_html__( 'Member Name', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'name_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-wrapper:hover .team-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'designation_hover_options',
			array(
				'label'     => esc_html__( 'Designation', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'designation_hover_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-wrapper:hover span' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'meta_hover_options',
			array(
				'label'     => esc_html__( 'Meta', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'meta_hover_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .team-wrapper:hover .team-holder' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'meta_hover_padding',
			array(
				'label'      => esc_html__( 'Padding', 'elite-kit' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .ek-team-area .team-wrapper:hover .team-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'social_hover_options',
			array(
				'label'     => esc_html__( 'Social Icon', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'      => 'active_social_bgbackground',
				'types'     => array( 'classic', 'gradient' ),
				'selector'  => '{{WRAPPER}} .ek-team-area-2 .social-item.active',
				'condition' => array(
					'layout_style' => 'team-2',
				),
			)
		);

		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => esc_html__( 'Icon Color', 'elite-kit' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ek-team-area .social-item a:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	public function render_team_image() {
		$settings = $this->get_settings_for_display();

		$team_image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'image', 'member_image' );

		return $team_image_html;
	}


	protected function render() {
		$settings     = $this->get_settings_for_display();
		$layout_style = 'team-1';

		include __DIR__ . '/team/' . $layout_style . '.php';
	}
}
