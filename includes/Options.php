<?php

namespace OpenErp;

class Options{
    
    public static $version = 'open_erp_version';    
    public static $timetracker_page_id = 'open_erp_timetracker_page_id';
    public static $login_page_id = 'open_erp_login_page_id';
    
    public static $employee_status = 'open_erp_employee_status';
    public static $employee_status_defaults = array(
        'ft'            => 'Full time',
        'pt'            => 'Part time',
        'suspended'     => 'Suspended',
        'terminated'    => 'Terminated',
    );
    
    
    
}