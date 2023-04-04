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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script> 



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
  


<div id ="contact-form2" class="container contact-form">
<div class="back-pic">
  <div class="admin">
  <h3  class="profile-left" >Pfizer</h3>
  </div>
</div>
            
          


<div class="back-pic2">
<div>
 <h5 class="pfizer-intro">Pfizer Inc. is an American multinational pharmaceutical corporation. Pfizer is one of the world's largest pharmaceutical companies, and was ranked 64th on the 2020 Fortune 500 list of the largest U.S. corporations by total revenue</h5>
 </div>   
<h4 class="data-title2">Charts: % of people from each city that registered to take Pfizer vaccine</h4>
    <div class="statistics-left-right">
		<div class="left">
			<div class="chart-container3">
      <canvas class="chart2Div" id="chart3"></canvas>
			</div>
		</div>
	</div>


            

  <script>
	
	pieIt2();
	async function chartIt2() {
		const data = await getData2();
		const ctx = document.getElementById('chart4').getContext('2d');
		const chart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: data.xs1,
				datasets: [{
					label: [""],
					data: data.ys1,
					backgroundColor: [
						
						'rgba(153, 102, 255, 0.6)',
            'rgba(103, 234, 444, 0.6)',
          ],
					borderColor:	
						[
						'rgba(153, 102, 255, 1)',
            'rgba(103, 234, 444, 1)',
            ],
          borderWidth: 1,
          options: {
						responsive: true,
						maintainAspectRatio: false,
					}
				}]
			},
			options:{
			title:{
				display:true,
				text:'Bar chart',
				fontSize: 25
			},
			legend:{
				position: 'right',
				labels:{
					fontColor: '#000'
				}
			},
			tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return currentValue + " - "+ percentage + "%" ;
    }
  }
}
		}
		
		});
	}

	async function pieIt2() {
		const data = await getData2();
		var options = {
   plugins: {
     datalabels: {
       formatter: (value, ctx2) => {
         let datasets = ctx2.chart.data.datasets;
         if (datasets.indexOf(ctx2.dataset) === datasets.length - 1) {
           let sum = datasets[0].data.reduce((a, b) => a + b, 0);
           let percentage = Math.round((value / sum) * 100) + '%';
           if(percentage !=='0%'){
            return percentage;
           }else return null;
         } else {
          if(percentage !=='0%'){
            return percentage;
           }else return null;
         }
       },
       color: '#000000',
     }
   },
 };
		const ctx2 = document.getElementById('chart3').getContext('2d');
		const chart2 = new Chart(ctx2, {
			type: 'pie',
			data: {
				labels: data.xs1,
				datasets: [{
					label: ["yes", "no"],
					data: data.ys1,
					backgroundColor: [
						'rgba(255, 206, 86, 0.6)',
						'rgba(153, 102, 255, 0.6)',
						'rgba(255, 99, 132, 0.6)',
						'rgba(54, 162, 235, 0.6)',
						'rgba(75, 192, 192, 0.6)',
						'rgba(255, 159, 64, 0.6)',
						'rgba(255, 129, 74, 0.6)',
						'rgba(55, 129, 74, 0.6)',
						'rgba(15, 129, 74, 0.6)',
						'rgba(45, 45, 45, 0.6)',
						'rgba(145, 145, 145, 0.6)',
						'rgba(23, 23, 134, 0.6)',
				],
					borderColor:	[
						'rgba(255, 206, 86, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(255, 159, 64, 1)',
						'rgba(255, 129, 74, 1)',
						'rgba(55, 129, 74, 1)',
						'rgba(15, 129, 74, 1)',
						'rgba(45, 45, 45, 1)',
						'rgba(145, 145, 145, 1)',
						'rgba(23, 23, 134, 1)',
					],
				}]
			},
			borderWidth: 1,
              options: options
		});
	}

	async function getData2() {
		var countBeirut = 0;
		var countTripoli = 0;
		var countSidon = 0;
		var countTyre = 0;
    var countNabatiye = 0;
    var countHabbouch = 0;
    var countJounieh = 0;
    var countZahle = 0;
    var countGhazieh = 0;
    var countBaalbek = 0;

		var xs1 = [];
		var ys1 = [];
		
    var countResult = 0;
		
<?php 
 		$countBeirut = 0;
    $countTripoli = 0;
    $countSidon = 0;
    $countTyre = 0;
    $countNabatiye = 0;
    $countHabbouch = 0;
    $countJounieh = 0;
    $countZahle = 0;
    $countGhazieh = 0;
    $countBaalbek = 0;

    $sql = "SELECT * FROM register, users, placedatetime, locations WHERE users.LocationID=locations.locationID AND register.patientUsername = users.Username AND register.pdtID=placedatetime.ID AND placedatetime.vaccineID='1' ";
                  $result = mysqli_query($db,$sql);             
                  if (mysqli_num_rows($result) > 0) {
                    

                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['locationName'] =="Beirut"){
                      $countBeirut++;
                    }else if($row['locationName'] =="Tripoli"){
                      $countTripoli++;
                    }else if($row['locationName'] =="Sidon"){
                      $countSidon++;
                    }else if($row['locationName'] =="Tyre"){
                      $countTyre++;
                    }else if($row['locationName'] =="Nabatiye"){
                      $countNabatiye++;
                    }else if($row['locationName'] =="Habbouch"){
                      $countHabbouch++;
                    }else if($row['locationName'] =="Jounieh"){
                      $countJounieh++;
                    }else if($row['locationName'] =="Zahle"){
                      $countZahle++;
                    }else if($row['locationName'] =="Ghazieh"){
                      $countGhazieh++;
                    }else if($row['locationName'] =="Baalbek"){
                      $countBaalbek++;
                    }


                  }
                }

?>	  

    countBeirut = <?php echo "".$countBeirut.""; ?>;
		countTripoli = <?php echo "".$countTripoli.""; ?>;
		countSidon = <?php echo "".$countSidon.""; ?>;
		countTyre = <?php echo "".$countTyre.""; ?>;
    countNabatiye = <?php echo "".$countNabatiye.""; ?>;
    countHabbouch = <?php echo "".$countHabbouch.""; ?>;
    countJounieh = <?php echo "".$countJounieh.""; ?>;
    countZahle = <?php echo "".$countZahle.""; ?>;
    countGhazieh = <?php echo "".$countGhazieh.""; ?>;
    countBaalbek = <?php echo "".$countBaalbek.""; ?>;
		
		xs1 = ["Beirut", "Tripoli", "Sidon", "Tyre", "Nabatiye", "Habbouch", "Jounieh", "Zahle", "Ghazieh", "Baalbek"];
		ys1 = [countBeirut, countTripoli, countSidon, countTyre, countNabatiye, countHabbouch, countJounieh, countZahle, countGhazieh, countBaalbek];
		return { xs1, ys1 };

	}
</script>
</div>

</div>

</body>




    
    




</html>




