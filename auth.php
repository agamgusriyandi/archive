# Updated: 2017-03-29
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>