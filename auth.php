# Updated: 2021-04-26
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>