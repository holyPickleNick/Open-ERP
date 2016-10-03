<?php
/*
 * Plugin Name: Open ERP
 * Author: Smartcat
 * Description: ERP system for business
 * 
 */

if( !defined( 'ABSPATH' ) ) {
    die();
}


final class OpenErp{
    
    public $version = '1.0.0';
    
    public static $instance;
    
    public static function init() {
        
        static $instance = false;
        
        if( !self::$instance ) :
            self::$instance = new self();
        
        endif;
        
        return $instance;
        
    }
    
    public function __construct() {
        
        $this->define_constants();
        $this->includes();
        $this->initialize();
        $this->load_modules();
        
    }
    
    private function define_constants() {
        
        ! defined( 'OPENERP_PATH') ? define( 'OPENERP_PATH', plugin_dir_path(__FILE__) ) : null;
        ! defined( 'OPENERP_URL') ? define( 'OPENERP_URL', plugin_dir_url( __FILE__ ) ) : null;
        ! defined( 'OPENERP_FILE') ? define( 'OPENERP_FILE', __FILE__ ) : null;
        ! defined( 'OPENERP_INCLUDES') ? define( 'OPENERP_INCLUDES', OPENERP_PATH . '/includes' ) : null;
    
    }
    
    private function includes() {
        
        require OPENERP_PATH . '/vendor/autoload.php';

    }
    
    private function initialize(){
        
        // Install the plugin
        new \OpenErp\Install( $this );
        
        // Create admin menu
        new \OpenErp\Admin\Menu();
        
        // Load tables
        new \OpenErp\Data\Tables();
        
    }
    
    private function load_modules() {
        
        // Time Tracker
        new \OpenErp\TimeTracking\TimeTracking();
        
        // Manufacturing
        new \OpenErp\Manufacturing\Manufacturing();
        
        // Human Resources
        new \OpenErp\HR\HR();
        
    }
    
}

function open_erp() {
    return OpenErp::init();
}

// Vroom vroom
open_erp();