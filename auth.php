# Updated: 2019-03-08
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>