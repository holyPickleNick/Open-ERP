<?php

namespace OpenErp\TimeTracking;

class Attendance {
    
    private $user_id;
    private $today;
    private $time_in;
    private $time_out;
    private $lunch_in;
    private $lunch_out;
    private $is_working;
    

    public function __construct( $user_id, $today = null ) {
        
        
        if( ! $today ) :
            $today = current_time( 'Y-m-d' );
        endif;
        
        $this->today = $today;
        $this->user_id = $user_id;
        
        
        $this->setup_attendance( $today );
        
        
    }
    
    
    private function setup_attendance() {
        
        global $wpdb;
        
        $attendance = $wpdb->query( 'select * from ' . $wpdb->prefix . 'openerp_attendance where user_id = ' . $this->user_id . ' and the_date = ' . $this->today );
        
        if( $attendance ) :
            
            $this->time_in = $attendance->time_in;
            $this->time_out = $attendance->time_out;
            $this->lunch_in = $attendance->lunch_in;
            $this->lunch_out = $attendance->lunch_out;
            $this->is_working = TRUE;
            
        else :
            
            $this->is_working = FALSE;
            
        endif;
        
        
        
    }
    
    
    public function is_working() {
        
        return $this->is_working;
        
    }

    public function is_on_lunch(){
     
        if( $this->lunch_in && ! $this->lunch_out ) :
            return true;
        endif;
        
        return false;
        
    }
    
    public function set_lunch(){
        
    }
    
    
}
