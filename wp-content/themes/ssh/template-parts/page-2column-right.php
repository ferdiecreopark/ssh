<?php
/**
 * Template Name: Page 2 Column Right
 * Description: Page template for 2 Column Right
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
$caption = get_the_post_thumbnail_caption(get_the_ID());
?>
<div class="wp-block-group alignfull has-white-background-color has-background">
							<div class="pt-0 mt-0 pb-5">

							<div class="container">
								<?php
								if($featured_img_url):
								?>
									<div class="row">
										<div class="col-12 alignleft">
											<img src="<?php echo $featured_img_url;?>" class="img-fluid object-fit-featured">
											<?php
											if($caption):
												echo '<span class="img_caption"><em>'.$caption.'</em></span>';
											endif;
											?>
										</div>
									</div>
								<?php
								endif;
								?>
								<div class="row">
									<div class="col-8 pt-5 pb-5 pl-5 pr-5">
										<div class="mt-5 mr-4 ml-4">
											<?php the_content(); ?>
										</div>
									</div>
                                    <div class="col-4 pt-5 pb-5 pl-5 pr-5">
										<div class="mt-5 mr-4 ml-4">
											<?php echo get_field('sidebar_content'); ?>
										</div>
									</div>
								</div>
							</div>
							
							</div>
						</div>



<?php get_footer(); ?>
