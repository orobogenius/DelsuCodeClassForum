<?php

session_start();

echo '<body>';
  echo '<div class="forum-header">';
  if (!isset($_SESSION['username'])) {
    //User is not logged in
    echo '<div class="header-left">';
    echo '<ul>';
      echo '<li>';
        echo '<a href="http://localhost/codeclassforum/views/login.php">Login</a>';
      echo '</li>';
      echo '<li>';
          echo '<a href="http://localhost/codeclassforum/views/registration.php">Register</a>';
      echo '</li>';
    echo '</ul>';
    echo '</div>';
  }
    echo '<div class="header-right">';
  if (isset($_SESSION['username'])) {
    //User is loggged in
    echo '<ul>';
      echo '<li>';
        echo '<img src="http://localhost/codeclassforum/images/profile.png" /> &nbsp; | ';
      echo '</li>';
      echo '<li>';
        echo 'Welcome, '.$_SESSION['username'] . ' | ';
      echo '</li>';
      echo '<li>';
        echo '<a href="http://localhost/codeclassforum/logout.php">Sign Out</a>';
      echo '</li>';
    echo '</ul>';
  } else {
    //User is not logged in, show login form
    echo '<form action="http://localhost/codeclassforum/views/login.php" method="post">';
      echo '<ul>';
        echo '<li>';
          echo '<label for="username">Username: &nbsp;</label>';
          echo '<input type="text" name="username" id="username" required />';
        echo '</li>';
        echo '<li>';
          echo '<label for="password">Password: &nbsp;</label>';
          echo '<input type="password" name="password" id="password" required />';
        echo '</li>';
        echo '<li>';
          echo '<input type="submit" value="Login" id="login-btn" />';
        echo '</li>';
      echo '</ul>';
    echo '</form>';
  }
  echo '</div>';
echo '</div>';

?>
