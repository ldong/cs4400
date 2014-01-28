<?php session_start(); ?>
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


      /* set up the variables  */
      $userName = $_POST['username'];
      $passWord = $_POST['password'];

      
      if($userName == "")
      {
        die("Please enter your name!</br> <a href=\"login.html\">login</a></br>");

      }

      if($passWord== "")
      {
        die("Please enter your password!</br> <a href=\"login.html\">login</a></br>");
      }

      $sql="SELECT * FROM User WHERE username='$userName' AND password='$passWord'";
      $result=mysql_query($sql);

      // Mysql_num_row is counting table row
      $count=mysql_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count==1)
      {
           // store session data
           $_SESSION['userName']=$userName;
           echo "You're ". $_SESSION['userName']. " have logged in successfully</br>";
      } 
      else
      {
         echo "Sorry, wrong username/pasword, you might need to register before login!</br>";
         echo "<a href=\"createuser.html\">Register</a>";
         echo "<a href=\"login.html\">Login</a>";

      }

         /* close the DB connection*/
         mysql_close($dbc); 
     ?>
  </body>
</html>