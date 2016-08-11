<?php

  echo '<div class="content-header-01">';
    echo '<h1 id="brand">Delsu CodeClass Forum &trade;</h1>';
  echo '</div>';
  echo '<div class="content-header-02">';
    echo '<ul>';
      echo '<li>';
        echo '<a href="http://localhost/codeclassforum/">Home</a>';
      echo '</li>';
      echo '<li>';
        echo '<a href="http://localhost/codeclassforum/views/view-members.php">Members</a>';
      echo '</li>';
      if (isset($_SESSION['username'])) {
        if (getUserLevel($dbh, $_SESSION['username']) == 2) {
            //User is an administrator
            echo '<li>';
              echo '<a href="http://localhost/codeclassforum/views/create-category.php">Create Category</a>';
            echo '</li>';
        }
        echo '<li>';
          echo '<a href="http://localhost/codeclassforum/views/create-topic.php">Create Topic</a>';
        echo '</li>';
      }
      echo '</ul>';
    echo '</div>';
    echo '<div class="content-header-03">';
      echo '<h4>Message Board</h4>';
    echo '</div>';

?>
