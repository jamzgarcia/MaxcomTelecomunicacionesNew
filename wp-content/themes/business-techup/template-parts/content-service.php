<?php 
$techup_enable_service_section = get_theme_mod( 'techup_enable_service_section', false );
$techup_service_title = get_theme_mod( 'techup_service_title');
$techup_service_subtitle = get_theme_mod( 'techup_service_subtitle' );
if($techup_enable_service_section==true ) {


        $techup_services_no        = 6;
        $techup_services_pages      = array();
        for( $i = 1; $i <= $techup_services_no; $i++ ) {
             $techup_services_pages[] = get_theme_mod('techup_service_page '.$i); 
             $techup_service_icon[]= get_theme_mod('techup_service_icon '.$i,'fa fa-user');
        }
        $techup_services_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $techup_services_pages ),
        'posts_per_page' => absint($techup_services_no),
        'orderby' => 'post__in'
        ); 
        $techup_services_query = new WP_Query( $techup_services_args );
      

?> 
    <!-- ======= Services Section ======= -->
    
    <section class="service-section">
      <div class="container">
        <div class="text-center top-text">
		<?php if($techup_service_title) : ?>
          <h1 class="section-title"><?php echo esc_html($techup_service_title); ?></h1>
		<?php endif; ?>	
		<?php if($techup_service_subtitle) : ?>  
          <p class="section-description"><?php echo esc_html($techup_service_subtitle); ?></p>
		<?php endif; ?>	  
        </div>
        <div class="divider text-center">
          <span class="outer-line"></span>
          <span class="fa fa-diamond"></span>
          <span class="outer-line"></span>
        </div>
        <div class="row">
			<?php
			$count = 0;
			while($techup_services_query->have_posts() && $count <= 8 ) :
			$techup_services_query->the_post();
			?>
			  <div class="col-lg-4 col-md-6 col-sm-12">
				<div class="service-sec-hover">
				  <div class="service-box">
					<div class="service-image">
					   <?php the_post_thumbnail(); ?>
					</div>
					<div class="service-icon">
					  <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
					</div>
					<div class="service-heading">
					  <h4><a class="section-more" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
					<div class="service-description">
					  <p><?php echo esc_html(get_the_excerpt()); ?></p>
					</div>
				  </div>
				</div>
			  </div>
		  <?php
			$count = $count + 1;
			endwhile;
			wp_reset_postdata();
			?>
          
        </div>
      </div>
    </section>

    <!-- End Services Section -->
	
<?php } ?>