# Updated: 2025-01-28
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>