<?php
  include("config.php");
  session_start();
  extract( $_POST );

     $pdtID=$_POST['registerInfo'];
    $username = $_SESSION['user_username'];

     $sql = "SELECT * FROM register WHERE patientUsername=".$_SESSION['user_username']."";
         $result = mysqli_query($db, $sql);
         $resultCheck = mysqli_num_rows($result);

         if($resultCheck > 0){
              echo "<script>window.location.href='profile/profile.php';alert('You are already registered !');</script>";
              //exit("An application with this ID already exists !");
              //die( "An application with this ID already exists !" );
              
              //die( mysql_error());
         }
         else{
            $sql = "SELECT * FROM register";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);
            $query = "INSERT INTO register (patientUsername, pdtID)". " VALUES( $username , $pdtID)" ;

         // Connect to MySQL
         if ( !( $database = mysql_connect( "localhost","root", "" ) ) )
            die( "Could not connect to database </body></html>" );

         // open Products database
         if ( !mysql_select_db( "covid_vaccination", $database ) )
            die( "Could not open covid_vaccination database </body></html>" );


        if ( !( $result = mysql_query( $query, $database ) ) )
         {
            die( mysql_error());
        }
header("location:profile/profile.php");
}
      ?>

         
     

     