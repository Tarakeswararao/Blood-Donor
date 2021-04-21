<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plasama Donor</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

     <script src="cities.js"></script>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-danger p-3">
    <div class="container text-white">
        <h4 style="color: white;">Plasma Donor</h4>     
    </div>
</nav>
<!-- navbar -->
<!-- insert form -->
<div class="container p-5">
	<div class="card">
  <div class="card-header bg-light text-danger">
    <h3>Insert Donor Details <i class="fas fa-tint"></i></h3>
  </div>
  <div class="card-body">
    <form action="" method="post">
	  	<div class="row">
	    	<div class="col">
	    		<label>Donor Name</label>
	      		<input type="text" class="form-control" name="name" placeholder="">
	    	</div>
	    	<div class="col">
	    		<label>Blood Group</label>
	      		
	      		<select name="blood" class="form-control">
                    <option>Select Blood Group</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                     <option value="AB-">AB-</option>
                </select>
	    	</div>
	  	</div>

	  	<div class="row">
	    	<div class="col">
	    		<label>Phone Number</label>
	      		<input type="text" class="form-control" name="phone" placeholder="">
	    	</div>
	    	<div class="col">
	    		<label>Age</label>
	      		<input type="text" class="form-control" name="age" placeholder="">
	    	</div>
	  	</div>

	  	<div class="row">
	    	<div class="col">
	    		<label>Address</label>
	      		<input type="text" class="form-control" name="address" placeholder="">
	    	</div>
	  	</div>

	  	<div class="row">
			<div class="col">
                <label for="state">State</label>
                <select onchange="print_city('state', this.selectedIndex);" id="states" name ="state" class="form-control" required></select>
            </div>
            <div class="col">
                <label for="city">City</label>
                <select id ="state" name="city" class="form-control"></select>
                <script language="javascript">print_state("states");</script>
      		</div>
	  	</div>
<br>
	  	<button class="btn btn-danger form-control" name="donor">Insert Donor</button>
	</form> 
  </div>
</div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue p-5 bg-danger">
  <div class="container text-center text-md-left text-white">
       <h3 class="text-uppercase"><b>Plasma Donor</b></h3>
       <p>Find blood donors in your area.</p>
  </div>
</footer>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>
</html>

<?php 
	$conn = mysqli_connect('localhost','root','','blood');

	if (isset($_POST['donor'])) {
		$name = $_POST['name'];
		$blood = $_POST['blood'];
		$phone = $_POST['phone'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$state = $_POST['state'];
		$city = $_POST['city'];

		$insert = mysqli_query($conn, "INSERT INTO `donor`(`name`, `blood`, `age`, `phone`, `address`, `location`, `state`) VALUES ('$name','$blood','$age','$phone','$address','$city','$state')");
		if($insert===TRUE){
	 		echo "<script>alert('Donor Details Inserted')</script>";
	 	}else{
	 		echo "Error";
	 	}
	}

 ?>