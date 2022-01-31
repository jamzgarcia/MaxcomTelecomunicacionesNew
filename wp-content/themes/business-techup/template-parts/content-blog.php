<?php
$techup_enable_blog_section = get_theme_mod( 'techup_enable_blog_section', true );
$techup_blog_cat 		= get_theme_mod( 'techup_blog_cat', 'uncategorized' );
if($techup_enable_blog_section == true) 
{
	$techup_blog_title 	= get_theme_mod( 'techup_blog_title', esc_html__( 'Our News & Blogs','business-techup'));
	$techup_blog_subtitle 	= get_theme_mod( 'techup_blog_subtitle', esc_html__( 'Latest News','business-techup') );
	$techup_rm_button_label 	= get_theme_mod( 'techup_rm_button_label', esc_html__( 'Read More','business-techup'));
	$techup_blog_count 	 = apply_filters( 'techup_blog_count', 3 );
?> 	
	<!-- blog start-->
        <section class="blog-sec">
          <div class="container">
            <div class="text-center top-text">
				<?php if($techup_blog_title) : ?>
				  <h1 class="section-title"><?php echo esc_html( $techup_blog_title ); ?></h1>
				<?php endif; ?>	
				 <?php if($techup_blog_subtitle) : ?>	  
				  <p class="section-description"><?php echo esc_html( $techup_blog_subtitle ); ?></p>
				<?php endif; ?>	  
            </div>
            <div class="divider text-center">
              <span class="outer-line"></span>
              <span class="fa fa-diamond"></span>
              <span class="outer-line"></span>
            </div>
            <div class="row latest-posts-content">
				<?php 
				if( !empty( $techup_blog_cat ) ) 
					{
					$blog_args = array(
						'post_type' 	 => 'post',
						'category_name'	 => esc_attr( $techup_blog_cat ),
						'posts_per_page' => absint( $techup_blog_count ),
					);

					$blog_query = new WP_Query( $blog_args );
					if( $blog_query->have_posts() ) 
					{
						while( $blog_query->have_posts() ) 
						{
							$blog_query->the_post();
							?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="latest-post">
							<?php if(the_post_thumbnail()): ?>
								<a class="img-thumb" href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="img"></a>
                            <?php endif; ?>
							<div class="post-body">
                                <h4 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="post-text">
                                   <?php the_excerpt(); ?>
                                </div>
                            </div>
							
                            <div class="post-date">
                                <span><?php echo esc_html(get_the_date('j')); ?></span>
                                <span><?php echo esc_html(get_the_date('M')); ?></span>
                            </div>
							<?php if($techup_rm_button_label):?>
								<a class="custom-button" href="<?php the_permalink(); ?>"><span data-hover="Read more"><?php echo esc_html($techup_rm_button_label); ?></span></a>
							<?php endif; ?>
						</div>
                    </div>
                    <?php
						}
					}
					wp_reset_postdata();
				} ?>
                     
                </div>
              </div>
            </section>

        <!-- blog end-->	

<?php } ?>