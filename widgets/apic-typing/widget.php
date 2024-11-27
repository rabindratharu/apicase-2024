<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register the widget
class Apic_Typing_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'apic_typing';
    }

    public function get_title() {
        return __( 'APIC Typing', 'hello-elementor' );
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
				'label' => esc_html__( 'Content', 'hello-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'hello-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'hello-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'hello-elementor' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
			]
        );

        $this->end_controls_section();
        
        // style controls section 
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__( 'Style', 'hello-elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__( 'Heading Color', 'hello-elementor' ),
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
                'label' => esc_html__( 'Heading Typography', 'hello-elementor' ),
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
<div class="code_wrapper">
    <div id="editor-container">
        <pre class="language-js line-numbers">
    <code id="code-content" class="language-js "></code>
  </pre>
        <ul id="autocomplete-box" class="autocomplete hidden"></ul>
    </div>
</div>

<?php
    }
}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Typing_Widget() );