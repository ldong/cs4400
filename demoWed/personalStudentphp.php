<?php
session_start();
$username= $_SESSION["username"];

        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 


$query = "SELECT Name,DOB,Gender,Address,Permanent_Address,Contact_No,Email_Id,Major,Degree FROM Regular_User natural join Student WHERE Regular_User.Username = '$username'";
// echo $query;

$result = mysql_query($query);
$count = mysql_num_rows($result);


if($count != 0)
{
   $row = mysql_fetch_array($result);
   $name = $row['Name'];
   $dob = $row['DOB'];
   $gender = $row['Gender'];
   $addr = $row['Address'];
   $paddr = $row['Permanent_Address'];
   $phonenumber = $row['Contact_No'];
   $email = $row['Email_Id'];
   $major = $row['Major'];
   $degree = $row['Degree'];
}

echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title>Student Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
//echo $_SESSION["username"];
echo "      <p> Personal Infomation Page</p>\n"; 
echo "        <form method=\"post\" action=\"personalStudentInfo.php\">  \n"; 
echo "        <label for=\"perosnalNameLabel\">Name: "." </label>\n"; 
echo "          <input type=\"text\" id=\"perosnalName\" name=\"perosnalName\" value=\"".$name."\" /><br />\n"; 
echo "\n"; 
echo "        <label for=\"DOBLabel\">Date of Birth: </label>\n"; 
echo "        <input type=\"text\" id=\"dateofbirth\" name=\"dob\" value=\"$dob\"/>  <br />\n"; 
echo "\n"; 
echo "            Gender:"; 
if($count != 0)
{
echo "$gender";
}
else{
echo " You cannot change your gender later, so be careful! </br>";
echo "            <select name=\"gender\">\n"; 
echo "            <option value=\"M\">Male</option>\n"; 
echo "            <option value=\"F\">Female</option>\n"; 
echo "            </select>\n"; 
}
echo "            </br>\n"; 
echo "\n"; 
echo "            <label for=\"addrLabel\">Address: </label>\n"; 
echo "            <input type=\"text\" id=\"addr\" name=\"addr\" value=\"$addr\"/> <br/>\n"; 
echo "\n"; 
echo "\n"; 
echo "            <label for=\"paddrLabel\">Permanet Address: </label>\n"; 
echo "            <input type=\"text\" id=\"paddr\" name=\"paddr\" value=\"$paddr\"/> <br/>\n"; 
echo "\n"; 
echo "            <label for=\"phonenumberLabel\">Phone Number: </label>\n"; 
echo "            <input type=\"text\" id=\"phonenumber\" name=\"phonenumber\" value=\"$phonenumber\" /> <br/>\n"; 
echo "\n"; 
echo "            <label for=\"emailLabel\">Email: </label>\n"; 
echo "            <input type=\"text\" id=\"email\" name=\"email\" value=\"$email\"/> <br/>\n"; 
echo "\n"; 


echo "Major: ";     
        $query = "SELECT Name FROM Department ORDER BY Name";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"department_name\" id=\"department_name\">\n"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             if(strcmp($arr[Name], $major) == 0)
             {
                 echo "<option selected=\"selected\" value='$arr[Name]'>".$arr[Name]."</option>\n";
             }
             else 
             {
                 echo "<option value=\"$arr[Name]\">". "$arr[Name]"."</option>\n";
             }
        }

        echo "</select>";

 if(strcmp($degree,"BS") ==0)
 {
      $selected1 = "selected=\"selected\"";
 }else if (strcmp($degree,"MS")==0)
 {
        $selected2 = "selected=\"selected\"";
 } else if (strcmp($degree,"PHD")==0)
 {
          $selected3 = "selected=\"selected\"";
 }

echo "Degree: ";     
echo "<select name=\"degree0\">"; 
echo "<option $selected1 value=\"BS\">BS</option>"; 
echo "<option $selected2 value=\"MS\">MS</option>"; 
echo "<option $selected3 value=\"PHD\">PHD</option>";

echo "</select></br>";


// start 

$query = "SELECT Title From Applied_To_Tutor_For WHERE Username = '$username'";
//echo $query;

$result = mysql_query($query);
$count = mysql_num_rows($result);
//echo "count: $count";

$tutorCourse ="";
if($count != 0)
{
   while($row = mysql_fetch_array($result))
   {
      $title = $row[Title];
      echo "</br>Name</br>$title";
      $checked = "checked";
      $tutorCourse = $tutorCourse .",".$title;
   }
}

echo "</br></br>"; echo "            <label for=\"tutorLabel\">Willing to tutor: </label> </br>\n"; 
echo "            <input type=\"radio\" name=\"isTutor\" value=\"YES\" $checked> YES\n"; 
echo "            <input type=\"radio\" name=\"isTutor\" value=\"NO\" $checked> NO\n</br>"; 
echo "\n"; 
echo "\n"; 
// end


         //echo 'Connected successfully'; 
        $query = "SELECT Title FROM Course ORDER BY Title";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Title]'>".$arr[Title]."</option>";
        }


echo "</select>";





