<?php

namespace OpenErp\Admin;


class Menu {
    
    public function __construct() {
        
        $this->hooks();
        
    }
    
    function hooks(){
        
        add_action('admin_menu', array( $this, 'create_admin_menu' ) );
        
    }
    
    function create_admin_menu(){

        add_menu_page('Test Page', 'test-menu', 'manage_options', 'test_menu', function(){
            
        });        
    }
    
}