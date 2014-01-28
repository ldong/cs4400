<?php
    
    session_start();
    $username= $_SESSION['username'];
    /*
     This php file is created by Group 17
     @ 2012 Fall for cs4400 proj
     */
    
    /*
     connects to the person table via the following syntax
     */
    $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
    or die('Could not connect: ' . mysql_error());
    
    mysql_select_db('cs4400_Group17');
    //echo 'Connected successfully';
    
    echo "<head>";
    echo "<Title>The real tutor Logbook</Title>";
    echo "</head>";
    echo "<body>";
    echo "        <form method=\"post\" action=\"tutorLogbook3.php\"> "; 
    $query = "select Name from Regular_User where Username = '$username'";
    echo "$query</br>";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    echo "Tutor name : ". $row['Name']."</br>";

    echo "Course Code: ";

    $query = "select Code from CCode natural join Tutors_For where Tutors_For.Username = '$username'";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
        
        echo "<select name=\"course\" id=\"course\">"; 
        while ($arr = mysql_fetch_array($result)) 
        {
             echo "<option value='$arr[Code]'>".$arr["Code"]."</option>";
        }

    echo "</select></br>";

echo "         <label for=\"studentid\">Student ID: </label>\n"; 
echo "         <input type=\"text\" id=\"studentid\" name=\"studentid\" /> <br/>\n"; 


echo "         <label for=\"studentname\">Student Name: </label>\n"; 
echo "         <input type=\"text\" id=\"studentname\" name=\"studentname\" /> <br/>\n"; 







echo "<input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 

        /* close the DB connection*/
         mysql_close($dbc); 
echo "</body>";
echo "</html>";
?>



