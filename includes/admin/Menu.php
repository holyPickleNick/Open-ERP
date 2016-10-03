<?php

namespace OpenErp\Admin;


class Menu {
    
    public function __construct() {
        
        $this->hooks();
        
    }
    
    function hooks(){
        
        add_action('admin_menu', array( $this, 'create_admin_menu' ) );
        add_action( 'admin_init', array( $this, 'add_capabilities' ) );
        
    }
    
    function create_admin_menu(){

        add_menu_page( 'ERP Settings', 'ERP Settings', 'manage_erp', 'erp-settings', function() {
            
        }, 'dashicons-admin-settings');
        
    }
    
    function add_capabilities() {
        
        $erp_admin = get_role( 'erp_admin' );
        $erp_admin->add_cap( 'manage_erp' );

        $erp_admin = get_role( 'erp_user' );
        $erp_admin->add_cap( 'use_erp' );
        
        $admin = get_role( 'administrator' );
        $admin->add_cap( 'manage_erp' );        
    }
    
}