
		<?php
		    echo "Hello, this file actually runs";
		    printf("\n");
		    $link = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_');
		     if (!$link) {
		     	 die('Could not connect: ' . mysql_error()); 
		        }
		    mysql_select_db(‘cs4400_Group17’); 
		    echo 'Connected successfully'; mysql_close($link);
		?>
