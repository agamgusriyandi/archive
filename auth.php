# Updated: 2016-05-14
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>