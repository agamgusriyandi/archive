# Updated: 2019-06-18
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>