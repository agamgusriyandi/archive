# Updated: 2020-08-24
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>