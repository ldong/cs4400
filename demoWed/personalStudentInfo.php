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
       echo "$username";
       $name = $_POST['perosnalName'];
       $dob =  $_POST['dob'];
       $gender =  $_POST['gender'];
       $addr =  $_POST['addr'];
       $paddr =  $_POST['paddr'];
       $phonenumber =  $_POST['phonenumber'];
       $email =  $_POST['email'];
       $isTutor =  $_POST['isTutor'];
       $courses =  $_POST['course'];
       echo "$course";
       $department=  $_POST['department_name'];

       $degree0 =  $_POST['degree0'];

       $nameofSchool1=  $_POST['nameofSchool1'];
       $degree1 =  $_POST['degree1'];
       $year1 =  $_POST['year1'];       
       $oldmajor1 = $_POST['oldmajor1'];
       $gpa1 = $_POST['GPA1'];

       $nameofSchool2 =  $_POST['nameofSchool2'];
       $degree2 =  $_POST['degree2'];
       $year2 =  $_POST['year2'];
       $oldmajor2 = $_POST['oldmajor2'];
       $gpa2 = $_POST['GPA2'];

       $nameofSchool3 =  $_POST['nameofSchool3'];
       $degree3 =  $_POST['degree3'];
       $year3 =  $_POST['year3'];
       $oldmajor3 = $_POST['oldmajor3'];
       $gpa3 = $_POST['GPA3'];

         /* insert user */
          $query = "SELECT Username FROM User WHERE Username = '$username'";
          $result = mysql_query($query) or die('INSERT USER Error querying database.');
          $count = mysql_num_rows($result);

         if($count == 0) // if user is not in the databse, insert it
         {

            $query = "INSERT INTO User (Username, Password) "
                   . "VALUES ('$username', '$password')";
            $result = mysql_query($query) or die('INSERT USER Error querying database.');

         }


           // delete it 
            $query =  "DELETE FROM Regular_User WHERE Username = '$username'";
            $result = mysql_query($query) or die('INSERT USER Error querying database.');

            // insert to regular user
            $query = "INSERT INTO Regular_User(Username, Address, Name, Email_Id, DOB,Permanent_Address, Gender, Contact_No)". "VALUES('$username','$addr','name' , '$email', '$dob', '$paddr','$gender','$phonenumber')";
            echo "$query </br>";
            $result= mysql_query($query);


           // delete it 
            $query =  "DELETE FROM Student WHERE Username = '$username'";
            $result = mysql_query($query) or die('INSERT USER Error querying database.');

           // insert student current records
            $query = "INSERT INTO Student(Username, Major, Degree)". "VALUES('$username',
               '$department', '$degree0')";
            echo "$query </br>";
            $result= mysql_query($query);


            // delete
            $query = "DELETE FROM Education_History WHERE Username = '$username'";
            $result= mysql_query($query);

            if(strcmp($nameofSchool1, "") !=0)
            {
             // insert Education History
             $query = "INSERT INTO Education_History(Username, Year_Of_Grad, Name_Of_School, Major, Degree, GPA)". "VALUES('$username',
               '$year1', '$nameofSchool1', '$oldmajor1','$degree1', '$gpa1')";
             echo "$query </br>";
             $result= mysql_query($query);
            }
            //$count = mysql_num_rows($result);
  
            if(strcmp($nameofSchool2, "") !=0)
            {
            // insert Education History
             $query = "INSERT INTO Education_History(Username, Year_Of_Grad, Name_Of_School, Major, Degree, GPA)". "VALUES('$username',
               '$year2', '$nameofSchool2', '$oldmajor2','$degree2', '$gpa2')";
            echo "$query </br>";

            $result= mysql_query($query);
            } 

            if(strcmp($nameofSchool3, "") !=0)
            {
             // insert Education History
             $query = "INSERT INTO Education_History(Username, Year_Of_Grad, Name_Of_School, Major, Degree, GPA)". "VALUES('$username',
               '$year3', '$nameofSchool3', '$oldmajor3','$degree3', '$gpa3')";

             $result= mysql_query($query);

            }

            echo "$isTutor";
            if(strcmp($isTutor,"YES") == 0)
            {

                   // insert to regular user
                   $query = "SELECT Grade FROM Registers WHERE CRN IN (SELECT CRN FROM Section WHERE Title = '$courses') AND Registers.Username = '$username'";

                   $row = mysql_fetch_array($result);
                   $letterGrade = $row[Grade];
                    if((strcmp($letterGrade, "A") == 0) || (strcmp($letterGrade, "B") == 0))
                    {
                       // insert 
                      $query = "INSERT INTO Applied_To_Tutor_For VALUES('$username','$courses')";
                      echo "$query </br>";
                      $result= mysql_query($query);
                      echo "Insert to tutor successfully";
                    }

            } else {
                echo "User didn't apply to be a tutor";
            }


      echo "Thank you! </br>You have successfully updated $username info to database";
      //echo "<button onclick=\"welcomestudent.html\">Homepage<button>\n";
echo "<button onclick=\"window.location.href='welcomestudent.html'\">Homepage</button>\n";
        /* close the DB connection*/
         mysql_close($dbc); 
     ?>
  </body>
</html>
