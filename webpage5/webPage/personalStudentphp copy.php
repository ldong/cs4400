<?php
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "	<title>Student Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
echo "    	<p> Personal Infomation Page</p>\n"; 
echo "        <form method=\"post\" action=\"personalStudent.php\">  \n"; 
echo "		    <label for=\"perosnalNameLabel\">Name: </label>\n"; 
echo "	        <input type=\"text\" id=\"perosnalName\" name=\"perosnalName\" /><br />\n"; 
echo "\n"; 
echo "		    <label for=\"DOBLabel\">Password: </label>\n"; 
echo "		    <input type=\"text\" id=\"dateofbirth\" name=\"dob\" /> <br />\n"; 
echo "\n"; 
echo "            Gender:\n"; 
echo "            <select name=\"gender\">\n"; 
echo "            <option value=\"male\">Male</option>\n"; 
echo "            <option value=\"female\">Female</option>\n"; 
echo "            </select>\n"; 
echo "            </br>\n"; 
echo "\n"; 
echo "            <label for=\"addrLabel\">Address: </label>\n"; 
echo "            <input type=\"text\" id=\"addr\" name=\"addr\" /> <br/>\n"; 
echo "\n"; 
echo "\n"; 
echo "            <label for=\"paddrLabel\">Permanet Address: </label>\n"; 
echo "            <input type=\"text\" id=\"paddr\" name=\"paddr\" /> <br/>\n"; 
echo "\n"; 
echo "            <label for=\"phonenumberLabel\">Phone Number: </label>\n"; 
echo "            <input type=\"text\" id=\"phonenumber\" name=\"phonenumber\" /> <br/>\n"; 
echo "\n"; 
echo "            <label for=\"emailLabel\">Email: </label>\n"; 
echo "            <input type=\"text\" id=\"dateofbirth\" name=\"dob\" /> <br/>\n"; 
echo "\n"; 
echo "            <label for=\"emailLabel\">Willing to tutor: </label> </br>\n"; 
echo "            <input type=\"radio\" name=\"isTutor\" value=\"YES\"> YES\n"; 
echo "            <input type=\"radio\" name=\"isTutor\" value=\"NO\"> NO\n"; 
echo "\n"; 
echo "\n"; 
        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 
        $query = "SELECT Title FROM Course ORDER BY Title";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Title]'>".$arr["Title"]."</option>";
        }

echo "\n"; 
echo "            <script type=\"text/javascript\">"; 
echo "            function getValue(){"; 
echo "                var temp = document.getElementById(\"course\").value;"; 
echo "                var temp1 = document.getElementById(\"course1\").value;"; 
echo "                document.getElementById(\"course1\").value = temp1 + temp +\", \";"; 
echo "            } </script>"; 
echo "  			</br>"; 
echo "            <input type =\"button\" onclick=\"getValue()\" value=\"add\"></button>"; 
echo "          \n"; 
echo "            <label for=\"coursesLabel\"></label>\n"; 
echo "            <input type=\"text\" id=\"course1\" name=\"course1\" /> <br/>\n"; 
echo "            </br>\n"; 

echo "Major: ";     
        $query = "SELECT Name FROM Department ORDER BY Name";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"department_name\" id=\"department_name\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Name]'>".$arr["Name"]."</option>";
        }
        echo "</select>";

echo "Degree: ";     
echo "<select name=\"degree0\">"; 
echo "<option value=\"BS\">BS</option>"; 
echo "<option value=\"MS\">MS</option>"; 
echo "<option value=\"PHD\">PHD</option>"; 
echo "</select></br>";


echo "<script src=\"http://code.jquery.com/jquery-latest.js\"></script>\n"; 
echo "<script type=\"text/javascript\">\n"; 
echo "	$(document).ready(function() {\n"; 
echo "   // put all your jQuery goodness in here.\n"; 
echo "   document.getElementById(\"degreeForm2\").style.display = \"block\";\n"; 
echo " });\n"; 
echo "</script>\n"; 
echo "\n"; 
echo "<div id=\"degreeForm2\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool1\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor1\"></br>\n"; 
echo "Degree</br>\n"; 
echo "<select name=\"degree1\">\n"; 
echo "<option value=\"BS\">BS</option>\n"; 
echo "<option value=\"MS\">MS</option>\n"; 
echo "<option value=\"PHD\">PHD</option>\n"; 
echo "</select></br>\n"; 
echo "Year of graduation: <input type=\"text\" name=\"year1\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA1\"></br>\n"; 
echo "Add Education <input type=\"button\" onclick=unhide2()></input>\n"; 
echo "</div>\n"; 
echo "\n"; 
echo "<form id=\"degreeForm2\" style=\"DISPLAY: none\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool2\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor2\"></br>\n"; 
echo "Degree</br>\n"; 
echo "<select name=\"degree2\">\n"; 
echo "<option value=\"BS\">BS</option>\n"; 
echo "<option value=\"MS\">MS</option>\n"; 
echo "<option value=\"PHD\">PHD</option>\n"; 
echo "</select></br>\n"; 
echo "Year of graduation: <input type=\"text\" name=\"year2\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA2\"></br>\n"; 
echo "\n"; 
echo "</form>\n"; 
echo "\n"; 
echo "<form id=\"degreeForm3\" style=\"DISPLAY: none\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool3\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor3\"></br>\n"; 
echo "Degree</br>\n"; 
echo "<select name=\"degree3\">\n"; 
echo "<option value=\"BS\">BS</option>\n"; 
echo "<option value=\"MS\">MS</option>\n"; 
echo "<option value=\"PHD\">PHD</option>\n"; 
echo "</select></br>\n"; 
echo "Year of graduation: <input type=\"text\" name=\"year3\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA3\"></br>\n"; 
echo "</form>\n"; 
echo "\n"; 
echo "\n"; 
echo "\n"; 
echo "\n"; 
echo "            <script type=\"text/javascript\">\n"; 
echo "                function unhide(){\n"; 
echo "\n"; 
echo "                    document.getElementById(\"degreeForm2\").style.display = \"block\";\n"; 
echo "\n"; 
echo "                }\n"; 
echo "                function unhide2(){\n"; 
echo "\n"; 
echo "                    document.getElementById(\"degreeForm3\").style.display = \"block\";\n"; 
echo "\n"; 
echo "                }\n"; 
echo "            </script>\n";



echo "            </br>\n"; 
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>\n"; 
echo "    </body>\n"; 
echo "</html>\n";
?>
