<?php

/**
 * Skin for the ProWPTheme: Blog Element
 */


	class ProWPTheme_Polmo_Lite_Blog_Skin_2 extends Elementor\Skin_Base {
		
		public function __construct( Elementor\Widget_Base $parent ) {
			parent::__construct( $parent );
			add_action( 'elementor/element/polmo-lite-blog/section_style_content/after_section_start', [ $this, 'register_controls' ] );
		}
     
		public function get_id() {
			return 'polmo_lite_blog_skin_2';
		}

		public function get_title() {
			return __( 'Style 3', 'polmo-lite' );
		}

		public function register_controls( $controls ) {


			//Cat
			$controls->add_control(
				'heading_s2_cat',
				[
					'label' => __( 'Category', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'_skin' => $this->get_id(),
					],					
				]
			);
			$controls->add_control(
				'cat_s2_color',
				[
					'label' => __( 'Color', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .polmo-lite-blog .first-cat' => 'color: {{VALUE}};',
						'{{WRAPPER}} .polmo-lite-blog .sol' => 'color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_1,
					],
					'condition' => [
						'_skin' => $this->get_id(),
					],				
				]
			);		


			//Comments
			$controls->add_control(
				'heading_s2_comments',
				[
					'label' => __( 'Comments', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'_skin' => $this->get_id(),
					],					
				]
			);
			$controls->add_control(
				'comments_s2_color',
				[
					'label' => __( 'Color', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .polmo-lite-blog .comments-number' => 'color: {{VALUE}};',
					],
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_1,
					],
					'condition' => [
						'_skin' => $this->get_id(),
					],				
				]
			);	



		}

		public function render() {
			$settings = $this->parent->get_settings();

		$cats = is_array( $settings['categories'] ) ? implode( ',', $settings['categories'] ) : $settings['categories'];

		$query = new \WP_Query( array(
			'posts_per_page'      => $settings['number'],
			'no_found_rows'       => true,
			'post_stairis'         => 'publish',
			'ignore_sticky_posts' => true,
			'cat' 			      => $cats
		) ); ?>

		<div class="polmo-lite-blog <?php echo $this->get_id(); ?>">
			<div class="row">	
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-md-4">
						<div class="post-item">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium' ); ?>
							<?php endif; ?>					
							<div class="post-content">	
								<?php polmo_lite_posted_on(); ?>
								<span class="sol">&sol;</span>
								<?php polmo_lite_first_category(); ?>
								<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
								<?php polmo_lite_first_category(); ?>
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

	}

add_action( 'elementor/widget/polmo-lite-blog/skins_init', function( $widget ) {
   $widget->add_skin( new ProWPTheme_Polmo_Lite_Blog_Skin_2( $widget ) );
} );