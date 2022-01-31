<?php 
$techup_enable_team_section = get_theme_mod( 'techup_enable_team_section', false );
$techup_team_title  = get_theme_mod( 'techup_team_title' );
$techup_team_subtitle  = get_theme_mod( 'techup_team_subtitle' );

if($techup_enable_team_section==true ) {
        $techup_teams_no        = 6;
        $techup_teams_pages      = array();
        for( $i = 1; $i <= $techup_teams_no; $i++ ) {
             $techup_teams_pages[] = get_theme_mod('techup_team_page'.$i);

        }
        $techup_teams_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $techup_teams_pages ),
        'posts_per_page' => absint($techup_teams_no),
        'orderby' => 'post__in'
        ); 
        $techup_teams_query = new WP_Query( $techup_teams_args );
      

?> 
	
	<!-- ======= Team Section ======= -->

    <section class="team-sec">
      <div class="container">
        <div class="text-center top-text">
			<?php if($techup_team_title) : ?>
			  <h1 class="section-title"><?php echo esc_html($techup_team_title); ?></h1>
			<?php endif; ?>  
			<?php if($techup_team_subtitle) : ?>  
			  <p class="section-description"><?php echo esc_html($techup_team_subtitle); ?></p>
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
			while($techup_teams_query->have_posts() && $count <= 5 ) :
			$techup_teams_query->the_post();
			?>
			  <div class="col-lg-4 col-md-6 col-sm-12">
				<div class="our-team">
				  <?php the_post_thumbnail(); ?>
				  <div class="team-content">
					<a href="<?php the_permalink(); ?>"><h3 class="team-title"><?php the_title(); ?></h3></a>
				  </div>
				  <a href="<?php the_permalink(); ?>" class="read">
					<i class="fa fa-plus"></i>
				  </a>
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
    <!-- End Team Section -->

	
<?php } ?>