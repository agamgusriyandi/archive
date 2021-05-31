# Updated: 2021-05-31
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>