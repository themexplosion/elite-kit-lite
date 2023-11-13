<?php
namespace EliteKit\Widgets;

defined('ABSPATH') || exit;

use Elementor\Widget_Base;

class Team extends Widget_Base
{

    public function get_name()
    {
        return 'elite_kit_team';
    }

    public function get_title()
    {
        return esc_html__('Team', 'elite-kit');
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return array( 'elite-kit-widgets' );
    }

    public function get_keywords()
    {
        return array( 'team', 'people', 'member' );
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'member_info',
            array(
                'label' => esc_html__('Member Information', 'elite-kit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'member_image',
            array(
                'label'   => esc_html__('Choose Image', 'elite-kit'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            array(
                'name'    => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
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
                'label'       => esc_html__('Name', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Elite Kit Member', 'elite-kit'),
                'label_block' => true,
            )
        );

        $this->add_control(
            'member_designation',
            array(
                'label'       => esc_html__('Designation', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Elite Kit Officer', 'elite-kit'),
                'label_block' => true,
            )
        );

        $this->add_control(
            'member_description',
            array(
                'label'       => esc_html__('Description', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'placeholder' => esc_html__('Write something amazing the elit kit member', 'elite-kit'),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'member_socials',
            array(
                'label' => esc_html__('Social Profile', 'elite-kit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_icon',
            array(
                'label' => esc_html__('Social Icon', 'elite-kit'),
                'type'  => \Elementor\Controls_Manager::ICONS,
            )
        );

        $repeater->add_control(
            'social_website_name',
            array(
                'label'       => esc_html__('Social Website Name', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'social_link',
            array(
                'label'       => esc_html__('URL', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $this->add_control(
            'member_social_icons',
            array(
                'label'       => esc_html__('Soicial Icons', 'elite-kit'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'social_website_name' => esc_html__('Facebook', 'elite-kit'),
                        'social_icon'         => array(
                            'value'   => 'fab fa-facebook-f',
                            'library' => 'solid',
                        ),
                        'social_link'     => '#',
                    ),
                    array(
                        'social_website_name' => esc_html__('Twitter', 'elite-kit'),
                        'social_icon'         => array(
                            'value'   => 'fab fa-twitter',
                            'library' => 'solid',
                        ),
                        'social_link'     => '#',
                    ),
                    array(
                        'social_website_name' => esc_html__('Instagram', 'elite-kit'),
                        'social_icon'         => array(
                            'value'   => 'fab fa-instagram',
                            'library' => 'solid',
                        ),
                        'social_link'     => '#',
                    ),
                    array(
                        'social_website_name' => esc_html__('Behance', 'elite-kit'),
                        'social_icon'         => array(
                            'value'   => 'fab fa-behance',
                            'library' => 'solid',
                        ),
                        'social_link'     => '#',
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
                'label' => esc_html__('Member style', 'elite-kit'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs(
            'information_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            array(
                'label' => esc_html__('Normal', 'elite-kit'),
            )
        );

        $this->add_control(
            'name_options',
            array(
                'label'     => esc_html__('Member Name', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'name_color',
            array(
                'label'     => esc_html__('Text Color', 'elite-kit'),
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
                'label'     => esc_html__('Designation', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'text_color',
            array(
                'label'     => esc_html__('Text Color', 'elite-kit'),
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
                'label'     => esc_html__('Description', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'description_color',
            array(
                'label'     => esc_html__('Text Color', 'elite-kit'),
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
                'label'     => esc_html__('Meta', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'meta_hover_color',
            array(
                'label'     => esc_html__('Background Color', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .ek-team-area .team-holder' => 'background-color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'meta_padding',
            array(
                'label'      => esc_html__('Padding', 'elite-kit'),
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
                'label'     => esc_html__('Social Icon', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'icon_color',
            array(
                'label'     => esc_html__('Icon Color', 'elite-kit'),
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
                'label' => esc_html__('Hover', 'elite-kit'),
            )
        );

        $this->add_control(
            'name_hover_options',
            array(
                'label'     => esc_html__('Member Name', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'name_hover_color',
            array(
                'label'     => esc_html__('Text Color', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .ek-team-area .team-wraper:hover .team-title' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'designation_hover_options',
            array(
                'label'     => esc_html__('Designation', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'designation_hover_color',
            array(
                'label'     => esc_html__('Text Color', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .ek-team-area .team-wraper:hover span' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'meta_hover_options',
            array(
                'label'     => esc_html__('Meta', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'meta_hover_bg_color',
            array(
                'label'     => esc_html__('Background Color', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .ek-team-area .team-wraper:hover .team-holder' => 'background-color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'meta_hover_padding',
            array(
                'label'      => esc_html__('Padding', 'elite-kit'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
                'selectors'  => array(
                    '{{WRAPPER}} .ek-team-area .team-wraper:hover .team-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_control(
            'social_hover_options',
            array(
                'label'     => esc_html__('Social Icon', 'elite-kit'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'icon_hover_color',
            array(
                'label'     => esc_html__('Icon Color', 'elite-kit'),
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="ek-team-area mb-40">
            <div class="team-wraper relative ">
                <div class="team-image">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'image', 'member_image'); ?>
                </div>
                <div class="team-holder  text-center absolute  -bottom-[40px] left-[30px] right-[30px]  overflow-hidden pt-[17px] pr-[15px] pb-[17px] pl-[15px]">
                    <?php if ($settings['member_name']) : ?>
                        <h3 class="team-title text-[22px] leading-[26px] mb-[2px]"> <?php echo esc_html__($settings['member_name'], 'elite-kit'); ?> </h3>
                    <?php endif ?>
                    <?php if ($settings['member_designation']) : ?>
                        <div class="team-position">
                            <span class="font-[15px] loading-normal inline-block"> <?php echo esc_html__($settings['member_designation'], 'elite-kit'); ?></span>
                        </div>
                    <?php endif ?>
                    <?php if ($settings['member_description'] || $settings['member_social_icons']) : ?>
                        <div class="team-meta ">
                            <?php if ($settings['member_description']) :?>
                                <div class="team-description">
                                    <span class="text-[14px] block leading-[22px] mt-[8px] mb-[12px]"><?php echo esc_html__($settings['member_description'], 'elite-kit'); ?></span>
                                </div>
                            <?php endif ?>
                            <?php if ($settings['member_social_icons']) : ?>
                                <div class="social-item">
                                    <?php foreach ($settings['member_social_icons'] as $item) : ?>
                                        <a class="mt-0 mb-0 ml-[6px] mr-[6px] inline-block text-[16px] no-underline" href="<?php echo esc_attr__($item['social_link']); ?>" target='_blank'><?php \Elementor\Icons_Manager::render_icon($item['social_icon'], array( 'aria-hidden' => 'true' )); ?></a>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php
    }
}
