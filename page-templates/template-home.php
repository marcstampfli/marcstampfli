<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="home-intro-text wow fadeInLeft" data-wow-delay="0.5s">
                    <?php 
                    if ( have_posts() ) { 
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'loop-templates/content', 'blank' );
                        }
                    } ?>
                </div>
                <div class="wow fadeInLeft" data-wow-delay="0.6s">
                    <a class="button-link shadow" href="<?php echo get_post_type_archive_link( 'project' ); ?>">view my portfolio <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="social-icons">
                    <div class="wow bounceIn" data-wow-delay="0.7s"><a href="https://github.com/marcstampfli" title="GitHub" target="_blank" rel="noopener"><i class="fa fa-github"></i></a></div>
                    <div class="wow bounceIn" data-wow-delay="0.9s"><a href="https://dribbble.com/marcstampfli" title="Dribbble" target="_blank" rel="noopener"><i class="fa fa-dribbble"></i></a></div>
                    <div class="wow bounceIn" data-wow-delay="1.1s"><a href="https://www.instagram.com/marcstampfli" title="Instagram" target="_blank" rel="noopener"><i class="fa fa-instagram"></i></a></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="home-intro-image wow fadeInRight" data-wow-delay="1.2s"></div>
            </div>
        </div>
    </div>
</main>


<?php
get_footer();
