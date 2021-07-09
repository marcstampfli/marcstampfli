<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="container page-title text-center">
    <?php /* <h2>&#60;<?php the_archive_title(); ?> &#47;&#62;</h2> */ ?>
    <h2><?php the_archive_title(); ?></h2>
</div>

<div class="divider text-center">
    <span class="outer-line"></span><span class="fa fa-briefcase" aria-hidden="true"></span><span class="outer-line"></span>
</div>

<?php /* <div class="container">
    <div class="row">
        <div class="col-">
            <p class="page-text mt-5 mb-5">Here are a few select projects that I have done over the years.</p>
        </div>
    </div>
</div> */ ?>

<section class="portfolio section">
    <div class="container">
        <div class="row sticky-row">
            <div class="col-lg-8 d-flex align-items-center">
                <div class="filters">
                    <ul>

                    <?php /*
                    $query = new WP_Query( array( 
                        'post_type' => 'project', 
                        'nopaging' => true 
                    ) ); 
                    if ( $query->have_posts() ) { 
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $categories = wp_get_object_terms(get_the_ID(), 'category');
                            if ( ! empty( $categories ) ) {
                                if ( ! is_wp_error( $categories ) ) {
                                    foreach( $categories as $category ) {
                                        echo '<li data-filter=".'. esc_html( $category->slug ) .'" class="active">'. esc_html( $category->name ) .'</li>';
                                    }
                                }
                            }
                        }
                    } wp_reset_query(); */?>

                    
                        <?php /*  <li data-filter="*">All</li> */ ?>
                        <li data-filter=".website" class="active">Websites</li>
                        <li data-filter=".web">Web Apps</li>
                        <?php /*  <li data-filter=".mobile">Mobile Apps</li> */ ?>
                        <li data-filter=".design">UI Designs</li>
                        <li data-filter=".flyer">Flyers</li>
                        <li data-filter=".logo">Logos</li>
                        <li data-filter=".bizcard">Business Cards</li>
                        <li data-filter=".story">Social Stories</li>
                        <li data-filter=".signage">Digital Signage</li>
                        <li data-filter=".banner">Banners</li>
                        <?php /*  <li data-filter=".brochure">Brochures</li> */ ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="portfolio-page-svg"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="filters-content">
                    <div class="row grid">
                    <?php 
                    $query = new WP_Query( array( 
                        'post_type' => 'project', 
                        'nopaging' => true 
                    ) ); 
                    if ( $query->have_posts() ) { 
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            get_template_part( 'loop-templates/content', 'projects' );
                        }
                    } wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
