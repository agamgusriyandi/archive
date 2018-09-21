# Updated: 2018-09-21
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>