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
    <div class="search-user">
      <h4>User Search</h4>
      <hr />
      <fieldset>
        <legend>Find User</legend>
        <form method="get" action="">
          <input type="search" placeholder="Enter a Username" />
          <button type="submit" style="width: 100px; height: 30px; font-size: 14px;">Search</button><br />
          Enter a username in the field above to search for a specific user in this list.
        </form>
      </fieldset>
    </div>
    <div class="user-list">
      <h4>User List</h4>
      <hr />
      <table>
        <thead>
          <th>Username</th>
          <th>Title</th>
          <th>Posts</th>
          <th>Registration Date</th>
        </thead>
        <tbody>
          <?php

            $users = getUsers($dbh);
            foreach($users as $user) {
              echo '<tr>';
                echo '<td class="username"><a href="view-user.php?u_id='.$user['user_id'].'">'.$user['user_name'].'</a></td>';
                if ($user['user_level'] == 2) {
                  echo '<td>Administrator</td>';
                } else {
                  echo '<td>Member</td>';
                }
                echo '<td>'.count(getNumberOfPosts($dbh, $user['user_id'])).' Posts</td>';
                echo '<td>'.$user['reg_date'].'</td>';
              echo '</tr>';
            }

          ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php

    include('../layout/footer.php');

  ?>

</div>
</body>
</html>
