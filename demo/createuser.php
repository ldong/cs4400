<?php session_start(); 
if(isset($_SESSION['usertype']))
  unset($_SESSION['usertype']);
?>
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $userType = $_POST['mydropdown'];
      
      /* conditions */ 
      if($username == "")
      {
        die("Please enter your name!</br> <a href=\"createuser.html\">Register</a>");
      }
      else if($password== "")
      {
        die("</br>Please enter a password!</br> <a href=\"createuser.html\">Register</a>");
      }
      else if($password != $repassword)
      {
         die("</br>Please double check your password, they dont match!</br><a href=\"createuser.html\">Register</a>");
      }
      else
      {
        $query = "SELECT Username FROM User WHERE Username='$username'";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
      
        if($count==1)
        {
           echo "Sorry, $username already exists!</br>";
           echo "<a href=\"createuser.html\">Register</a>";
        }
        else if(strlen($username) > 16 || strlen($password) > 16 )
        {
           echo 'Username/Password is too long, please try it again</br>';
           echo "<a href=\"createuser.html\">Register</a>";
           
        }
        else if(strlen($username)>0 && strlen($password) >0)
        {

           /*
             display two type of user types after register
           */
          if($userType == "Student")
          {
            echo "</br>Please continue.</br><a href=\"personalStudentphp.php\"> fill up student infomation</a>";
          }
          else
          {
            echo "</br>Please continue.</br><a href=\"personalFaculty.php\">fill up faculty infomation</a>";
          }

            echo "</br> Session: ";
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["usertype"] = $userType;
             
            echo $_SESSION["username"];
            echo $_SESSION["password"];
            echo $_SESSION["usertype"];

        }
          /* close the DB connection*/
          mysql_close($dbc); 

       }
     ?>
  </body>
</html>
