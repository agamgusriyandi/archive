# Updated: 2017-09-27
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>