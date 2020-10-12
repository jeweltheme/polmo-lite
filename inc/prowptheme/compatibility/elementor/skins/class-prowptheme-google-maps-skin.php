<?php
/**
 * Custom skin for the Google Maps block
 */

	class ProWPTheme_Google_Maps_Skin extends Elementor\Skin_Base {
		
		public function __construct( Elementor\Widget_Base $parent ) {
			parent::__construct( $parent );
			add_action( 'elementor/element/google_maps/section_map/before_section_end', [ $this, 'register_controls' ] );
			add_action( 'elementor/element/google_maps/section_map/after_section_start', [ $this, 'register_skin_controls' ] );
		}
     
		public function get_id() {
			return 'polmo_lite_google_maps';
		}

		public function get_title() {
			return __( 'ProWPTheme Map', 'polmo-lite' );
		}

		public function register_controls( $controls ) {
				$controls->remove_control( 'address' );

				$default_address = __( 'London Eye, London, United Kingdom', 'polmo-lite' );

				$controls->add_control(
					'address',
					[
						'label' => __( 'Address', 'polmo-lite' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'condition' => [
							'_skin' => '',
						],							
						'placeholder' => $default_address,
						'default' => $default_address,
						'label_block' => true,
					]
				);
		}
		
		public function register_skin_controls( $controls ) {
		
			$controls->add_control(
				'important_note',
				[
					'label' => '<strong>' . __( 'Note', 'polmo-lite' ) . '</strong>',
					'condition' => [
						'_skin' => $this->get_id(),
					],							
					'type' => \Elementor\Controls_Manager::RAW_HTML,
					'raw' => sprintf( __( 'Please go here %s to find the latitude and longitute for your address.', 'polmo-lite' ), '<a target="_blank" href="https://www.latlong.net/convert-address-to-lat-long.html">' . __( 'here', 'polmo-lite' ) . '</a>'),
					'content_classes' => 'your-class',
				]
			);

			$controls->add_control(
				'api_key',
				[
					'label' => __( 'API key', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'condition' => [
						'_skin' => $this->get_id(),
					],
					'description' => sprintf( __( 'Please go here %s to get your Google Maps API Key.', 'polmo-lite' ), '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . __( 'here', 'polmo-lite' ) . '</a>'),
					'placeholder' => '',
					'default' => '',
					'label_block' => true,
				]
			);

			$controls->add_control(
				'lat',
				[
					'label' => __( 'Latitude', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'condition' => [
						'_skin' => $this->get_id(),
					],							
					'placeholder' => '',
					'default' => '40.712775',
					'label_block' => true,
				]
			);
			$controls->add_control(
				'long',
				[
					'label' => __( 'Longitude', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'condition' => [
						'_skin' => $this->get_id(),
					],							
					'placeholder' => '',
					'default' => '-74.005973',
					'label_block' => true,
				]
			);

			$controls->add_control(
				'marker',
				[
					'label' => __( 'Marker', 'polmo-lite' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'condition' => [
						'_skin' => $this->get_id(),
					],							
					'placeholder' => '',
					'default' => get_stylesheet_directory_uri() . '/images/icon.png',
					'label_block' => true,
				]
			);

		}
		

		public function render() {
			$settings = $this->parent->get_settings();

			if ( empty( $settings['address'] ) ) {
				return;
			}

			if ( 0 === absint( $settings['zoom']['size'] ) ) {
				$settings['zoom']['size'] = 10;
			}

			?>
		
		<div id="polmo-lite-map"></div>
		
        <script type="text/javascript">

            function init() {

                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: <?php echo $settings['zoom']['size']; ?>,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(<?php echo $settings['lat']; ?>, <?php echo $settings['long']; ?>), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"sairiration":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                };

                var mapElement = document.getElementById('polmo-lite-map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $settings['lat']; ?>, <?php echo $settings['long']; ?>),
                    map: map,
                    icon: "<?php echo $settings['marker']; ?>",
                });


			}

        </script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( $settings['api_key'] ); ?>&callback=init"></script> <?php // phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedScript ?>

        <style type="text/css">
            #polmo-lite-map {
								width: 100%;
								height: 560px;
            }
        </style>

<?php


    }

  }

add_action( 'elementor/widget/google_maps/skins_init', function( $widget ) {
   $widget->add_skin( new ProWPTheme_Google_Maps_Skin( $widget ) );
} );







