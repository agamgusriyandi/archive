# Updated: 2016-12-01
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>