# Updated: 2021-07-19
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>