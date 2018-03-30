# Updated: 2018-03-30
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>