<?php
$techup_enable_callout_section = get_theme_mod( 'techup_enable_callout_section', false );
$techup_co2_image = get_theme_mod( 'techup_co2_image' );

if($techup_enable_callout_section == true ) {
   
$techup_callout_title = get_theme_mod( 'techup_callout_title');
$techup_callout_content = get_theme_mod( 'techup_callout_content');
$techup_callout_button_label1 = get_theme_mod( 'techup_callout_button_label1');
$techup_callout_button_link1 = get_theme_mod( 'techup_callout_button_link1');
if($techup_co2_image=="")
{
	$techup_co2_image = esc_url(  get_template_directory_uri() . '/assets/images/banner.jpg' ); 
}
?>
 <!-- Start CTA Section -->
	  <section class="cta-sec-one business-co2" style="background-image: url(<?php if($techup_co2_image) { echo esc_url($techup_co2_image); } else { echo esc_url(get_header_image()); } ?>);">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s">
              <div class="banner-text text-center">
                <h2 class="text-white"><?php echo esc_html($techup_callout_title); ?></h2>
                <h5><?php echo esc_html($techup_callout_content); ?></h5>
				<?php if($techup_callout_button_label1) :?>
					<div class="btn-wraper">
					  <a href="<?php echo esc_url($techup_callout_button_link1); ?>" class="creative_button">                     
						<span><?php echo esc_html($techup_callout_button_label1); ?><i class="fa fa-external-link"></i></span>
					  </a>
					</div>
				<?php endif; ?>	
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- End CTA Section -->

<?php } ?>