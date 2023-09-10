# Updated: 2023-09-10
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>