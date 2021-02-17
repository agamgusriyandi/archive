# Updated: 2021-02-17
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>