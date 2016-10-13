<?php

namespace OpenErp\TimeTracking;

class TimeTracking {
    
    public function __construct() {
        
        $this->define_constants();
        $this->add_hooks();
        $this->add_filters();
        $this->initialize();
    }
    
    private function define_constants() {
        
        ! defined( 'OPENERP_TIMETRACKING_PATH') ? define( 'OPENERP_TIMETRACKING_PATH', dirname(__FILE__) ) : null;
        ! defined( 'OPENERP_TIMETRACKING_URL') ? define( 'OPENERP_TIMETRACKING_URL', plugins_url( '', __FILE__ ) ) : null;
        ! defined( 'OPENERP_TT_SLUG') ? define( 'OPENERP_TT_SLUG', 'open_erp_tt' ) : null;
        
    }
    
    public function add_hooks() {
        
        
    }
    
    public function add_filters() {
        
        add_filter( 'template_include', array( $this, 'load_template' ) );
        
    }
    
    public function load_template( $template ) {
        
        
        if( is_page() && get_the_ID() == get_option( \OpenErp\Options::$timetracker_page_id, true ) ) :
            $template = OPENERP_TIMETRACKING_PATH . '/templates/app.php';
        endif;
        
        if( is_page() && get_the_ID() == get_option( \OpenErp\Options::$login_page_id, true ) ) :
            $template = OPENERP_TIMETRACKING_PATH . '/templates/login.php';
        endif;
        
        return $template;
        
    }
    
    public function initialize(){
        
        new AppAjax();
        
    }
    
    
    
}