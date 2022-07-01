# Updated: 2022-07-01
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>