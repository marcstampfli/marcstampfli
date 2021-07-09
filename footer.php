<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>



<footer<?php if ( is_front_page() ):?> class="footer-home"<?php elseif( is_page("about") ): ?> class="footer-about"<?php elseif( is_archive("portfolio") || is_singular( 'project' ) ): ?> class="footer-portfolio"<?php elseif( is_page("contact") ): ?> class="footer-contact"<?php endif; ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<?php echo do_shortcode("[copyrightText]"); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<?php if ( is_front_page() ):?>
<script type="text/javascript">
	var typed = new Typed(".job-titles", {
		strings: ["", "Web Developer", "Web Designer"],
		typeSpeed: 70,
		loop: true,
		backDelay: 900,
		backSpeed: 50,
		showCursor: false,
		smartBackspace: true,
	});
</script>
<?php endif; ?>

<?php if ( is_front_page() ):?>
</div>
<?php endif; ?>

</body>

</html>
