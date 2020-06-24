# Updated: 2020-06-24
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>