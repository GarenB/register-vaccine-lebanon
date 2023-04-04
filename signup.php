<?php
  include("config.php");
  extract( $_POST );

     $Name=$_POST['name'];
     $Age=$_POST['age'];
     $Tel=$_POST['tel'];
     $location=$_POST['location'];
     $Email=$_POST['email'];
     $Username=$_POST['username'];
     $Password=$_POST['password'];
     $Password2=$_POST['password2'];

     $sql = "SELECT * FROM users WHERE Username='$Username'";
         $result = mysqli_query($db, $sql);
         $resultCheck = mysqli_num_rows($result);

         if($resultCheck > 0){
              echo "<script>window.location.href='index/index.php';alert('A patient with this username already exists !');</script>";
              //exit("An application with this ID already exists !");
              //die( "An application with this ID already exists !" );
              
              //die( mysql_error());
         }else if($Password !== $Password2){
            echo "<script>window.location.href='index/index.php';alert('Please confirm with the same password !');</script>";
            //exit("An application with this ID already exists !");
            //die( "An application with this ID already exists !" );
            
            //die( mysql_error());
       }else if($Age < 16){
         echo "<script>window.location.href='index/index.php';alert('You must be 16 or older to take the vaccine !');</script>";
         //exit("An application with this ID already exists !");
         //die( "An application with this ID already exists !" );
         
         //die( mysql_error());
    }
         else{
            $sql = "SELECT * FROM users";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);
            $query = "INSERT INTO users (Name, Age, LocationID, Email, UserName, Password, Tel)". " VALUES(' $Name' ,' $Age' ,'$location' ,'$Email' ,'$Username' ,'$Password','$Tel')" ;

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
header("location:index/index.php");
}
      ?>

         
     

     