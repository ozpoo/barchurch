<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/fav.png?v=2" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/icon.png?v=2" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="format-detection" content="telephone=no">
		<meta name="keywords" content="<?php echo get_option( 'key_words', 'Default Text Optional' ); ?>">

		<meta property="og:title" content="<?php bloginfo('name'); ?>">
		<meta property="og:description" content="<?php bloginfo('description'); ?>">
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/share.jpg?v=2">
		<meta property="og:url" content="<?php echo home_url( $wp->request ); ?>">
		<meta name="twitter:card" content="summary_large_image">

		<?php wp_head(); ?>

		<script>
				document.createElement( "picture" );
		</script>

		<script src="https://js.churchcenter.com/modal/v1"></script>

	</head>
	<body <?php body_class(); ?>>

		<div class="scroller">

		<?php if(!is_page("splash")): ?>
			<header>

				<div class="mobile-nav-toggle">
					<p><button class="toggle-mobile-nav"><span class="open">Menu</span><span class="close">Close</span></button></p>
				</div>
				<div class="mobile-nav">
					<div class="wrap">
						<ul class="big">
							<li><a href="<?php echo site_url( '/', 'http' ); ?>" <?php if(is_page( 'about' )){ echo 'class="active"'; } ?>>About<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/journal', 'http' ); ?>" <?php if(is_home() || is_category( 'Learn' ) || is_category( 'Do' )){ echo 'class="active"'; } ?>>Journal<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/questions', 'http' ); ?>" <?php if(is_post_type_archive( 'questions' )){ echo 'class="active"'; } ?>>Questions<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/events', 'http' ); ?>" class="toggle-modal-events">Events<span class="diamond"></span></a></li>
							<li><a href="/" class="toggle-modal-contact">Contact<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/get-involved', 'http' ); ?>" <?php if(is_page( 'get-involved' )){ echo 'class="active"'; } ?>>Get Involved<span class="diamond"></span></a></li>
						</ul>
						<ul>
							<li><a href="https://www.facebook.com/Bar-Church-1679558012314762/" target="_blank">Facebook</a></li>
							<li><a href="https://twitter.com/Bar_Church" target="_blank">Twitter</a></li>
							<li><a href="http://instagram.com/bar_church" target="_blank">Instagram</a></li>
							<!-- <li><a href="/" target="_blank">Vimeo</a></li> -->
							<li><a href="http://eepurl.com/caU-sn" target="_blank">Newsletter</a></li>
						</ul>
					</div>
				</div>

				<nav class="menu-main">

					<div class="container">
						<ul>
							<li><a href="<?php echo site_url( '/', 'http' ); ?>" <?php if(is_page( 'about' )){ echo 'class="active"'; } ?>>About<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/journal', 'http' ); ?>" <?php if(is_home() || is_category( 'Learn' ) || is_category( 'Do' )){ echo 'class="active"'; } ?>>Journal<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/questions', 'http' ); ?>" <?php if(is_post_type_archive( 'questions' )){ echo 'class="active"'; } ?>>Questions<span class="diamond"></span></a></li>
						</ul>
					</div>
					<div class="container">
						<a href="<?php echo site_url( '/', 'http' ); ?>">
							<svg version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
								 x="0px" y="0px" width="208.3px" height="16px" viewBox="0 0 208.3 16" style="enable-background:new 0 0 208.3 16;"
								 xml:space="preserve">
							<path class="st1" d="M91.3,4.9l0.4,0.5l2-2L93.3,3c-1.7-1.9-4.2-3-6.8-3c-4.8,0-8.7,3.6-8.7,8c0,4.4,3.9,8,8.7,8
								c2.7,0,5.2-1.1,6.8-3l0.4-0.4l-2-2l-0.4,0.5c-1.1,1.3-2.9,2.1-4.8,2.1c-3.3,0-6-2.3-6-5.2s2.7-5.2,6-5.2C88.4,2.8,90.2,3.6,91.3,4.9
								"/>
							<path class="st1" d="M179,2.8c1.9,0,3.7,0.8,4.8,2.1l0.4,0.5l2-2L185.8,3c-1.7-1.9-4.2-3-6.8-3c-4.8,0-8.7,3.6-8.7,8s3.9,8,8.7,8
								c2.7,0,5.2-1.1,6.8-3l0.4-0.4l-2-2l-0.4,0.5c-1.1,1.3-2.9,2.1-4.8,2.1c-3.3,0-6-2.3-6-5.2C173,5.1,175.7,2.8,179,2.8"/>
							<path class="st1" d="M30,0.2h-2.1l-7.3,15.6h3.1l1.9-4h6.8l1.9,4h3.1L30,0.2z M26.9,9L29,4.5L31.1,9H26.9z"/>
							<polygon class="st1" points="113,0.2 113,6.8 104.4,6.8 104.4,0.8 104.4,0.2 101.6,0.2 101.6,15.8 104.4,15.8 104.4,9.2 113,9.2
								113,15.8 115.8,15.8 115.8,0.2 "/>
							<path class="st1" d="M136,0.2v9.3c0,0.8-0.3,3.5-4.3,3.5c-3.9,0-4.2-2.7-4.2-3.5V0.2h-2.8v9.3c0,3.8,2.8,6.3,7.1,6.3
								c4.2,0,7.1-2.5,7.1-6.3V0.2H136z"/>
							<path class="st1" d="M56.5,9.6c1.6-0.9,2.6-2.5,2.6-4.4c0-2.7-2.2-5-5-5H45v15.6h2.7v-5.6h6l2.7,5.6h3.1L56.5,9.6z M47.7,3h6.4
								c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-6.4V3z"/>
							<path class="st1" d="M12.1,7.4C12.7,6.7,13,5.8,13,4.8c0-2.5-2.1-4.6-4.6-4.6H0v15.6h9.5c2.5,0,4.6-2.1,4.6-4.6
								C14.1,9.7,13.4,8.3,12.1,7.4 M9.5,13H2.7V9.4h5.7h1.2c1,0,1.8,0.8,1.8,1.8C11.4,12.2,10.6,13,9.5,13 M9.7,6.1
								C9.3,6.4,8.9,6.6,8.4,6.6H2.7V3h5.7c1,0,1.8,0.8,1.8,1.8C10.2,5.3,10,5.7,9.7,6.1"/>
							<path class="st1" d="M159.6,9.6c1.6-0.9,2.6-2.5,2.6-4.4c0-2.7-2.2-5-5-5h-9.2v15.6h2.7v-5.6h6l2.7,5.6h3.1L159.6,9.6z M150.8,3h6.4
								c1.2,0,2.2,1,2.2,2.2c0,1.2-1,2.2-2.2,2.2h-6.4V3z"/>
							<polygon class="st1" points="205.6,0.2 205.6,6.8 197,6.8 197,0.8 197,0.2 194.2,0.2 194.2,15.8 197,15.8 197,9.2 205.6,9.2
								205.6,15.8 208.3,15.8 208.3,0.2 "/>
							</svg>
						</a>
					</div>

					<div class="container">
						<ul>
							<li><a href="<?php echo site_url( '/events', 'http' ); ?>" class="toggle-modal-events">Events<span class="diamond"></span></a></li>
							<li><a href="/" class="toggle-modal-contact">Contact<span class="diamond"></span></a></li>
							<li><a href="<?php echo site_url( '/get-involved', 'http' ); ?>" <?php if(is_page( 'get-involved' )){ echo 'class="active"'; } ?>>Get Involved<span class="diamond"></span></a></li>
						</ul>
					</div>

					<div class="bookmark">
						<a href="https://barchurch.churchcenter.com/giving?open-in-church-center-modal=true">
							<span class="drawer">
								<span class="text"><p>Donate</p></span>
							</span>
							<svg version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
								 x="0px" y="0px" width="66.2px" height="134.3px" viewBox="0 0 66.2 134.3" style="enable-background:new 0 0 66.2 134.3;"
								 xml:space="preserve">
							<g>
								<g>
									<polygon class="st0" points="64.7,1.5 64.7,132 33.1,118.2 1.5,132 1.5,1.5 		"/>
								</g>
								<g>
									<path class="st1" d="M66.2,134.3l-33.1-14.5L0,134.3V0h66.2V134.3z M33.1,116.5l30.1,13.2V3H3v126.7L33.1,116.5z"/>
								</g>
							</g>
							<g>
								<path class="st1" d="M33,67.2L21.2,55.4L33,43.6l11.8,11.8L33,67.2z M25.5,55.4L33,63l7.5-7.5L33,47.9L25.5,55.4z"/>
							</g>
							<g>
								<rect x="31.5" y="20.6" class="st1" width="3" height="25.2"/>
							</g>
							<g>
								<rect x="31.5" y="65.1" class="st1" width="3" height="25.2"/>
							</g>
							<g>
								<g>
									<polygon class="st0" points="64.7,0 64.7,132 33.1,118.2 1.5,132 1.5,0 		"/>
								</g>
								<g>
									<path class="st1" d="M66.2,134.3l-33.1-14.5L0,134.3V0h66.2V134.3z M33.1,116.5l30.1,13.2V0H3v129.7L33.1,116.5z"/>
								</g>
							</g>
							<g>
								<path class="st1" d="M33,67.2L21.2,55.4L33,43.6l11.8,11.8L33,67.2z M25.5,55.4L33,63l7.5-7.5L33,47.9L25.5,55.4z"/>
							</g>
							<g>
								<rect x="31.5" y="20.6" class="st1" width="3" height="25.2"/>
							</g>
							<g>
								<rect x="31.5" y="65.1" class="st1" width="3" height="25.2"/>
							</g>
							</svg>
						</a>
					 </div>

				</nav>

			</header>
		<?php endif; ?>

		<nav class="menu-connect">
			<div class="connect-toggle">
				<p><button>Connect→</button></p>
			</div>
			<div class="connect-menu">
				<ul>
					<li><a href="https://www.facebook.com/Bar-Church-1679558012314762/" target="_blank">Facebook</a></li>
					<li><a href="https://twitter.com/Bar_Church" target="_blank">Twitter</a></li>
					<li><a href="http://instagram.com/bar_church" target="_blank">Instagram</a></li>
					<!-- <li><a href="/" target="_blank">Vimeo</a></li> -->
					<li><a href="http://eepurl.com/caU-sn" target="_blank">Newsletter</a></li>
				</ul>
			</div>
		</nav>
