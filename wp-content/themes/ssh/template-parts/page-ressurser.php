<?php
/**
 * Template Name: Page Ressurser
 * Description: Page template for Ressurser
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 


$featured = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$caption = get_the_post_thumbnail_caption(get_the_ID());
$section_content_html = '<div class="alignfull has-white-background-color has-background pt-0 mt-0">
<div class="">

<div class="container">

	<div class="row">
		<div class="col-12 mt-5 p-0">
			<img src ="'.$featured.'" class="object-fit-featured img-fluid">';
			if($caption):
				$section_content_html .= '<span class="img_caption"><em>'.$caption.'</em></span>';
			endif;
		$section_content_html .= '
		</div>
	</div>
	<div class="row">
	
		<div class="col-12 pl-5 pr-5 pt-5">
			'.get_the_content().'
		</div>
	</div>
</div>

</div>
</div>
';
echo $section_content_html;
?>




<?php
    $section1_html = '';
    // Get all the categories
    $categories = get_terms( 'ressurser_categories' );

    // Loop through all the returned terms
    foreach ( $categories as $category ):
          
                $image = '';
                $category_title = '<a class="btn  btn-default " href="' . get_category_link($category->term_id) . '"><h3>' . $category->name . '</h3></a>';

                $section1_html .= '<div class="wp-block-group alignfull has-white-background-color has-background mt-0 pt-0 mb-0 pb-3">
							<div class="wp-block-group__inner-container pt-0 pb-1">

							<div class="container-fluid">
                                <div class="wp-block-group mt-0 pt-0 alignfull has-white-background-color has-background ressurserlistholder">';

                $section1_html .= '<div class="row border-bottom ressurserlist">
									<div class="col-12 p-0"><h3><strong>'.$category_title.'</strong></h3></div>
                                    <div class="col-12"><h5 class="pt-4 pb-5 mb-4">'.$category->description.'</h5></div>';

                                   // set up a new query for each category, pulling in related posts.
                                    $services = new WP_Query(
                                        array(
                                            'post_type' => 'ressurser',
                                            'showposts' => -1,
                                            'orderby' => 'date', 
                                            'order' => 'ASC', 
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy'  => 'ressurser_categories',
                                                    'terms'     => array( $category->slug ),
                                                    'field'     => 'slug'
                                                )
                                            )
                                        )
                                    );
                                    
                                    //print_r($loop);

                                    $section1_html .= '<div class="col-12"><div class="row mb-5 pb-5">';
                                    while ($services->have_posts()) : $services->the_post();
        
                                        $image = get_field('ressurser_image');
                                    
                                    
                                            $section1_html .= '<div class="col-6 pb-5">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="thumb mb-4">
                                                                                <a href="'.get_field('ressurser_image_link').'" target="_blank"><img class="img-fluid img-responsive pl-5 pr-3" src="'.$image['url'].'"></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="blocktext">
                                                                                <a href="'.get_the_permalink().'"><h5 class="has-text-align-left has-black-color has-text-color mb-4 mt-3">'.get_the_title().'</h5></a>';
                                                                                if(get_field('ressurser_link')):
                                                                                    $section1_html .= '<p class="has-text-align-left has-text-color pr-3 mt-4"><a href="'.get_field('ressurser_link').'"><strong><u>'.get_field('ressurser_link_label').'</u></strong></a></p>';
                                                                                endif;
                                                                                if(get_field('ressurser_content')):
                                                                                    $section1_html .= '<p class="has-text-align-left has-text-color pr-3 mt-4"><h5>'.get_field('ressurser_content').'</h5></p>';
                                                                                endif;
                                                                                $section1_html .= '</div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                      
                                       
                                         
                                    
                                    endwhile;
                                    $section1_html .= '</div>';


                                    $section1_html .= '</div>';
                                
                $section1_html .= '</div></div>
							</div>
							
							</div>
						</div>
				';
				

      // Reset things, for good measure
      $services = null;
      wp_reset_postdata();
  
  // end the loop
  endforeach;

  echo $section1_html;

?>





<?php get_footer(); ?>
