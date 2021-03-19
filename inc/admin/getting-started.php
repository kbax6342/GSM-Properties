<?php
/**
 * Getting Started Page. 
 *
 * @package awpbusinesspress
 */

require get_template_directory() . '/inc/admin/class-getting-start-plugin-helper.php';


// Adding Getting Started Page in admin menu

if( ! function_exists( 'awpbusinesspress_getting_started_menu' ) ) :
function awpbusinesspress_getting_started_menu() {	
		$awpbusinesspress_plugin_count = null;
		if ( !is_plugin_active( 'awp-companion/awp-companion.php' ) ):	
			$awpbusinesspress_plugin_count =	'<span class="awaiting-mod action-count">1</span>';
		endif;
	    /* translators: %1$s %2$s: about */		
		$title = sprintf(esc_html__('About %1$s %2$s', 'awpbusinesspress'), esc_html( awpbusinesspress_THEME_NAME ), $awpbusinesspress_plugin_count);
		/* translators: %1$s: welcome page */	
		add_theme_page(sprintf(esc_html__('Welcome to %1$s', 'awpbusinesspress'), esc_html( awpbusinesspress_THEME_NAME ), esc_html(awpbusinesspress_THEME_VERSION)), $title, 'edit_theme_options', 'awpbusinesspress-getting-started', 'awpbusinesspress_getting_started_page');
}
endif;
add_action( 'admin_menu', 'awpbusinesspress_getting_started_menu' );

// Load Getting Started styles in the admin
if( ! function_exists( 'awpbusinesspress_getting_started_admin_scripts' ) ) :
function awpbusinesspress_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_awpbusinesspress-getting-started' != $hook ) return;

    wp_enqueue_style( 'awpbusinesspress-getting-started', get_template_directory_uri() . '/inc/admin/css/getting-started.css', false, awpbusinesspress_THEME_VERSION );
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'awpbusinesspress-getting-started', get_template_directory_uri() . '/inc/admin/js/getting-started.js', array( 'jquery' ), awpbusinesspress_THEME_VERSION, true );
    wp_enqueue_script( 'awpbusinesspress-recommended-plugin-install', get_template_directory_uri() . '/inc/admin/js/recommended-plugin-install.js', array( 'jquery' ), awpbusinesspress_THEME_VERSION, true );    
    wp_localize_script( 'awpbusinesspress-recommended-plugin-install', 'awpbusinesspress_start_page', array( 'activating' => __( 'Activating ', 'awpbusinesspress' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'awpbusinesspress_getting_started_admin_scripts' );


// Plugin API
if( ! function_exists( 'awpbusinesspress_call_plugin_api' ) ) :
function awpbusinesspress_call_plugin_api( $slug ) {
	require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'awpbusinesspress_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'awpbusinesspress_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}
endif;

// Callback function for admin page.
if( ! function_exists( 'awpbusinesspress_getting_started_page' ) ) :
function awpbusinesspress_getting_started_page() { ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3>
				<?php 
				/* translators: %1$s %2$s: welcome message */	
				printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'awpbusinesspress' ), esc_html( awpbusinesspress_THEME_NAME ), esc_html( awpbusinesspress_THEME_VERSION ) ); ?></h3>
				<p><?php esc_html_e( 'awpbusinesspress is a creative and professional multipurpose WordPress theme. Which is Best for Business, Finance, Consultant, Marketing, Digital Agency, Industries, Online Shops and many other various website types.', 'awpbusinesspress' ); ?></p>
			</div>
			<div class="intro right">
				<a target="_blank" href="https://awplife.com/">
					<img src="<?php echo esc_url ( awpbusinesspress_THEME_DIR.'/inc/admin/images/logo.png' ); ?>">
				</a>
			</div>
		</div>
		<div class="panels">
			<ul class="inline-list">
			    <li class="current">
					<a id="getting-started-panel" href="#">
						<?php esc_html_e( 'Getting Started', 'awpbusinesspress' ); ?>
					</a>
				</li>
				<li class="recommended-plugins-active">
					<a id="plugins" href="#">
						<?php esc_html_e( 'Recommended Actions', 'awpbusinesspress' ); 
						if ( !is_plugin_active( 'awp-companion/awp-companion.php' ) ):  ?>
							<span class="plugin-not-active">1</span>
						<?php endif; ?>
					</a>
				</li>
				<li>
                	<a id="useful-plugin-panel" href="#">
						<?php esc_html_e( 'Useful Plugins', 'awpbusinesspress' ); ?>
					</a>
				</li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/inc/admin/tabs/getting-started-panel.php'; ?>
				<?php require get_template_directory() . '/inc/admin/tabs/recommended-plugins-panel.php'; ?>
				<?php require get_template_directory() . '/inc/admin/tabs/useful-plugin-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;


/**
 * Admin notice 
 */
class awpbusinesspress_screen {
 	public function __construct() {
		/* notice  Lines*/
		add_action( 'load-themes.php', array( $this, 'awpbusinesspress_activation_admin_notice' ) );
	}
	public function awpbusinesspress_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'awpbusinesspress_admin_notice' ), 99 );
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function awpbusinesspress_admin_notice() {
		?>			
		<div class="updated notice is-dismissible awpbusinesspress-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			/* translators: %1$s: welcome screen */
			printf( esc_html__('Welcome to %1$s Theme', 'awpbusinesspress'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Thank you for choosing our awpbusinesspress theme. To take full advantage of the complete features of awpbusinesspress theme, you have to go to our %1\$s welcome page %2\$s.", "awpbusinesspress"), '<a href="' . esc_url( admin_url( 'themes.php?page=awpbusinesspress-getting-started' ) ) . '">', '</a>' ); ?></p>
			
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=awpbusinesspress-getting-started' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with awpbusinesspress','awpbusinesspress'); ?></a></p>
		</div>
		<?php
	}
	
}
$GLOBALS['awpbusinesspress_screen'] = new awpbusinesspress_screen();


/**
* Get started notice
*/

add_action( 'wp_ajax_awpbusinesspress_dismissed_notice_handler', 'awpbusinesspress_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function awpbusinesspress_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function awpbusinesspress_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="awpbusinesspress-getting-started-notice clearfix">
                    <div class="awpbusinesspress-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'awpbusinesspress' ); ?>" />
                    </div><!-- /.awpbusinesspress-theme-screenshot -->
                    <div class="awpbusinesspress-theme-notice-content">
                        <h2 class="awpbusinesspress-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'awpbusinesspress' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php echo sprintf(__('To take full advantage of all the features of this theme, please install and activate the <strong>AWP Companion</strong> plugin, then enjoy this theme.', 'awpbusinesspress')) ?></p>

                        <a class="awpbusinesspress-btn-get-started button button-primary button-hero awpbusinesspress-button-padding" href="#" data-name="" data-slug="">
						<?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Get started with %1$s', 'awpbusinesspress' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
						
						</a><span class="awpbusinesspress-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.awpbusinesspress-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'awpbusinesspress_deprecated_hook_admin_notice' );

/**
* Plugin installer
*/

add_action( 'wp_ajax_install_act_plugin', 'awpbusinesspress_admin_install_plugin' );

function awpbusinesspress_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/awp-companion' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'awp-companion' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'awp-companion/awp-companion.php' );
    }
}