# Updated: 2016-10-12
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>