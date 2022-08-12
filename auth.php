# Updated: 2022-08-12
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>