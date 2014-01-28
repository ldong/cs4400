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




    $course = $_POST['course'];
    $studentid=$_POST['studentid'];
    $studentname=$_POST['studentname'];

    echo $course.$studentid.$studentname;




    $query = "select Username from Student natural join Registers where Student_Id = '$studentid' group by Username";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    $foundUsername = $row['Username'];
    echo "$foundUsername";




    $query = "select CRN from Registers natural join Section natural join CCode where Code = '$course' and CRN in (select CRN from Registers where Registers.Username = '$username') group by CRN";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    $foundcrn = $row['CRN'];
    echo "$foundcrn";

    $query = "INSERT INTO Logs_Visit VALUES('$foundUsername','$username','$foundcrn', NOW())"; 
    echo $query;
    $result = mysql_query($query);

echo "<input type=\"submit\" value=\"Click me to submit\" name=\"DONE\"/>"; 
        /* close the DB connection*/
         mysql_close($dbc); 
echo "</body>";
echo "</html>";
?>



