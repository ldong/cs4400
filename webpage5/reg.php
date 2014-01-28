<?php
session_start();
$term = "FALL" . " 2012";
$dept = "Computer Science";
echo "<head>"; 
echo "	<title>Course Selection</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "    	<p> Course Selection</p>"; 
echo "        <form method=\"post\" action=\"regClass.php\">    </form>"; 
echo "		    <label for=\"term\">Term: </label> $term  </br>";

echo "		    <label for=\"deptLabel\">Department: </label> $dept </br>"; 

        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 
        $query = "SELECT * FROM Section ORDER BY CRN";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        $loop =  $count;
        //$arr = mysql_fetch_array($result);

        echo "<table border='1'><tr> ";
        echo "<th>Select</th> <th>CRN</th> <th>Term</th><th>Section</th>";
        echo "<th>Location</th> <th>Days</th> <th>Time</th> <th>Instructor</th>";
        echo "<th>Title</th> <th>Mode of Grading</th>";
        echo "</tr>";

        while($row = mysql_fetch_array( $result )) {
		// Print out the contents of each row into a table
		echo "<tr><td>"; 
		echo "<input type=\"checkbox\" name=\""."checkBoxOption".$count."\" value=\"0\"><br>";
		echo "</td><td>"; 
		
		echo $row['CRN'];
		echo "</td><td>"; 

		echo $row['Term'];
		echo "</td><td>";

		echo $row['Letter'];
		echo "</td><td>";

		echo $row['Location'];
		echo "</td><td>";

		echo $row['Day'];
		echo "</td><td>";


		echo $row['Time'];
		echo "</td><td>";

		echo $row['Instructor_Username'];
		echo "</td><td>";

		echo $row['Title'];
		echo "</td><td>";

		//echo "dropdown";
		echo "<select name=\""."dropDownOption".$count--."\">"; 
		echo "<option value=\"audit\">Audit</option>"; 
		echo "<option value=\"register\">Register</option>"; 
		echo "</select>";
		echo "</td><td>";

		echo "</td></tr>"; 


		} 
		echo "</table>";
		echo " </br>"; 


echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo "    </body>"; 
echo "</html>";
          /* close the DB connection*/
          mysql_close($dbc); 
?>