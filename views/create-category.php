<?php

  include('../layout/page-head.php');
  include('../layout/header.php');
  include('../utility/connect.php');
  include('../utility/db_functions.php');

  session_start();

  $dbh = connectToDatabase();

  if (isset($_SESSION['username'])) {
    if (getUserLevel($dbh, $_SESSION['username']) != 2) {
        //User is not an administrator, redirect user to homepage
        header('Location: ../.');
    }
  } else {
    header('Location: ../.');
  }

?>

<div class="content">

  <?php

    include('../layout/content-header.php');

  ?>
  <div class="registration">
    <div id="errorMsg">

    </div>
    <h1>Create a Category</h1>
    <form action="" method="post" id="reg-form">
        <label for="name">Title: </label>
        <input type="text" name="cat_name" id="name" /><br />
        <label for="desc">Description: </label>
        <textarea cols="48" rows="15" name="desc" id="desc"></textarea><br />
        <button type="submit" role="submit">Create</button>
    </form>
  </div>

  <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cat_name'])) {
      $name = $_POST['cat_name'];
      $description = $_POST['desc'];

      if (checkIfCatExists($dbh, $name)) {
        echo '<script>
            document.getElementById("errorMsg").innerHTML = "Oops! An error has occured. The specified category already exists in the forum";
            document.getElementById("errorMsg").style.display = "block";
        </script>';
      } else {
        if (addCategory($dbh, $name, $description)) {
          echo '<script>
              document.getElementById("errorMsg").innerHTML = "Operation Successful! The category has been added to the platform successfully.";
              document.getElementById("errorMsg").style.display = "block";
          </script>';
        } else {
          echo '<script>
              document.getElementById("errorMsg").innerHTML = "Oops! An error has occured. The specified category has not been added to the platform.";
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
