<?php
/**
 * Template Name: Page Aktuelt
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
		

               $loop = new WP_Query( array( 
                    'post_type' => 'post', 
                    'posts_per_page' => '12', 
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'ignore_sticky_posts' => 1 
                ));
          
             $section2_html = '
             <div class="alignfull has-background pt-5 pb-5 mt-2">
                         <div class="wp-block-group__inner-container pt-0 mt-1 pb-5">

                         <div class="container-fluid">
                            
                             <div class="row mt-1 pt-1">';

                            $cnt = 1;
                            $total_post_cnt = $loop->found_posts;
                            
                            if ( $loop->have_posts() ) :
                                while ( $loop->have_posts() ) : $loop->the_post(); 

                                if ( has_post_thumbnail() ) {
                                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                }
                            
                            
                                if($cnt == 1):
                                    $section2_html .= '<div class="col-12 mb-5 pb-5">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="thumb mb-4">
                                                    <a href="'.get_the_permalink().'"><img class="object-fit-300" src="'.$featured[0].'"></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="blocktext">
                                                    <h2 class="has-text-align-left has-black-color has-text-color mb-4 mt-5"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
                                                    <p class="has-text-align-left has-text-color pr-3">'.get_the_excerpt().'... <a href="'.get_the_permalink().'"><strong><u>Les mer</u></strong></a></p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>';
                                elseif($cnt >= 2 && $cnt <= 3 && $total_post_cnt <= 6):
                                    $section2_html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5 pb-5">
                                        <div class="thumb mb-4">
                                            <a href="'.get_the_permalink().'"><img class="object-fit-250" src="'.$featured[0].'"></a>
                                        </div>
                                        <div class="blocktext">
                                            <h4 class="has-text-align-left has-black-color has-text-color mb-3"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                                            <p class="has-text-align-left has-text-color pr-3">'.get_the_excerpt().'... <a href="'.get_the_permalink().'"><strong><u>Les mer</u></strong></a></p>
                                        </div>
                                    </div>';
                                else:
                                    $section2_html .= '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
                                    <div class="thumb mb-4">
                                        <a href="'.get_the_permalink().'"><img class="object-fit-250" src="'.$featured[0].'"></a>
                                    </div>
                                    <div class="blocktext">
                                        <h4 class="has-text-align-left has-black-color has-text-color mb-3"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                                        <p class="has-text-align-left has-text-color pr-3">'.get_the_excerpt().'... <a href="'.get_the_permalink().'"><strong><u>Les mer</u></strong></a></p>
                                    </div>
                                    </div>';
                                endif;
                            
                               
                                 
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
