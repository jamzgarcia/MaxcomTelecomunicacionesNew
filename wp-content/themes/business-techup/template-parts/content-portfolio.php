<?php 
$techup_enable_portfolio_section = get_theme_mod( 'techup_enable_portfolio_section', false );
$techup_portfolio_title = get_theme_mod( 'techup_portfolio_title');
$techup_portfolio_subtitle = get_theme_mod( 'techup_portfolio_subtitle' );

if($techup_enable_portfolio_section==true ) {
	$techup_portfolio_no        = 6;
	$techup_portfolio_page      = array();
	for( $k = 1; $k <= $techup_portfolio_no; $k++ ) {
		 $techup_portfolio_page[] = get_theme_mod('techup_portfolio_page'.$k); 

	}
	$techup_portfolio_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $techup_portfolio_page ),
	'posts_per_page' => absint($techup_portfolio_no),
	'orderby' => 'post__in'
	); 
	$techup_portfolio_query = new WP_Query( $techup_portfolio_args );
?>
 	<!-- ======= Start Portfolio Section ======= -->

    <section class="portfolio-sec">
      <div class="container-fluid">
        <div class="text-center top-text">
			<?php if($techup_portfolio_title) : ?>
			  <h1 class="section-title"><?php echo esc_html($techup_portfolio_title); ?></h1>
			<?php endif; ?>		  
			<?php if($techup_portfolio_subtitle) : ?>	  
			  <p class="section-description"><?php echo esc_html($techup_portfolio_subtitle); ?></p>
			<?php endif; ?>	  
        </div>
        <div class="divider text-center">
          <span class="outer-line"></span>
          <span class="fa fa-diamond"></span>
          <span class="outer-line"></span>
        </div>
        <div class="row">
          <div class="col-lg-12 p-0 wow fadeInUp" data-wow-delay="0.2s">
            <div class="card-columns">
				<?php
				$count = 0;
				while($techup_portfolio_query->have_posts() && $count <= 5 ) :
				$techup_portfolio_query->the_post();
				?>
				  <div class="card-container">
					<div class="card portfolio-wrap">
					  <?php the_post_thumbnail(); ?>
					  <div class="portfolio-info">
						<h4><?php echo the_title(); ?></h4>
						<div class="portfolio-links">
						  <a href="<?php the_permalink(); ?>" data-gall="portfolioGallery" class="venobox" title="Portfolio-1">
						  <i class="fa fa-link"></i></a>
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
        </div> 
      </div>
    </section>

    <!-- =======End Portfolio Section ======= -->

<?php } ?>