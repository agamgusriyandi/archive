# Updated: 2018-07-06
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>