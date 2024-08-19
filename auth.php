# Updated: 2024-08-19
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>