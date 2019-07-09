# Updated: 2019-07-09
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>