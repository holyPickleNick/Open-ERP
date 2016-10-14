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

use OpenErp\TimeTracking\Helper;
use OpenErp\TimeTracking\Attendance;

$user = new OpenErp\Utils\User( get_current_user_id() );
$attendance = new Attendance( $user->data->ID );
?>

<?php Helper::the_header( $user ); ?>
        
<div class="container" id="app-body">
    
    <div class="row">
        
        <?php if( $attendance->is_done_work() ) : ?>
        
        <h4>Shift completed!</h4>
        
        <?php elseif( ! $attendance->is_working() ) : ?>
        
            <div class="col-md-3 col-sm-6">
                <button class="btn btn-default btn-block clock-in">
                    <span class="glyphicon glyphicon-log-in"></span>
                    <h4><?php _e( 'Clock in', OPENERP_DOMAIN ); ?></h4>
                </button>            
            </div>
        
        <?php else : ?>
        
        
            <div class="col-md-3 col-sm-6">
                <button class="btn btn-default btn-block clock-out">
                    <span class="glyphicon glyphicon-log-out"></span>
                    <h4><?php _e( 'Clock out', OPENERP_DOMAIN ); ?></h4>
                </button>            
            </div>
        
        

            <?php if( ! $attendance->has_taken_lunch() ) : ?>

            <div class="col-md-3 col-sm-6">
                <button class="btn btn-default btn-block lunch-in">
                    <span class="glyphicon glyphicon-time"></span>
                    <h4><?php _e( 'Start lunch', OPENERP_DOMAIN ); ?></h4>
                </button>            
            </div>

            <?php endif; ?>


            <?php if( $attendance->is_on_lunch() ) : ?>

            <div class="col-md-3 col-sm-6">
                <button class="btn btn-default btn-block lunch-out">
                    <span class="glyphicon glyphicon-time"></span>
                    <h4><?php _e( 'End lunch', OPENERP_DOMAIN ); ?></h4>
                </button>            
            </div>

            <?php endif; ?>
        
        <?php endif; ?>
        
        
    </div>
    

    
</div>
        
        
        
<?php Helper::the_footer( $user ); ?>
