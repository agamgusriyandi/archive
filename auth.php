# Updated: 2025-03-19
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>