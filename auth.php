# Updated: 2021-08-30
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>