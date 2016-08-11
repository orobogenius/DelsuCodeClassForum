<?php

  function checkIfUserExits($dbh, $username) {
    //Check if the username exists in database
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if (count(mysqli_fetch_array($result)) > 0) {
        return true;
    } else {
      return false;
    }
  }

  function checkIfEmailExists($dbh, $email) {
    $query = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if (count(mysqli_fetch_array($result)) > 0) {
        return true;
    } else {
      return false;
    }
  }

  function registerUser($dbh, $firstname, $lastname, $gender, $username, $password, $email, $age) {
    $date = Date('Y-m-d H:i:s');
    $query = "INSERT INTO users VALUES ('', '$firstname', '$lastname', '$gender', '$age', '$username', '$password', '$email', '1', '$date')";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if ($result) {
      //User registration is successful
      return true;
    } else {
      return false;
    }
  }

  function authenticateUser($dbh, $username, $password) {
    $query = "SELECT * FROM users WHERE user_name = '$username' AND user_pass = '$password'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if (count(mysqli_fetch_array($result)) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function checkIfCatExists($dbh, $name) {
    $query = "SELECT * FROM categories WHERE cat_name = '$name'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if (count(mysqli_fetch_array($result)) > 0) {
      return true;
    } else return false;
  }

  function checkIfThreadExists($dbh, $name, $cat_id) {
    $query = "SELECT * FROM threads WHERE thread_name = '$name' AND cat_id = '$cat_id'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if (count(mysqli_fetch_array($result)) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function addCategory($dbh, $name, $description) {
    $query = "INSERT INTO categories VALUES ('', '$name', '$description')";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if ($result) {
      return true;
    } else return false;
  }

  function getCategories($dbh) {
    $response = array();
    $query = "SELECT * FROM categories";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    while($row = mysqli_fetch_array($result)) {
      $response[] = $row;
    }
    return $response;
  }

  function getUsers($dbh) {
    $response = array();
    $query = "SELECT * FROM users";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    while($row = mysqli_fetch_array($result)) {
      $response[] = $row;
    }
    return $response;
  }

  function getUserLevel($dbh, $username) {
    $userlevel = 0;
    $query = "SELECT user_level FROM users WHERE user_name = '$username'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    while ($row = mysqli_fetch_array($result)) {
        $userlevel = $row['user_level'];
    }
    return $userlevel;
  }

  function getUserID($dbh, $username) {
    $userID = 0;
    $query = "SELECT user_id FROM users WHERE user_name = '$username'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    while ($row = mysqli_fetch_array($result)) {
        $userID = $row['user_id'];
    }
    return $userID;
  }

  function addThread($dbh, $name, $description, $cat_id, $userID) {
    //Y-m-d H:i:s
    //2016-08-08 17:05:10
    $date = Date('Y-m-d H:i:s');
    $query = "INSERT INTO threads VALUES ('', '$name', '$date', '$description', '$cat_id', '$userID')";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    if ($result) {
      return true;
    } else return false;
  }

  function getTopics($dbh, $cat_id) {
    $response = array();
    $query = "SELECT * FROM threads WHERE cat_id = '$cat_id'";
    $result = mysqli_query($dbh, $query) or die(mysqli_connect_errno($dbh));
    while ($row = mysqli_fetch_array($result)) {
      $response[] = $row;
    }
    return $response;
  }

?>
