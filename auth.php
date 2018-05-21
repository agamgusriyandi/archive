# Updated: 2018-05-21
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>