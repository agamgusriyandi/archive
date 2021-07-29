# Updated: 2021-07-29
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>