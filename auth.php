# Updated: 2019-05-12
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>