<?php 
$polmo_lite_portfolio_title = get_theme_mod('polmo_lite_portfolio_title',__('<span>Featured</span> Projects','polmo-lite'));
$polmo_lite_portfolio_desc = get_theme_mod('polmo_lite_portfolio_desc',__('Suppose then that such rings were produced in a medium without friction as the ether is believed to be, they would be permanent structures with a variety of properties.','polmo-lite'));
$polmo_lite_portfolio_posts = get_theme_mod('polmo_lite_portfolio_posts',__('8','polmo-lite'));
?>


  <!-- Portfolio Section -->

  <section id="portfolio" class="portfolio text-center">
    <div class="portfolio-bottom">
      <div class="section-padding">
        <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($polmo_lite_portfolio_title) ){ ?>
              <h2 class="section-title">
                <?php echo strip_tags( $polmo_lite_portfolio_title ); ?>
              </h2><!-- /.section-title -->
            <?php } ?>

            <?php if ( !empty($polmo_lite_portfolio_desc) ){ ?>
              <p class="section-description">
                <?php echo esc_attr( $polmo_lite_portfolio_desc ); ?>
              </p><!-- /.section-description -->
            <?php } ?>
        </div><!-- /.section-top -->

        <div class="latest-projects wow animated fadeInUp" data-wow-delay=".5s">

        <?php 
        $args = array(
          "posts_per_page" => $polmo_lite_portfolio_posts,
          "post_type" => "portfolio",
          "order" => "DESC",
          );

        $portfolio = new WP_Query( $args ); ?>

          <div class="itemFilter">
            <a href="#" data-filter="" class="current">All</a>
            <?php 
              $category = get_terms( 'portfolio' );
              foreach ($category as $cat) { 
                  // echo '<a href="#" data-filter=".'.trim($cat->slug).'">'.$cat->name.'</a>';
              } 
            ?>
          </div> <!-- /.itemFilter -->

          <div id="project-items" class="project-items">

          <?php 
            if ( $portfolio->have_posts() ) { while ( $portfolio->have_posts() ) {
              $portfolio->the_post();

              $terms = wp_get_post_terms(get_the_ID(), 'portfolio' );
              
              $url = wp_get_attachment_image_src(get_post_thumbnail_id(),'portfolio');

              $t = array();
              foreach($terms as $term) $t[] = $term->slug;
            ?>
              <div class="item <?php echo implode(' ', $t); $t = array(); ?>">
                <a href="<?php echo $url[0]; ?>" class="image-popup-vertical-fit">
                  <img src="<?php echo $url[0]; ?>" alt="<?php echo $term->name;?> Image">
                </a>
                <div class="item-details">
                  <h3 class="project-title"><?php the_title();?></h3>
                </div><!-- /.item-details -->
              </div><!-- /.item -->

          <?php } } ?>

          </div><!-- /#project-items -->

        </div><!-- /.latest-projects -->
      </div><!-- /.section-padding -->
    </div><!-- /.portfolio-bottom -->
  </section>

  <!-- Portfolio Section -->



<?php
$polmo_lite_sponsors_title = get_theme_mod('polmo_lite_sponsors_title',__('<span>Our</span> Elite Sponsors','polmo-lite'));

// Sponsor 1
$polmo_lite_sponsors_image_1 = get_theme_mod('polmo_lite_sponsors_image_1', get_template_directory_uri() . '/images/sponsors/1.png');
$polmo_lite_sponsors_url_1 = get_theme_mod('polmo_lite_sponsors_url_1',__('http://jeweltheme.com','polmo-lite'));

// Sponsor 2
$polmo_lite_sponsors_image_2 = get_theme_mod('polmo_lite_sponsors_image_2', get_template_directory_uri() . '/images/sponsors/2.png');
$polmo_lite_sponsors_url_2 = get_theme_mod('polmo_lite_sponsors_url_2',__('http://jeweltheme.com','polmo-lite'));

// Sponsor 3
$polmo_lite_sponsors_image_3 = get_theme_mod('polmo_lite_sponsors_image_3', get_template_directory_uri() . '/images/sponsors/3.png');
$polmo_lite_sponsors_url_3 = get_theme_mod('polmo_lite_sponsors_url_3',__('http://jeweltheme.com','polmo-lite'));

// Sponsor 4
$polmo_lite_sponsors_image_4 = get_theme_mod('polmo_lite_sponsors_image_4', get_template_directory_uri() . '/images/sponsors/1.png');
$polmo_lite_sponsors_url_4 = get_theme_mod('polmo_lite_sponsors_url_4',__('http://jeweltheme.com','polmo-lite'));

?>

  <section id="sponsors" class="sponsors text-center" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
    <div class="section-pattern">
      <div class="section-padding">
        <div class="container">
          <div class="row">
            <div class="wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($polmo_lite_sponsors_title) ){ ?>
              <h2 class="section-title">
                <?php echo  $polmo_lite_sponsors_title; ?>
              </h2><!-- /.section-title -->
            <?php } ?>

              <div class="section-details">
                <div class="sponsors-logo">                  
                  <?php if ( !empty($polmo_lite_sponsors_url_1) && !empty($polmo_lite_sponsors_image_1) ){ ?>
                    <div class="col-sm-3 col-xs-6">
                      <a href="<?php echo esc_url( $polmo_lite_sponsors_url_1 ); ?>" target="_blank"><img src="<?php echo esc_url( $polmo_lite_sponsors_image_1 ); ?>" alt="Sponsors Logo"></a>
                    </div>
                  <?php } ?>
                  
                  <?php if ( !empty($polmo_lite_sponsors_url_2) && !empty($polmo_lite_sponsors_image_2) ){ ?>
                    <div class="col-sm-3 col-xs-6">
                      <a href="<?php echo esc_url( $polmo_lite_sponsors_url_2 ); ?>" target="_blank"><img src="<?php echo esc_url( $polmo_lite_sponsors_image_2 ); ?>" alt="Sponsors Logo"></a>
                    </div>
                  <?php } ?>

                  <?php if ( !empty($polmo_lite_sponsors_url_3) && !empty($polmo_lite_sponsors_image_3) ){ ?>
                    <div class="col-sm-3 col-xs-6">
                      <a href="<?php echo esc_url( $polmo_lite_sponsors_url_3 ); ?>" target="_blank"><img src="<?php echo esc_url( $polmo_lite_sponsors_image_3 ); ?>" alt="Sponsors Logo"></a>
                    </div>
                  <?php } ?>

                  <?php if ( !empty($polmo_lite_sponsors_url_4) && !empty($polmo_lite_sponsors_image_4) ){ ?>
                    <div class="col-sm-3 col-xs-6">
                      <a href="<?php echo esc_url( $polmo_lite_sponsors_url_4 ); ?>" target="_blank"><img src="<?php echo esc_url( $polmo_lite_sponsors_image_4 ); ?>" alt="Sponsors Logo"></a>
                    </div>
                  <?php } ?>
                </div><!-- /.sponsors-logo -->
              </div><!-- /.section-details -->
            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
    </div><!-- /.section-pattern -->
  </section><!-- /#sponsors -->
