<?php

namespace OpenErp\Utils;

trait Ajax {
    
    public function verify_nonce( $action ) {
        
        if ( ! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], $action ) ) :
            $this->send_error( __( 'Error: Nonce verification failed', 'erp' ) );
        endif;
        
    }
    
    public function send_success( $data ) {
        wp_send_json_success( $data );
    }
    
    public function send_error( $data ) {
        wp_send_json_error( $data );
    }
    
}

