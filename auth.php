# Updated: 2017-02-12
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>