<?php ob_start(); ?>
<?php include '../meta.php'; ?>
<title>Shenstone Homes | Lettings Adminstration Section</title>
<?php include '../header.php'; ?>
<div class="wrapper" id="admin">
<?php
if(isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="four">
  <div class="third">
  </div><div class="third">
    <h1>Register</h1>
    <form method="post" action="register.php" name="registerform" class="register">
      <label for="login_input_username">Username (only letters and numbers)</label><br />
      <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /><br />
      <label for="login_input_email">User's email</label><br />
      <input id="login_input_email" class="login_input" type="email" name="user_email" required /><br />
      <label for="login_input_password_new">Password (min. 6 characters)</label><br />
      <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br />
      <label for="login_input_password_repeat">Repeat password</label><br />
      <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br />
      <a href="index.php" class="back">Back to Login Page</a>
      <input type="submit"  name="register" value="Register" class="button" />
    </form>
  </div><div class="third">
  </div>
</div>
</div>
<?php include '../footer.php'; ?>
