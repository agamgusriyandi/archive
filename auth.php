# Updated: 2023-05-10
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>