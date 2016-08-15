<?php

  include('layout/page-head.php');
  include('layout/header.php');
  include('utility/connect.php');
  include('utility/db_functions.php');

  $dbh = connectToDatabase();

?>

<div class="content">

  <?php

    include('layout/content-header.php');

  ?>

  <?php

    $categories = getCategories($dbh);
    foreach($categories as $category) {
      echo '<div class="category">';
        echo '<div class="category-header">';
            echo '<h2>'.$category['cat_name'].'</h2>';
        echo '</div>';
        echo '<div class="category-content">';
            echo '<table class="content-table">';
              echo '<thead>';
                echo '<th></th><th></th><th></th>';
              echo '</thead>';
              echo '<tbody>';
                $topics = getTopics($dbh, $category['cat_id']);
                foreach($topics as $topic) {
                  echo '<tr>';
                      echo '<td class="topic-name"><a href="views/view_thread.php?t_id='.$topic['thread_id'].'">'.$topic['thread_name'].'</a><br />'.$topic['thread_desc'].'</td>';
                      echo '<td class="topic-posts">';
                        echo '<p>
                              '.count(getPosts($dbh, $topic['thread_id'])).' <br />Posts
                              </p>';
                      echo '</td>';
                      $postdata = getLastPost($dbh, $topic['thread_id']);
                      $userdata = getUserData($dbh, $postdata[0]['post_by']);
                      echo '<td class="post-by">Last posted by: <a href="view/view_members.php/?u_id='.$userdata[0]['user_id'].'"> '.$userdata[0]['user_name'].'</a><span>&nbsp;&nbsp;</span><a href="views/view_thread.php?t_id='.$topic['thread_id'].'#5">V</a><br />'.$postdata[0]['post_date'].'</td>';
                  echo '</tr>';
                }
              echo '</tbody>';
            echo '</table>';
        echo '</div>';
      echo '</div>';
    }

  ?>

  <?php

    include('layout/footer.php');

  ?>

</div>
</body>
</html>
