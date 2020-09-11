# Updated: 2020-09-11
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>