# Updated: 2021-09-07
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>