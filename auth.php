# Updated: 2020-05-20
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>