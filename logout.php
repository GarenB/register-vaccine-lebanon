<?php
  if (isset($_POST['submitLogout'])){
    session_start();
    session_unset();
    session_destroy();
    //header("Location: ../index.php");
     echo "<script>window.location.href='index/index.php'; alert('You logged out !');</script>";
    exit();
  }

?>
