<?php
/**
 * Template Name: Page Regionalt samarbeid
 * Description: Page template for Regionalt samarbeid
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
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>
<div class="wp-block-group alignfull has-white-background-color has-background">
							<div class="pt-0 mt-0 pb-5">

							<div class="container">
								<?php
								if($featured_img_url):
								?>
									<div class="row">
										<div class="col-12 aligncenter">
											<img src="<?php echo $featured_img_url;?>" class="img-fluid object-fit-featured mb-5">
										</div>
									</div>
								<?php
								endif;
								?>
								<div class="row">
									<div class="col-12 pt-1 pb-5 pl-5 pr-5">
										<div class="mt-0 mr-4 ml-4">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>
							
							</div>
						</div>


<?php
		//Get ACF fields
       
		
	
				
				$section1_html = '<div class="wp-block-group alignfull has-white-background-color has-background pt-1 mt-1">
							<div class="wp-block-group__inner-container mt-1 pt-1">

							<div class="container-fluid">
								<div class="row">';
									
                                $departments = get_field('content'); 
                                $cnt = 1;
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

                                                if($cnt >= 1 && $cnt <= 3):
                                                $section1_html .= '<div class="col-4 pb-5">
                                                        <div class="thumb mb-4 mt-0">
                                                            <a href="'.get_the_permalink().'"><img class="object-fit-300" src="'.$featured[0].'"></a>
                                                        </div>
                                                        <div class="blocktext">
                                                            <h3 class="has-text-align-center has-black-color has-text-color mb-4 mt-2"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                                           
                                                        </div>
                                                    </div>';
                                                else:
                                                    $section1_html .= '<div class="col-12 pb-5">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="thumb mb-4 mt-4">
                                                                    <a href="'.get_the_permalink().'"><img class="object-fit-300" src="'.$featured[0].'"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="blocktext">
                                                                    <h3 class="has-text-align-left has-black-color has-text-color mb-4 mt-5 pt-5"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
                                                                    <h5 class="has-text-align-left has-text-color pr-3 mt-4">'.$excerpt.'... <a href="'.get_the_permalink().'"><strong><u>Les mer</u></strong></a></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                endif;
                                    
                                            endwhile;
                                        endif;
                                        

                                        $cnt++;
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
