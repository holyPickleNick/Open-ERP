<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="<?php echo OPENERP_TIMETRACKING_URL . '/includes/assets/styles/bootflat.min.css' ?>" rel="stylesheet">
        <link href="<?php echo OPENERP_TIMETRACKING_URL . '/includes/assets/styles/main.css' ?>" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="<?php echo OPENERP_TIMETRACKING_URL . '/includes/assets/scripts/app.js' ?>" ></script>
    </head>
    <body>
        <div id="navbar">
            <div class="container">
                <?php echo $user->data->display_name; ?>
                <?php echo $user->data->ID; ?>
                
                <?php echo current_time( 'M d | H:m' ); ?>
                <a href="<?php echo wp_logout_url(); ?>">
                    <button type="button" class="btn btn-danger"><?php _e( 'Logout', OPENERP_DOMAIN ); ?></button>
                </a>
            </div>
        </div>
        