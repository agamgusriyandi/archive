# Updated: 2025-09-16
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>