<?php 
$polmo_lite_testimonial_heading = get_theme_mod('polmo_lite_testimonial_heading',__('Our Testimonials','polmo-lite'));
$polmo_lite_testimonial_heading_category = get_theme_mod('polmo_lite_testimonial_heading_category');
$polmo_lite_testimonial_posts = get_theme_mod('polmo_lite_testimonial_posts',__('3','polmo-lite'));
$testimonials = polmo_lite_get_custom_posts( $polmo_lite_testimonial_heading_category, $polmo_lite_testimonial_posts );
?>



  <section id="testimonial" class="testimonial text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="pattern-overlay">
      <div class="section-padding">
        <div class="container">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($polmo_lite_testimonial_heading) ){ ?>
              <h2 class="section-title">
                <?php echo esc_attr( $polmo_lite_testimonial_heading ); ?>
              </h2><!-- /.section-title -->
            <?php } ?>
          </div><!-- /.section-top -->
          <div class="section-details wow animated fadeInUp" data-wow-delay=".5s">
            <div id="testimonial-slider" class="testimonial-slider carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php for($i = 0; $i<count($testimonials); $i++){ ?>
                  <li data-target="#testimonial-slider" data-slide-to="<?php echo $i;?>" class="<?php echo ( ($i == 0) ? "active" : "" );?>"></li>
                <?php } ?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <?php 
                $i = 0;
                foreach ($testimonials as $key =>$post) {
                  setup_postdata($post);
                ?>
                  <div class="item <?php echo ( ($key == 0) ? "active" : "" );?>">
                    <blockquote class="client-quote">
                      <?php echo wp_trim_words( get_the_content(), 35, ' '  ); ?>
                    </blockquote><!-- /.client-quote -->
                  </div><!-- /.item -->
                <?php 
                    $i++;
                  } 
                wp_reset_postdata();
                ?>
              </div>
            </div><!-- /#testimonial-slider -->
          </div><!-- /.section-details -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.pattern-overlay -->
  </section><!-- /#testimonial -->

  <!-- Testimonials Section -->
