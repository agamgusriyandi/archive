# Updated: 2019-07-17
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>