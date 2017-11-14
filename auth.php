# Updated: 2017-11-14
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>