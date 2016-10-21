# Updated: 2016-10-21
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>