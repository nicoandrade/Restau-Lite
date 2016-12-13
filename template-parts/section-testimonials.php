<?php
$restau_lite_enable_section = get_theme_mod( 'restau_lite_testimonial_enable', true );
if ( $restau_lite_enable_section || is_customize_preview() ) :
?>
        </div><!-- /col-md-12 --> 
    </div><!-- /row -->
</div><!-- /container -->
<div id="testimonials-section" class="testimonials-section" <?php if( false == $restau_lite_enable_section ): echo 'style="display: none;"'; endif ?>>
    <?php
    $restau_lite_testimonials_title_serif = get_theme_mod( 'restau_lite_testimonials_title_serif', esc_html__( 'Customers', 'restau-lite' ) );
    $restau_lite_testimonials_title = get_theme_mod( 'restau_lite_testimonials_title', esc_html__( 'Testimonials', 'restau-lite' ) );
    ?>
    <h3 class="style-title wow fadeIn"><a href="<?php echo esc_url( $blog_url ); ?>"><span><?php echo esc_html( $restau_lite_testimonials_title_serif ); ?></span> <?php echo esc_html( $restau_lite_testimonials_title ); ?></a></h3>
    <div class="testimonials-wrap js-flickity wow fadeIn" data-flickity-options='{ "cellAlign": "center", "contain": true, "prevNextButtons": false, "pageDots": true, "autoPlay": 5000 }'>
    	<?php
        $args = array(
            'post_type' => 'jetpack-testimonial',
            'posts_per_page' => -1
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) { $the_query->the_post();

                echo '<div class="testimonial">';
                    echo '<blockquote cite="' . esc_attr( get_the_title() ) . '">';
                    	the_content();
                    echo '</blockquote>';
                    the_title( '<p class="testimonial-cite">', '</p>' );
                echo '</div>';

            }//while

        }else{// if have posts

            for ( $k = 0 ; $k < 3; $k++ ){
                echo '<div class="testimonial"><blockquote cite="John">';
                echo esc_html__( '"We have been to Restau Lite many times over the years. We know what to expect: great food and great prices. I suggest checking them out."', 'restau-lite' );
                echo '</blockquote>';
                $wp_kses_args = array(
                    'span' => array(),
                );
                $testimonial_cite = wp_kses( __( 'John Smith <span>TripAdvisor</span>', 'restau-lite' ), $wp_kses_args );
                echo '<p class="testimonial-cite">' . $testimonial_cite . '</p>';
                echo '</div>';
            }

        }
        wp_reset_postdata();
        ?>
    </div><!-- testimonials-wrap -->

</div><!-- testimonials-section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
<?php endif ?>