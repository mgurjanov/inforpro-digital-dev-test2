<!DOCTYPE html>
<html lang="en">
<body>

<?php

// @todo We could add some logic to check user table from DB.
function check_login_credentials($username, $password) {
  return $username == 'test' && $password == 'test123';
}

if (check_login_credentials($_POST['username'], $_POST['password'])) {
  if (session_start()) {
    // Regenerate session ID.
    session_regenerate_id(TRUE);
    $_SESSION['sid'] = session_id();
    echo "You are now logged in.";
  }
  else {
    echo "Failed to start session!";
  }

}
?>

</body>
</html>
