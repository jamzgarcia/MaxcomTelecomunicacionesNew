<?php
$techup_enable_callout_section1 = get_theme_mod( 'techup_enable_callout_section1', false );
$techup_co1_image = get_theme_mod( 'techup_co1_image' );

if($techup_enable_callout_section1 == true ) {
$techup_callout_title1 = get_theme_mod( 'techup_callout_title1');
$techup_callout_content1 = get_theme_mod( 'techup_callout_content1');
if($techup_co1_image=="")
{
	$techup_co1_image = esc_url(  get_template_directory_uri() . '/assets/images/banner.jpg' ); 
}
?>
 
</section>	

 
	
	<!--==== Start CTA- Section 2 =====------>

    <section class="cta-sec-2 business-co1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="0.2s">
            <div class="heading">
              <h2 class="section-title"><?php echo esc_html($techup_callout_title1); ?></h2>
              <div class="heading-description">
                <p><?php echo esc_html($techup_callout_content1); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!------ End CTA- Section 2------>

<?php } ?>