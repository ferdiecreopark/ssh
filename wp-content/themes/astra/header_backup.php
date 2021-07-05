<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>

</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<div 
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>
	<?php 
	astra_header_before(); 

	astra_header(); 

	astra_header_after();

	astra_content_before(); 
	?>


<?php
$bread = do_shortcode('[wpseo_breadcrumb]');
?>

<?php
	//ACF Fields - Banner Settings
	if( get_field('display_banner') ) {
		//Banner Settings
		$banner_settings = get_field('banner_settings');
		$background = '';
		if( $banner_settings ): 
			//Banner background file
			$background_type = $banner_settings['background']['background_type'];
			if($background_type == 'image'):
				$background = $banner_settings['background']['image_background']['url'];
			elseif($background_type == 'video'):
				$background = $banner_settings['background']['video_background'];
			elseif($background_type == 'color'):
				$background = $banner_settings['background']['color_background'];
			endif;
			
			//Banner Text
			$banner_text = get_field('banner_text');
			$tagline = $banner_settings['banner_text']['tagline'];
			$sub_tagline = $banner_settings['banner_text']['sub_tagline'];
			$vert_text_position = $banner_settings['banner_text']['text_position']['vertical_align'];
			$hor_text_position = $banner_settings['banner_text']['text_position']['horizontal_align'];
			$text_color = $banner_settings['banner_text']['text_color'];
			$button_label = $banner_settings['banner_text']['button']['button_label'];
			$button_url = $banner_settings['banner_text']['button']['button_url'];

			//Banner Size
			$banner_size = get_field('banner_size');
			$margin = $banner_settings['banner_size']['margin'];
				$margin_top = $banner_settings['banner_size']['margin']['top'];
				$margin_right = $banner_settings['banner_size']['margin']['right'];
				$margin_bottom = $banner_settings['banner_size']['margin']['bottom'];
				$margin_left = $banner_settings['banner_size']['margin']['left'];
			$padding = $banner_settings['banner_size']['padding'];
				$padding_top = $banner_settings['banner_size']['padding']['top'];
				$padding_right = $banner_settings['banner_size']['padding']['right'];
				$padding_bottom = $banner_settings['banner_size']['padding']['bottom'];
				$padding_left = $banner_settings['banner_size']['padding']['left'];
			$banner_height = $banner_settings['banner_size']['banner_height'];


			//Get Values
			//Banner Height
			if($banner_height):
				$minheight = 'min-height: '.$banner_height.'px; ';
			else:
				$minheight = 'min-height: 250px;';
			endif;
			//Get Source
			if($background_type == 'image'):
				$bg_html = 'background-image: url('.$background.'); ';
			elseif($background_type == 'video'):
				$bg_html = 'background-image: url('.$background.'); ';
			elseif($background_type == 'color'):
				$bg_html = 'background-color: '.$background.'; ';
			endif;
			

			
			$banner_html = '<div class="wp-block-cover alignfull has-black-background-color has-background-dim" style="'.$bg_html.' '.$minheight.'">';
		
			$banner_html .= '<div class="wp-block-cover__inner-container">';
			if ( function_exists('yoast_breadcrumb') ) :
				if( get_field('display_breadcrumbs') ) :
					$banner_html .= '<div class="crumbs mb-5">'.$bread.'</div>';
				endif;
			endif;	
		
			if($tagline):
				$banner_html .=	'<h1 class="has-text-align-center has-text-color banner-title" style="color:'.$text_color.';">'.$tagline.'</h1>';
			endif;
			
			if($sub_tagline):
				$banner_html .=	'<h2 class="has-text-align-center has-text-color mt-4" style="color:'.$text_color.';">'.$sub_tagline.'</h2>';
			endif;

			if($button_label):
			$banner_html .=	'<div class="wp-block-buttons aligncenter mt-4 is-content-justification-center">
								<div class="wp-block-button"><a href="'.$button_url.'" class="wp-block-button__link">'.$button_label.'</a></div>
							</div>';
			endif;

			$banner_html .=	'	</div>		</div>';
			
			//Display Banner
			echo $banner_html;

		endif;
		
		

	}else{
		if ( function_exists('yoast_breadcrumb') ) :
		if( get_field('display_breadcrumbs') ) :
			$banner_html = '<div class="alignfull pt-4 pb-4">';
			$banner_html .= '<div class="wp-block-cover__inner-container">';
					$banner_html .= '<div class="crumbs">'.$bread.'</div>';
			$banner_html .=	'	</div>		</div>';
			echo $banner_html;
		endif;
		endif;
	}
?>





	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>



