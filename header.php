<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<script type="text/javascript">
	var _paq = window._paq = window._paq || [];
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//analytics.marcstampfli.com/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '2']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	})();
	</script>
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:2335314,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
</head>

<body <?php body_class(""); ?> <?php understrap_body_attributes(); ?> data-theme="light">
<?php do_action( 'wp_body_open' ); ?>

<div id="menu-overlay">
	<div class="main-menu-mobile<?php if ( is_front_page() ):?> wow rotateIn<?php endif; ?>"<?php if ( is_front_page() ):?> data-wow-delay="0.7s"<?php endif; ?>>
		<a href="javascript:toggleMenu();">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Menu</span>
		</a>
	</div>
	<div class="main-menu">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu-overlay',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
		<div class="social-icons">
			<a href="https://github.com/marcstampfli" title="GitHub" target="_blank" rel="noopener"><i class="fa fa-github"></i></a><a href="https://dribbble.com/marcstampfli" title="Dribbble" target="_blank" rel="noopener"><i class="fa fa-dribbble"></i></a><a href="https://instagram.com/marcstampfli" title="Instagram" target="_blank" rel="noopener"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
</div>

<header>
	<div class="container d-flex justify-content-between">
		<div class="logo<?php if ( is_front_page() ):?> wow fadeInDown<?php endif; ?>"<?php if ( is_front_page() ):?> data-wow-delay="0.3s"<?php endif; ?>>
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php echo "&#60;marcst&auml;mpfli &#47;&#62;"; ?></a>
		</div>
		<div class="main-menu<?php if ( is_front_page() ):?> wow fadeInDown<?php endif; ?>"<?php if ( is_front_page() ):?> data-wow-delay="0.5s"<?php endif; ?>>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div>
		<div class="darkmode <?php if ( is_front_page() ):?> wow bounceInDown<?php endif; ?>"<?php if ( is_front_page() ):?> data-wow-delay="0.9s"<?php endif; ?>>
			<input class="container_toggle" type="checkbox" id="switch" name="mode">
			<label for="switch" class="shadow">Toggle</label> 
		</div>
		<div class="main-menu-mobile<?php if ( is_front_page() ):?> wow rotateIn<?php endif; ?>"<?php if ( is_front_page() ):?> data-wow-delay="0.7s"<?php endif; ?>>
			<a href="javascript:toggleMenu();">
				<i class="fa fa-bars"></i>
				<span class="sr-only">Menu</span>
			</a>
		</div>
	</div>
</header>