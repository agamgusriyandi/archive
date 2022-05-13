# Updated: 2022-05-13
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>