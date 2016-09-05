# Updated: 2016-09-05
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>