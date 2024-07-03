# Updated: 2024-07-03
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>