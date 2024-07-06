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
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Create a final class for our main plugin
 */
final class Wpd_Team{
    // declare instance
    public static $instance;

    /**
     * Create a getInstance method for our class
     * 
     * @return \Wpd_Team
     * @since 1.0.0
     */
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * create a function for call the Wpd_Team Class
 *      
 * @return \Wpd_Team
 */
function wpd_team(){
    return Wpd_Team::getInstance();
}

// kick of the function
wpd_team();