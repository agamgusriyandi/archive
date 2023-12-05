# Updated: 2023-12-05
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>