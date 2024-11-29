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

	/**
	 * Get widget icon.
	 *
	 * Retrieve slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'slider', 'carasoul' ];
	}

	/**
	 * Register slider widget controls.
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

		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' 		=> esc_html__( 'Icon', 'elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' 			=> 'inline',
				'label_block' 	=> false,
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'elementor' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'separator' 	=> 'before',
			]
		);
		$repeater->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Sub Title', 'elementor' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'separator' 	=> 'before',
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Content', 'elementor' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' 	=> 'before',
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'elementor' ),
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More', 'elementor' ),
				'label_block' => true,
				'separator' 	=> 'before',
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
				'separator' 	=> 'before',
            ]
		);
		$repeater->add_control(
			'thumbnail',
			[
				'label' => esc_html__( 'Thumbnail', 'hello-elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__( 'Slider Items', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' 	=> esc_html__( 'Recipes', 'elementor' ),
						'sub_title' 	=> esc_html__( 'Build & store data-rich recipes', 'elementor' ),
						'buttton_text' 	=> esc_html__( 'Tell me more', 'elementor' ),
						'content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'title' 	=> esc_html__( 'Menus', 'elementor' ),
						'sub_title' 	=> esc_html__( 'Data-driven menu engineering', 'elementor' ),
						'buttton_text' 	=> esc_html__( 'Tell me more', 'elementor' ),
						'content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'title' 	=> esc_html__( 'Analytics & Dashboards', 'elementor' ),
						'sub_title' 	=> esc_html__( 'Monitor performance across outlets', 'elementor' ),
						'buttton_text' 	=> esc_html__( 'Tell me more', 'elementor' ),
						'content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
					[
						'title' 	=> esc_html__( 'Carbon Tracking', 'elementor' ),
						'sub_title' 	=> esc_html__( 'Track & report on CO2 emissions ', 'elementor' ),
						'buttton_text' 	=> esc_html__( 'Tell me more', 'elementor' ),
						'content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'title_field' => '{{{ title }}}',
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
					'{{WRAPPER}} .apic-elmentor-slider-item' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-slider-item' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .apic-elmentor-slider-title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .apic-elmentor-slider-title',
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
					'{{WRAPPER}} .apic-elmentor-slider-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .apic-elmentor-slider-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apic-elmentor-slider-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .apic-elmentor-slider-item.elementor-active .apic-elmentor-slider-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .apic-elmentor-slider-item.elementor-active .apic-elmentor-slider-icon svg' => 'fill: {{VALUE}};',
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
					'{{WRAPPER}} .apic-elmentor-slider-item .elementor-slide-title' => 'gap: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-slide-content .apicbase-content-wrap' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elementor-slide-content .apicbase-content-wrap:not({{WRAPPER}} .elementor-slide-content .apicbase-content-wrap .apic-elmentor-slider-button)',
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
					'{{WRAPPER}} .elementor-slide-content .apicbase-content-wrap:not({{WRAPPER}} .elementor-slide-content .apicbase-content-wrap .apic-elmentor-slider-button)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .elementor-slide-content .apic-elmentor-slider-button' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elementor-slide-content .apic-elmentor-slider-button' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .elementor-slide-content .apic-elmentor-slider-button',
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
					'{{WRAPPER}} .elementor-slide-content .apic-elmentor-slider-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
<!-- スライダー -->
<div class="swiper-container slider apicbase-tab-slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-item">
                <div class="swiper-slide-apicbase-tab-content-wrap">
                    <p>
                        Schedule menu-cycles, automate procurement orders, and generate production plans.
                    </p>
                    <p>
                        <a href="#" class="apicbase-tab-btn">Tell me more</a>
                    </p>
                </div>
                <div class="swiper-slide-apicbase-tab-main-img">
                    <img src="//into-the-program.com/demo/images/sample010.jpg" alt="">
                </div>
            </div>

        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- サムネイル -->
<div class="swiper-container slider-thumbnail apicbase-tab-slider-thumbnail">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="apicbase-tab-slider-thumbnail-content">
                <div class="apicbase-thumbnail-img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path
                            d="M8.86867 19.1716C8.80121 19.107 8.66923 18.7805 8.67314 18.6759C8.7054 17.7011 10.2755 17.9632 10.3938 17.4675L10.3645 13.7152C10.3088 13.418 9.61463 13.4268 9.30569 13.3095C4.72629 11.577 4.9668 4.96897 9.642 3.71756C10.2863 3.54549 11.5426 3.65401 11.873 3.50443C12.1233 3.39102 13.2535 2.13374 13.7003 1.81208C17.8173 -1.1571 23.3558 -0.428733 26.4159 3.63934C32.7345 2.35469 35.2178 11.3326 29.0829 13.3818C28.8512 13.459 28.1766 13.4972 28.1131 13.6898L28.117 17.5721C28.2372 17.9241 29.7008 17.6288 29.5679 18.6514C29.517 19.0464 29.2296 19.2156 28.8512 19.1931C28.0368 19.1452 26.628 18.6729 25.6924 18.5302C21.2538 17.8507 15.1746 17.838 10.7986 18.8558C10.3205 18.9672 9.25289 19.5372 8.86867 19.1725V19.1716ZM11.6785 13.5265V17.3394C16.6832 16.5905 21.8492 16.5025 26.8323 17.4372V11.0334C26.8323 10.7705 27.3182 10.5681 27.5666 10.5847C28.3536 10.6375 28.0349 11.5976 28.1033 12.1118C28.1229 12.2546 28.0476 12.2751 28.2441 12.2516C29.7663 12.0747 31.1722 10.4664 31.3179 8.96861C31.7177 4.84676 26.1402 3.23557 24.2875 6.82654C23.9736 7.43465 23.9531 8.71833 22.9432 8.27936C22.3879 8.03787 22.8327 6.91551 23.0018 6.51858C23.3157 5.78239 23.8377 5.15375 24.439 4.63168C24.7176 4.39019 25.1527 4.36966 24.9572 4.01281C24.6091 3.37635 23.1964 2.36251 22.5286 2.04086C18.6317 0.162756 13.2564 2.1484 11.7978 6.26536C11.5846 6.86565 11.5768 8.22461 10.7595 8.1503C9.52273 8.0369 10.7409 5.46172 10.9931 4.82721C7.96433 4.92498 6.20648 8.16986 7.98095 10.7235C8.98795 12.1724 10.8905 12.6798 12.5291 11.9837C12.9886 11.7882 14.0757 10.7157 14.4619 11.5751C14.9175 12.5889 12.4557 13.5187 11.6785 13.5285V13.5265Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M22.825 31.8108L23.8535 32.3935C24.6318 32.8921 25.3142 33.6254 25.6769 34.4809C26.1657 35.6335 26.6986 38.4697 24.5809 37.9232C23.6912 37.6935 21.9784 35.5622 21.3615 34.7878C20.8863 34.1915 20.3721 33.2539 19.8744 32.7553C19.807 32.6878 19.7913 32.5549 19.6476 32.593C18.3678 34.037 17.1184 35.7509 15.6343 36.9886C11.9289 40.0829 11.7207 35.2835 13.8412 33.2402C14.4366 32.6663 15.2061 32.2361 15.9794 31.9575C15.8904 31.8128 15.7673 31.8421 15.6372 31.8108C14.0759 31.4276 12.6319 31.2731 11.0666 30.711C10.7831 30.6093 10.0019 30.3571 9.82499 30.1928C9.36548 29.7656 9.70473 28.9952 10.3559 29.0665C15.0966 30.9701 20.331 31.2379 25.2868 30.0227C25.8392 29.8868 28.2462 28.9942 28.5072 29.0274C29.2063 29.1164 29.2522 29.9807 28.6167 30.3219C28.0546 30.624 26.8413 30.9417 26.1872 31.1187C25.0795 31.4188 23.9542 31.6251 22.8231 31.8118L22.825 31.8108ZM17.7402 32.7875C15.779 33.1063 13.7024 34.3772 13.8305 36.5985C13.9107 36.6923 14.7524 36.009 14.859 35.9171C15.8904 35.0313 16.8789 33.8395 17.7402 32.7866V32.7875ZM24.8772 36.5007C24.6934 34.6647 23.4195 33.0916 21.5531 32.8853C22.3274 33.8082 23.003 34.8592 23.8496 35.7205C23.9689 35.8418 24.7559 36.6053 24.8772 36.5007Z"
                            fill="#FCC11A"></path>
                        <path
                            d="M11.4588 19.807C11.622 19.9703 11.7247 21.737 11.8039 22.1505C12.1402 23.9025 13.0387 25.3846 14.2735 26.6253C18.626 30.9994 25.4824 28.0322 26.7651 22.2111C26.8844 21.6685 26.9323 20.1492 27.1161 19.8481C27.338 19.4854 28.1622 19.633 28.2737 20.246C28.5396 21.7096 27.4358 24.5311 26.6165 25.7777C22.0811 32.679 12.6241 30.7452 10.6492 22.9131C10.5026 22.3304 10.1604 20.4826 10.3804 20.0026C10.5368 19.6604 11.2173 19.5646 11.4578 19.807H11.4588Z"
                            fill="#FCC11A"></path>
                    </svg>
                </div>
                <h6>HACCP & Tasks</h6>
                <span>Maintain compliance </span>
            </div>
        </div>
    </div>
</div>


<?php
	}
}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Slider_Widget() );