<?php
/**
 * Template for Single post
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

?>

<?php
if ( function_exists('yoast_breadcrumb') ) :
	$bread = do_shortcode('[wpseo_breadcrumb]');
	$banner_html = '<div class="alignfull pt-4 pb-4">';
	$banner_html .= '<div class="wp-block-cover__inner-container">';
			$banner_html .= '<div class="crumbs">'.$bread.'</div>';
	$banner_html .=	'	</div>		</div>';
	echo $banner_html;
endif;
?>

<?php
$featured = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$caption = get_the_post_thumbnail_caption(get_the_ID());
$section1_html = '<div class="alignfull has-white-background-color has-background pt-3">
<div class="">

<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="aligncenter">'.get_the_title().'</h1>
			</div>
		</div>
</div>
<div class="container">

	<div class="row">
		<div class="col-12 mt-5 p-0">
			<img src ="'.$featured.'" class="object-fit-featured img-fluid">';
			if($caption):
				$section1_html .= '<span class="img_caption"><em>'.$caption.'</em></span>';
			endif;
		$section1_html .= '</div>
	</div>
	<div class="row">
	<div class="col-12 pl-5 pr-5 pt-5">
			<h3>'.get_the_excerpt().'</h3>
		</div>
		<div class="col-12 pl-5 pr-5 pt-5">
			'.get_the_content_with_formatting().'
		</div>
	</div>
</div>

</div>
</div>
';
echo $section1_html;
?>

<div class="container">

	<div class="row">
		<div class="col-12 mt-5 p-0">
	<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>

</div>

</div>
</div>