# Updated: 2024-05-20
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>