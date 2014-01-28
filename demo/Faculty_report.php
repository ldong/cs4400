<?php
    session_start();
    $username= $_SESSION['username'];
       /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully';
    //$username = "p14";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title> Faculty Report</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 

    $query ="create view f1 as SELECT Code,Title, case Grade when 'A' then 4 when 'B' then 3 when 'C' then 2 when 'D' then 1 when 'F' then 0 end as Grade FROM CCode natural join Section natural join Registers where Registers.Username IN (select Student from Logs_Visit group by Student having count(*) >3) and Instructor_Username = '$username'";
    //echo $query;
        $query2 = "SELECT Code,Title,AVG(Grade)AS Average FROM f1 GROUP BY Title";
    //echo $query2
     //   echo "$query";
     //   echo "$query2";



        mysql_query($query);
        $result= mysql_query($query2);

    
        echo "<h4>More than 3 times<h4>\n";
    
        echo "<table border='1'><tr> ";
        echo "<th>Course Code</th><th>Course Name</th> <th>GPA</th>";
        echo "</tr>";

        while($row = mysql_fetch_array($result))
        {
                echo "<tr><td>"; 
                echo $row['Code'];
            
                echo "</td><td>";
                echo $row['Title'];
            
                echo "</td><td>";
                echo $row['Average'];
            
               
        }
        
        echo "</table>";
        $query='drop view f1';
        mysql_query($query);

    
    $query ="create view f2 as SELECT Code,Title, case Grade when 'A' then 4 when 'B' then 3 when 'C' then 2 when 'D' then 1 when 'F' then 0 end as Grade FROM CCode natural join Section natural join Registers where Registers.Username IN (select Student from Logs_Visit group by Student having count(*) <=3 or count(*) >=1) and Instructor_Username = '$username'";
    //echo $query;
    $query2 = "SELECT Code,Title,AVG(Grade)AS Average FROM f2 GROUP BY Title";
    //echo $query2
    //   echo "$query";
    //   echo "$query2";
    
    
    
    mysql_query($query);
    $result= mysql_query($query2);
    
    
    echo "<h4>Less than 3 times<h4>\n";
    
    echo "<table border='1'><tr> ";
    echo "<th>Course Code</th><th>Course Name</th> <th>GPA</th>";
    echo "</tr>";
    
    while($row = mysql_fetch_array($result))
    {
        echo "<tr><td>";
        echo $row['Code'];
        
        echo "</td><td>";
        echo $row['Title'];
        
        echo "</td><td>";
        echo $row['Average'];
        
        
    }
    
    echo "</table>";
    $query='drop view f2';
    mysql_query($query);
    

    $query ="create view f3 as SELECT Code,Title, case Grade when 'A' then 4 when 'B' then 3 when 'C' then 2 when 'D' then 1 when 'F' then 0 end as Grade FROM CCode natural join Section natural join Registers where Registers.Username NOT IN (select Student from Logs_Visit group by Student) and Instructor_Username = '$username'";
    //echo $query;
    $query2 = "SELECT Code,Title,AVG(Grade)AS Average FROM f3 GROUP BY Title";
    //echo $query2
    //   echo "$query";
    //   echo "$query2";
    
    
    
    mysql_query($query);
    $result= mysql_query($query2);
    
    
    echo "<h4>No visits<h4>\n";
    
    echo "<table border='1'><tr> ";
    echo "<th>Course Code</th><th>Course Name</th> <th>GPA</th>";
    echo "</tr>";
    
    while($row = mysql_fetch_array($result))
    {
        echo "<tr><td>";
        echo $row['Code'];
        
        echo "</td><td>";
        echo $row['Title'];
        
        echo "</td><td>";
        echo $row['Average'];
        
        
    }
    
    echo "</table>";
    $query='drop view f3';
    mysql_query($query);
    
echo "    </body>\n";
echo "</html>\n";
         /* close the DB connection*/
         mysql_close($dbc);
?>