# Updated: 2022-07-14
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>