<?php
echo "<head>"; 
echo "  <title>Add Courses</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "      <p> Add course Page</p>"; 
echo "        <form method=\"post\" action=\"addcourse.php\">       </form>"; 
echo "          <label for=\"CRN\">CRN : </label>"; 
echo "          <input type=\"text\" id=\"CRN\" name=\"CRN\" /><br />"; 
echo "          <label for=\"TITLE\">TITLE: </label>"; 
echo "          <input type=\"text\" id=\"title\" name=\"title\" /> <br />"; 
echo "            <label for=\"COURSE_CODE\">COURSE CODE: </label>"; 
echo "            <input type=\"text\" id=\"ccode\" name=\"ccode\" /> <br />"; 
echo "            <label for=\"INSTRUCTORS\">INSTRUCTORS: </label>"; 
echo "            <input type=\"text\" id=\"instructor\" name=\"instructor\" /> <br />"; 
echo "            TERM:"; 
echo "            <select name=\"ccode\">"; 
echo "            <option value=\"fall\">FALL</option>"; 
echo "            <option value=\"spring\">SPRING</option>"; 
echo "            </select>"; 
echo "            </br>"; 

echo "            <label for=\"deptLabel\">Department: </label> </br>"; 

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



echo "            <label for=\"credit\">CREDITS: </label>"; 
echo "            <input type=\"text\" id=\"credit\" name=\"credits\" value=\"3.0\"/>  <br/>"; 



echo "            DAYS:"; 
echo "            <select name=\"days\">"; 
echo "            <option value=\"mwf\">MWF</option>"; 
echo "            <option value=\"tth\">TTH</option>"; 
echo "            </select>"; 
echo "            </br>"; 

echo "            <label for=\"time\">TIME: </label>"; 
echo "            <input type=\"text\" id=\"time\" name=\"time\"/>  <br/>"; 
echo "            <br/>"; 


echo "            <label for=\"loc\">LOCATION: </label>"; 

        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 
        $query = "SELECT Location FROM Section ORDER BY Location";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Location]'>".$arr["Location"]."</option>";
        }

echo "</select>";

echo "            <br/>"; 
echo "            </br>"; 
echo " <button value=\"reset\" name=\"reset\" onclick=\"document.location.reload(true)\">reset</button>\n";
echo "            <input type=\"submit\" value=\"add\" name=\"add\"/>"; 
echo "    </body>"; 
echo "</html>"; 

?>