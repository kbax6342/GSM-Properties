<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php wp_head(); ?>
</head>

<body id="remove_blog_class" <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'awpbusinesspress' ); ?></a>
<?php wp_body_open(); ?>

<!--Loading-Icon-->
<div class="page-loader">
	<div class="loader">
	  <div class="bar1"></div>
	  <div class="bar2"></div>
	  <div class="bar3"></div>
	  <div class="bar4"></div>
	  <div class="bar5"></div>
	  <div class="bar6"></div>
	</div>
</div>

<div id="wrapper">
	<?php get_template_part('template-parts/site-top-bar'); ?>
	
	<div class="clearfix"></div>
	
	<?php 
		$awpbusinesspress_menu_style = get_theme_mod('awpbusinesspress_menu_style', 'sticky');
		$awpbusinesspress_menu_container_size = get_theme_mod('awpbusinesspress_menu_container_size', 'container');
		$awpbusinesspress_menu_overlap = get_theme_mod('awpbusinesspress_menu_overlap', true);
	?>

	<header class="header-section navbar-custom not-sticky <?php if ($awpbusinesspress_menu_overlap != false) { ?> navbar-overlap <?php } ?> 
		<?php if($awpbusinesspress_menu_style == 'sticky'){ echo 'header-sticky'; }?>" role="navigation">
		<div id="header" class="site-header">
			<div class="site-menu-content">
				<div class="<?php echo esc_attr($awpbusinesspress_menu_container_size); ?> padding-0">
					<div class="site-menu-content__wrap wrapper">
						<?php 
						echo esc_html( awpbusinesspress_header_logo() ); ?>
						
							<!-- Nav Menu -->
							<nav id="site-navigation" class="main-navigation">
								
								<button type="button" id="hamburger-menu" class="open-nav-btn" aria-label="<?php esc_attr_e('open navigation','awpbusinesspress'); ?>" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
								<div id="slide-nav" class="slide-content navbar-collapse">
									<button type="button" id="close" class="close-btn" aria-label="<?php esc_attr_e('close navigation','awpbusinesspress'); ?>"><i class="fas fa-times"></i></button>
										<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'awpbusinesspress' ); ?></span>
										<span class="main-navigation__icon">
											<span class="main-navigation__icon__middle"></span>
										</span>
									<?php
									wp_nav_menu(
										array(
											'theme_location'  => 'primary-menu',
											'depth'           => 4,
											'menu_id'         => 'primary-menu',
											'container_class' => 'primary-menu-container',
											'fallback_cb'	  => 'awpbusinesspress_Navwalker::fallback',
											'walker'          => new awpbusinesspress_Navwalker(),
										)
									);
									?>
								</div>
							</nav>
							<!-- Nav Menu -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Section -->
	<div id="content" class="site-content">
