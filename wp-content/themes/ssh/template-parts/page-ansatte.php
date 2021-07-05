<?php
/**
 * Template Name: Page Ansatte
 * Description: Page template for Ansatte
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
		

               $loop = new WP_Query( array( 
                    'post_type' => 'ansatte', 
                    'posts_per_page' => '1000', 
                    'orderby' => 'date', 
                    'order' => 'ASC', 
                    'ignore_sticky_posts' => 1 
                ));
          
             $section2_html = '
             <div class="alignfull has-background pt-5 pb-5 mt-5">
                         <div class="wp-block-group__inner-container pt-0 mt-1 pb-5">

                         <div class="container-fluid">
                            
                             <div class="row mt-1 pt-1">';

                            $cnt = 1;
                            if ( $loop->have_posts() ) :
                                while ( $loop->have_posts() ) : $loop->the_post(); 

                                $image = get_field('ansatte_image');
                            
                                
                                    $section2_html .= '<div class="col-6 mb-5 pb-5">

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="thumb mb-4">';
                                                if($image):
                                                    $section2_html .= '<img src="'.esc_url($image['url']).'" class="object-fit-ansatte border" />';
                                                else:
                                                    $section2_html .= '<div class="blank-ansatte"></div>';
                                                endif;
                                    
                                    $section2_html .= ' </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="blocktext mt-4">
                                                    <h4 class="has-text-align-left has-black-color has-text-color mb-3">'.get_the_title().'</h4>
                                                    <p class="has-text-align-left has-text-color pr-3 mb-2">'.get_field('ansatte_position').'</p>
                                                    <p class="has-text-align-left has-text-color pr-3 mb-2">'.get_field('ansatte_department').'</p>
                                                    <p class="has-text-align-left has-text-color pr-3">'.get_field('ansatte_email_address').'</p>
                                                </div>
                                            </div>

                                        </div>
                                       
                                    </div>';
                             
                                
                               
                                 
                            $cnt++;
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
