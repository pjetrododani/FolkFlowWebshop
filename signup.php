<!DOCTYPE html>
<html lang="en">

<head>
   
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet">
  
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

    <!-- Navigation -->
    <?php include 'navbar.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
			
			<div class="col-md-12 col-lg-6 col-lg-offset-3">
				<form role="form" method="POST" action="signup.php">
					<div class="form-group">
						<label for="vname">Firstname:</label>
						<input type="text" class="form-control" id="vname" name="vname">
					</div>
					<div class="form-group">
						<label for="fname">Lastname:</label>
						<input type="text" class="form-control" id="fname" name="fname">
					</div>
					<div class="form-group">
						<label for="gebtag">Birthdate:</label>
						<input type="text" class="form-control" id="gebtag" name="birthdate" placeholder="DD.MM.YYYY">
					</div>
					
					<label class="radio-inline"><input type="radio" name="geschlecht" value="m">male</label>
					<label class="radio-inline"><input type="radio" name="geschlecht" value="f">female</label>
					
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
						<button type="submit" class="btn btn-default" name="sub">Submit</button>
				</form>
			
				<!-- Formular verarbeiten -->
				<?php
					if(isset($_POST['sub'])) {
						
						// DB verbinden
						require('dbconnect.php');
						
						
						
						// Insert-Statement 1
						$insert1 = "INSERT INTO user VALUES (?,?,?,?,?)";
						
						$sth1 = $dbh->prepare($insert1);
						
						$pwdencrypt=password_hash($_POST['password'], PASSWORD_DEFAULT);
						
						$sth1->bindParam(1, $_POST['vname']);
						$sth1->bindParam(2, $_POST['fname']);
						$sth1->bindParam(3, $_POST['email']);
						$sth1->bindParam(4, $PassHash);
						$sth1->bindParam(5, $_POST['geschlecht']);
						
						$sth1->exec();
						echo "Sign up successfully";
						
						
						//SELECT-Statement
						$select = "SELECT idU  FROM user WHERE email = ? ";
						
						$sth2 = $dbh->prepare($select);
						
						$sth2->bindParam(1, $_POST['email']);
						
						$sth2->execute();
						
						$result = $sth2->fetch(PDO::FETCH_ASSOC);
						$idU = $result('idU');
						
						
						
						// DB schliessen
						$dbh = null;
					}
				?>
			</div>
            
        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>