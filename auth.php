# Updated: 2019-12-26
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>