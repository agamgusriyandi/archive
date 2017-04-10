# Updated: 2017-04-10
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>