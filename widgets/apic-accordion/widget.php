<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * accordion style, showing only one item at a time.
 *
 * @since 1.0.0
 */
class Apic_Accordion_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'apic_accordion';
    }

    public function get_title() {
        return __( 'APIC Accordion', 'hello-elementor' );
    }

    public function get_icon() {
        return 'eicon-elementor-circle';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

	/**
	 * Register accordion widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Accordion', 'elementor' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion Title', 'elementor' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_icon',
			[
				'label' 		=> esc_html__( 'Title Icon', 'elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'separator' 	=> 'before',
				'fa4compatibility' => 'icon',
				'skin' 			=> 'inline',
				'label_block' 	=> false,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Accordion Content', 'elementor' ),
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More', 'elementor' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'button_link',
            [
                'label' => __( 'Link', 'hello-elementor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'hello-elementor' ),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
            ]
		);
		$repeater->add_control(
			'thumbnail',
			[
				'label' => esc_html__( 'Image', 'hello-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Accordion Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__( 'Accordion #1', 'elementor' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => esc_html__( 'Accordion #2', 'elementor' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'button_icon',
			[
				'label' 		=> esc_html__( 'Button Icon', 'elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'separator' 	=> 'before',
				'fa4compatibility' => 'icon',
				'default' 		=> [
					'value' 	=> 'fas fa-arrow-right',
					'library' 	=> 'fa-solid',
				],
				'skin' 			=> 'inline',
				'label_block' 	=> false,
			]
		);

		$this->add_control(
			'title_html_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
				],
				'default' => 'div',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Accordion', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'range' => [
					'px' => [
						'max' => 20,
					],
					'em' => [
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-item' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-title' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .apic-elmentor-accordion-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_icon',
			[
				'label' => esc_html__( 'Title Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apic-elmentor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-item.elementor-active .apic-elmentor-accordion-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apic-elmentor-accordion-item.elementor-active .apic-elmentor-accordion-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 100,
					],
					'em' => [
						'max' => 1,
					],
					'rem' => [
						'max' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-accordion-item .elementor-tab-title' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content .apicbase-content-wrap' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-content .apicbase-content-wrap:not({{WRAPPER}} .elementor-tab-content .apicbase-content-wrap .apic-elmentor-accordion-button)',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content .apicbase-content-wrap:not({{WRAPPER}} .elementor-tab-content .apicbase-content-wrap .apic-elmentor-accordion-button)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_button',
			[
				'label' => esc_html__( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content .apic-elmentor-accordion-button' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_responsive_control(
			'button_icon_space',
			[
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'max' => 100,
					],
					'em' => [
						'max' => 1,
					],
					'rem' => [
						'max' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content .apic-elmentor-accordion-button' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-content .apic-elmentor-accordion-button',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_responsive_control(
			'buttton_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content .apic-elmentor-accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings 	= $this->get_settings_for_display();
		$id_int 	= substr( $this->get_id_int(), 0, 3 );
		?>
<div class="apic-elmentor-accordion apicbase-image-accordion-wrap">

    <ul class="apicbase-image-accordion">
        <?php
			foreach ( $settings['tabs'] as $index => $item ) :

				$tab_count = $index + 1;

				$tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );

				$tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );

				$this->add_render_attribute( $tab_title_setting_key, [
					'id' => 'elementor-tab-title-' . $id_int . $tab_count,
					'class' => [ 'elementor-tab-title apicbase-image-heading' ],
					'data-tab' => $tab_count,
					'role' => 'button',
					'aria-controls' => 'elementor-tab-content-' . $id_int . $tab_count,
					'aria-expanded' => 'false',
				] );

				$this->add_render_attribute( $tab_content_setting_key, [
					'id' => 'elementor-tab-content-' . $id_int . $tab_count,
					'class' => [ 'elementor-tab-content', 'elementor-clearfix', 'accordion-submenu' ],
					'data-tab' => $tab_count,
					'role' => 'region',
					'aria-labelledby' => 'elementor-tab-title-' . $id_int . $tab_count,
				] );

				$this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );

				$this->add_render_attribute(
					'button_link_' . $item['_id'],
					'href',
					$item['button_link']['url']
				);

				if ( $item['button_link']['is_external'] ) {
					$this->add_render_attribute( 'button_link_' . $item['_id'], 'target', '_blank' );
				}

				if ( $item['button_link']['nofollow'] ) {
					$this->add_render_attribute( 'button_link_' . $item['_id'], 'rel', 'nofollow' );
				}

				?>
        <li class="apic-elmentor-accordion-item<?php echo esc_attr( ($index === 0) ? ' elementor-active' : '' );?>">
            <<?php Utils::print_validated_html_tag( $settings['title_html_tag'] ); ?>
                <?php $this->print_render_attribute_string( $tab_title_setting_key ); ?>>
                <?php if ( Icons_Manager::is_migration_allowed() && ! empty( $item['tab_icon']['value'] )) : ?>
                <span class="apic-elmentor-accordion-icon">
                    <?php Icons_Manager::render_icon( $item['tab_icon'] ); ?>
                </span>
                <?php endif; ?>
                <a class="apic-elmentor-accordion-title" tabindex="0"><?php
							$this->print_unescaped_setting( 'tab_title', 'tabs', $index );
						?></a>
            </<?php Utils::print_validated_html_tag( $settings['title_html_tag'] ); ?>>
            <ul <?php $this->print_render_attribute_string( $tab_content_setting_key ); ?>>
                <div class="apicbase-content-wrap">
                    <?php $this->print_text_editor( $item['tab_content'] );?>
                    <?php if ( $item['button_text'] !== '' ) : ?>
                    <a class="apic-elmentor-accordion-button"
                        <?php $this->print_render_attribute_string( 'button_link_' . $item['_id'] ); ?>><?php echo esc_html( $item['button_text'] ); ?>
                        <?php if ( Icons_Manager::is_migration_allowed() && ! empty( $settings['button_icon']['value'] )) : ?>
                        <?php Icons_Manager::render_icon( $settings['button_icon'] ); ?>
                        <?php endif; ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php if ( ! empty( $item['thumbnail'] ) ) : ?>
                <div class="apicbase-image-wrap">
                    <img src="<?php echo esc_url($item['thumbnail']['url']); ?>" alt="">
                </div>
                <?php endif; ?>
            </ul>
        </li>
        <?php endforeach; ?>
    </ul>

</div>
<?php
	}

}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Accordion_Widget() );