<?php
/**
 * Template Name: About Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="container page-title text-center">
    <?php /* <h2>&#60;<?php the_archive_title(); ?> &#47;&#62;</h2> */ ?>
    <h2><?php the_title(); ?></h2>
</div>

<div class="divider text-center">
	<span class="outer-line"></span><span class="fa fa-address-card" aria-hidden="true"></span><span class="outer-line"></span>
</div>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'loop-templates/content', 'blank' );
                    }
                ?>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="about-page-svg"></div>
                <div class="download-resume">
                    <a class="button-link shadow" href="<?php echo get_field("resume"); ?>" target="_blank">download résumé <i class="fa fa-file-pdf-o"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
