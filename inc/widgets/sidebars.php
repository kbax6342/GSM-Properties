<?php	
add_action( 'widgets_init', 'awpbusinesspress_widgets_init');
function awpbusinesspress_widgets_init() {

	/*sidebar*/
	register_sidebar( array(
		'name' => __('Sidebar widget area','awpbusinesspress'),
		'id' => 'sidebar_primary',
		'description' => __('Sidebar widget area','awpbusinesspress'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget First Column', 'awpbusinesspress' ),
		'id' => 'footer_widget_area_left',
		'description' => __( 'Footer Widget First Column', 'awpbusinesspress' ),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Second Column', 'awpbusinesspress' ),
		'id' => 'footer_widget_area_center',
		'description' => __( 'Footer Widget Second Column', 'awpbusinesspress' ),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Third Column', 'awpbusinesspress' ),
		'id' => 'footer_widget_area_right',
		'description' => __( 'Footer Widget Third Column', 'awpbusinesspress' ),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
}	                     
