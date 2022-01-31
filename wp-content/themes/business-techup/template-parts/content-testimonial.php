<?php 
$techup_enable_testimonial_section = get_theme_mod( 'techup_enable_testimonial_section', false );
$techup_testimonial_title= get_theme_mod( 'techup_testimonial_title','What People Say');
$techup_testimonial_subtitle= get_theme_mod( 'techup_testimonial_subtitle');

if($techup_enable_testimonial_section == true ) {
	$techup_testimonials_no        = 6;
	$techup_testimonials_pages      = array();
	for( $i = 1; $i <= $techup_testimonials_no; $i++ ) {
		 $techup_testimonials_pages[] = get_theme_mod('techup_testimonial_page'.$i);
	}
	$techup_testimonials_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $techup_testimonials_pages ),
	'posts_per_page' => absint($techup_testimonials_no),
	'orderby' => 'post__in'
	); 
	$techup_testimonials_query = new WP_Query( $techup_testimonials_args );
?>
 	<!-- ======= Testimonials Section ======= -->

    <section class="testimonial-sec">
      <div class="container">
        <div class="text-center top-text">
			<?php if($techup_testimonial_title) : ?>
			  <h1 class="section-title"><?php echo esc_html($techup_testimonial_title); ?></h1>
			<?php endif; ?>
			<?php if($techup_testimonial_subtitle) : ?>	  
			  <p class="section-description"><?php echo esc_html($techup_testimonial_subtitle); ?></p>
			<?php endif; ?>  
        </div>
        <div class="divider text-center">
          <span class="outer-line"></span>
          <span class="fa fa-diamond"></span>
          <span class="outer-line"></span>
        </div>

        <div class="row latest-posts-content">
            <div class="col-md-12">
              <div id="testimonial-slider" class="owl-carousel">
				<?php
				$count = 0;
				while($techup_testimonials_query->have_posts() && $count <= 5 ) :
				$techup_testimonials_query->the_post();
				?>	
					<div class="testimonial">
						<div class="pic">
							<?php the_post_thumbnail(); ?>
						</div>
						<h4 class="testimonial-title">
							<?php the_title(); ?>
						</h4>
						<div class="testimonial-review">
							<?php the_content(); ?>
						</div>
					</div>
				<?php
				$count = $count + 1;
				endwhile;
				wp_reset_postdata();
				?> 
                </div>
              </div>
            </div>
        </div>
    </section>
    
    <!-- End Testimonials Section ---->

	
<?php } ?>