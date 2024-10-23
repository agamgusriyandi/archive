# Updated: 2024-10-23
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>