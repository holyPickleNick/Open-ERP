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
        
        add_menu_page( 'Manufacturing', 'Manufacturing', 'manage_erp', 'manufacturing', function() {
            
        }, 'dashicons-admin-tools');
        
        add_submenu_page( 'manufacturing', 'Items', 'Items', 'manage_erp', 'erp-items', function(){} );
        add_submenu_page( 'manufacturing', 'Jobs', 'Jobs', 'manage_erp', 'erp-jobs', function(){} );
        add_submenu_page( 'manufacturing', 'BOM', 'BOM', 'manage_erp', 'erp-bom', function(){} );
        add_submenu_page( 'manufacturing', 'Inventory', 'Inventory', 'manage_erp', 'erp-inventory', function(){} );
        
    }
    
    
    
}

