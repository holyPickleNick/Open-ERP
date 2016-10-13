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
                alert( response )
            });
            
        },
        
        clockOut: function() {
            
        },
        
        lunchIn: function() {
            
        },
        
        lunchOut: function() {
            
        }
        
    }
    
    
    
    $(function() {
        
        ttEvents.initialize();

    }); 
    
});