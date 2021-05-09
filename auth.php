# Updated: 2021-05-09
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>