<?php
/**
 * 
 * This is the main file for the time tracker app
 * 
 * - check user is logged in
 * - check user has permission
 * 
 * 
 */

$user = new OpenErp\Abstracts\User( get_current_user_id() );

?>

<html>
    <head>
        
    </head>
    <body>
        
        <div>
            <?php echo $user->first_name . ' ' . $user->last_name; ?>
        </div>
        
    </body>
</html>










