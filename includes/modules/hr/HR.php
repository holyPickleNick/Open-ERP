<?php

namespace OpenErp\HR;

class HR {
    
    public function __construct() {
        
        $this->define_constants();
        $this->add_hooks();
        $this->add_filters();
    }
    
    private function define_constants() {
        
        ! defined( 'OPENERP_HR_PATH') ? define( 'OPENERP_HR_PATH', dirname(__FILE__) ) : null;
        ! defined( 'OPENERP_HR_URL') ? define( 'OPENERP_HR_URL', plugins_url( '', __FILE__ ) ) : null;
        
    }
    
    public function add_hooks() {
        
        add_action( 'admin_menu', array( $this, 'add_menu' ) );
        
    }
    
    public function add_filters() {
        
    }
    
    public function add_menu() {
        
        add_menu_page( 'HR', 'HR', 'manage_erp', 'human-resources', function() {
            
        }, 'dashicons-businessman');
        
        add_submenu_page( 'human-resources', 'Employees', 'Employees', 'manage_erp', 'erp-employees', function(){} );
        add_submenu_page( 'human-resources', 'Attendance', 'Attendance', 'manage_erp', 'erp-attendance', function(){} );
        
    }
    
    
    
}
