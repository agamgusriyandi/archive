# Updated: 2023-06-02
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>