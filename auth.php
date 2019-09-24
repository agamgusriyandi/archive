# Updated: 2019-09-24
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>