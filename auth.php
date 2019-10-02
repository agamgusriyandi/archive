# Updated: 2019-10-02
<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['user_id']);
}
?>