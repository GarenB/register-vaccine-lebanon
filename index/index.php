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
<link href="index.css" rel="stylesheet">
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
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a href="#" id="navbar-text-color" class="navbar-brand">Register<b>Vaccine</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav">
			<a href="../index/index.php" id="navbar-text-color" class="nav-item nav-link">Home</a>	
      <?php
        include("../config.php");
        session_start();


 if (isset($_SESSION['user_username'])){
   echo"  
   <a href='../profile/profile.php' id='navbar-text-color' class='nav-item nav-link'>Profile</a>	
      
   ";
 }
?>	
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
</body>

<!--Carousel-->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img class="me2" src="../images/pic8.jpg" alt="...">
    <div class="container">
    <div class="carousel-caption ">
        <h1 id="me">Register easily to take the vaccine</h1>
        <form class="SeparateButtonOfCarousel" method="post" action='login.php'>
				  <button  class="btn btn-outline-light btn-lg">Login</button>
			  </form>
    </div>
    
    
  </div>
</div>
    <div class="carousel-item">
      <img class="me2"  src="../images/pic9.jpg" alt="Second slide">
      <div class="container">
    <div class="carousel-caption ">
      
        <h1 id="me">Choose when and where to take the vaccine</h1>
        <form class="SeparateButtonOfCarousel" method="post" action='login.php'>
				  <button  class="btn btn-outline-light btn-lg">Login</button>
			  </form>
    </div>
    
    
  </div>
    </div>
    <div class="carousel-item">
      <img src="../images/virus.jpg" alt="Third slide">
      <div class="container">
    <div class="carousel-caption ">
      
        <h1 id="me">Read information about each vaccine</h1>
        <form class="SeparateButtonOfCarousel" method="post" action='login.php'>
				  <button  class="btn btn-outline-light btn-lg">Login</button>
			  </form>
    </div>
    
    
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="Container">
  <div class="description-container">
    <div class="description-title">
      <h1>What is VaccineLebanon.com ?</h1>
    </div>
    <div class="description-text">
    <h3>VaccineLebanon.com is a website where people from Lebanon register themselves to take the Corona virus vaccine.</h3>
    <h3>If after filling a medical report a person is eligible, that person can choose from a list of places, dates and times, when he/she wants to take the vaccine.</h3>
    <h3>The website also provides information about each kind of vaccine</h3>
    </div>

  </div>
  <div class="parallax-window" data-parallax="scroll" data-z-index="99"  data-image-src="../images/pic4.jpg"></div>

  <!--Cards-->
  <div class="body2">
  <h2 class="card-title">Click on a vaccine to find details</h2>
    <div class="main2Container">
      <a href="../pfizer/pfizer.php">
      <div class="main2Card">
        <img
          src="../images/pfizer.png"
          alt="Avatar"
          class="homephoto"
        />
        <div class="main2Link">
        
        </div>
      </div>
      </a>
      <a href="../astrazeneca/astrazeneca.php">
      <div class="main2Card">
      <img
          src="../images/astrazeneca.png"
          alt="Avatar"
        />
        <div class="main2Link">
          
        </div>
      </div>
      </a>
      <a href="../moderna/moderna.php">
      <div class="main2Card">
        <img
          src="../images/moderna.jpg"
          alt="Avatar"
        />
        <div class="main2Link">
          
        </div>
      </div>
      </a>
      <a href="../sputnik/sputnik.php">
      <div class="main2Card">
      <img
          src="../images/sputnik.jpg"
          alt="Avatar"
        />
        <div class="main2Link">
          
        </div>
      </div>
      </a>
    </div>
</div>
  <div class="parallax-window" data-parallax="scroll" data-z-index="99"  data-image-src="../images/pic1.jpg"></div>
  <p></p>
  

</div>
</html>




