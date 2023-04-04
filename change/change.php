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
  <h3 >Change </h3>
  </div>
              
              </div>
            <form id="optionsUp" action="change.php" method="post">
               <div class="row" >
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="username">Place</label>
          <div class="form-select">
                  <select class="form-control select1" name="place" id="location" required="">
                  
                  <?php 
                  include("../config.php");                    
                  session_start();

                  $username = $_SESSION['user_username'];
                  $sql1 = "SELECT * FROM places, placedatetime, register WHERE PlaceID=Place AND patientUsername=".$username." AND pdtID=placedatetime.ID ";
                  $sql = "SELECT * FROM places";
                  $result1 = mysqli_query($db,$sql1);
                  $result = mysqli_query($db,$sql);               
                  if (mysqli_num_rows($result1) > 0) {
                    

                  while($row1 = mysqli_fetch_assoc($result1)) {
                  echo "
                  <option value=".$row1['PlaceID'].">".$row1['PlaceName']."</option>
                  ";
                  

                  if (mysqli_num_rows($result) > 0) {
                    

                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['PlaceName'] != $row1['PlaceName']){
                    echo "
                    <option value=".$row['PlaceID'].">".$row['PlaceName']."</option>
                    ";
                    }
                }
            
            }
        }
                  }else {
                  echo "<h3>No place found</h3>";
                  }
                  ?>
                  <option value=""></option>
                  </select>
                </div>
                        </div>
                    
                    <div class="form-group">
                    <label>Month</label>
              <div class="form-select">
                  <select class="form-control select2" name="month" id="month" required="">
                  <?php 
                  include("../config.php");                    
                    
                  $sql1 = "SELECT * FROM months, placedatetime, register WHERE monthID=Month AND patientUsername=".$username." AND pdtID=placedatetime.ID ";  
                  $sql = "SELECT * FROM months ";
                  $result = mysqli_query($db,$sql);
                  $result1 = mysqli_query($db,$sql1);                 
                  if (mysqli_num_rows($result1) > 0) {
                    

                  while($row1 = mysqli_fetch_assoc($result1)) {
                  echo "
                  <option value=".$row1['monthID'].">".$row1['monthName']."</option>
                  ";

                  if (mysqli_num_rows($result) > 0) {
                    

                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['monthName'] != $row1['monthName']){
                    echo "
                    <option value=".$row['monthID'].">".$row['monthName']."</option>
                    ";
                    }
                        
                  }
                }
            }
                  }else {
                  echo "<h3>No month found</h3>";
                  }
                  ?>
                  <option value=""></option>
                  </select>
                </div>
                        </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="userame">vaccineID</label>
          <div class="form-select">
                  <select class="form-control select2" name="vaccineID" id="location" required="">
                  
                  <?php 
                  include("../config.php");                    
                  $username = $_SESSION['user_username'];
                    
                  $sql1 = "SELECT vaccines.ID as VID, vaccines.Name as VName FROM vaccines, placedatetime, register WHERE vaccineID=vaccines.ID AND patientUsername=".$username." AND pdtID=placedatetime.ID ";
                  $sql = "SELECT * FROM vaccines";
                  $result = mysqli_query($db,$sql);
                  $result1 = mysqli_query($db,$sql1);       
                  if (mysqli_num_rows($result1) > 0) {
                    

                  while($row1 = mysqli_fetch_assoc($result1)) {
                  echo "
                  <option value=".$row1['VID'].">".$row1['VName']."</option>
                  ";

                  if (mysqli_num_rows($result) > 0) {
                    

                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['Name'] != $row1['VName']){
                            echo "
                          <option value=".$row['ID'].">".$row['Name']."</option>
                             ";
                        }
                  }
                }
            }

                  }else {
                  echo "<h3>No vaccine found</h3>";
                  }
                  ?>
                  <option value=""></option>
                  </select>
                </div>
                        </div>
                        <div class="form-group">
                        <label for="username">Time</label>
        
                  <?php 
                  include("../config.php");                    
                  $username = $_SESSION['user_username'];
                  $sql1 = "SELECT * FROM placedatetime, register WHERE patientUsername=".$username." AND pdtID=placedatetime.ID ";  
                 
                  $result1 = mysqli_query($db,$sql1);                 
                  if (mysqli_num_rows($result1) > 0) {
                    

                  while($row1 = mysqli_fetch_assoc($result1)) {
                  echo "
                  <input class='form-control select2' type='time' name='time' id='cityname' class='form-control' value=".$row1['Time'].">
                  ";

            }
                  }else {
                  echo "<h3>No time found</h3>";
                  }
                  ?>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Search" />
                        </div>
                    </div>
                </div>
                
            </form>
            <form id="optionsUp2" action="../changeFor.php" method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <div class="form-select">
      <select  class="form-control select3" name="registerInfo" id="location" required="">
      <option value=""></option>
