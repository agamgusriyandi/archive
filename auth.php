# Updated: 2018-12-07
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>