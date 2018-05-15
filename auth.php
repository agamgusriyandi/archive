# Updated: 2018-05-15
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>