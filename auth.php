# Updated: 2019-04-11
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>