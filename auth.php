# Updated: 2024-04-29
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>