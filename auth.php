# Updated: 2019-08-23
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>