# Updated: 2022-11-29
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>