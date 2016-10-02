<?php

namespace OpenErp\Data;

class Tables {
    
    public function __construct() {
        
        $this->create_tables();
        
    }
    
    public function create_tables() {
        
        global $wpdb;

        $charset_collate = '';
        if ( !empty( $wpdb->charset ) ) :
            $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        endif;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        $table_name = $wpdb->prefix . 'openerp_attendance';
        $tables['attendance'] = "CREATE TABLE $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            user_id mediumint(9) NOT NULL,
            the_date date NOT NULL,
            time_in time NOT NULL,
            time_out time NOT NULL,
            lunch_in time NOT NULL,
            lunch_out time NOT NULL,
            UNIQUE KEY ID (ID)
        ) $charset_collate;";
        
        
        foreach ( $tables as $table ) :
            dbDelta( $table );
        endforeach;
        
        
    }
    
    
}