<?php
   
   include '../config.php';

   if(isset($_POST['btnSubmit'])){

    
 
     $place = mysqli_real_escape_string($db, $_POST['place']);
     $vaccineID = mysqli_real_escape_string($db, $_POST['vaccineID']);
     $month = mysqli_real_escape_string($db, $_POST['month']);
     $time = mysqli_real_escape_string($db, $_POST['time']);
 
 
     //echo"<option>yes1 ".$month."</option>";
 
 
 
   
 
     if(empty($vaccineID) AND empty($month) AND empty($time)){ //first
       $sql = "SELECT * FROM placedatetime WHERE Place='$place'";
     }
     else if(empty($place) AND empty($month) AND empty($time)){ //last
       $sql = "SELECT * FROM placedatetime WHERE vaccineID='$vaccineID'";
       
     }
     else if(empty($vaccineID) AND empty($place) AND empty($time)){ //specif
       $sql = "SELECT * FROM placedatetime WHERE Month='$month'";
     }
     else if(empty($vaccineID) AND empty($month) AND empty($place)){ //city
       $sql = "SELECT * FROM placedatetime WHERE Time='$time'";
     }
     else if(empty($month) AND empty($time)){ //first last
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND vaccineID='$vaccineID'";
     }
     else if(empty($month) AND empty($place)){ //city last
       $sql = "SELECT * FROM placedatetime WHERE Time='$time' AND vaccineID='$vaccineID'";
     }
     else if(empty($month) AND empty($vaccineID)){ //city first
       $sql = "SELECT * FROM placedatetime WHERE Time='$time' AND Place='$place'";
     }
     else if(empty($place) AND empty($time)){ //last specif
       $sql = "SELECT * FROM placedatetime WHERE Month='$month' AND vaccineID='$vaccineID'";
     }
     else if(empty($vaccineID) AND empty($time)){ //first specif
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND Month='$month'";
     }
     else if(empty($place) AND empty($vaccineID)){ //specif city
       $sql = "SELECT * FROM placedatetime WHERE Time='$time' AND Month='$month'";
     }
     else if(empty($place)){ //specif city last
       $sql = "SELECT * FROM placedatetime WHERE Time='$time' AND Month='$month' AND vaccineID='$vaccineID'";
     }
     else if(empty($vaccineID)){ //specif city first
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND Month='$month' AND Time='$time'";
     }
     else if(empty($month)){ //first city last
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND Time='$time' AND vaccineID='$vaccineID'";
     }
     else if(empty($time)){ //specif first last
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND Month='$month' AND vaccineID='$vaccineID'";
     }
     else if(empty($vaccineID) AND empty($month) AND empty($city) AND empty($place)){
       //header("Location: ../search.php");
        echo "<script>window.location.href='\change.php'; alert('Please enter an attribute');</script>";
     }
     else
     {
       $sql = "SELECT * FROM placedatetime WHERE Place='$place' AND Month='$month' AND vaccineID='$vaccineID' AND Time='$time'";
     }
 
 
     $result = mysqli_query($db, $sql);
     $resultCheck = mysqli_num_rows($result);
     
     if($resultCheck >0){

      
        while($row = mysqli_fetch_assoc($result)){

          $sql5 = "SELECT * FROM register WHERE pdtID = ".$row['ID']."";
          $result5 = mysqli_query($db, $sql5);
          $resultCheck5 = mysqli_num_rows($result5);

          if($resultCheck5 < 2){
            $sql2 = "SELECT * FROM vaccines WHERE vaccines.ID = ".$row['vaccineID']." ";
                  $result2 = mysqli_query($db,$sql2);
                                    
                  if (mysqli_num_rows($result2) > 0) {
                    

                  while($row2 = mysqli_fetch_assoc($result2)) {

                  $sql3 = "SELECT * FROM places WHERE PlaceID = ".$row['Place']." ";
                  $result3 = mysqli_query($db,$sql3);
                                    
                  if (mysqli_num_rows($result3) > 0) {
                    

                  while($row3 = mysqli_fetch_assoc($result3)) {

                    $sql4 = "SELECT * FROM months WHERE monthID = ".$row['Month']." ";
                    $result4 = mysqli_query($db,$sql4);
                                      
                    if (mysqli_num_rows($result4) > 0) {
                      
  
                    while($row4 = mysqli_fetch_assoc($result4)) {
           echo"
           <option value=".$row['ID'].">".$row2['Name']."  ".$row3['PlaceName']."  ".$row['Day']."/".$row4['monthID']."/".$row['Year']." ".$row['Time']."</option>
         ";
         
        }
      }
    }
    }
  }
}
          }

}
    }else {
        echo" <option>No result</option>";
    }
}

   
?>
    </select>
    </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <input
                    type="submit"
                    value="Submit"
                    class="btnContact"
                    name="submit"
                    id="submit"
                  />
                        </div>
                    </div>
                </div>
            </form>




            




</div>

</body>




    
    




</html>




