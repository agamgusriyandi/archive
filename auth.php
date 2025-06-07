# Updated: 2025-06-07
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>