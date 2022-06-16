# Updated: 2022-06-16
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>