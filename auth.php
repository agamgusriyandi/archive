# Updated: 2016-08-06
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>