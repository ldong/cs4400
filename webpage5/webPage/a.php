<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>This is webpage for cs4400 GROUP 17</title>
</head>
    <body>
    	<p>Create User Page</p>
        <form method="post" action="createuser.php">
		    <label for="userNameLabel">User Name: </label>
	        <input type="text" id="username" name="username" /><br />
            <?php 
                $_SESSION['username'] = $_POST['username'];
            ?>
		    <label for="passwordLabel">Enter Password: </label>
		    <input type="password" id="password" name="password" /> <br />

            <label for="passwordLabel">Re-Enter Password: </label>
            <input type="password" id="password" name="repassword" /> <br />

            User type:
            <select name="mydropdown">
            <option value="Student">Student</option>
            <option value="Faculty">Faculty</option>
            </select>

            <?php 
                $usertype = $_POST['mydropdown'];
                if($usertype =='Student')
                {
                 $nextpage = "personal"."Student".'.html';
                } else {
                 $nextpage = "personal"."Faculty".'.html';
                }

                $_SESSION['usertype'] = $usertype;
              //  echo $nextpage;
              //  echo $usertype;
                
            ?>
        </form>
          </br>
          <FORM METHOD="LINK" ACTION="personalStudent.html">
          <INPUT TYPE="submit" VALUE="Register to be a student">
          </FORM>
          <FORM METHOD="LINK" ACTION="personalFaculty.html">
          <INPUT TYPE="submit" VALUE="Register to be a Faculty">
          </FORM>


    </body>
</html>

