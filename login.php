<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Login Webshop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet">
  
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Webshop "FolkFlow"</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<?php
include 'navbar.php';
?>

<div class="container">    
  <div class="row">
      <div class="col-sm-12">
	  <form class="form-horizontal" action="login.php" method="post">
		<fieldset>
		
		<!-- Form Name -->
		<legend>Login</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="textinput">E-Mail</label>  
		  <div class="col-md-4">
		  <input id="textinput" name="email" type="email" placeholder="E-Mail" class="form-control input-md"> 
		  </div>
		</div>
		
		<!-- Password input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="password">Passwort</label>
		  <div class="col-md-4">
		    <input id="password" name="password" type="password" placeholder="Passwort" class="form-control input-md">
		  </div>
		</div>
		
		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="singlebutton"></label>
		  <div class="col-md-4">
		    <button id="singlebutton" name="login" class="btn btn-primary">Anmelden</button>
		  </div>
		</div>
		
		</fieldset>
	</form>
	<?php
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$pwd=$_POST['password'];
	$select="SELECT vname,email,password FROM User WHERE email=?";
require 'dbconnect.php';
$stmt=$dbh->prepare($select);
$stmt->execute();

$result=$stmt-> fetch(PDO::FETCH_ASSOC);
//check pass
if($result['PassHash']==$password){

//pass ok
$_SESSION['vname']=$result['vname'];
header('Location:index.php');

}else{
echo "Login not";
}
}
?>
	
      </div>
  </div>
</div><br>

<div class="row">
    <div class="col-sm-12">
        
    </div>
</div>



<?php
include 'footer.php';
?>

</body>
</html>
