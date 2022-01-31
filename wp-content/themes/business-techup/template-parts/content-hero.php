<?php
$techup_enable_banner_section = get_theme_mod( 'techup_enable_banner_section', true );
$techup_banner_image = get_theme_mod( 'techup_banner_image', esc_url(  get_template_directory_uri() . '/assets/images/banner.jpg' ) );
$techup_banner_title = get_theme_mod( 'techup_banner_title','');
$techup_banner_content = get_theme_mod( 'techup_banner_content','');
$techup_banner_button_label1 = get_theme_mod( 'techup_banner_button_label1','');
$techup_banner_button_link1 = get_theme_mod( 'techup_banner_button_link1','');
      
if($techup_enable_banner_section==true ) {
?>  
 	<section class="hero-section" style="background-image:url(<?php if($techup_banner_image) { echo esc_html($techup_banner_image); } else { echo esc_html(get_header_image()); } ?>)">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center wow fadeInUp" data-wow-delay="0.2s">
              <div class="header-heading">
                <h2 class="hero-title">
                  <?php echo esc_html($techup_banner_title); ?>
                </h2>
				<?php if($techup_banner_button_label1) :?>
					<div class="btn-wraper wow fadeInUp" data-wow-delay="0.4s">
					  <a href="<?php echo esc_url($techup_banner_button_link1); ?>" class="creative_button">                     
						<span><?php echo esc_html($techup_banner_button_label1); ?><i class="fa fa-external-link"></i></span>
					  </a>
					</div>
				<?php endif; ?>		
              </div>
            </div>
          </div>
        </div>
    </section>
	
	<div id="content"></div>

    <!--End Hero-->
 
<?php
}
?>