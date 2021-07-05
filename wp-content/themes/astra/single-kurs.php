<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php
if ( function_exists('yoast_breadcrumb') ) :
	$bread = do_shortcode('[wpseo_breadcrumb]');
	$banner_html = '<div class="container">
	<div class="row"><div class="alignfull pt-4 pb-4">';
	$banner_html .= '<div class="wp-block-cover__inner-container">';
			$banner_html .= '<div class="crumbs">'.$bread.'</div>';
	$banner_html .=	'</div></div></div></div>';
	echo $banner_html;
endif;
?>



	<div id="primary" <?php astra_primary_class(); ?>>
	<?php astra_primary_content_top(); ?>

                        <div class="wp-block-group alignfull has-white-background-color pt-5 has-background">
							<div class="wp-block-group__inner-container pb-5">

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									   <h2 class="mb-5"><?php the_title();?></h2>

                                       <?php 
                                        $image = get_field('main_image');
                                        if( !empty( $image ) ): ?>
                                            <img class="mb-0 mt-4 img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php
											if($image['caption']):
												echo '<span class="img_caption mb-4"><em>'.$image['caption'].'</em></span>';
											else:
												echo '<div class="mb-4"></div>';
											endif;
											?>
                                        <?php endif; ?>

                                       <?php the_content(); ?>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <h4 class="pb-4 mb-3">Praktisk informasjon</h4>
										<?php echo get_field('praktisk_informasjon');?>
									</div>
								</div>
							</div>
							
							</div>
						</div>

	<?php astra_primary_content_bottom(); ?>
	</div><!-- #primary -->


<?php get_footer(); ?>
