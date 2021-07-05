<?php
/**
 * Template Name: Page Vare Kurs
 * Description: Page template for Kurs List
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>





<?php
		//Get ACF fields
		
		if( get_field('section_1') ) :

			$section1 = get_field('section_1');
			if( $section1['display_section'] ) :
				$sec1_image = $section1['image']['url'];
				$text = $section1['text'];
                $slide = $section1['slide_shortcode'];
				
				$section1_html = '<div class="wp-block-group alignfull has-white-background-color has-background pt-5">
							<div class="wp-block-group__inner-container">

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-8 col-md-12 col-sm-12 col-12">';


                $section1_html .= $slide;

                $section1_html .= '</div>
									<div class="col-lg-4 col-md-12 col-sm-12 col-12 pt-5 pl-4 pr-4">
										<h4 class="pt-5">'.$text.'</h4>
									</div>
								</div>
							</div>
							
							</div>
						</div>
				';
				echo $section1_html;
			endif;
		endif;

               $loop = new WP_Query( array( 
                    'post_type' => 'kurs', 
                    'posts_per_page' => '12', 
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'ignore_sticky_posts' => 1 
                ));
          
             $section2_html = '
             <div class="alignfull has-background pt-4 pb-5">
                         <div class="wp-block-group__inner-container pt-5 pb-5">

                         <div class="container-fluid">
                            
                             <div class="row mt-5 border-top pt-5">';

                             $cnt = 1;
                            if ( $loop->have_posts() ) :
                                while ( $loop->have_posts() ) : $loop->the_post(); 

                                if ( has_post_thumbnail() ) {
                                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                }
                                     
                                 $section2_html .= '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                     <div class="thumb mb-4">
                                         <a href="'.get_the_permalink().'"><img class="object-fit-250" src="'.$featured[0].'"></a>
                                     </div>
                                     <div class="blocktext mb-5">
                                         <h4 class="has-text-align-left has-black-color has-text-color mb-3"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                                         <p class="has-text-align-left has-text-color pr-3"></p>
                                     </div>
                                 </div>';
                                 
                            endwhile;
                             endif;
                             wp_reset_postdata();
                                     
                                 

                 $section2_html .= '
                             </div>		
                         </div>
                         
                         </div>
                     </div>
             ';
             echo $section2_html;
             ?>






<?php get_footer(); ?>
