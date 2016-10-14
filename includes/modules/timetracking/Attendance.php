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
    private $is_ready;
    

    public function __construct( $user_id = null, $today = null ) {
        
        if( ! $user_id ) :
            $user_id = get_current_user_id();
        endif;
        
        if( ! $today ) :
            $today = current_time( 'Y-m-d' );
        endif;
        
        $this->today = $today;
        $this->user_id = $user_id;
        
        
        $this->setup_attendance( $today );
        
        
    }
    
    
    private function setup_attendance() {
        
        global $wpdb;
        
        $attendance = $wpdb->get_row( 'select * from ' . $wpdb->prefix . 'openerp_attendance where user_id = ' . $this->user_id . ' and the_date = "' . $this->today . '"' );
        
        if( $attendance ) :
            
            $this->time_in = $attendance->time_in;
            $this->time_out = $attendance->time_out;
            $this->lunch_in = $attendance->lunch_in;
            $this->lunch_out = $attendance->lunch_out;
            $this->is_ready = false;
            
        else :
            
            $this->is_working = false;
            $this->is_ready = true;
            
        endif;
        
    }
    
    public function is_ready() {
        return $this->is_ready;
    }

    
    public function is_working() {
       
        $response = false;
        
        if( $this->time_in && ! $this->time_out ) :
            $response = true;
        endif;            

        return $response;
        
    }

    
    public function is_done_work(){
        
        if( $this->time_in && $this->time_out ) :
            return true;
        endif;
        
        return false;
        
    }
    
    public function is_on_lunch(){
     
        if( $this->lunch_in && ! $this->lunch_out ) :
            return true;
        endif;
        
        return false;
        
    }
    
    
    public function has_taken_lunch() {
        
        if( $this->lunch_in && $this->lunch_out ) :
            return true;
        endif;
        
        return false;
        
    }


    public function lunch_in(){
        
    }
    
    public function lunch_out(){
        
        if( $this->is_on_lunch() ) :
            
            global $wpdb;
        
            $query = $wpdb->update( $wpdb->prefix . 'openerp_attendance',
                array(
                    'lunch_out'   => current_time( 'H:i:s')
                ),
                array(
                    'user_id'   => $this->user_id,
                    'the_date'  => current_time( 'Y-m-d' ),
                ),
                array(
                    '%s',
                ),
                array(
                    '%d',
                    '%s',
                )
            );
            
        endif;
        
    }
    
    public function clock_in(){
        
        if( $this->is_ready() ) :
            
            global $wpdb;
        
            $query = $wpdb->insert( $wpdb->prefix . 'openerp_attendance',
                array(
                    'user_id'   => $this->user_id,
                    'the_date'  => current_time( 'Y-m-d' ),
                    'time_in'   => current_time( 'H:i:s')
                ),
                array(
                    '%d',
                    '%s',
                    '%s'
                )
            );
            
            return true;
        endif;
        
        return false;
        
    }
    
    public function clock_out(){
        
        if( $this->is_working() ) :
            
            global $wpdb;
        
            $query = $wpdb->update( $wpdb->prefix . 'openerp_attendance',
                array(
                    'time_out'   => current_time( 'H:i:s')
                ),
                array(
                    'user_id'   => $this->user_id,
                    'the_date'  => current_time( 'Y-m-d' ),
                ),
                array(
                    '%s',
                ),
                array(
                    '%d',
                    '%s',
                )
            );
            
            return true;
            
        endif;
        
        return false;
        
    }
    
    
    
    
}
