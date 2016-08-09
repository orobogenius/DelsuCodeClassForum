<?php

$header = <<<END
  <body>
    <div class="forum-header">
      <div class="header-left">
        <ul>
          <li>
            <a href="http://localhost/codeclassforum/views/login.php">Login</a>
          </li>
          <li>
            <a href="http://localhost/codeclassforum/views/registration.php">Register</a>
          </li>
        </ul>
      </div>
      <div class="header-right">
        <form action="http://localhost/codeclassforum/views/login.php" method="post">
          <ul>
            <li>
              <label for="username">Username: &nbsp;</label>
              <input type="text" name="username" id="username" required />
            </li>
            <li>
              <label for="password">Password: &nbsp;</label>
              <input type="password" name="password" id="password" required />
            </li>
            <li>
              <input type="submit" value="Login" id="login-btn" />
            </li>
          </ul>
        </form>
      </div>
    </div>
END;

echo $header;

?>
