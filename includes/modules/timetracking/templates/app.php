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

$user = new OpenErp\Objects\User( get_current_user_id() );

?>

<?php OpenErp\TimeTracking\Helper::the_header( $user ); ?>
        
<div class="container" id="app-body">
    
    <div class="row">
        
        
        <div class="col-md-12">
            
<!--            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php _e('Select job', OPENERP_DOMAIN); ?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php _e('Select process', OPENERP_DOMAIN); ?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>-->

        </div>
        
        <div class="col-md-3 col-sm-6">
            <button class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-log-in"></span>
                <h4><?php _e( 'Clock in', OPENERP_DOMAIN ); ?></h4>
            </button>            
        </div>
        
        
        <div class="col-md-3 col-sm-6">
            <button class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-log-out"></span>
                <h4><?php _e( 'Clock out', OPENERP_DOMAIN ); ?></h4>
            </button>            
        </div>


        <div class="col-md-3 col-sm-6">
            <button class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-time"></span>
                <h4><?php _e( 'Start lunch', OPENERP_DOMAIN ); ?></h4>
            </button>            
        </div>

        <div class="col-md-3 col-sm-6">
            <button class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-time"></span>
                <h4><?php _e( 'End lunch', OPENERP_DOMAIN ); ?></h4>
            </button>            
        </div>
        
        
    </div>
    

    
</div>
        
        
        
<?php OpenErp\TimeTracking\Helper::the_footer( $user ); ?>
