<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blog block
 *
 * @since 1.0.0``
 */
class ProWPTheme_Blog extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'polmo-lite-blog';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'ProWPTheme: Blog', 'polmo-lite' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the icon list widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'pwpt-elements' ];
	}	

	/**
	 * Register blog widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_blog_settings',
			[
				'label' => __( 'Blog', 'polmo-lite' ),
			]
		);

		$cats_array = $this->prepare_cats_for_select();

		$this->add_control(
			'categories',
			[
				'label' => __( 'Select your categories', 'polmo-lite' ),
				'type' => Controls_Manager::SELECT2,
				'dynamic' => [
					'active' => true,
				],
				'options' => $cats_array,
				'multiple' => true
			]
		);

		$this->add_control(
			'number',
				[
				'label'   => __( 'Number of posts', 'polmo-lite' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 24,
				'step'    => 1,
				]
		);			

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'polmo-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Post Title', 'polmo-lite' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'polmo-lite' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .entry-title a' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .pwpt-blog .entry-title a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
		//End title

		//Date
		$this->add_control(
			'heading_date',
			[
				'label' => __( 'Date', 'polmo-lite' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' => __( 'Color', 'polmo-lite' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .posted-on a, {{WRAPPER}} .pwpt-blog .posted-on' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_control(
			'date_bg_color',
			[
				'label' => __( 'Background color', 'polmo-lite' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .posted-on' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'condition' => [
					'_skin' => 'polmo_lite_blog_skin_4',
				],					
			]
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .pwpt-blog .posted-on a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);
		//End date


		//Cat
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'polmo-lite' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'_skin' => '',
				],					
			]
		);

		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'polmo-lite' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .first-cat' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'_skin' => '',
				],				
			]
		);

		$this->add_control(
			'cat_bg_color',
			[
				'label' => __( 'Background color', 'polmo-lite' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .first-cat' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'condition' => [
					'_skin' => '',
				],					
			]
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .pwpt-blog .posted-on a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'_skin' => '',
				],					
			]
		);
		//End cat		

		//Author
		$this->add_control(
			'heading_author',
			[
				'label' => __( 'Author', 'polmo-lite' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'_skin' => '',
				],				
			]
		);

		$this->add_control(
			'author_color',
			[
				'label' => __( 'Color', 'polmo-lite' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pwpt-blog .byline a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'_skin' => '',
				],					
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'selector' => '{{WRAPPER}} .pwpt-blog .byline',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'condition' => [
					'_skin' => '',
				],					
			]
		);
		//End Author		



		$this->end_controls_section();
	}

	/**
	 * Render blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();

		$cats = is_array( $settings['categories'] ) ? implode( ',', $settings['categories'] ) : $settings['categories'];

		$query = new \WP_Query( array(
			'posts_per_page'      => $settings['number'],
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'cat' 			      => $cats
		) ); ?>

		<div class="pwpt-blog">
			<div class="row">	
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-md-4 col-sm-6">
						<div class="post-item">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium' ); ?>
							<?php endif; ?>					
							<div class="post-content">	
								<?php polmo_lite_posted_on(); ?>
								<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
								<?php polmo_lite_first_category(); ?>
								<?php polmo_lite_posted_by(); ?>
							</div>	
						</div>				
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
			endif; ?>
			</div>
		</div>	
		<?php
	}

	/**
	 * Prepare posts to be used in the SELECT2 field
	 */
	private function prepare_cats_for_select() {

		$categories = get_categories();

		$options = ['' => ''];

		foreach ( $categories as $cat ) {
			$options[$cat->term_id] = $cat->name;
		}

		return $options;
	}	

}

Plugin::instance()->widgets_manager->register_widget_type( new ProWPTheme_Blog() );