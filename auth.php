# Updated: 2018-06-05
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>