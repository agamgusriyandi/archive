# Updated: 2021-10-01
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>