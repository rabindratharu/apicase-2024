<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor slider widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * slider style, showing only one item at a time.
 *
 * @since 1.0.0
 */
class Apic_Slider_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'apic_slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'APIC Slider', 'elementor' );
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
				'label' => esc_html__( 'Slider', 'elementor' ),
			]
		);
		$this->add_control(
			'Heading',
			[
				'label' => esc_html__( 'Heading', 'hello-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Modules:', 'hello-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'tab_icon',
			[
				'label' 		=> esc_html__( 'Icon', 'elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' 			=> 'inline',
				'label_block' 	=> false,
			]
		);
		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'elementor' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Sib Title', 'elementor' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Content', 'elementor' ),
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
				'label' => esc_html__( 'Slider Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__( 'Slide #1', 'elementor' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'tab_title' => esc_html__( 'Slide #2', 'elementor' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-slider .apicbase-slider-module' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .apic-elmentor-slider .apicbase-slider-module',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_responsive_control(
			'heading_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-slider .apicbase-slider-module' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .apicbase-thumbnail-img' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .apicbase-thumbnail-img svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .swiper-slide-active .apicbase-thumbnail-img' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .swiper-slide-active .apicbase-thumbnail-img svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .apicbase-thumbnail-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .elementor-slide-title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .apicbase-tab-slider-thumbnail .elementor-slide-title',
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
					'{{WRAPPER}} .apicbase-tab-slider-thumbnail .elementor-slide-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap:not({{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap .apicbase-tab-btn)' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap:not({{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap .apicbase-tab-btn)',
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
					'{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap .apicbase-tab-btn' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap .apicbase-tab-btn',
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
					'{{WRAPPER}} .apicbase-tab-slider .swiper-slide-apicbase-tab-content-wrap .apicbase-tab-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render slider widget output on the frontend.
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
<div class="apic-elmentor-slider">
    <!-- Dynamic Fetch Data -->
    <?php if( !empty( $settings['tabs'] ) ) { ?>
    <div class="swiper-container slider apicbase-tab-slider">
        <div class="swiper-wrapper">
            <?php foreach( $settings['tabs'] as $index => $item ) {
				
				$slide_count = $index + 1;

					
					$slide_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );

					$this->add_render_attribute( $slide_content_setting_key, [
						'id' => 'elementor-slide-content-' . $id_int . $slide_count,
						'class' => [ 'elementor-slide-content' ],
						'data-tab' => $slide_count,
						'role' => 'region',
						'aria-labelledby' => 'elementor-slide-desc-' . $id_int . $slide_count,
					] );

					$this->add_inline_editing_attributes( $slide_content_setting_key, 'advanced' );

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
            <div class="swiper-slide">
                <div class="apicbase-tab-slider-item">
                    <div class="swiper-slide-apicbase-tab-content-wrap">
                        <?php $this->print_text_editor( $item['tab_content'] );?>
                        <?php if ( $item['button_text'] !== '' ) : ?>
                        <a class="apicbase-tab-btn"
                            <?php $this->print_render_attribute_string( 'button_link_' . $item['_id'] ); ?>><?php echo esc_html( $item['button_text'] ); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php if ( ! empty( $item['thumbnail'] ) ) : ?>
                    <div class="swiper-slide-apicbase-tab-main-img">
                        <img src="<?php echo esc_url($item['thumbnail']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <h4 class="apicbase-slider-module">Modules:</h4>

    <!-- Thumbnail Fetch Data -->
    <div class="swiper-container slider-thumbnail apicbase-tab-slider-thumbnail">
        <div class="swiper-wrapper">
            <?php foreach( $settings['tabs'] as $index => $item ) {
				$slide_count = $index + 1;
				$slide_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );
				$this->add_render_attribute( $slide_title_setting_key, [
					'id' => 'elementor-slide-title-' . $id_int . $slide_count,
					'class' => [ 'elementor-slide-title' ],
					'data-tab' => $slide_count,
					'role' => 'button',
					'aria-controls' => 'elementor-slide-content-' . $id_int . $slide_count,
					'aria-expanded' => 'false',
				] );
				?>
            <div class="swiper-slide">
                <div class="apicbase-tab-slider-thumbnail-content">
                    <?php if ( Icons_Manager::is_migration_allowed() && ! empty( $item['tab_icon']['value'] )) : ?>
                    <span class="apicbase-thumbnail-img">
                        <?php Icons_Manager::render_icon( $item['tab_icon'] ); ?>
                    </span>
                    <?php endif; ?>


                    <?php if ( $item['tab_title'] !== '' ) : ?>
                    <h6 <?php $this->print_render_attribute_string( $slide_title_setting_key ); ?>>
                        <?php $this->print_unescaped_setting( 'tab_title', 'tabs', $index );?></h6>
                    <?php endif; ?>

                    <?php if ( $item['tab_sub_title'] !== '' ) : ?>
                    <p class="apicbase-tab-sub-title">
                        <?php $this->print_unescaped_setting( 'tab_sub_title', 'tabs', $index );?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
			} ?>
        </div>
    </div>

    <?php } ?>
</div>
<?php
	}
}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Slider_Widget() );