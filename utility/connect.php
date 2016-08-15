<?php

  function connectToDatabase() {
    $server = "localhost";
    $database = "codeclassforum";
    $user = "root";
    $password = "";

    $dbh = mysqli_connect($server, $user, $password, $database) or die(mysqli_connect_errno());

    if ($dbh) {
      return $dbh;
    }
  }

?>
