# Updated: 2021-10-06
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>