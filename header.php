<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="utf-8">
		<title>
			<?php 
			wp_title( '' ); 
			if( wp_title( '', false ) ) : 
				echo ' - '; 
			endif;
			bloginfo( 'name' ); 
			?>
		</title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php // necessário encapsular todas os arquivos css \\ ?>
		
		<!-- css -->
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/normalize.css">
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/foundation.css">
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/style.css">

		<!-- fancybox -->
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/fancybox/fancybox.css">		

		<!-- js -->
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/modernizr.js"></script>
		
		<!-- wp head -->
		<?php // wp_head(); ?>
		<!-- /wp head -->

	</head>
	
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header" role="banner">
					
				<div class="row">

					<!-- menu -->
					<div class="small-12 medium-12 large-12 columns">	
						<nav class="top-bar" data-topbar role="navigation">

							<!-- logo -->
							<ul class="title-area">
								<li class="name">
									<?php
									if( is_front_page() ) : ?>
									<h1>
										<a href="<?php echo esc_url( home_url() ); ?>">
											<span><?php bloginfo( 'name' ); ?></span>
										</a>
									</h1>
									<?php
									else : ?>
									<h2>
										<a href="<?php echo esc_url( home_url() ); ?>">
											<span><?php bloginfo( 'name' ); ?></span>
										</a>
									</h2>
									<?php
									endif; ?>
								</li>
								<li class="toggle-topbar menu-icon">
									<a href="#">
										<span>Menu</span>
									</a>
								</li>
							</ul>
							<!-- /logo -->

							<!-- nav -->
							<section class="top-bar-section">
							<?php display_menu_principal(); ?>
							</section>
						</nav>
						<!-- /nav -->
					</div>
				</div>
				<!--  /menu -->

			</header>
			<!-- /header -->
