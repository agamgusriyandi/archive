# Updated: 2025-07-11
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>