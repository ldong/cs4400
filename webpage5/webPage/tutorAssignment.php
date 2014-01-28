<?php
echo "<head>\n"; 
echo "	<title>Tutor Assignment</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
echo "    	<p> Tutor Assignment</p>\n"; 
echo "        <form method=\"post\" action=\"tutorAssignment.php\">    </form>\n"; 
echo "		    <label for=\"student\">Students: </label>\n"; 
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

echo "\n"; 
echo "\n"; 
echo "            <TEXTAREA Name=\"content\" ROWS=2 COLS=20></TEXTAREA>\n"; 
echo "\n"; 
echo "\n"; 
echo "            </br>\n"; 
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>\n"; 
echo "    </body>\n"; 
echo "</html>\n";
          /* close the DB connection*/
          mysql_close($dbc); 
?>