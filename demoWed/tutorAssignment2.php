<?php
session_start();
$username = $_SESSION['username'];
echo "<head>"; 
echo "  <title>Assignment Completed</title>"; 
echo "</head>"; 
echo "    <body>"; 
echo "      <p> Assignment Completed</p>"; 
echo "          <label for=\"term\">Dear Prof.$username, You Have Assignmed as following: </label>  </br>";

$rowTutor = $_SESSION['rowTutor']; 
$count= $_SESSION['count']; 

 var_dump($rowTutor);
// echo "$count</br>";
$checkbox = array();
for ($i=0; $i<$count; $i++)
{
    $checkboxname = "checkBoxOption".$i;
    // echo "$dropdownnam </br>";
    
    // echo $getValue;
    $checkbox[] = $_POST["$checkboxname"];
    // echo $dropdown[$i];
}
echo"</br>";
var_dump($checkbox);
echo"</br>";

        $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
              or die('Could not connect: ' . mysql_error()); 

         mysql_select_db('cs4400_Group17'); 
         //echo 'Connected successfully'; 

        for ($i=0; $i<$count; $i++)
        {

            if($checkbox[$i] =='Y')
            {
                $tutor = $rowTutor[$i];

                 $query = "SELECT Username,Title FROM Applied_To_Tutor_For natural join Regular_User where Regular_User.Name = '$tutor'";
                 echo "$query";
                //$query = "INSERT INTO Tutors_For VALUES ($username, $title)";
                 $result= mysql_query($query);

                 while($col2 = mysql_fetch_array($result)) 
                 {
                    $tutorUsername = $col2['Username'];
                    $title = $col2['Title'];
                    echo "$tutorUsername $title ";

                    $query = "INSERT INTO Tutors_For VALUES ($tutorUsername, $title)";
                    echo "$query";
                    $result= mysql_query($query);

                    $query = "INSERT INTO Tutor VALUES ($tutorUsername)";
                    echo "$query";
                    $result= mysql_query($query);


                    $query = "delete from Applied_To_Tutor_For where Username = '$tutorUsername'";
                    echo "$query";
                    $result= mysql_query($query);

                    echo "Added successfully!";
                 }
            }
        }
echo "            <input type=\"submit\" value=\"Click me to submit\" name=\"submit\"/>"; 
echo "    </body>"; 
echo "</html>";
          /* close the DB connection*/
         mysql_close($dbc); 
?>