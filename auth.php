# Updated: 2020-01-13
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>