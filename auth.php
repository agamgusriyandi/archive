# Updated: 2025-05-29
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>