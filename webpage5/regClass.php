<?php
session_start();
if(isset($_SESSION['rowCRN']))
  unset($_SESSION['rowCRN']);
if(isset($_SESSION['count']))
  unset($_SESSION['count']);

$term = "FALL" . " 2012";
$dept = "Computer Science";
echo "<head>"; 
echo "	<title>Course Registration</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "    	<p> Course Register</p>"; 
echo "		    <label for=\"term\">Term: </label> $term  </br>";
echo "		    <label for=\"deptLabel\">Department: </label> $dept </br>"; 
echo "        <form method=\"post\" action=\"regClass2.php\"> ";

        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 
        $query = "select * from Section where Section.Title IN (SELECT Title from Department_Offers_Course natural join Department where Department.Name = '$dept')";
        $result= mysql_query($query);

        //$arr = mysql_fetch_array($result);

        echo "<table border='1'><tr> ";
        echo "<th>Select</th> <th>CRN</th> <th>Term</th><th>Section</th>";
        echo "<th>Location</th> <th>Days</th> <th>Time</th> <th>Instructor</th>";
        echo "<th>Title</th> <th>Mode of Grading</th>";
        echo "</tr>";


        $count=0;
        $rowCRN = array();
        $mode = array();
        while($row = mysql_fetch_array( $result )) {
		// Print out the contents of each row into a table
		echo "<tr><td>"; 
		$checkBox = "checkBoxOption".$count;
		//echo "$checkbox</br>";
		//echo "<input type=\"checkbox\" name=\"$checkBox\" value=\"0\"><br>";

		echo "<select name=". $checkBox.">"; 
		echo "<option value=\"Y\">Y</option>"; 
		echo "<option value=\"N\">N</option>"; 
		echo "</select>";

		echo "</td><td>"; 
		
		echo $row['CRN'];
		$rowCRN[] = $row['CRN'];
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

        $dropdown = "dropDownOption".$count++;
		//echo "$dropdown</br>";
		//echo "dropdown";
		echo "<select name=". $dropdown.">"; 
		echo "<option value=\"Audit\">Audit</option>"; 
		echo "<option value=\"Registered\">Register</option>"; 
		echo "<option value=\"PassnFail\">Fass/Fail</option>"; 
		echo "</select>";


		} 
		echo "</table>";
		echo " </br>"; 
		echo "DUMP ARRAY</br>";
		var_dump($rowCRN);
		$_SESSION['rowCRN'] = $rowCRN; 
		$_SESSION['count'] = $count; 
		echo "$count";


echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo "</form>"; 
echo "    </body>"; 
echo "</html>";
          /* close the DB connection*/
          mysql_close($dbc); 
?>