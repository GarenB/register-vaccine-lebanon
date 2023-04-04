<?php
   include("config.php");
   session_start();

    $username=$_POST['userName'];
    $password=$_POST['Password'];

   
     

     

      $sql = "SELECT Username FROM users WHERE Username = '$username' and Password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {
         session_register("$username");
         $query = "Select * from users where Username = '$username' and Password = '$password'" ;
        $_SESSION["user_username"] = $row['Username'];
        $sql = "SELECT * FROM users WHERE Username = '$username' and Password = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);
        $_SESSION["user_name"] = $row['Name'];
        $_SESSION["user_age"] = $row['Age'];
        $_SESSION["user_location"] = $row['LocationID'];
        $_SESSION["user_email"] = $row['Email'];
        $_SESSION["user_tel"] = $row['Tel'];
        $_SESSION["user_password"] = $row['Password'];

        if($username === "admin"){
            header("location:adminPage/adminPage.php");
        }else{
          header("location:profile/profile.php");
        }
      }else {
         echo "<script>window.location.href='index/index.php';alert('A user with this username and password does not exist !');</script>";
      }
   
?>


