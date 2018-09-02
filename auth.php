# Updated: 2018-09-02
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>