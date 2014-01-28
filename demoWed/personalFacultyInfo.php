<?php session_start(); ?>
<html>
  <body>
    <?php
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


        /* set up the variables  */
       $username= $_SESSION["username"];
       $password=$_SESSION["password"];

       $name = $_POST['perosnalName'];
       $dob =  $_POST['dob'];
       $gender =  $_POST['gender'];
       $addr =  $_POST['addr'];
       $paddr =  $_POST['paddr'];
       $phonenumber =  $_POST['phonenumber'];
       $email =  $_POST['email'];
       $isTutor =  $_POST['isTutor'];
       $courses = $_POST['course'];
       echo "$course";
       $department=  $_POST['dept'];

      if($department == "Aerospace Engineering"){
        $department =1;
      }
      else if($department == "Biology"){
        $department =2;
      } 
      else if($department == "Biomedical Engineering"){
        $department =3;
      } 
      else if($department == "Computer Science"){
        $department =4;
      } 
      else if($department == "Electrical & Computer Engineering"){
        $department =5;
      } 

       $position =  $_POST['position'];
       $nameofSchool1=  $_POST['course'];
       $degree1 =  $_POST['section'];
       $research =  $_POST['research'];
   
// start 

         /* insert user */
          $query = "SELECT Username FROM User WHERE Username = '$username'";
          $result = mysql_query($query) or die('INSERT USER Error querying database.');
          $count = mysql_num_rows($result);


         if($count == 0)
         {
         /* insert user */
          $query = "INSERT INTO User (Username, Password) "
                   . "VALUES ('$username', '$password')";
          $result = mysql_query($query) or die('Error querying database.');


            // insert to regular user
            $query = "INSERT INTO Regular_User(Username, Address, Name, Email_Id, DOB,Permanent_Address, Gender, Contact_No)". "VALUES('$username','$addr','name' , '$email', '$dob', '$paddr','$gender','$phonenumber')";
            echo "$query </br>";
            $result= mysql_query($query);
          
        }


            // delete
            $query = "DELETE FROM Education_History WHERE Username = '$username'";
            $result= mysql_query($query);
            

        // insert faculty
            $query = "INSERT INTO Faculty(Username, Position, Dept_Id)"
                    . "VALUES('$username','$position','$department')";
            echo "$query </br>";

        //Research Interest
         $query = "INSERT INTO Research_Interests(Username, Interest)". "VALUES('$username', '$research')";
        echo "$query </br>";


      echo "Thank you! </br>You have successfully updated $username info to database";
      echo "<button onclick=\"window.location.href='welcomefaculty.html'\">Homepage</button>\n";
        /* close the DB connection*/
         mysql_close($dbc); 
     ?>
  </body>
</html>
