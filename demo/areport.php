<?php
       /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully';

echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "  <title>Student Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 

        $query ="
        CREATE VIEW adminr
        as select Code,Title,
        case Registers.Grade
        when 'A' then 4
        when 'B' then 3
        when 'C' then 2
        when 'D' then 1
        when 'F' then 0
        end as Grade from
        CCode NATURAL JOIN Section NATURAL JOIN Registers;SELECT Code,Title,AVG(Grade) AS GPA FROM adminr GROUP BY Title; ";

        $result= mysql_query($query);

        echo "<table border='1'><tr> ";
        echo "<th>Course Code</th> <th>Course Name</th> <th> GPA </th>";
        echo "</tr>";

        $row = mysql_fetch_array($result);
        
                echo "<tr><td>"; 
                echo $row['Code'];
                echo "</td><td>"; 

                echo $row['Title'];
                echo "</td><td>"; 

                echo $row['GPA'];                

         
        echo "</table>";
// drop table
    



echo "    </body>\n"; 
echo "</html>\n";
         /* close the DB connection*/
         mysql_close($dbc); 
?>