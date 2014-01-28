<?php session_start(); 
if(isset($_SESSION['usertype']))
  unset($_SESSION['usertype']);
?>
<html>
 <head>
 </head>
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

        $_SESSION['usertype'];

      /* set up the variables  */
      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username == "")
      {
        die("Please enter your name!</br> <a href=\"login.html\">login</a></br>");

      }

      if($password== "")
      {
        die("Please enter your password!</br> <a href=\"login.html\">login</a></br>");
      }

      $sql="SELECT * FROM User WHERE Username='$username' AND Password='$password'";
      $result=mysql_query($sql);

      // Mysql_num_row is counting table row
      $count=mysql_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count==1)
      {   
           // store session data
           $_SESSION['username']= $username;
           echo "You're ". $_SESSION['userName']. " have logged in successfully</br>";

          $sql="SELECT Username FROM Student WHERE Username='$username'";
          $result=mysql_query($sql);
          // Mysql_num_row is counting table row
          $count=mysql_num_rows($result);
          if($count == 1)
          {
              $usertype = "student";
              $_SESSION['usertype']="student";
             echo "Your type is Student";
             echo "Please enter your name!</br> <a href=\"welcomestudent.html\">Welcome Student</a></br>";
          }
          else 
          {

              $sql="SELECT Username FROM Faculty WHERE Username='$username'";
              $result=mysql_query($sql);
              // Mysql_num_row is counting table row
              $count=mysql_num_rows($result);
              if($count == 1)
              {
                $usertype = "faculty";
                $_SESSION['usertype']="faculty";
                echo "Your type is Faculty";
                echo " <a href=\"welcomefaculty.html\">Welcome Faculty</a></br>";
              }
              else
              {
                  $sql="SELECT Username FROM Administrator WHERE Username='$username'";
                  $result=mysql_query($sql);
                  // Mysql_num_row is counting table row
                  $count=mysql_num_rows($result);
                  if($count == 1)
                  {
                     $usertype = "admin";
                     $_SESSION['usertype']="admin";
                     echo "Your type is Admin";
                     echo "<a href=\"welcomeadmin.html\">Welcome Admin</a></br>";
                  }
                  else
                  {
                      if($usertype == "student")
                      {
                        echo "</br>Please continue.</br><a href=\"personalStudent.html\"> fill up student infomation</a>";
                      }
                      else if($usertype == "faculty")
                      {
                        echo "</br>Please continue.</br><a href=\"personalFaculty.html\">fill up faculty infomation</a>";
                      }
                      
                  }

              }

          }

      } 
      else
      {
         echo "Sorry, wrong username/pasword, you might need to register before login!</br>";
         echo "<a href=\"createuser.html\">Register</a>";
         echo "<a href=\"login.html\">Login</a>";

      }

       echo "information:</br >";
       echo $_SESSION['username']." ";
       echo $_SESSION['usertype'];
         
         /* close the DB connection*/
         mysql_close($dbc); 
     ?>
  </body>
</html>