<!DOCTYPE html>
<html lang="en">
<body>

<?php

echo "You are now logged out!";
// Destroy old session.
session_start();
$_SESSION = [];
session_destroy();

?>

</body>
</html>
