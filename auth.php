# Updated: 2019-02-07
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>