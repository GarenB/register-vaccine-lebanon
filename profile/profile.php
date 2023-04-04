<?php
   include("../config.php");
   session_start();


    

    
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Navbar Dropdown Login and Signup Form with Social Buttons</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../index/index.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../parallax.min.js"></script>



<script>
// Prevent dropdown menu from closing when click inside the form
$(document).on("click", ".action-buttons .dropdown-menu", function(e){
	e.stopPropagation();
});
</script>
</head> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a href="#" id="navbar-text-color" class="navbar-brand">Register<b>Vaccine</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
			<a href="../index/index.php" id="navbar-text-color" class="nav-item nav-link">Home</a>	
      <a href="../statistics/statistics.php" id="navbar-text-color" class="nav-item nav-link">Statistics</a>	
			<a href="../test/test.php" id="navbar-text-color" class="nav-item nav-link">Test</a>		
			
		</div>
		<div class="navbar-nav ml-auto action-buttons">
    <div class="nav-item dropdown">
      <?php
        include("../config.php");
        session_start();


 if (!isset($_SESSION['user_username'])){
   echo"  
   <a href='#' id='navbar-text-color' data-toggle='dropdown' class='nav-link dropdown-toggle mr-4'>Login</a>
      
   ";
 }
?>
                <div class="dropdown-menu action-form">
					<form action="../login.php" method="post">
						<p class="hint-text">Enter username and password</p>
						<div class="form-group">
            <label class="sr-only" for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" id="exampleLoginUsername" name="userName" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" id="exampleLoginPassword" name="Password" placeholder="Password" required>
              </div>                                 
						<input type="submit" id="navbar-button-colo" class="btn btn-primary btn-block" value="Login">
						<div class="text-center mt-2">
							<a href="#">Forgot Your password?</a>
						</div>
					</form>
                </div>
			</div>
      <div class="nav-item dropdown">
      <?php
        include("../config.php");
        session_start();


 if (isset($_SESSION['user_username'])){
   echo"  
   <form  method='post' action='../logout.php'>
      <button id='signupbtn' class='btn btn-primary sign-up-btn' type='submit' name='submitLogout'>Logout</button>
    </form>
      
   ";
 }else {
   echo "
   <a href='#' data-toggle='dropdown' id='signupbtn' class='btn btn-primary dropdown-toggle sign-up-btn'>Sign up</a>
   ";
 }
?>
                <div class="dropdown-menu action-form">
					<form action="../signup.php" method="post">
						<p class="hint-text">Fill in this form to create your account!</p>
						<div class="form-group">
            <label class="sr-only" for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputAge">Age</label>
                <input type="number" class="form-control" id="exampleInputAge" name="age" placeholder="Age" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputAge">Telephone</label>
                <input type="number" class="form-control" id="exampleInputTel" name="tel" placeholder="Telephone" required>
              </div>
              <div class="form-group">
                <b><label for="location">Location :</label></b>
                <div class="form-select">
                  <select name="location" id="location" required="">
                  <option value=""></option>
                  <?php 
                  include("../config.php");                    
                    
                    
                  $sql = "SELECT * FROM locations ";
                  $result = mysqli_query($db,$sql);
                                    
                  if (mysqli_num_rows($result) > 0) {
                    

                  while($row = mysqli_fetch_assoc($result)) {
                  echo "
                  <option value=".$row['locationID'].">".$row['locationName']."</option>
                  ";
                  }

                  }else {
                  echo "<h3>No locations found</h3>";
                  }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Email address" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputUsername">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label class="sr-only" for="exampleInputConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputConfirmPassword" name="password2" placeholder="Confirm Password" required>
              </div>
						<div class="form-group">
							<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms &amp; Conditions</a></label>
						</div>
						<input type="submit" id="navbar-button-color" class="btn btn-primary btn-block" value="Sign up">
					</form>
				</div>
			</div>
        </div>
	</div>
</nav>
<body>
  


<div class="container contact-form">
<div class="back-pic">
  <div class="admin">
  <h3  class="profile-left" >Profile</h3>
<img class="description-pic" src="../images/iconProfile.png" alt="">
<h4 class="description-name"><?php echo $_SESSION["user_username"] ?></h4>
  </div>
</div>
            
            
<div class="profile-date">
<h3 id="color-black" class="profile-date-title">Appointment:</h3>
<h3 id="color-black" class="profile-date-left">
<?php 
  include("../config.php");                    
                    
  $sql = "SELECT * FROM register, placedatetime WHERE patientUsername =".$_SESSION['user_username']." AND pdtID = ID";
  $result = mysqli_query($db,$sql);
                                    
  if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {


                $sql2 = "SELECT * FROM vaccines WHERE vaccines.ID = ".$row['vaccineID']." ";
                $result2 = mysqli_query($db,$sql2);
                                    
                  if (mysqli_num_rows($result2) > 0) {
                    

                  while($row2 = mysqli_fetch_assoc($result2)) {

                  $sql3 = "SELECT * FROM places WHERE PlaceID = ".$row['Place']." ";
                  $result3 = mysqli_query($db,$sql3);
                                    
                  if (mysqli_num_rows($result3) > 0) {
                    

                  while($row3 = mysqli_fetch_assoc($result3)) {


  echo "
  Vaccine: ".$row2['Name']."  <br>  Place: ".$row3['PlaceName']."  <br>  
  On: ".$row['Day']."/".$row['Month']."/".$row['Year']." <br> At: ".$row['Time']."  
  </div>
  
  ";

  

  $sql88 = "SELECT * FROM vaccinetaken WHERE Username=".$_SESSION['user_username']."";

  $result88 = mysqli_query($db, $sql88);
  $resultCheck88 = mysqli_num_rows($result88);
  
  if($resultCheck88 >0){
    echo"
    <a  href='../change/change.php' class='btn btn-warning profile-buttons'>Vaccine Taken</a>
    ";
  }else{
    echo"
    <a  href='../change/change.php' class='btn btn-warning profile-buttons'>Change</a>
<a  href='../cancel.php' class='btn btn-danger profile-buttons'>Cancel</a>
    ";
  }

  }
}
                  }
                }
              }
    }else {
         echo "<a id='registerButton' href='../report/report.php' class='btn btn-success profile-buttons'>Register</a>";
    }
                    ?>
                    </h3>





            




</div>

</body>




    
    




</html>




