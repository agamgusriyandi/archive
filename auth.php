# Updated: 2022-04-01
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>