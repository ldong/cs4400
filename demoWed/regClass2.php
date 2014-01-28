<?php
session_start();
$username = $_SESSION['username'];
echo "<head>"; 
echo "	<title>Registration Confirmation</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "    	<p> Course Register</p>"; 
echo "		    <label for=\"term\">You Have Registered those classes successfully: </label>  </br>";
echo "		    <label for=\"term\">Username: </label> $username  </br>";

$rowCRN = $_SESSION['rowCRN']; 
//$username = $_SESSION['username'];
$count= $_SESSION['count']; 
 var_dump($rowCRN);
// echo "$count</br>";
$dropdown = array();
$checkbox = array();
for ($i=0; $i<$count; $i++)
{
	$dropdownname = "dropDownOption".$i;
	$checkboxname = "checkBoxOption".$i;
	// echo "$dropdownnam </br>";
	
	// echo $getValue;
    $dropdown[] = $_POST["$dropdownname"];
    $checkbox[] = $_POST["$checkboxname"];
    // echo $dropdown[$i];
}
echo"</br>";
var_dump($dropdown);
echo"</br>";
var_dump($checkbox);
echo"</br>";

        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 

        for ($i=0; $i<$count; $i++)
		{

			if($checkbox[$i] =='Y')
        	{
        		$crn = $rowCRN[$i];
        		//echo "</br>$crn</br>";

        		$query = "select Username,CRN from Registers natural join Section where Registers.Username = '$username' and Registers.CRN = '$crn'";
        		 //echo "$query";
        		 $result= mysql_query($query);
			     $count = mysql_num_rows($result);
			     echo "$count";
        		 // $query = "select * from Section where Section.Title IN (SELECT Title from Department_Offers_Course natural join Department where Department.Name = '$dept')";
        		 if($count == 0)
        		 {
        		 	$query="INSERT INTO Registers(Username,CRN,Grade_Mode) VALUES"
        		 	        ." ('$username','$crn','$dropdown[$i]')";
        		 //	echo "$query";
        		 	$result= mysql_query($query);
				 	echo "You have just registered CourseCRN $crn!";

        		   //$result= mysql_query($query)
				 }
				 else 
				 {
				 	echo "</br>The CourseCRN $crn is already registered.";
				 }
			}         	
		}
/*
			$query = "Select Code, Title,Letter,Grade_Mode from Registers natural join Section natural join CCode where Grade IS NULL and Registers.Username = '$username'";
*/

		$query ="select Code, Title,Letter,Grade_Mode from Registers natural join Section natural join CCode where Grade IS NULL and Registers.Username = '$username'";

			$result= mysql_query($query);
			

        echo "<table border='1'><tr> ";
        echo "<th>Code</th> <th>Title</th> <th>Letter</th><th>Grade Mode</th>";
        echo "</tr>";

        while($row = mysql_fetch_array( $result )) 
        {
				// Print out the contents of each row into a table
				echo "<tr><td>"; 
				
				echo $row['Code'];
				echo "</td><td>"; 

				echo $row['Title'];
				echo "</td><td>";

				echo $row['Letter'];
				echo "</td><td>";

				echo $row['Grade_Mode'];
		} 
		echo "</table>";


echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo "    </body>"; 
echo "</html>";
          /* close the DB connection*/
         mysql_close($dbc); 
?>