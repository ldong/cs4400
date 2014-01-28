<?php
session_start();
$username = $_SESSION['username'];
if(isset($_SESSION['rowTutor']))
  unset($_SESSION['rowTutor']);
if(isset($_SESSION['count']))
  unset($_SESSION['count']);
echo "<html>"; 
echo "	<head>"; 
echo "		<title>tutor assignment</title>"; 
echo "	</head>"; 
echo "	<body>"; 

echo "	  	<p> Assign Tutor </p>"; 
echo "	    <label for=\"term\">Students: </label>   </br>"; 
echo "        <form method=\"post\" action=\"tutorAssignment2.php\"> "; 

    /*
     connects to the person table via the following syntax
     */

    $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
    or die('Could not connect: ' . mysql_error());
    
    mysql_select_db('cs4400_Group17');

    $query =" select Name from Regular_User natural join Applied_To_Tutor_For inner join Section on Applied_To_Tutor_For.Title = Section.Title where Section.Instructor_Username = '$username' group by Name";

    //echo "$query</br>";
    $result = mysql_query($query);

        echo "<table border='1'><tr> ";
        echo "<th>Select</th> <th>Applicant Name</th>";
        echo "</tr>";
        $count=0;
        $rowTutor = array();
        while($row = mysql_fetch_array($result)) {
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
		
		echo $row['Name'];
		$rowTutor[] = $row['Name'];
        $count++;
		} 
		echo "</table>";
		echo " </br>"; 

		$_SESSION['count'] = $count; 
		$_SESSION['rowTutor'] = $rowTutor;

echo "<input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo "		</form>"; 
echo "	</body>"; 
echo "</html>";
?>