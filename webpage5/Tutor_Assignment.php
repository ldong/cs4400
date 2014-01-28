<?php
    
    session_start();
    $username= $_SESSION['username'];
   // $username='s1';
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
    <form action="welcome.php" method="post">
    echo "<head>";
    echo "</head>";
    echo "<Title>Tutor Assignment</Title>";
    $query ="select Name from Regular_User natural join Applied_To_Tutor_For inner join Section on Applied_To_Tutor_For.Title = Section.".".Title where Section.Instructor_Username = '$username' group by Name";
    echo "$query</br>";
    $result = mysql_query($query);
    //$Courses = mysql_fetch_array($result);
    echo "<label>Students</label>";
    while($row = mysql_fetch_array($result))
    echo "<option name=student value='".$row['Name']."'>" . $row['catname'] . "</option>";

    $selectedTutorName= $_POST['student'];
    
    $query = "INSERT INTO Tutors_For VALUES (SELECT Username,Title FROM Applied_To_Tutor_For natural join Regular_User where Regular_User.".".Name = '$selectedTutorName')";
    
    $query="INSERT INTO Tutor VALUES (SELECT Username FROM Applied_To_Tutor_For natural join Regular_User where Regular_User.Name = '$selectedTutorName')";
    
    $query="delete from Applied_To_Tutor_For where Username = (SELECT Username FROM Applied_To_Tutor_For natural join Regular_User where Regular_User.Name = '$selectedTutorName')";
    
    <input type="submit">
    </form>
?>