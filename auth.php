# Updated: 2025-08-15
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>