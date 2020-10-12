<?php 
$polmo_lite_map_contact_heading = get_theme_mod('polmo_lite_map_contact_heading',__('<span>Contact</span> With Us','polmo-lite'));
$polmo_lite_map_contact_shortcode = get_theme_mod('polmo_lite_map_contact_shortcode',__('[contact-form-7 id="1234" title="Contact form 1"]','polmo-lite'));
?>

  <section id="contact" class="contact">
    <div class="contact-inner">
      <div id="google-map" class="google-map">
        <div id="googleMaps" class="google-map-container"></div>
      </div><!-- /#google-map -->

      <div class="form-area text-center wow animated fadeInRight" data-wow-delay=".75s">
        <?php if ( !empty($polmo_lite_map_contact_heading) ){ ?>
          <h2 class="section-title">
            <?php echo $polmo_lite_map_contact_heading; ?>
          </h2><!-- /.section-title -->
        <?php } ?>

        <?php if ( !empty($polmo_lite_map_contact_shortcode) ){ ?>
            <?php echo do_shortcode( $polmo_lite_map_contact_shortcode ); ?>
        <?php } ?>

      </div><!-- /.form-area -->
    </div><!-- /.contact-inner -->
  </section>
