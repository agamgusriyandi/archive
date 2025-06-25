# Updated: 2025-06-25
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>