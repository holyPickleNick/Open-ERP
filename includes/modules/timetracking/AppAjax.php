<?php

namespace OpenErp\TimeTracking;


class AppAjax {
    
    use \OpenErp\Utils\Ajax;
    use \OpenErp\Utils\Hooks;
    
    
    public function __construct() {
        
        $this->action( 'wp_ajax_open_erp_tt_clock_in', 'clock_in' );
        $this->action( 'wp_ajax_open_erp_tt_clock_out', 'clock_out' );
        $this->action( 'wp_ajax_open_erp_tt_lunch_in', 'lunch_in' );
        $this->action( 'wp_ajax_open_erp_tt_lunch_out', 'lunch_out' );
        
    }
    
    
    public function clock_in(){
        
        
        exit();
        
        
    }
    
    
    
    
}