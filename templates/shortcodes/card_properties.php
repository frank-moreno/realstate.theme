<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function card_properties_shortcode() {

    // reset the query
    wp_reset_query();

    // WP_Query  arguments
    $args = array(
        'post_type'              => array( 'property' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => '-1',
        'order'                  => 'ASC',
        // 'orderby'                => 'menu_order',
    );

    // The Query
    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {

        $output = '<div class="swiper-container swiper-properties">
                        <div class="swiper-wrapper">';

        while ( $query->have_posts() ) {
            $query->the_post();

            $address = get_field('address');
            $price = get_field('price');
            $bedrooms = get_field('bedrooms');
            $bathrooms = get_field('bathrooms');
            $sq_ft = get_field('sq_ft');
            $carpark = get_field('carpark');
            $description = get_field('description');

            $cat = get_the_category(); //echo $cat[0]->cat_name;

            $output .= '<div class="swiper-slide">
                        <div class="property-item u-faux-box-link">
                            <div class="property-item__image">
                                <span class="property-item__status">'.$cat[0]->cat_name.'</span>
                                <img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">
                            </div>
                            <div class="property-item__content">
                                <h3 class="property-item__title">' . get_the_title() . '</h3>
                                <div class="property-item__address">
                                    <span>' . $address . '</span> 
                                </div>
                                <div class="property-item__description>
                                    <span class="price">' . $price . '</span> 
                                    <span class="title"> '. get_the_title() .' </span>
                                    <span class="description">' . $description . '</span>
                                </div>
                                <div class="property-item__card">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$bedrooms.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Beedrooms</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$bathrooms.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Bathrooms</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$carpark.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Car Park</h6>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="has-dark-blue-color has-text-color has-link-color" style="font-size:14px">'.$sq_ft.'</p>
                                        </div>
                                        <div class="card-footer">
                                            <h6 class="wp-block-heading" style="font-size:14px">Square Ft</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-item__link u-faux-box-link__overlay">
                                    <a class="u-faux-box-link__overlay" href="' . get_the_permalink() . '">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>';
        
        }

        $output .= '</div>
                </div>';

    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();

    return $output;

}

add_shortcode( 'card_properties', 'card_properties_shortcode' );

?>