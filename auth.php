# Updated: 2017-12-04
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>