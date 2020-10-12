<?php

$polmo_lite_service_heading_title = get_theme_mod('polmo_lite_service_heading_title',__('<span>Polmo</span> Core Services','polmo-lite'));
$polmo_lite_service_desc = get_theme_mod('polmo_lite_service_desc',__('Matter is made up of atoms having dimensions approximately determined to be in the neighbourhood of the one fifty-millionth of an inch in diameter.','polmo-lite'));

//Service 1
$polmo_lite_service_icon_1 = get_theme_mod('polmo_lite_service_icon_1',__('fa-android','polmo-lite'));
$polmo_lite_service_title_1 = get_theme_mod('polmo_lite_service_title_1',__('Android Apps Developement','polmo-lite'));
$polmo_lite_service_desc_1 = get_theme_mod('polmo_lite_service_desc_1',__('Atoms dimensions approximately determined with one fifty-millionth an inch in diameter.','polmo-lite'));


//Service 2
$polmo_lite_service_icon_2 = get_theme_mod('polmo_lite_service_icon_2',__('fa-html5','polmo-lite'));
$polmo_lite_service_title_2 = get_theme_mod('polmo_lite_service_title_2',__('HTML5 Modern Technology','polmo-lite'));
$polmo_lite_service_desc_2 = get_theme_mod('polmo_lite_service_desc_2',__('Continuity as distinguished from may be considering what would be visible by magnification.','polmo-lite'));


//Service 3
$polmo_lite_service_icon_3 = get_theme_mod('polmo_lite_service_icon_3',__('fa-maxcdn','polmo-lite'));
$polmo_lite_service_title_3 = get_theme_mod('polmo_lite_service_title_3',__('Latest Max CDN Service','polmo-lite'));
$polmo_lite_service_desc_3 = get_theme_mod('polmo_lite_service_desc_3',__('Definite amount of matter in visible universe, a number of molecules and atoms in huge number.','polmo-lite'));


//Service 4
$polmo_lite_service_icon_4 = get_theme_mod('polmo_lite_service_icon_4',__('fa-umbrella','polmo-lite'));
$polmo_lite_service_title_4 = get_theme_mod('polmo_lite_service_title_4',__('Latest Umbrella Server','polmo-lite'));
$polmo_lite_service_desc_4 = get_theme_mod('polmo_lite_service_desc_4',__('Phenomena of light and waves of all lengths are found in velocity of 186,000 miles in a second.','polmo-lite'));

?>

  <!-- Service Section-->

  <section id="services" class="services text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($polmo_lite_service_heading_title) && !empty($polmo_lite_service_desc) ){ ?>
              <h2 class="section-title">
                <?php echo  $polmo_lite_service_heading_title; ?>
              </h2>
              <p class="section-description">
                <?php echo  $polmo_lite_service_desc; ?>
              </p><!-- /.section-description -->
            <?php } ?>

          </div><!-- /.section-top -->

          <div class="section-details">
            <div class="service-details">
              <div class="col-md-3 col-sm-6">
                <div class="item wow animated fadeInLeft" data-wow-delay=".5s">
                  <?php if ( !empty($polmo_lite_service_icon_1) && !empty($polmo_lite_service_title_1) && !empty($polmo_lite_service_desc_1) ){ ?>
                    <div class="item-icon">
                      <i class="fa <?php echo esc_attr( $polmo_lite_service_icon_1 ); ?>"></i>
                    </div><!-- /.item-icon -->
                    <div class="item-details">
                      <h4 class="item-title"><?php echo esc_attr( $polmo_lite_service_title_1 ); ?></h4><!-- /.item-title -->
                      <p class="item-description">
                        <?php echo esc_attr( $polmo_lite_service_desc_1 ); ?>
                      </p><!-- /.item-description -->
                    </div><!-- /.item-details -->
                   <?php } ?> 
                </div><!-- /.item -->
              </div>

              <div class="col-md-3 col-sm-6">
                <div class="item wow animated fadeInLeft" data-wow-delay=".35s">
                  <?php if ( !empty($polmo_lite_service_icon_2) && !empty($polmo_lite_service_title_2) && !empty($polmo_lite_service_desc_2) ){ ?>
                    <div class="item-icon">
                      <i class="fa <?php echo esc_attr( $polmo_lite_service_icon_2 ); ?>"></i>
                    </div><!-- /.item-icon -->
                    <div class="item-details">
                      <h4 class="item-title"><?php echo esc_attr( $polmo_lite_service_title_2 ); ?></h4><!-- /.item-title -->
                      <p class="item-description">
                        <?php echo esc_attr( $polmo_lite_service_desc_2 ); ?>
                      </p><!-- /.item-description -->
                    </div><!-- /.item-details -->
                  <?php } ?>
                </div><!-- /.item -->
              </div>

              <div class="col-md-3 col-sm-6">
                <div class="item wow animated fadeInRight" data-wow-delay=".35s">
                  <?php if ( !empty($polmo_lite_service_icon_3) && !empty($polmo_lite_service_title_3) && !empty($polmo_lite_service_desc_3) ){ ?>
                    <div class="item-icon">
                      <i class="fa <?php echo esc_attr( $polmo_lite_service_icon_3 ); ?>"></i>
                    </div><!-- /.item-icon -->
                    <div class="item-details">
                      <h4 class="item-title"><?php echo esc_attr( $polmo_lite_service_title_3 ); ?></h4><!-- /.item-title -->
                      <p class="item-description">
                        <?php echo esc_attr( $polmo_lite_service_desc_3 ); ?>
                      </p><!-- /.item-description -->
                    </div><!-- /.item-details -->
                  <?php } ?>
                </div><!-- /.item -->
              </div>

              <div class="col-md-3 col-sm-6">
                <div class="item wow animated fadeInRight" data-wow-delay=".5s">
                  <?php if ( !empty($polmo_lite_service_icon_4) && !empty($polmo_lite_service_title_4) && !empty($polmo_lite_service_desc_4) ){ ?>
                    <div class="item-icon">
                      <i class="fa <?php echo esc_attr( $polmo_lite_service_icon_4 ); ?>"></i>
                    </div><!-- /.item-icon -->
                    <div class="item-details">
                      <h4 class="item-title"><?php echo esc_attr( $polmo_lite_service_title_4 ); ?></h4><!-- /.item-title -->
                      <p class="item-description">
                        <?php echo esc_attr( $polmo_lite_service_desc_4 ); ?>
                      </p><!-- /.item-description -->
                    </div><!-- /.item-details -->
                  <?php } ?>
                </div><!-- /.item -->
              </div>

            </div><!-- /.service-details -->
          </div><!-- /.section-details -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#services -->

  <!-- Service Section-->