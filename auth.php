# Updated: 2017-08-08
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>