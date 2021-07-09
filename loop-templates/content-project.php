<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="container page-title text-center">
    <h2>
		<?php $clients = wp_get_object_terms($post->ID, 'client');
		if ( ! empty( $clients ) ) {
			if ( ! is_wp_error( $clients ) ) {
				foreach( $clients as $client ) {
					echo esc_html( $client->name );
				}
			}
		} ?>
		<?php
			$ptype = get_field("project_type");
			switch ($ptype) {
			case "bizcard":
				echo "business card";
				break;
			case "story":
				echo "social story";
				break;
			case "signage":
				echo "digital signage";
				break;
			case "web":
				echo "web app";
				break;
			case "mobile":
				echo "mobile app";
				break;
			case "design":
				echo "UI Design";
				break;
			default:
				echo $ptype;
			}
		?>
	</h2>
</div>

<div class="divider text-center">
    <span class="outer-line"></span><span class="fa fa-briefcase" aria-hidden="true"></span><span class="outer-line"></span>
</div>

<div class="row">
	<div class="col-md-9 d-md-flex align-items-center text-md-left text-center">
		<?php
			$posttags = get_the_tags();
			if ($posttags) {
			foreach($posttags as $tag) {
				echo '<span class="badge mr-2 mb-2 p-2">'.$tag->name . '</span>'; 
			}
			}
		?>
	</div>
	<div class="col-md-3 d-flex align-items-center justify-content-center justify-content-md-end mt-md-0 mt-2 mb-md-2 mb-5">
		<?php if (get_field( 'project_url' )): ?><a class="button-link mt-0 d-block d-sm-inline-block" href="<?php echo get_field( 'project_url' ); ?>" target="_blank" rel="noopener">preview <i class="fa fa-external-link"></i></a><?php endif; ?>
	</div>
</div>

<div id="carouselIndicators" class="carousel slide" data-ride="carousel">

	<?php if (get_field( 'image_1' )): ?><ol class="carousel-indicators">
	<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
		<?php if (get_field( 'image_1' )): ?><li data-target="#carouselIndicators" data-slide-to="1"></li><?php endif; ?>
		<?php if (get_field( 'image_2' )): ?><li data-target="#carouselIndicators" data-slide-to="2"></li><?php endif; ?>
		<?php if (get_field( 'image_3' )): ?><li data-target="#carouselIndicators" data-slide-to="3"></li><?php endif; ?>
		<?php if (get_field( 'image_4' )): ?><li data-target="#carouselIndicators" data-slide-to="4"></li><?php endif; ?>
	</ol><?php endif; ?>

	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="<?php the_title(); ?>">
		</div>
		<?php if (get_field( 'image_1' )): ?><div class="carousel-item">
			<img class="d-block w-100" src="<?php the_field('image_1'); ?>" alt="<?php the_title(); ?>">
		</div><?php endif; ?>
		<?php if (get_field( 'image_2' )): ?><div class="carousel-item">
			<img class="d-block w-100" src="<?php the_field('image_2'); ?>" alt="<?php the_title(); ?>">
		</div><?php endif; ?>
		<?php if (get_field( 'image_3' )): ?><div class="carousel-item">
			<img class="d-block w-100" src="<?php the_field('image_3'); ?>" alt="<?php the_title(); ?>">
		</div><?php endif; ?>
		<?php if (get_field( 'image_4' )): ?><div class="carousel-item">
			<img class="d-block w-100" src="<?php the_field('image_4'); ?>" alt="<?php the_title(); ?>">
		</div><?php endif; ?>
	</div>

	<?php if (get_field( 'image_1' )): ?><a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a><?php endif; ?>

</div>

<?php /* <a class="button-link mt-2 d-block d-sm-none" href="<?php echo get_post_type_archive_link( 'project' ); ?>"><i class="fa fa-chevron-left ml-0 mr-2"></i> back to portfolio</a> */ ?>