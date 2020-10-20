# Updated: 2020-10-20
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>