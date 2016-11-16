# Updated: 2016-11-16
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>