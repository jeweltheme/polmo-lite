<?php

$polmo_lite_about_us_title = get_theme_mod('polmo_lite_about_us_title', __('<span>We</span> are Polmo Limited Creative Web Agency','polmo-lite'));
$polmo_lite_about_us_desc = get_theme_mod('polmo_lite_about_us_desc', __('There is so considerable a body of knowledge bearing upon the similarities and dissimilarities of these two entities that it will be well to compare them. After such comparison one will be better able to judge of the propriety of assuming them to be subject to identical laws','polmo-lite'));

$polmo_lite_about_us_expertise_title = get_theme_mod('polmo_lite_about_us_expertise_title', __('<span>Our</span> areas of expertise','polmo-lite'));

//Progress 1
$polmo_lite_about_us_progress_title_1 = get_theme_mod('polmo_lite_about_us_progress_title_1',esc_html__('WordPress Plugin Dev','polmo-lite'));
$polmo_lite_about_us_progress_percantage_1 = get_theme_mod('polmo_lite_about_us_progress_percantage_1',esc_html__('89','polmo-lite'));

//Progress 2
$polmo_lite_about_us_progress_title_2 = get_theme_mod('polmo_lite_about_us_progress_title_2',esc_html__('Web Design','polmo-lite'));
$polmo_lite_about_us_progress_percantage_2 = get_theme_mod('polmo_lite_about_us_progress_percantage_2',esc_html__('70','polmo-lite'));

//Progress 3
$polmo_lite_about_us_progress_title_3 = get_theme_mod('polmo_lite_about_us_progress_title_3',esc_html__('PHP Programming','polmo-lite'));
$polmo_lite_about_us_progress_percantage_3 = get_theme_mod('polmo_lite_about_us_progress_percantage_3',esc_html__('60','polmo-lite'));

// Button
$polmo_lite_about_us_button_text = get_theme_mod('polmo_lite_about_us_button_text',esc_html__('Learn More','polmo-lite'));
$polmo_lite_about_us_button_url = get_theme_mod('polmo_lite_about_us_button_url',esc_html__('#','polmo-lite'));

// Counter 1
$polmo_lite_about_us_counter_icon_1 = get_theme_mod('polmo_lite_about_us_counter_icon_1',esc_html__('fa-heart-o','polmo-lite'));
$polmo_lite_about_us_counter_number_1 = get_theme_mod('polmo_lite_about_us_counter_number_1',esc_html__('8,236','polmo-lite'));
$polmo_lite_about_us_counter_text_1 = get_theme_mod('polmo_lite_about_us_counter_text_1',esc_html__('Love Bites','polmo-lite'));

// Counter 2
$polmo_lite_about_us_counter_icon_2 = get_theme_mod('polmo_lite_about_us_counter_icon_2',esc_html__('fa-wifi','polmo-lite'));
$polmo_lite_about_us_counter_number_2 = get_theme_mod('polmo_lite_about_us_counter_number_2',esc_html__('1,203','polmo-lite'));
$polmo_lite_about_us_counter_text_2 = get_theme_mod('polmo_lite_about_us_counter_text_2',esc_html__('Customer Centers','polmo-lite'));

// Counter 3
$polmo_lite_about_us_counter_icon_3 = get_theme_mod('polmo_lite_about_us_counter_icon_3',esc_html__('fa-map-marker','polmo-lite'));
$polmo_lite_about_us_counter_number_3 = get_theme_mod('polmo_lite_about_us_counter_number_3',esc_html__('3,679','polmo-lite'));
$polmo_lite_about_us_counter_text_3 = get_theme_mod('polmo_lite_about_us_counter_text_3',esc_html__('Love Bites','polmo-lite'));

// Counter 4
$polmo_lite_about_us_counter_icon_4 = get_theme_mod('polmo_lite_about_us_counter_icon_4',esc_html__('fa-cogs','polmo-lite'));
$polmo_lite_about_us_counter_number_4 = get_theme_mod('polmo_lite_about_us_counter_number_4',esc_html__('2,310','polmo-lite'));
$polmo_lite_about_us_counter_text_4 = get_theme_mod('polmo_lite_about_us_counter_text_4',esc_html__('Mechanical Cogs','polmo-lite'));

