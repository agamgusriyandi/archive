# Updated: 2018-06-17
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>