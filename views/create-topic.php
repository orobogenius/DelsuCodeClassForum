<?php

  include('../layout/page-head.php');
  include('../layout/header.php');
  include('../utility/connect.php');
  include('../utility/db_functions.php');

  $dbh = connectToDatabase();

  if (isset($_SESSION['username'])) {
    if (getUserLevel($dbh, $_SESSION['username']) < 1) {
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
    <h1>Create a Topic</h1>
    <p>
      To Create a Topic you must select a category
    </p>
    <form action="" method="post" id="reg-form" onsubmit="validateForm(this)">
        <label for="name">Title: </label>
        <input type="text" name="thread_name" id="name" /><br />
        <label for="desc">Description: </label>
        <textarea cols="48" rows="15" name="desc" id="desc"></textarea><br />
        <label for="op">Post: </label>
        <textarea cols="48" rows="15" name="original_post" id="op"></textarea><br />
        <label for="cat">Category: </label>
        <select name="category" id="cat">
          <?php

            $categories = getCategories($dbh);
            foreach($categories as $category) {
              echo '<option value="'.$category['cat_id'].'">';
                echo $category['cat_name'];
              echo '</option>';
            }

          ?>
        </select><br />
        <button type="submit" role="submit">Create</button>
    </form>
  </div>

  <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $name = $_POST['thread_name'];
      $description = $_POST['desc'];
      $post = $_POST['original_post'];
      $cat_id = $_POST['category'];

      if (checkIfThreadExists($dbh, $name, $cat_id)) {
        echo '<script>
            document.getElementById("errorMsg").innerHTML = "Oops! An error has occured. The specified thread already exists in the specified category!";
            document.getElementById("errorMsg").style.display = "block";
        </script>';
      } else {
        if (addThread($dbh, $name, $description, $post, $cat_id, getUserID($dbh, $_SESSION['username']))) {
          echo '<script>
              document.getElementById("errorMsg").innerHTML = "Operation Successful! The thread has been added to the category successfully.";
              document.getElementById("errorMsg").style.display = "block";
          </script>';
        } else {
          echo '<script>
              document.getElementById("errorMsg").innerHTML = "Oops! An error has occured. The specified thread has not been added to the platform.";
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
