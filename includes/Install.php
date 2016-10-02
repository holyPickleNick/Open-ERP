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
        
        $page = array(
            'timetracker' => array(
                'post_title' => 'Time Tracker',
                'post_status' => 'publish',
                'post_type' => 'page'
            )
        );
        
        $id = wp_insert_post( $page );

        update_option( Options::$open_erp_timetracker_id, $id );
        
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