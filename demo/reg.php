<?php
session_start();

echo "<head>"; 
echo "	<title>Course Selection</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "    	<p> Course Selection</p>"; 
echo "        <form method=\"post\" action=\"regClass.php\"> "; 
echo "		    <label for=\"term\">Term: </label> ";
		echo "<select name=\"term\"></br>"; 
		echo "<option value=\"Fall\">FALL</option>"; 
		echo "<option value=\"Spring\">SPRING</option>"; 
		echo "</select></br>";

echo "            <label for=\"deptLabel\">Department: </label>";

        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 
        $query = "SELECT Name FROM Department ORDER BY Name";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"dept\" id=\"dept\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Name]'>".$arr["Name"]."</option>";
        }

echo "</select></br>\n";
echo "</br>";

echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo " </form>";
echo "    </body>"; 
echo "</html>";

?>