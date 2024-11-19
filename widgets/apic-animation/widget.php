<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register the widget
class Apic_Animation_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'apic_animation';
    }

    public function get_title() {
        return __( 'APIC Animation', 'hello-elementor' );
    }

    public function get_icon() {
        return 'eicon-elementor-circle';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'imageTitle',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'normalImage',
			[
				'label' => esc_html__( 'Normal Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'activeImage',
			[
				'label' => esc_html__( 'Active Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Images', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ imageTitle }}}',
			]
		);
        

        $this->end_controls_section();
        
        // style controls section 
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'textdomain' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .heading_title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => esc_html__( 'Heading Typography', 'textdomain' ),
                'selector' => '{{WRAPPER}} .heading_title',
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // echo '<pre>';
        // print_r($settings['list']);
        // echo '</pre>';
        ?>
<div class="heading_wrapper">
    <h2 class="heading_title">
        <?php echo $settings['title']; ?>
    </h2>

    <!-- Dynamic Fetch Data -->
    <?php if( !empty( $settings['list'] ) ) {
        ?>
    <div class="animationbox-grid-wrap">
        <div class="animationbox-grid">


            <svg class="svg svg-apic1" style="width: 194px; height: 4px">
                <defs>
                    <linearGradient id="Sticky-BillingInvoicingConnectionGradient" gradientUnits="userSpaceOnUse" x1="3"
                        x2="97" y1="33" y2="67">
                        <stop offset="0" stop-color="#FFD848"></stop>
                        <stop offset="1" stop-color="#00D924"></stop>
                    </linearGradient>
                </defs>
                <path stroke="url(#Sticky-BillingInvoicingConnectionGradient)" stroke-width="2" fill="none"
                    d="M1,1 L193,1" style="stroke-dasharray: 0 192px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic10" style="width: 104px; left: 222px; top: 257px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-PaymentsTerminalConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient" data-js-start-rotation=""
                        data-js-speed="" x1="0.07293071046156285" x2="99.92706928953848" y1="47.300416299199554"
                        y2="52.699583700799906">
                        <stop offset="0" stop-color="#11EFE3"></stop>
                        <stop offset="1" stop-color="#9966FF"></stop>
                    </linearGradient>
                </defs>
                <path stroke="url(#Sticky-PaymentsTerminalConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,1
                  L1,103" style="stroke-dasharray: 0 102px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic5" style="left: 81px; top: 257px; width: 135px; height: 53px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-PaymentsConnectConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient"
                        data-js-start-rotation="180" data-js-speed="" x1="99.92706928953848" x2="0.07293071046154154"
                        y1="47.300416299200435" y2="52.6995837008001">
                        <stop offset="0" stop-color="#11EFE3"></stop>
                        <stop offset="1" stop-color="#0073E6"></stop>
                    </linearGradient>
                </defs>
                <path stroke="url(#Sticky-PaymentsConnectConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M134,1
                  L134,32
                  Q134,52
                  114,52
                  L1,52" style="stroke-dasharray: 0 176.464px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic12" style="left: 394px; top: 167px; width: 12px; height: 194px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-IssuingCapitalConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient"
                        data-js-start-rotation="-30" data-js-speed="" x1="94.64894717039655" x2="5.351052829718817"
                        y1="27.495077947810238" y2="72.50492205241866">
                        <stop offset="0" stop-color="#0073e6"></stop>

                        <stop offset="1" stop-color="#ff80ff"></stop>
                    </linearGradient>
                </defs>

                <path stroke="url(#Sticky-IssuingCapitalConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,193 L1,1"
                    style="stroke-dasharray: 0 192px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic7" style="left: 402px; top: 218px; width: 45px; height: 143px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-IssuingTreasuryConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient" data-js-start-rotation=""
                        data-js-speed="" x1="44.16212964284276" x2="55.83787035717364" y1="99.65802321572039"
                        y2="0.34197678428154177">
                        <stop offset="0" stop-color="#0073e6"></stop>

                        <stop offset="1" stop-color="#ff80ff"></stop>
                    </linearGradient>
                </defs>

                <path stroke="url(#Sticky-IssuingTreasuryConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,142
                              L1,21
                              Q1,1 21,1
                              L44,1" style="stroke-dasharray: 0 176.465px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic8" style="left: 38px; top: 347px; width: 143px; height: 53px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-ConnectTerminalConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient" data-js-start-rotation=""
                        data-js-speed="" x1="78.04640039929177" x2="21.953599600721894" y1="91.39322921254883"
                        y2="8.606770787441903">
                        <stop offset="0" stop-color="#11efe3"></stop>

                        <stop offset="1" stop-color="#9966ff"></stop>
                    </linearGradient>
                </defs>

                <path stroke="url(#Sticky-ConnectTerminalConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,1
                              L1,32
                              Q1,52
                              21,52
                              L142,52" style="stroke-dasharray: 0 184.464px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic9" style="left: 218px; top: 257px; width: 53px; height: 53px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-PaymentsRadarConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient" data-js-start-rotation=""
                        data-js-speed="" x1="7.286128415035414" x2="92.71387158497316" y1="75.99086713103576"
                        y2="24.00913286897835">
                        <stop offset="0" stop-color="#ff5996"></stop>

                        <stop offset="1" stop-color="#9966ff"></stop>
                    </linearGradient>
                </defs>

                <path stroke="url(#Sticky-PaymentsRadarConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,1
                              L1,32
                              Q1,52
                              21,52
                              L52,52" style="stroke-dasharray: 0 94.4645px; stroke-dashoffset: 0"></path>
            </svg>
            <svg class="svg svg-apic0" style="left: 218px; top: 77px; width: 4px; height: 104px">
                <defs>
                    <linearGradient class="RotatingGradient" id="Sticky-PaymentsTaxConnectionGradient"
                        gradientUnits="userSpaceOnUse" data-js-controller="RotatingGradient" data-js-start-rotation=""
                        data-js-speed="" x1="57.02346196123593" x2="42.97653803874772" y1="0.4957478384020817"
                        y2="99.50425216159559">
                        <stop offset="0" stop-color="#ff5996"></stop>

                        <stop offset="1" stop-color="#9966ff"></stop>
                    </linearGradient>
                </defs>

                <path stroke="url(#Sticky-PaymentsTaxConnectionGradient)" stroke-width="2" fill="none"
                    data-js-target="HomepageFrontdoorConnection.path" d="M1,103 L1,1"
                    style="stroke-dasharray: 0 102px; stroke-dashoffset: 0"></path>
            </svg>
            <?php foreach ($settings['list'] as $key => $value) { 
            ?>
            <div id="apic<?php echo esc_attr($key);?>" class="animationbox-box"
                style="grid-area: apic<?php echo esc_attr($key);?>">
                <a class="Link animationbox-box__link" href="/apic<?php echo esc_attr($key);?>">
                    <div class="animationbox-box__icon">
                        <div class="animationbox-box__iconLogo border-icon">
                            <svg class="animationbox-boxOutline" width="42" height="42" viewBox="0 0 42 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.5137 1.30316C22.5148 1.30316 23.4298 1.86935 23.8765 2.76525L32.0899 19.1921L40.7424 36.5031C41.1523 37.3223 41.1089 38.2954 40.6276 39.0748C40.2746 39.6464 39.723 40.0543 39.0927 40.2312L38.9189 40.2735C38.8019 40.2979 38.6826 40.3146 38.5618 40.3229L38.3796 40.3293L21.5137 36.9756L10.9375 19.1921L19.1509 2.76525C19.5976 1.86935 20.5126 1.30316 21.5137 1.30316Z"
                                    stroke="#C4CCD8"></path>
                                <path
                                    d="M21.512 1.30316C22.5131 1.30316 23.4281 1.86935 23.8748 2.76525L32.0883 19.1921L21.512 36.9756L4.64618 40.3293C3.73009 40.3293 2.87951 39.8543 2.39818 39.0748C1.91685 38.2954 1.87341 37.3223 2.28337 36.5031L10.9358 19.1921L19.1492 2.76525C19.5959 1.86935 20.5109 1.30316 21.512 1.30316Z"
                                    stroke="#C4CCD8"></path>
                            </svg>
                        </div>
                        <div class="animationbox-box__iconLogo color-icon">
                            <svg class="ProductIcon ProductIcon--apic<?php echo esc_attr($key);?>" width="40"
                                height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#product-icon-apic<?php echo esc_attr($key);?>-Sticky-a)">
                                    <path
                                        d="M20.51.3c1 0 1.92.57 2.36 1.47l8.22 16.42 8.65 17.31a2.64 2.64 0 0 1-1.65 3.73l-.17.04c-.12.03-.24.04-.36.05h-.18L20.5 35.99 9.94 18.19l8.2-16.42A2.64 2.64 0 0 1 20.52.3z"
                                        fill="#FB0"></path>
                                    <path
                                        d="M20.51.3c1 0 1.92.57 2.36 1.47l8.22 16.42L20.5 35.98 3.65 39.33a2.64 2.64 0 0 1-2.37-3.83l8.66-17.3 8.2-16.43A2.64 2.64 0 0 1 20.52.3z"
                                        fill="url(#product-icon-apic<?php echo esc_attr($key);?>-Sticky-b)"></path>
                                    <path
                                        d="M20.51.3c1 0 1.92.57 2.36 1.47l8.22 16.42L20.5 35.98 9.94 18.19l8.2-16.42A2.64 2.64 0 0 1 20.34.3h.18z"
                                        fill="url(#product-icon-apic<?php echo esc_attr($key);?>-Sticky-c)"></path>
                                </g>
                                <defs>
                                    <linearGradient id="product-icon-apic<?php echo esc_attr($key);?>-Sticky-b"
                                        x1="16.03" y1="18.01" x2="15.94" y2="39.33" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD748"></stop>
                                        <stop offset=".54" stop-color="#FFCD48"></stop>
                                        <stop offset="1" stop-color="#FFCB48"></stop>
                                    </linearGradient>
                                    <linearGradient id="product-icon-apic<?php echo esc_attr($key);?>-Sticky-c"
                                        x1="20.51" y1="34.72" x2="20.51" y2="15.01" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFAD00"></stop>
                                        <stop offset="1" stop-color="#FF7600"></stop>
                                    </linearGradient>
                                    <clipPath id="product-icon-apic<?php echo esc_attr($key);?>-Sticky-a">
                                        <path fill="#fff" d="M0 0h40v40H0z"></path>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <span class="animationbox-box__label" data-js-target="animationbox-box.label">
                            <?php echo 'apic'.esc_html($key);?>
                        </span>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php
     }?>
</div>

<?php
    }
}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Animation_Widget() );