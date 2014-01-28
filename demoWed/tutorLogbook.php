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
    echo "<Title>Tutor Logbook</Title>";
    echo "</head>";
    $query = "select Username from Tutor where Username = '$username'";
    echo "$query</br>";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    if($count != 0)
    {
        echo "</br> <a href=\"tutorLogbook2.php\">Welcome Tutor</a>";

    } else {
        echo "</br> <a href=\"logout.php\">Sorry, You're NOT a tutor</a>";
    }

    
    
    // $query = "select Code from CCode natural join Tutors_For where Tutors_For.Username = '$username'";
    // $result = mysql_query($query);
    // echo "<select name=CCode>";
    
    // while($result = mysql_query($query))
    // {
    //     echo "<option value=$ccode>Audit</option>";
    //     echo "<option value=\"register\">Register</option>";
    // }
    // echo "</select>";

    
//    echo "<select>"
    // echo "<label>Student ID</label>";
    // echo "<input name='studentID'><input></br>";
    // echo "<label>Student Name</lable>";
    // echo "<input name='studentName'></input>";
        /* close the DB connection*/
         mysql_close($dbc); 
echo "</body>";
echo "</html>";
?>
