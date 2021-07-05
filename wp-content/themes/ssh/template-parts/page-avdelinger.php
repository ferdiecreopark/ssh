<?php
/**
 * Template Name: Page Avdelinger
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
        if(get_field('main_content')):
            $main_html = '<div class="wp-block-group alignfull has-white-background-color has-background">
            <div class="wp-block-group__inner-container pt-4 pb-4">
    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                '.get_field('main_content').'
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            ';
            echo $main_html;
            endif;
    
		
	
				
				$section1_html = '<div class="wp-block-group alignfull has-white-background-color has-background mt-0 pt-0">
							<div class="wp-block-group__inner-container">

							<div class="container-fluid">
								<div class="row">';
									
                                $departments = get_field('content'); 
                                foreach ($departments as $department) { 
                                    foreach($department as $subp){
                                        //echo $subp->ID; 

                                            $loop = new WP_Query( array( 
                                                'post_type' => 'page',
                                                'p' => $subp->ID
                                            ));

                                        if ( $loop->have_posts() ) :
                                            while ( $loop->have_posts() ) : $loop->the_post(); 
                
                                                if ( has_post_thumbnail() ) {
                                                    $featured = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                                }
                                                $excerpt = get_field('page_excerpt');

                                                $section1_html .= '<div class="col-6">
                                                <div class="thumb mb-4 mt-4">
                                                    <a href="'.get_the_permalink().'"><img class="object-fit-300" src="'.$featured[0].'"></a>
                                                </div>
                                                <div class="blocktext">
                                                    <h3 class="has-text-align-center has-black-color has-text-color mb-4 mt-5"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                                    <p class="has-text-align-left has-text-color pr-3">'.$excerpt.'... <a href="'.get_the_permalink().'"><strong><u>Les mer</u></strong></a></p>
                                                </div>
                                            </div>';
                                    
                                            endwhile;
                                        endif;
                                        
                                    }
                                }
                        
                                


				$section1_html .= '				</div>
							</div>
							
							</div>
						</div>
				';
				echo $section1_html;
			
             ?>






<?php get_footer(); ?>
