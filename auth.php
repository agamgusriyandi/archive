# Updated: 2024-03-01
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>