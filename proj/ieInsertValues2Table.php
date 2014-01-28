<html>
  <body>
    <?php
        /*
           This php file is created by Group 17
           @ 2012 Fall for cs4400 proj
        */
        echo 'Working';
        /*  set up the variables  */
        $firstName = $_POST['firstNameX'];
        $lastName = $_POST['lastNameX'];
        $age = $_POST['ageX'];
        $gender = $_POST['genderX'];
       
       /*
           connects to the person table via the following syntax
        */ 
      $dbc = mysql_connect('localhost', 'cs4400_Group17', 'Ve5NFbp_')
            or die('Could not connect: ' . mysql_error()); 

        mysql_select_db('cs4400_Group17'); 
        echo 'Connected successfully'; 


      /* create the query */
      $query = "INSERT INTO Person (firstName, lastName, age, gender) "
               . "VALUES ('$firsName', '$lastName', '$age', '$gender')";

      $result = mysqli_query($dbc, $query) or die('Error querying database.');

      /* close the DB connection*/
      mysql_close($dbc); 

      echo 'Thank you!';
     ?>
  </body>
</html>