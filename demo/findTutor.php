<?php
       /*
             connects to the person table via the following syntax
        */ 
        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully';

         $ccode = $_POST["ccode"];
         $keyword = $_POST["key"]; 

echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n"; 
echo "<head>\n"; 
echo "	<title>Student Personal Infomation form</title>\n"; 
echo "</head>\n"; 
echo "    <body>\n"; 
echo "     <form method=\"post\" action=\"findTutor.php\">    \n"; 
echo "	 <label for=\"ccode\">Course Code: </label>\n"; 
echo "	  <input type=\"text\" id=\"ccode\" name=\"ccode\" />\n"; 
echo "\n"; 
echo "	 <label for=\"key\"> Or  Key Word: </label>\n"; 
echo "	  <input type=\"text\" id=\"key\" name=\"key\" />\n"; 
echo "\n"; 
echo "       <input type=\"submit\" value=\"Search\" name=\"submit\"/>\n"; 
echo "\n"; 
echo "</form>\n"; 

        $coursekeyword = '%'. $keyword.'%';

        $query ="SELECT Code,Title,Name,Email_Id FROM Regular_User NATURAL JOIN Tutors_For NATURAL JOIN CCode WHERE "
               . "CCode".'.'."Title LIKE '$coursekeyword' OR CCode.Code LIKE '$coursekeyword'";

        $result= mysql_query($query);


        echo "<table border='1'><tr> ";
        echo "<th>Course Code</th> <th>Course Name</th> <th>Tutor Name</th> <th>Tutor Email</th>";
        echo "</tr>";

        while($row = mysql_fetch_array($result))
        {
                echo "<tr><td>"; 
                echo $row['Code'];
                echo "</td><td>"; 

                echo $row['Title'];
                echo "</td><td>"; 

                echo $row['Name'];
                echo "</td><td>";
                

                echo $row['Email_Id'];
        }
        
        echo "</table>";
echo "    </body>\n"; 
echo "</html>\n";
         /* close the DB connection*/
         mysql_close($dbc); 
?>