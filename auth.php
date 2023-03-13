# Updated: 2023-03-13
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>