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
    echo "</head>";
    echo "<Title>Tutor Logbook</Title>";
    $query ="select Name from Regular_User where Username = '$username'";
    echo "$query</br>";
    $result = mysql_query($query);
    $NAME = mysql_fetch_array($result);
    echo "<label>Tutor Name</label>";
    echo "<label>". $NAME['Name']."</label></br>";
    
    
    $query = "select Code from CCode natural join Tutors_For where Tutors_For.Username = '$username'";
    $result = mysql_query($query);
    echo "<select name=CCode>";
    /*
    while($result = mysql_query($query))
    {
        echo "<option value=$ccode>Audit</option>";
        echo "<option value=\"register\">Register</option>";
    }*/
    echo "</select>";

    
//    echo "<select>"
    echo "<label>Student ID</label>";
    echo "<input name='studentID'><input></br>";
    echo "<label>Student Name</lable>";
    echo "<input name='studentName'></input>";

?>
