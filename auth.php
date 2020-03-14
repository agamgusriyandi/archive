# Updated: 2020-03-14
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>