# Updated: 2018-02-26
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>