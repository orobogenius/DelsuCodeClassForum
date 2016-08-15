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
    <?php
      $thread_id = $_GET['t_id'];
      $thread_data = getThreadData($dbh, $thread_id);
      echo '<h1>' . $thread_data[0]["thread_name"] . '</h1>';
      foreach(getPosts($dbh, $thread_id) as $post) {
          $userdata = getUserData($dbh, $post['post_by']);
          echo '<div class="post">';
            echo '<div class="user-data">';
                echo '<img src="../images/avatar.jpg" class="profile-pic">';
              echo '<div class="username">';
                echo 'Username: <a href="../view-profile.php?">'.$userdata[0]['user_name'].'</a><br />';
                if ($userdata[0]['user_level'] <= 1) {
                  echo "Position: Member <br />";
                } else echo "Position: Administrator <br />";
                $numPosts = getNumberOfPosts($dbh, $userdata[0]['user_id']);
                echo 'Posts: '. count($numPosts) . '<br />';
                echo 'Joined: '.$userdata[0]['reg_date'];
              echo '</div>';
            echo '</div>';
            echo '<div class="divider"></div>';
            echo '<div class="user-post">';
              echo '<span class="t_topic">'.$thread_data[0]["thread_name"].'</span><br />';
              echo 'by: '. $userdata[0]['user_name'] . ' - ' . $post['post_date'];
              echo '<p class="main-post">';
              echo '<p>';
                echo $post['post_content'];
              echo '</p>';
            echo '</div>';
          echo '</div>';
      }
    ?>

    <div class="post-reply">
      <h2 style="text-align: left; margin-left: 10px;">Post a Reply</h2>
      <form action="" method="post">
        <textarea class="reply" name="reply"></textarea>
        <input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="username" />
        <input type="hidden" vaue="<?php echo $thread_id;?>" name="thread_id" />
        <button type="submit" role="submit">Post</button>
      </form>
    </div>

  </div>

  <?php

    include('../layout/footer.php');

  ?>

</div>
</body>
</html>

<?php


  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $reply = $_POST['reply'];
      $username = $_POST['username'];
      $userID = getUserID($dbh, $username);
      $thread_id = $_GET['t_id'];

      if (postReply($dbh, $reply, $userID, $thread_id)) {
        echo '<script>
            document.getElementById("errorMsg").innerHTML = "You post has been added successfully!";
            document.getElementById("errorMsg").style.display = "block";
        </script>';
      } else {
        echo '<script>
            document.getElementById("errorMsg").innerHTML = "Oops! An error has occured. Your post could not be added to this thread.";
            document.getElementById("errorMsg").style.display = "block";
        </script>';
      }
  }

?>