// Work With Us
$polmo_lite_about_us_work_with_us_image = get_theme_mod('polmo_lite_about_us_work_with_us_image', get_template_directory_uri() . '/images/tab.jpg');
$polmo_lite_about_us_work_with_us_title = get_theme_mod('polmo_lite_about_us_work_with_us_title', __('<span>Why</span> Work With Us','polmo-lite'));
$polmo_lite_about_us_work_with_us_desc = get_theme_mod('polmo_lite_about_us_work_with_us_desc', __('One part of the ether is precisely like any other part everywhere and always, and there are no such distinctions in it as correspond with the elemental forms of matter.           
              There is an ultimate particle of each one of the elements which is practically absolute and known as an atom. The atom retains its identity through all combinations and processes. It may be here or there, move fast or slow, but its atomic form persists              <br> <br>
              One might infer already that if the ether were structureless, physical laws operative upon such material substances as atoms could not be applicable to it, and so indeed all the evidence we have shows that gravitation is not one of its properties.','polmo-lite'));


?>

  <section id="about" class="about">
    <div class="about-top">
      <div class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <div class="know-about-us wow animated fadeInLeft" data-wow-delay=".5s">
                <?php if ( !empty($polmo_lite_about_us_title) && !empty($polmo_lite_about_us_desc) && !empty($polmo_lite_about_us_button_text) && !empty($polmo_lite_about_us_button_url) ){ ?>
                  <h2 class="section-title">
                    <?php echo  $polmo_lite_about_us_title; ?>
                  </h2><!-- /.section-title -->
                  <p class="description">
                    <?php echo  $polmo_lite_about_us_desc; ?>
                  </p><!-- /.description -->
                  <div class="btn-container">
                    <a href="<?php echo esc_url( $polmo_lite_about_us_button_url ); ?>" class="btn read-more">
                      <?php echo esc_attr( $polmo_lite_about_us_button_text ); ?>
                    </a>
                  </div><!-- /.btn-container -->
                <?php } ?>
              </div><!-- /.know-about-us -->
            </div>

            <div class="col-md-5">
              <div class="our-skills wow animated fadeInRight" data-wow-delay=".5s">
                <?php if ( !empty($polmo_lite_about_us_expertise_title) 
                  && !empty($polmo_lite_about_us_progress_title_1) && !empty($polmo_lite_about_us_progress_percantage_1) 
                  && !empty($polmo_lite_about_us_progress_title_2) && !empty($polmo_lite_about_us_progress_percantage_2) 
                  && !empty($polmo_lite_about_us_progress_title_3) && !empty($polmo_lite_about_us_progress_percantage_3) 
                   ){ ?>
                  <h2 class="section-title">
                    <?php echo  $polmo_lite_about_us_expertise_title; ?>
                  </h2><!-- /.section-title -->
                  <div class="skill-bars">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $polmo_lite_about_us_progress_percantage_1 ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $polmo_lite_about_us_progress_percantage_1 ); ?>%;">
                        <span class="skill-name">
                          <?php echo esc_attr( $polmo_lite_about_us_progress_title_1 ); ?>
                        </span><?php echo esc_attr( $polmo_lite_about_us_progress_percantage_1 ); ?>%
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $polmo_lite_about_us_progress_percantage_2 ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $polmo_lite_about_us_progress_percantage_2 ); ?>%;">
                        <span class="skill-name">
                          <?php echo esc_attr( $polmo_lite_about_us_progress_title_2 ); ?>
                        </span><?php echo esc_attr( $polmo_lite_about_us_progress_percantage_2 ); ?>%
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $polmo_lite_about_us_progress_percantage_3 ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $polmo_lite_about_us_progress_percantage_3 ); ?>%;">
                        <span class="skill-name">
                          <?php echo esc_attr( $polmo_lite_about_us_progress_title_3 ); ?>
                        </span><?php echo esc_attr( $polmo_lite_about_us_progress_percantage_3 ); ?>%
                      </div>
                    </div>
                  </div><!-- /.skill-bars -->
                <?php } ?>
              </div><!-- /.our-skills -->
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.about-top -->

    <div class="about-middle">
      <div class="about-breifing">
        <div class="col-md-3 col-sm-6">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".35s">
            <div class="section-padding">
              <div class="item-no media-left">
                <span class="count text-right">
                  <?php echo esc_html__( "01", "polmo-lite" ); ?>
                </span>
              </div><!-- /.item-no -->
              <div class="item-details media-body text-center">
                <div class="item-icon">
                  <i class="fa <?php echo esc_attr( $polmo_lite_about_us_counter_icon_1 ); ?>"></i>
                </div><!-- /.item-icon -->
                <div class="countdown">
                  <span class="count-number counter">
                    <?php echo esc_attr( $polmo_lite_about_us_counter_number_1 ); ?>
                  </span>
                </div><!-- /.coundown -->
                <span class="about-item">
                  <?php echo esc_attr( $polmo_lite_about_us_counter_text_1 ); ?>
                </span>
              </div><!-- /.item-details -->
            </div><!-- /.section-padding -->
          </div><!-- /.item -->
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".55s">
            <div class="section-padding">
              <div class="item-no media-left">
                <span class="count text-right">
                  <?php echo esc_html__( "02", "polmo-lite" ); ?>
                </span>
              </div><!-- /.item-no -->
              <div class="item-details media-body text-center">
                <div class="item-icon">
                  <i class="fa <?php echo esc_attr( $polmo_lite_about_us_counter_icon_2 ); ?>"></i>
                </div><!-- /.item-icon -->
                <div class="countdown">
                  <span class="count-number counter">
                    <?php echo esc_attr( $polmo_lite_about_us_counter_number_2 ); ?>
                  </span>
                </div><!-- /.coundown -->
                <span class="about-item">
                  <?php echo esc_attr( $polmo_lite_about_us_counter_text_2 ); ?>
                </span>
              </div><!-- /.item-details -->
            </div><!-- /.section-padding -->
          </div><!-- /.item -->
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".75s">
            <div class="section-padding">
              <div class="item-no media-left">
                <span class="count text-right">
                  <?php echo esc_html__( "03", "polmo-lite" ); ?>
                </span>
              </div><!-- /.item-no -->
              <div class="item-details media-body text-center">
                <div class="item-icon">
                  <i class="fa <?php echo esc_attr( $polmo_lite_about_us_counter_icon_3 ); ?>"></i>
                </div><!-- /.item-icon -->
                <div class="countdown">
                  <span class="count-number counter">
                    <?php echo esc_attr( $polmo_lite_about_us_counter_number_3 ); ?>
                  </span>
                </div><!-- /.coundown -->
                <span class="about-item">
                  <?php echo esc_attr( $polmo_lite_about_us_counter_text_3 ); ?>
                </span>
              </div><!-- /.item-details -->
            </div><!-- /.section-padding -->
          </div><!-- /.item -->
        </div>

        <div class="col-md-3 col-sm-6">
          <div class="item media wow animated fadeInLeft" data-wow-delay=".95s">
            <div class="section-padding">
              <div class="item-no media-left">
                <span class="count text-right">
                  <?php echo esc_html__( "04", "polmo-lite" ); ?>
                </span>
              </div><!-- /.item-no -->
              <div class="item-details media-body text-center">
                <div class="item-icon">
                  <i class="fa <?php echo esc_attr( $polmo_lite_about_us_counter_icon_4 ); ?>"></i>
                </div><!-- /.item-icon -->
                <div class="countdown">
                  <span class="count-number counter">
                    <?php echo esc_attr( $polmo_lite_about_us_counter_number_4 ); ?>
                  </span>
                </div><!-- /.coundown -->
                <span class="about-item">
                  <?php echo esc_attr( $polmo_lite_about_us_counter_text_4 ); ?>
                </span>
              </div><!-- /.item-details -->
            </div><!-- /.section-padding -->
          </div><!-- /.item -->
        </div>
      </div><!-- /.about-briefing -->
    </div><!-- /.about-middle -->

    <div class="about-bottom">
      <div class="section-padding">
        <div class="col-sm-6">
          <div class="tab-image wow animated fadeInLeft" data-wow-delay=".5s">
            <img src="<?php echo esc_url( $polmo_lite_about_us_work_with_us_image ); ?>" alt="Tab Image">
          </div><!-- /.tab-image -->
        </div>
        <div class="col-sm-6">
          <div class="about-work wow animated fadeInRight" data-wow-delay=".5s">
            <h2 class="section-title">
              <?php echo  $polmo_lite_about_us_work_with_us_title; ?>
            </h2><!-- /.section-title -->
            <p class="description">
              <?php echo  $polmo_lite_about_us_work_with_us_desc; ?>
            </p><!-- /.description -->
          </div><!-- /.about-work -->
        </div>
      </div><!-- /.section-padding -->
    </div><!-- /.about-bottom -->
  </section><!-- /#about -->