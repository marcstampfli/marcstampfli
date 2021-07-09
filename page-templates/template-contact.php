<?php
/**
 * Template Name: Contact Page Template
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
	<span class="outer-line"></span><span class="fa fa-paper-plane" aria-hidden="true"></span><span class="outer-line"></span>
</div>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'loop-templates/content', 'blank' );
                    }
                ?>
            <div class="contact-page-svg"></div>
            </div>
            <div class="col-lg-7 col-md-7">
                <?php echo do_shortcode('[contact-form-7 id="33" title="Contact"]'); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
