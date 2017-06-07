<!DOCTYPE html>
<html lang="en">

<head>
   
  <title>Sign up Webshop </title>
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
				<form role="form" method="POST" action="?register=1">
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
						<input type="DATE" class="form-control" id="gebtag" name="gebtag" >
					</div>
					

					
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<label for="pwd">Password repeat:</label>
						<input type="password" class="form-control" id="password" name="password2">
					</div>
						<button type="submit" class="btn btn-default" name="sub">Submit</button>
				</form>
			
				<!-- Formular verarbeiten -->
				<?php
				$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
				require 'dbconnect.php'; 
				if(isset($_GET['register'])) {
				 $error = false;
				 $vname = $_POST['vname'];
				 $fname = $_POST['fname'];
				 $email = $_POST['email'];
				 $password = $_POST['password'];
				 $password2 = $_POST['password2'];
				 $gebtag = $_POST['gebtag'];
				 //$geschlecht = $_POST['geschlecht'];
				  
				 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
				 $error = true;
				 } 
				 if(strlen($password) == 0) {
				 echo 'Bitte ein Passwort angeben<br>';
				 $error = true;
				 }
				 if($password != $password2) {
				 echo 'Die Passwörter müssen übereinstimmen<br>';
				 $error = true;
				 }
				 
				 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
				 if(!$error) { 
				 $statement = $pdo -> prepare("SELECT * FROM user WHERE email = :email ");
				 $result = $statement->execute(array('email' => $email));
				 $user = $statement->fetch();
				 
				 if($user !== false) {
				 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
				 $error = true;
				 } 
				 }
				
				 				 //Keine Fehler, wir können den Nutzer registrieren
				 if(!$error) { 
				 $password_hash = password_hash($password, PASSWORD_DEFAULT);
				 
				 $statement = $pdo->prepare("INSERT INTO user (vname, fname, email, password, gebtag ) VALUES (:vname, :fname, :email, :password, :gebtag)");
				 $result = $statement->execute(array('vname' => $vname,'fname' => $vname, 'email' => $email, 'password' => $passwort_hash, 'gebtag' => $gebtag));
				 
				 if($result) { 
				 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
				 $showFormular = false;
				 } else {
				 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				 }
				 } 
				
						
						
						// DB schliessen
						$dbh = null;
					
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
<?php }
 ?>
</body>
</html>