<?php
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="four">
  <div class="third">
  </div><div class="third">
    <h1>Log in</h1>
    <form method="post" action="index.php" name="loginform" class="login">
      <label for="login_input_username">Username</label><br />
      <input id="login_input_username" class="login_input" type="text" name="user_name" required /><br />
      <label for="login_input_password">Password</label><br />
      <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required /><br />
      <a href="register.php" class="register">Register new account</a>
      <input type="submit" name="login" value="Log in" class="button" />
    </form>
  </div><div class="third">
  </div>
</div>