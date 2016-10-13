<?php
namespace OpenErp\Objects;

/**
 * 
 * @class User
 * @version 1.0.0
 * 
 * 
 * @property string $phone User phone number
 * @property string $emergency_name Emergency contact
 * @property string $emergency_phone Emergency phone number
 * @property string $position 
 * @property float $wage
 * @property string $wage_type the cycle of the wage ( hourly, monthly, annually )
 * @property string $start_date the first day of employement
 * @property string $termination_date The last day of employment
 * @property string $status Active/suspended/inactive
 * @property string $certifications 
 * @property string $notes any additional notes
 * 
 */

class User extends \WP_User {
    
    
    public function __construct( $user_id ) {
        parent::__construct( $user_id );
    }
    
    /**
     * 
     * 
     * @param string $key
     * @return mixed
     */
    public function __get( $key ) {
        
        $value = get_user_meta( $this->ID, '_' . $key, TRUE );
        
        return $value;
        
    }
    
}