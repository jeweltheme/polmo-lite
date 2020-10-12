<?php
$polmo_lite_subscriber_title = get_theme_mod('polmo_lite_subscriber_title',__('Polmo WordPress Version Is Live!','polmo-lite'));
$polmo_lite_subscriber_desc = get_theme_mod('polmo_lite_subscriber_desc',__('To get Polmo WordPress version subscribe now. Polmo theme is ablolutely free for your business or personal use.','polmo-lite'));
$polmo_lite_subscriber_button = get_theme_mod('polmo_lite_subscriber_button',__('Subscribe Now','polmo-lite'));
?>


<div class="clearfix"></div><!-- /.clearfix -->

  <!-- Subscribe Section -->

  <section id="subscribe-section" class="subscribe-section text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="bg-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <h2 class="section-title">
              <?php echo esc_attr( $polmo_lite_subscriber_title ); ?>
            </h2><!-- /.section-title -->
            <p class="section-description">
              <?php echo esc_attr( $polmo_lite_subscriber_desc ); ?>
            </p><!-- /.section-description -->

            <form class="subscribe" method="post">
              <p class="alert-success"></p>
              <p class="alert-warning"></p>

              <div class="subscribe-hide">
                <input class="subscribe-email" type="email" id="subscribe-email" name="subscribe-email" required>
                <button  type="submit" id="subscribe-submit" class="btn">
                  <?php echo esc_attr( $polmo_lite_subscriber_button ); ?>
                </button>
                <span id="subscribe-loading" class="btn"> <i class="fa fa-refresh fa-spin"></i> </span>
                <div class="subscribe-error"></div>
              </div><!-- /.subscribe-hide -->
              <div class="subscribe-message"></div>
            </form><!-- /.subscribe -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.bg-overlay -->
  </section><!-- /#subscribe-section -->

  <!-- Subscribe Section -->

