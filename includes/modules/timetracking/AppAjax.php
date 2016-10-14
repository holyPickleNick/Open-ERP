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
    
    /**
     * 
     * Clock in for the day
     * 
     * if the user is not clocked in for the day, clock in
     * return success or fail message
     * 
     */
    public function clock_in(){
        
        $attendance = new Attendance();
        $response = [];
        
        if( $attendance->clock_in() ) :
            
            $response['success'] = true;
            $response['message'] = __( 'Clocked in!', OPENERP_DOMAIN );
            
        else :
            
            $response['success'] = false;
            $response['message'] = __( 'User is already clocked in for the day.', OPENERP_DOMAIN );
            
        endif;
        
        
        wp_send_json( $response );
        
    }
    
    public function clock_out(){
        
        $attendance = new Attendance();
        $response = [];
        
        if( $attendance->clock_out() ) :
            
            $response['success'] = true;
            $response['message'] = __( 'Clocked out!', OPENERP_DOMAIN );
            
        else :
            
            $response['success'] = false;
            $response['message'] = __( 'User is already clocked out for the day.', OPENERP_DOMAIN );
            
        endif;
        
        
        wp_send_json( $response );
        
    }
    
    public function lunch_in() {
        
        $attendance = new Attendance();
        $response = [];
        
        if( $attendance->lunch_in() ) :
            
            $response['success'] = true;
            $response['message'] = __( 'On Lunch!', OPENERP_DOMAIN );
            
        else :
            
            $response['success'] = false;
            $response['message'] = __( 'User is already on lunch', OPENERP_DOMAIN );
            
        endif;
        
        
        wp_send_json( $response );        
        
    }
    
    public function lunch_out() {
        
        $attendance = new Attendance();
        $response = [];
        
        if( $attendance->lunch_out() ) :
            
            $response['success'] = true;
            $response['message'] = __( 'Lunch complete!', OPENERP_DOMAIN );
            
        else :
            
            $response['success'] = false;
            $response['message'] = __( 'Lunch error', OPENERP_DOMAIN );
            
        endif;
        
        wp_send_json( $response );        
        
    }
    
    
}