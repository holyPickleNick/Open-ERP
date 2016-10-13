<?php

namespace OpenErp\TimeTracking;

class TimeTracking {
    
    public function __construct() {
        
        $this->define_constants();
        $this->add_hooks();
        $this->add_filters();
    }
    
    private function define_constants() {
        
        ! defined( 'OPENERP_TIMETRACKING_PATH') ? define( 'OPENERP_TIMETRACKING_PATH', dirname(__FILE__) ) : null;
        ! defined( 'OPENERP_TIMETRACKING_URL') ? define( 'OPENERP_TIMETRACKING_URL', plugins_url( '', __FILE__ ) ) : null;
        ! defined( 'OPENERP_TT_SLUG') ? define( 'OPENERP_TT_SLUG', 'open-erp-tt' ) : null;
        
    }
    
    public function add_hooks() {
        
        add_action( 'wp_enqueue_scripts', array( $this, 'load_styles_scripts' ) );
        
    }
    
    public function add_filters() {
        
        add_filter( 'template_include', array( $this, 'load_template' ) );
        
    }
    
    public function load_template( $template ) {
        
        
        if( is_page() && get_the_ID() == get_option( \OpenErp\Options::$open_erp_timetracker_page_id, true ) ) :
            $template = OPENERP_TIMETRACKING_PATH . '/templates/app.php';
        endif;
        
        if( is_page() && get_the_ID() == get_option( \OpenErp\Options::$open_erp_login_page_id, true ) ) :
            $template = OPENERP_TIMETRACKING_PATH . '/templates/login.php';
        endif;
        
        return $template;
        
    }
    
    public function load_styles_scripts(){
        
        wp_enqueue_style( OPENERP_TT_SLUG . 'style', OPENERP_TIMETRACKING_URL . '/includes/styles/main.css', array(), \OpenErp::$version );
        
        
    }
    
    
}