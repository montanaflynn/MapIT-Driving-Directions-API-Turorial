<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>MapIT Driving Directions</title>
        <meta name="description" content="Generate google maps driving directions">
			 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="assets/css/main.css">

				<!-- http://modernizr.com/docs/ -->
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
	
		    <div id="wrap">
		      <!-- Begin page content -->
		      <div class="container">
						<div class="masthead">
			        <h1 class="muted">MapIT 
								<span class="beta label label-warning">beta</span> 
								<small class="pull-right">
									<a href="http://montanaflynn.me">Back To Tutorial</a>
								</small>
							</h3>
			      </div>
						<h2>Where would you like to go?</h2>
					
						<form method="post">
							<div class="control-group">
	              <div class="controls">
					        <input type="text" name="start_location" class="input-block-level" placeholder="Starting address" value="<?php echo ($directions->start_location ? $directions->start_location : $_POST['start_location']); ?>">
	              </div>
	            </div>
							<div class="control-group">
	              <div class="controls">
					        <input type="text" name="end_location"  class="input-block-level" placeholder="Ending address" value="<?php echo ($directions->end_location ? $directions->end_location : $_POST['end_location']); ?>">
	              </div>
	            </div>
			        <button class="btn btn-primary" type="submit">MapIT</button>
			      </form>
			
						<?php
						// Errors
						if (isset($directions->error)) {
							echo '<div class="alert alert-error">';
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
							echo $directions->error;
							echo '</div>';
						}
						?>
			
			
						<?php if (!$abort) { ?> 

						<h3>Your Directions, Sir.</h3>
						
						<?php
						// Trip Information
						if (!$abort) {
							$trip = '<p>Total Distance: <b>' . $directions->distance;
							$trip .= '</b> Estimated Duration: <b>' . $directions->duration . '</b></p>';
							echo $trip;
						}
						?>
							
						<table class="table">
	            <tbody>
								<?php
								if (!$abort) {
									// Step by step directions
									$count = 0;
									foreach ($directions->directions as $step) {
										$count++;
										$table_row = '<tr>';
										$table_row .= '<td>'.$count.'</td>';
										$table_row .= '<td>'.$step->direction.'</td>';
										$table_row .= '<td>'.$step->distance.'</td>';
										$table_row .= '</tr>';
										echo $table_row;
									}
								}
								?>
	            </tbody>
	          </table>
							
						<?php } ?>
						
		      </div>

		      <div id="push"></div>
		    </div>

		    <div id="footer">
		      <div class="container">
		        <p class="muted credit">Brought to you by <a href="http://mashape.com">Mashape API marketplace</a> and the <a href="https://www.mashape.com/montanaflynn/google-maps-driving-directions">Google Maps Driving Directions API</a>.</p>
		      </div>
		    </div>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
