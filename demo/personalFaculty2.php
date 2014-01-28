<?php session_start(); 
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title>Student Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
echo "      <p> Professor Infomation Page</p>\n"; 
echo "        <form method=\"post\" action=\"personalFacultyInfo.php\"> \n"; 
echo "          <label for=\"perosnalNameLabel\">Name: </label>\n"; 
echo "          <input type=\"text\" id=\"perosnalName\" name=\"perosnalName\" /><br />\n"; 
echo "\n"; 
echo "          <label for=\"DOBLabel\">Date of Birth: </label>\n"; 
echo "          <input type=\"text\" id=\"dateofbirth\" name=\"dob\" /> <br />\n"; 
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
echo "            <input type=\"text\" id=\"email\" name=\"email\" /> <br/>\n"; 
echo "            <label for=\"deptLabel\">Department: </label>\n";
    echo "         <input type=\"text\" id=\"deparment_name\" name=\"deparment_name\" /> <br/>\n";

echo "\n"; 
echo "\n"; 

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
echo "Position\n"; 
echo "<select name=\"position\">\n"; 
echo "<option value=\"professor0\">Professor</option>\n"; 
echo "<option value=\"professor1\">Associate  Professor</option>\n"; 
echo "<option value=\"professor2\">Assistant  Professor</option>\n"; 
echo "</select></br>\n";

echo "Course"; 
        $query = "SELECT Title FROM Course ORDER BY Title";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Title]'>".$arr["Title"]."</option>";
        }
    $username= $_SESSION["username"];
    $password=$_SESSION["password"];
echo "</select>";

echo "</select></br>\n";
echo "Section\n"; 
echo "<select name=\"section\">\n"; 
echo "<option value=\"section1\">A</option>\n"; 
echo "<option value=\"section2\">B</option>\n"; 
echo "</select></br>\n";

echo "            <label for=\"resLabel\">Research Interest: </label>\n"; 
echo "            <input type=\"text\" id=\"research\" name=\"research\" /> <br/>\n"; 
echo "\n"; 
    
    
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>
echo "</form>";
echo "    </body>\n"; 
echo "</html>\n"; 
echo "\n";
?>