# Updated: 2025-11-30
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>