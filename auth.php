# Updated: 2022-05-06
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>