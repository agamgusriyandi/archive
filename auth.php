# Updated: 2016-02-23
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>