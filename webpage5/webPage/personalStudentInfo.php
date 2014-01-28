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

         /* insert user */
          $query = "INSERT INTO User (Username, Password) "
                   . "VALUES ('$username', '$password')";
          $result = mysql_query($query) or die('INSERT USER Error querying database.');


        // insert to regular user
        $query = "INSERT INTO Regular_User(Username, Address, Name, Email_Id, DOB,Permanent_Address, Gender, Contact_No)". "VALUES('$username','$addr','name' , '$email', '$dob', '$paddr','$gender','$phonenumber')";
        echo "$query </br>";
        $result= mysql_query($query);
      
      // insert student current records
        $query = "INSERT INTO Student(Username, Major, Degree)". "VALUES('$username',
           '$department', '$degree0')";
        echo "$query </br>";

        $result= mysql_query($query);

        // insert Education History
         $query = "INSERT INTO Education_History(Username, Year_Of_Grad, Name_Of_School, Major, Degree, GPA)". "VALUES('$username',
           '$year1', '$nameofSchool1', '$oldmajor1','$degree1', '$GPA1')";
        echo "$query </br>";

        $result= mysql_query($query);
        $count = mysql_num_rows($result);

        if($isTutor=="YES")
        {

         // insert to regular user
         $query = "SELECT Grade FROM Registers WHERE CRN IN (SELECT CRN FROM Section WHERE Title = '$courses') AND Registers.Username = '$username'";

         echo "$query </br>";

        if($query == "A" || $query == "B")
        {
          $query = "INSERT INTO Applied_To_Tutor_For VALUES('$username','$courses')";
          echo "A,B";
        }

         $result= mysql_query($query);

        } else {
          echo "Else";
        }





      echo "Thank you! </br>You have successfully updated $username info to database";
     
        /* close the DB connection*/
         mysql_close($dbc); 
     ?>
  </body>
</html>
