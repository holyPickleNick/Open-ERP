<?php

namespace OpenErp\Manufacturing;

class Manufacturing {
    
    public function __construct() {
        
        $this->define_constants();
        $this->add_hooks();
        $this->add_filters();
    }
    
    private function define_constants() {
        
        ! defined( 'OPENERP_MANUFACTURING_PATH') ? define( 'OPENERP_MANUFACTURING_PATH', dirname(__FILE__) ) : null;
        ! defined( 'OPENERP_MANUFACTURING_URL') ? define( 'OPENERP_MANUFACTURING_URL', plugins_url( '', __FILE__ ) ) : null;
        
    }
    
    public function add_hooks() {
        
        add_action( 'admin_menu', array( $this, 'add_menu' ) );
        
    }
    
    public function add_filters() {
        
    }
    
    public function add_menu() {
        
        add_menu_page( 'Manufacturing', 'Manufacturing', 'manage_options', 'manufacturing', function() {
            
        }, 'dashicons-admin-tools');
        
    }
    
    
    
}

