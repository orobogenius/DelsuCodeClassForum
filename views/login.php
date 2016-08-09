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
    <h1>Login to you account</h1>
    <form action="" method="post" id="login-form">
        <label for="uname" class="required">Username: </label>
        <input type="text" name="username" id="uname" /><br />
        <label for="pass" class="required">Password: </label>
        <input type="password" name="password" id="pass"  /><br />
        <button type="submit" role="submit">Login</button>
    </form>
  </div>

  <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $username = $_POST['username'];
      $password = $_POST['password'];

      //Check if user exists
      if (authenticateUser($dbh, $username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../");
      } else {
        echo '<script>
              document.getElementById("errorMsg").innerHTML = "Sorry, your record could not be found in our database - Invalid Username or Password";
              document.getElementById("errorMsg").style.display = "block";
            </script>';
      }

    }

  ?>

  <?php

    include('../layout/footer.php');

  ?>

</div>
</body>
</html>
