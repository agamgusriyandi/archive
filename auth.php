# Updated: 2016-07-07
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>