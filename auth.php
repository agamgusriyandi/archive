# Updated: 2023-02-20
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>