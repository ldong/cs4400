<?php
    session_start();
    //$SESSION
    $username= $_SESSION['username'];
    //echo $username;
       /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully';

echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title> Student Report</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 

    $query ="CREATE VIEW studentr as select Name,Code,Title, case Registers.Grade when 'A' then 4 when 'B' then 3 when 'C' then 2 when 'D' then 1 when 'F' then 0 end as Grade from CCode NATURAL JOIN Section NATURAL JOIN Registers NATURAL JOIN Regular_User";
    //echo $query;
        $query2 = "SELECT Name as Instructor,Code,Title,AVG(Grade)AS Average FROM studentr GROUP BY Title";
    //echo $query2
     //   echo "$query";
     //   echo "$query2";



        mysql_query($query);
        $result= mysql_query($query2);


        echo "<table border='1'><tr> ";
        echo "<th>Instructor</th><th>Course Code</th><th>Course Name</th><th>Average Grade for students</th>";
        echo "</tr>";

        while($row = mysql_fetch_array($result))
        {
                echo "<tr><td>";
                echo $row['Instructor'];
                echo "</td><td>";
                 
                echo $row['Code'];
                echo "</td><td>";
            
                echo $row['Title'];
                echo "</td><td>";
            
                echo $row['Average'];
               echo "</tr></td>";
            
            
        }
        
        echo "</table>";
        $query='drop view studentr';
        mysql_query($query);

echo "    </body>\n"; 
echo "</html>\n";
         /* close the DB connection*/
         mysql_close($dbc); 
?>