<?php

  include('../layout/page-head.php');
  include('../layout/header.php');
  include('../utility/connect.php');
  include('../utility/db_functions.php');

  $dbh = connectToDatabase();

?>

<div class="content">

  <?php

    include('../layout/content-header.php');

  ?>
  <div class="registration">
    <div id="errorMsg">

    </div>
    <h1>Create an Account</h1>
    <span>Fields marked with <span style="color: #ff0000;"><strong>(*)</strong></span> are required</span>
    <form action="" method="post" id="reg-form" onsubmit="return validateForm(this);">
        <label for="fname" class="required">First Name: </label>
        <input type="text" name="firstname" id="fname" required /><br />
        <label for="lname" class="required">Last Name: </label>
        <input type="text" name="lastname" id="lname" required /><br />
        <label for="gender" class="required">Gender: </label>
        <select name="gender" id="gender" required>
          <option>Please Select a Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select><br />
        <label for="uname" class="required">Username: </label>
        <input type="text" name="username" id="uname" required /><br />
        <label for="pass" class="required">Enter Password: </label>
        <input type="password" name="password" id="pass" required /><br />
        <label for="conpass" class="required">Confirm Password: </label>
        <input type="password" name="confirmpass" id="conpass" required /><br />
        <label for="email" class="required">Email Address: </label>
        <input type="email" name="email" id="email" required /><br />
        <label for="age">Age: </label>
        <input type="number" name="age" id="age" /><br />
        <button type="submit" role="submit">Register</button>
    </form>
  </div>

  <?php

    $error = array();


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $age = $_POST['age'];

      //Check if username exists
      if (checkIfUserExits($dbh, $username)) {
        $error[] = "The selected username already exists, please try another!";
      }

      if (checkIfEmailExists($dbh, $email)) {
        $error[] = "The selected email address already exists, please try another!";
      }

      //Username and Email has not been taken
      if (!empty($error)) {
        $errMsgs = "Oops! Some errors occured during your registration process, here they are: <br />";
        $errMsgs .= '<ul>';
        foreach($error as $err) {
          $errMsgs .= '<li>' . $err . '</li>';
        }
        $errMsgs .= '</ul>';
        echo '<script>
              document.getElementById("errorMsg").innerHTML = "'.$errMsgs.'";
              document.getElementById("errorMsg").style.display = "block";
            </script>';
      } else {
        if (registerUser($dbh, $firstname, $lastname, $gender, $username, $password, $email, $age)) {
          echo "Registration Successful!";
          header("Location: welcome.php");
        } else {
          echo '<script>
                document.getElementById("errorMsg").innerHTML = "Oops! Something went wrong during the registration process. Registration not Successful!";
                document.getElementById("errorMsg").style.display = "block";
              </script>';
        }
      }
    }


  ?>

  <?php

    include('../layout/footer.php');

  ?>

</div>
</body>
</html>
