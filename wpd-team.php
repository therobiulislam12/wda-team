<?php
/**
 * Plugin Name: WDA Team
 * Description: Create a custom post type and add some functionality
 * Plugin URI: #
 * Version: 1.0.0
 * Author: Robiul Islam
 * Author URI: https://robiul-islam.netlify.app
 */

// if ABSPATH is not define, exit
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Create a final class for our main plugin
 */
final class Wpd_Team {
    //Plugin Version
    const version = "1.0.0";

    // declare instance
    public static $instance;

    /**
     * Plugin Constructor
     */
    private function __construct() {

        // call constant defined function
        $this->define_constant();

        // activation hook call
        register_activation_hook( __FILE__, [$this, 'active'] );

        // after activation run plugin_loaded hook
        add_action( 'plugin_loaded', [$this, 'init_plugin'] );

        // register post type
        add_action( 'init', [$this, 'wpd_register_post_type'] );
    }

    /**
     * Create a getInstance method for our class
     *
     * @return \Wpd_Team
     * @since 1.0.0
     */
    public static function getInstance() {
        if ( !self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * create a function for declare all constant
     *
     * @return void
     */
    public function define_constant() {
        define( 'WPD_TEAM_VERSION', self::version );
        define( 'WPD_TEAM_FILE', __FILE__ );
        define( 'WPD_TEAM_PATH', __DIR__ );
        define( 'WPD_TEAM_URL', plugins_url( '', WPD_TEAM_FILE ) );
        define( 'WPD_TEAM_ASSETS', WPD_TEAM_URL . '/assets' );

    }

    /**
     * After installed complete run this function
     *
     * @return mixed
     */
    public function init_plugin() {

        // Initiate Assets Class
        new WPD_Team\Assets();

        // If admin page it'll be loader otherwise not loaded
        if ( is_admin() ) {

        } else {
            new WPD_Team\Frontend();
        }
    }

    /**
     * Register custom team post type
     *
     * @return mixed
     */
    public function wpd_register_post_type() {
        $menu = new WPD_Team\Admin\Menu();
        $menu->wpd_register_post_type();
    }

    /**
     * After active call this function
     *
     * @return void
     */
    public function active() {

        $installer = new WPD_Team\Installer();

        $installer->run();

    }
}

/**
 * create a function for call the Wpd_Team Class
 *
 * @return \Wpd_Team
 */
function wpd_team() {
    return Wpd_Team::getInstance();
}

// kick of the function
wpd_team();