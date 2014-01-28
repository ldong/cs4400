<?php session_start(); 
echo $_SESSION['username'];

$username =$_SESSION['username'];



        /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 


$query = "SELECT Name,DOB,Gender,Address,Permanent_Address,Contact_No,Email_Id,Dept_Id,Position FROM Regular_User natural join Faculty WHERE Regular_User.Username = '$username'";
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
   $position = $row['Position'];

    if($row['Dept_Id'] == 1)
    {
      $deptid = "Aerospace Engineering";
    } else if($row['Dept_Id'] == 2)
    {
      $deptid = "Biology";
    } else if($row['Dept_Id'] == 3)
    {
      $deptid = "Biomedical Engineering";
    } else if($row['Dept_Id'] == 4)
    {
      $deptid = "Computer Science";
    } else if($row['Dept_Id'] == 5)
    {
      $deptid = "Electrical & Computer Engineering";
    }
}


echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title>Faculty Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
echo "      <p> Professor Infomation Page</p>\n"; 
echo "        <form method=\"post\" action=\"personalFacultyInfo.php\"> \n"; 


////
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

///
echo "            <label for=\"deptLabel\">Department: </label>\n";
    echo "         <input type=\"text\" id=\"department_name\" name=\"department_name\" value=\"$deptid\" /> <br/>\n";

echo "\n"; 
echo "\n"; 

      
        $query = "SELECT Name FROM Department ORDER BY Name";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"dept\" id=\"dept\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
           if(strcmp($arr[Name], $deptid) == 0)
           {
              echo "<option selected=\"selected\" value='$arr[Name]'>".$arr["Name"]."</option>";  
           }
           else
           {
              echo "<option value='$arr[Name]'>".$arr["Name"]."</option>";
           }
        }

echo "</select></br>\n";


echo "Position\n"; 
echo "<select name=\"position\">\n"; 
if(strcmp($position,"Professor") == 0)
{
  $selected1 = "selected=\"selected\"";
}
else if (strcmp($position,"Associate Professor") == 0)
{
  $selected2 = "selected=\"selected\"";
}
else if (strcmp($position,"Assistant Professor") == 0)
{
  $selected3 = "selected=\"selected\"";
}

echo "<option $selected1 value=\"Professor\">Professor</option>\n"; 
echo "<option $selected2 value=\"Associate Professor\">Associate  Professor</option>\n"; 
echo "<option $selected3 value=\"Assistant Professor\">Assistant  Professor</option>\n"; 
echo "</select></br>\n";


        $query = "SELECT Title from Section where Instructor_Username = '$username'";
        $result= mysql_query($query);
        $arr = mysql_fetch_array($result);
        $mytitle = $arr[Title];

echo "Course"; 
        $query = "SELECT Title FROM Course ORDER BY Title";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {

            if(strcmp($arr[Title], $mytitle) == 0)
             {
                echo "<option selected=\"selected\" value='$arr[Title]'>".$arr["Title"]."</option>";
             }
             else 
             {
                  echo "<option value='$arr[Title]'>".$arr["Title"]."</option>";
             }
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

//
        $query = "SELECT Interest from Research_Interests where Username = '$username'";
        $result= mysql_query($query);
        $arr = mysql_fetch_array($result);
        $personalinterest = $arr[Interest];

echo "            <label for=\"resLabel\">Research Interest: </label>\n"; 
echo "            <input type=\"text\" id=\"research\" name=\"research\" value =\"$personalinterest\"/> <br/>\n"; 
echo "\n"; 
    
    
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>";
echo "</form>";
echo "    </body>\n"; 
echo "</html>\n"; 
echo "\n";
?>