# Updated: 2023-03-09
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>