<?php 
if ( ! function_exists( 'icycp_consultco_service' ) ) :
    function icycp_consultco_service() {
    $service_section_title = get_theme_mod('service_section_title',__('Services','icyclub'));
    
    $service_section_discription = get_theme_mod('service_section_discription','Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim idm est laborum.');
    
    $service_section_subtitle = get_theme_mod('service_section_subtitle','We Create Digital Opportunities');
    $service_contents           = get_theme_mod('service_contents',consultco_get_service_default());
    $service_section_show         = get_theme_mod('service_section_show','1');
        if($service_section_show == '1') {    
?>
    <section id="service-section" class="bs-section service">
        <div class="overlay">
           <div class="container">
            <div class="col text-center">
                 <div class="bs-heading">
                        <?php if ( ! empty( $service_section_title ) ) : ?>
                            <h3 class="bs-subtitle"><?php echo wp_kses_post($service_section_title); ?></h3>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                        <?php if ( ! empty( $service_section_subtitle ) ) : ?>      
                            <h2 class="bs-title"><?php echo wp_kses_post($service_section_subtitle); ?></h2>    
                        <?php endif; ?> 
                        <?php if ( ! empty( $service_section_discription ) ) : ?>       
                            <p class="bs-desc"><?php echo wp_kses_post($service_section_discription); ?></p>    
                        <?php endif; ?> 
                </div>
            </div>
            <div class="row">
                <?php
                    if ( ! empty( $service_contents ) ) {
                    $service_contents = json_decode( $service_contents );
                    foreach ( $service_contents as $service_item ) {
                        $consultco_service_title = ! empty( $service_item->title ) ? apply_filters( 'consultco_translate_single_string', $service_item->title, 'service section' ) : '';
                        $text = ! empty( $service_item->text ) ? apply_filters( 'consultco_translate_single_string', $service_item->text, 'service section' ) : '';
                        $icon = ! empty( $service_item->icon_value) ? apply_filters( 'consultco_translate_single_string', $service_item->icon_value,'service section' ) : '';
                        $consultco_ser_link = ! empty( $service_item->link ) ? apply_filters( 'consultco_translate_single_string', $service_item->link, 'service section' ) : '';
                ?>
                <div class="col-md-4">
                    <div class="bs-sevice two text-center shd">
                        <div class="bs-sevice-inner">
                            <?php if ( ! empty( $icon ) ) {?>
                                <i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
                            <?php } ?>
                            <?php if ( ! empty( $consultco_service_title ) ) : ?>
                                <h4><a href="<?php echo esc_url( $consultco_ser_link ); ?>"><?php echo esc_html( $consultco_service_title ); ?></a></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $text ) ) : ?>
                                <p><?php echo esc_html( $text ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
      </div>
    </section>
<?php   
    }} endif; 
    if ( function_exists( 'icycp_consultco_service' ) ) {
        $section_priority = apply_filters( 'icycp_consultup_homepage_section_priority', 12, 'icycp_consultco_service' );
        add_action( 'icycp_consultco_homepage_sections', 'icycp_consultco_service', absint( $section_priority ) );
    }