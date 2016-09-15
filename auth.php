# Updated: 2016-09-15
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>