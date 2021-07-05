<?php
/**
 * Template Name: Page Om Oss 
 * Description: Page template for om oss
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





		//Get ACF fields
		
		if( get_field('section_1') ) :

			$section1 = get_field('section_1');
			
				$sec1_image = $section1['image']['url'];
				$title = $section1['title'];
				$text = $section1['text'];
				$btn = $section1['read_more_link'];
				
				$section1_html = '<div class="wp-block-group alignfull has-white-background-color has-background mt-0">
							<div class="wp-block-group__inner-container pt-0 mt-0 pb-0">

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-12 col-12 pb-5 align-middle">
									    <img src="'.$sec1_image.'" class="img-fluid">
									</div>
									<div class="col-lg-8 col-md-12 col-12">
										<div class="pl-lg-5 pl-md-0">
										'.$text.'
										</div>
									</div>
								</div>
							</div>
							
							</div>
						</div>
				';
				echo $section1_html;
			
		endif;
		

		if( get_field('section_2') ) :

			$section2 = get_field('section_2');
			
				$block_1_image = $section2['block_1_image']['url'];
				$block_1_title = $section2['block_1_title'];
                $block_1_url = $section2['block_1_url'];

                $block_2_image = $section2['block_2_image']['url'];
				$block_2_title = $section2['block_2_title'];
                $block_2_url = $section2['block_2_url'];
				
				$section2_html = '
				<div class="alignfull has-background pt-0 mt-0 pb-5">
							<div class="wp-block-group__inner-container mt-0 pt-0 pb-5">

							<div class="container-fluid">
								<div class="row mt-2">';

						
									
									$section2_html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="mr-4">
										<div class="thumb mb-4">
											<img class="object-fit-280 img-dashed" src="'.$block_1_image.'">
										</div>
										<div class="blocktext">
                                        <a href="'.$block_1_url.'"><h3 class="has-text-align-center has-black-color has-text-color mb-3">'.$block_1_title.'</h3></a>
											';
										$section2_html .= '</p></div>
                                        </div>
									</div>';

                                    

									$section2_html .= '<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="ml-lg-4 ml-md-4 ml-sm-0 ml-0">
										<div class="thumb mb-4">
											<img class="object-fit-280 img-dashed" src="'.$block_2_image.'">
										</div>
										<div class="blocktext">
                                        <a href="'.$block_2_url.'"><h3 class="has-text-align-center has-black-color has-text-color mb-3">'.$block_2_title.'</h3></a>
											';
										$section2_html .= '</p></div>
                                        </div>
									</div>';
								
									

					$section2_html .= '
								</div>		
							</div>
							
							</div>
						</div>
				';
				echo $section2_html;
			
		endif;
		
		?>
		
	


<?php get_footer(); ?>
