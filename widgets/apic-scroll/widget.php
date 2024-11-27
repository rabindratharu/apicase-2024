<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register the widget
class Apic_Scroll_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'apic_scroll';
    }

    public function get_title() {
        return __( 'APIC Scroll Image', 'hello-elementor' );
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
			'direction',
			[
                'label'     => esc_html__( 'Direction', 'hello-elementor' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => [
					'left'    => esc_html__( 'Left', 'hello-elementor' ),
					'right'   => esc_html__( 'Right', 'hello-elementor' ),
                ],
			]
		);
        $this->add_control(
			'speed',
			[
				'label' => esc_html__( 'Speed', 'hello-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'slow',
				'options'   => [
					'slow'      => esc_html__( 'Slow', 'hello-elementor' ),
					'fast'      => esc_html__( 'Fast', 'hello-elementor' ),
                ],
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'hello-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Logo' , 'hello-elementor' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'hello-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'imageLink',
            [
                'label' => __( 'Link', 'hello-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'hello-elementor' ),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
            ]
		);
        $this->add_control(
			'slideImages',
			[
				'label' => esc_html__( 'Slide Images', 'hello-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
        

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
<div class="apic-image-scroll-wrapper">
    <!-- Dynamic Fetch Data -->
    <?php if( !empty( $settings['slideImages'] ) ) { ?>
    <div class="slider-main-wrap">
        <div class="slider-logo-anim scroller" data-direction="<?php echo esc_attr( $settings['direction'] ); ?>"
            data-speed="<?php echo esc_attr( $settings['speed'] ); ?>">
            <ul class="slider-logo-anim-inner scroller__inner">
                <?php foreach( $settings['slideImages'] as $item ) { 
                    if( !empty( $item['image']['url'] ) ) {

                        $this->add_render_attribute(
                            'scroll_image_link_' . $item['_id'],
                            'href',
                            $item['imageLink']['url']
                        );

                        if ( $item['imageLink']['is_external'] ) {
                            $this->add_render_attribute( 'scroll_image_link_' . $item['_id'], 'target', '_blank' );
                        }

                        if ( $item['imageLink']['nofollow'] ) {
                            $this->add_render_attribute( 'scroll_image_link_' . $item['_id'], 'rel', 'nofollow' );
                        }
                    ?>
                <li>
                    <a <?php $this->print_render_attribute_string( 'scroll_image_link_' . $item['_id'] ); ?>>
                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
                    </a>
                </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
</div>

<?php
    }
}

// Register Widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Apic_Scroll_Widget() );