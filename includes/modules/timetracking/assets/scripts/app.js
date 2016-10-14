jQuery(document).ready( function($) {
    
    var ajax_url = $('#ajax-url').val();
    
    var ttEvents = {
        
        initialize : function() {
            
            $('#app-body').on( 'click', '.clock-in',ttActions.clockIn );
            $('#app-body').on( 'click', '.clock-out',ttActions.clockOut );
            $('#app-body').on( 'click', '.lunch-in',ttActions.lunchOut );
            $('#app-body').on( 'click', '.lunch-out',ttActions.lunchOut );
            
        }
        
    }
    
    var ttActions = {
        
        clockIn: function() {
            
            var data = {
                action : 'open_erp_tt_clock_in'
            }
            
            $.post( ajax_url, data, function( response) {
                swal({
                    title : response.message
                }, function() {
                    location.reload();
                });
            });
            
        },
        
        clockOut: function() {
            
            var data = {
                action : 'open_erp_tt_clock_out'
            }

            $.post( ajax_url, data, function( response) {
                swal({
                    title : response.message
                }, function() {
                    location.reload();
                });
            });

        },
        
        lunchIn: function() {
            
            var data = {
                action : 'open_erp_tt_lunch_in'
            }

            $.post( ajax_url, data, function( response) {
                swal({
                    title : response.message
                }, function() {
                    location.reload();
                });
            });            
            
        },
        
        lunchOut: function() {
            
            var data = {
                action : 'open_erp_tt_lunch_out'
            }

            $.post( ajax_url, data, function( response) {
                swal({
                    title : response.message
                }, function() {
                    location.reload();
                });
            });            
            
        },
        
        doAjax : function( $data ) {
            
            
            
        }
        
    }
    
    
    
    $(function() {
        
        ttEvents.initialize();

    }); 
    
});