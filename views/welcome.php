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

    <p class="infoText">
      Congratulations, your registration was successful, you can now use the forum. <br />To login please click on <a href="login.php">Login</a> to logon to
      the forum.
    </p>

  </div>

  <?php

    include('../layout/footer.php');

  ?>

</div>
</body>
</html>
