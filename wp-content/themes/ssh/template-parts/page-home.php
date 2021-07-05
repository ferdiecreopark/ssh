<?php
/**
 * Template Name: Page Home 
 * Description: Page template for home page
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

				$loop = new WP_Query( array( 
					'post_type' => 'post', 
					'posts_per_page' => '1', 
					'orderby' => 'date', 
					'order' => 'DESC', 
					'ignore_sticky_posts' => 1 
				));
				$cnt = 1;
				if ( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post(); 
	
					if ( has_post_thumbnail() ) {
						$featured = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
					}

					

					
				
				$section1_html = '<div class="wp-block-group alignfull has-white-background-color has-background">
							<div class="wp-block-group__inner-container pt-5 pb-1">

							<div class="container-fluid">
								<div class="row overlap-img-left" style="background-image: url('.$featured[0].');">
									<div class="col-lg-6 col-md-4 col-sm-12 col-12">
									&nbsp;
									</div>
									<div class="col-lg-6 col-md-8 col-sm-12 col-12" style="padding-top: 70px;">
										<div class="bg-green mt-5 p-5">
										<h2 class="subtitle">'.get_the_title().'</h2>
										<p class="mt-3">'.esc_html( get_the_excerpt() ).'</p>
										<div class="wp-block-buttons is-content-justification-left">
											<div class="wp-block-button"><a href="'.get_the_permalink().'" class="wp-block-button__link">Les mer</a></div>
										</div>
										</div>
									</div>
								</div>
							</div>
							
							</div>
						</div>
				';
				echo $section1_html;

			endwhile;
		endif;
		wp_reset_postdata();


			endif;
		endif;
		

		if( get_field('section_2') ) :

			$section2 = get_field('section_2');
			if( $section2['display_section'] ) :
				$title = $section2['title'];
				$sub_title = $section2['sub_title'];
				
				$section2_html = '
				<div class="alignfull has-background pt-0 pb-5">
							<div class="wp-block-group__inner-container pt-0 pb-5">

							<div class="container-fluid">
								<div class="row">
									<div class="col-12">';
									if($title):
										$section2_html .= '<h2 class="has-text-align-center has-black-color has-text-color">'.$title.'</h2>';
									endif;
									if($sub_title):
										$section2_html .= '<p class="has-text-align-center has-text-color">'.$sub_title.'</p>';
									endif;
				$section2_html .= '</div>
								</div>
								<div class="row mt-2">';

								$rows = $section2['section_2_blocks'];

								if( $rows ): 
										
									foreach( $rows as $row ):
									$sec2_image = $row['image']['url'];
									$sec2_title = $row['title'];
									$sec2_excerpt = $row['excerpt'];
									$sec2_btn_label = $row['button']['label'];
									$sec2_btn_url = $row['button']['url'];
									
									
									$section2_html .= '<div class="col-lg-3 col-md-6 col-sm-6 col-12">
										<div class="thumb mb-4">
											<img class="object-fit-200" src="'.$sec2_image.'">
										</div>
										<div class="blocktext pb-5">
											<h4 class="has-text-align-left has-black-color has-text-color mb-3">'.$sec2_title.'</h4>
											<p class="has-text-align-left has-text-color pr-3">'.$sec2_excerpt.'';
											if($sec2_btn_url):
												$section2_html .= '... <a href="'.$sec2_btn_url.'"><strong>'.$sec2_btn_label.'</strong></a>';
											endif;
										$section2_html .= '</p></div>
									</div>';
									
									endforeach;
								endif;

										
									

					$section2_html .= '
								</div>		
							</div>
							
							</div>
						</div>
				';
				echo $section2_html;
			endif;
		endif;
		
		?>
		
	


<?php get_footer(); ?>
