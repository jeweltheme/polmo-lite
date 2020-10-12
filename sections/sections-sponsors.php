<?php
$polmo_lite_sponsors_title = get_theme_mod('polmo_lite_sponsors_title',__('<span>Our</span> Elite Sponsors','polmo-lite'));


$hide_sponsor = get_theme_mod('hide_sponsor', '1');

if( $hide_sponsor == ''){ 

  if( get_theme_mod('page-sponsor',false) ) {
    $sponsorquery = new wp_query('page_id='.get_theme_mod('page-sponsor',true)); 
    if( $sponsorquery->have_posts() ) {   while( $sponsorquery->have_posts() ) { $sponsorquery->the_post(); 
    $sponsor_bg_image = wp_get_attachment_url( get_post_thumbnail_id($sponsorquery->ID, 'full'));
    ?> 
    
    <section id="sponsors" class="sponsors text-center" style="background-image:url('<?php echo $sponsor_bg_image;?>');" data-stellar-background-ratio="0.1" data-stellar-vertical-offset="0">
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

                    <?php the_content();?>

                  </div><!-- /.sponsors-logo -->
                </div><!-- /.section-details -->
              </div>
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.section-padding -->
      </div><!-- /.section-pattern -->
    </section><!-- /#sponsors -->

<?php } }  wp_reset_postdata(); } else { 
          if ( current_user_can( 'edit_theme_options' ) ){
              printf( __( 'There is Nothing to Show. Please Create a <a href="%s">New Page</a>? <br>', 'polmo-lite' ), esc_url( admin_url( 'post-new.php?post_type=page' ) ));
          }
     }
  }
?>