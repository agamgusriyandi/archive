# Updated: 2022-07-19
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>