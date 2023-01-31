# Updated: 2023-01-31
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>