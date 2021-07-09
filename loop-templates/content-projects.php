<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="col-xl-3 col-lg-4 col-md-6 all <?php echo get_field("project_type"); ?>">
    <div class="item">
        <a href="<?php echo get_permalink($post->ID); ?>">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>" alt="<?php echo the_title(); ?>" />
            <div class="p-inner">
                <?php $clients = wp_get_object_terms($post->ID, 'client');
                if ( ! empty( $clients ) ) {
                    if ( ! is_wp_error( $clients ) ) {
                        foreach( $clients as $client ) {
                            echo '<h5>' . esc_html( $client->name ) . '</h5>'; 
                        }
                    }
                } ?>
            </div>
        </a>
    </div>
</div>
