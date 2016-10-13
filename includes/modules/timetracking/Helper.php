<?php

namespace OpenErp\TimeTracking;

class Helper {
    
    public static function the_header( $user ){
        include_once OPENERP_TIMETRACKING_PATH . '/includes/template-parts/header.php';
    }
    
    public static function the_footer( $user ){
        include_once OPENERP_TIMETRACKING_PATH . '/includes/template-parts/footer.php';
    }
    
    
}