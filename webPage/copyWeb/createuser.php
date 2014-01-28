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
        $userName = $_POST['username'];
        $passWord = $_POST['password'];

      
      if($userName == "")
      {
        die("Please enter your name!</br>" );
      }
      else if($passWord== "")
      {
        die("</br>Please enter a password!</br>");
      }
      else
      {
        $query = "SELECT Username FROM User WHERE Username='$userName'";
        $result= mysql_query($query);
        $count = mysql_num_rows($result);
       
        if($count==1)
        {
           echo "Sorry, $userName already exists!</br>";
           echo "<a href=\"createuser.html\">Register</a>";
        }
        else if(strlen($userName) > 16 || strlen($pasWord) > 16 )
        {
           echo 'Username/Password is too long, please try it again</br>';
           echo "<a href=\"createuser.html\">Register</a>";
           
        }
        else if(strlen($userName)>0 && strlen($passWord) >0)
        {
          /* create the query */
          $query = "INSERT INTO User (Username, Password) "
                   . "VALUES ('$userName', '$passWord')";
          $result = mysql_query($query) or die('Error querying database.');
          echo "Thank you! You have successfully registered $userName";
        }
          /* close the DB connection*/
          mysql_close($dbc); 
      }
     ?>
  </body>
</html>