echo "\n"; 
echo "            <script type=\"text/javascript\">"; 
echo "            function getValue(){"; 
echo "                var temp = document.getElementById(\"course\").value;"; 
echo "                var temp1 = document.getElementById(\"course1\").value;"; 
echo "                document.getElementById(\"course1\").value = temp1 + temp +\", \";"; 
echo "            } </script>"; 
echo "        </br>"; 
echo "            <input type =\"button\" onclick=\"getValue()\" value=\"add\"></button>"; 
echo "          \n"; 
echo "            <label for=\"coursesLabel\"></label>\n"; 
//echo "            <input type=\"text\" id=\"course1\" name=\"course1\" "
//                    ."style=\"width:500px; height:30px;\""
//                    ." value = \"$tutorCourse\" /> <br/>\n"; 
echo "            <input type=\"text\" id=\"course1\" name=\"course1\" value=\"$tutorCourse\" maxlength=\"80\" size=\"80\">";
echo "</br>$tutorCourse";
echo "</br>";
echo "            </br>\n"; 

// start

$query="SELECT Name_Of_School,Major,Degree,Year_Of_Grad, GPA from Education_History where Username = '$username'";
$result = mysql_query($query);
$count = mysql_num_rows($result);
$i =1;
$schoolnamearr = array();
$majorarr = array();
$degreearr = array();
$yeararr = array();
$gpaarr = array();

while ($arr = mysql_fetch_array($result)) 
{
   $schoolnamearr[$i] = $arr[Name_Of_School];
   $majorarr[$i] = $arr[Major];
   $degreearr[$i] = $arr[Degree];
   $yeararr[$i] = $arr[Year_Of_Grad];
   $gpaarr[$i] = $arr[GPA];
   $i++;
}

$_SESSION['i'] = $i;
//echo "time it runs $i</br>";

// end



echo "</br>";
echo "<div id=\"degreeForm1\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool1\" value=\"$schoolnamearr[1]\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor1\" value =\"$majorarr[1]\">"; 


 if(strcmp($degreearr[1], "BS") ==0)
 {
      $selected1 = "selected=\"selected\"";
 }else if (strcmp($degreearr[1],"MS")==0)
 {
        $selected2 = "selected=\"selected\"";
 } else if (strcmp($degreearr[1],"PHD")==0)
 {
          $selected3 = "selected=\"selected\"";
 }

echo "Degree: ";     
echo "<select name=\"degree1\">"; 
echo "<option $selected1 value=\"BS\">BS</option>"; 
echo "<option $selected2 value=\"MS\">MS</option>"; 
echo "<option $selected3 value=\"PHD\">PHD</option>";
echo "</select></br>";


echo "Year of graduation: <input type=\"text\" name=\"year1\" value=\"$yeararr[1]\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA1\" value=\"$gpaarr[1]\"></br>\n"; 
echo "</div>";
echo "</br></br>"; 

// form 2

echo "</br>";
echo "<div id=\"degreeForm2\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool2\" value=\"$schoolnamearr[2]\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor2\" value =\"$majorarr[2]\">"; 


 if(strcmp($degreearr[2], "BS") ==0)
 {
      $selected1 = "selected=\"selected\"";
 }else if (strcmp($degreearr[2], "MS")==0)
 {
        $selected2 = "selected=\"selected\"";
 } else if (strcmp($degreearr[2],"PHD")==0)
 {
          $selected3 = "selected=\"selected\"";
 }

echo "Degree: ";     
echo "<select name=\"degree2\">"; 
echo "<option $selected1 value=\"BS\">BS</option>"; 
echo "<option $selected2 value=\"MS\">MS</option>"; 
echo "<option $selected3 value=\"PHD\">PHD</option>";
echo "</select></br>";


echo "Year of graduation: <input type=\"text\" name=\"year2\" value=\"$yeararr[2]\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA2\" value=\"$gpaarr[2]\"></br>\n"; 
echo "</div>";
echo "</br></br>"; 


// form 3

echo "</br>";
echo "<div id=\"degreeForm3\">\n"; 
echo "Name of School: <input type=\"text\" name=\"nameofSchool3\" value=\"$schoolnamearr[3]\"><br>\n"; 
echo "Major: <input type=\"text\" name=\"oldmajor3\" value =\"$majorarr[3]\">"; 


 if(strcmp($degreearr[3], "BS") ==0)
 {
      $selected1 = "selected=\"selected\"";
 }else if (strcmp($degreearr[3],"MS")==0)
 {
        $selected2 = "selected=\"selected\"";
 } else if (strcmp($degreearr[3],"PHD")==0)
 {
          $selected3 = "selected=\"selected\"";
 }

echo "Degree: ";     
echo "<select name=\"degree3\">"; 
echo "<option $selected1 value=\"BS\">BS</option>"; 
echo "<option $selected2 value=\"MS\">MS</option>"; 
echo "<option $selected3 value=\"PHD\">PHD</option>";
echo "</select></br>";


echo "Year of graduation: <input type=\"text\" name=\"year3\" value=\"$yeararr[3]\"></br>\n"; 
echo "GPA: <input type=\"text\" name=\"GPA3\" value=\"$gpaarr[3]\"></br>\n"; 
echo "</div>";
echo "</br></br>"; 
//end
echo "            </br>\n"; 
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>\n"; 
echo "</form>\n"; 
echo "    </body>\n"; 
echo "</html>\n";
          /* close the DB connection*/
          mysql_close($dbc); 
?>
