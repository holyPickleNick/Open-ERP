<?php

namespace OpenErp;


class Install {

    private $OpenErp;
    
    function __construct( $OpenErp ) {
        
        register_activation_hook( OPENERP_FILE, array( $this, 'activate' ) );
        register_deactivation_hook( OPENERP_FILE, array( $this, 'deactivate' ) );
            
        $this->OpenErp = $OpenErp;
        $this->add_hooks();

    }
    
    /**
     * @todo update the open_erp_version option so that the methods within only run on initial activation
     */
    function activate() {
        
        $current_version = get_option( Options::$version, NULL );
        
        if( is_null( $current_version ) ) :
            
            $this->create_tables();
            $this->create_roles();
            $this->setup_cron();
            $this->create_pages();
            
            $current_version = $this->OpenErp->version;
                    
        endif;
        
    }
    
    function deactivate() {
        
    }
    
    function create_tables() {
        
//        new Data\Tables();
        
    }
    
    public function create_pages() {
        
        $pages = array(
            Options::$open_erp_timetracker_page_id => array(
                'post_title' => 'ERP Time Tracker',
                'post_status' => 'publish',
                'post_type' => 'page'
            ),
            Options::$open_erp_login_page_id => array(
                'post_title' => 'ERP Login',
                'post_status' => 'publish',
                'post_type' => 'page'
            ),
        );
        
        foreach( $pages as $page => $args ) :
            $id = wp_insert_post( $args );
            update_option( $page, $id );
        endforeach;
        
    }
    
    public function remove_pages() {
        
        wp_delete_post( Options::$open_erp_login_page_id );
        wp_delete_post( Options::$open_erp_timetracker_page_id );
        
    }
    
    
    function create_roles(){
        add_role( 'erp_admin', 'ERP Admin' );
        add_role( 'erp_admin', 'ERP User' );
    }
    
    function setup_cron() {
        
    }
    
    function add_hooks(){
        
        
        
    }
    
    
    
}