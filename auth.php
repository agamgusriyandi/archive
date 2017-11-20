# Updated: 2017-11-20
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>