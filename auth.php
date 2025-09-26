# Updated: 2025-09-26
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>