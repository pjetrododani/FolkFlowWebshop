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

<?php
include 'navbar.php';
?>

<div class="container">    
  <div class="row">
      <div class="col-sm-12">
          <form class="form-horizontal" action="addCategory.php" method="post">
		<fieldset>
		
		<!-- Form Name -->
		<legend>Add Category</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="textinput">Category</label>  
		  <div class="col-md-4">
                      <input id="textinput" name="category" type="text" placeholder="Categoryname" class="form-control input-md"> 
		  </div>
		</div>
		
		
		
		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="singlebutton"></label>
		  <div class="col-md-4">
		    <button id="singlebutton" name="add" class="btn btn-primary">Add</button>
		  </div>
		</div>
		
		</fieldset>
	</form>
      </div>
  </div>
</div><br>

<div class="row">
    <div class="col-sm-12">
        <?php
        // pruefen, ob add gedruck wurde
        if(isset($_POST['add'])){
            //Eingabe vom Formular speichern
            $category= $_POST['category'];
            
            //DB einbinden
          require_once 'dbconnect.php';
				
				
            //Statement bauen
            $insert = "INSERT INTO Kategorie (Name) VALUES('" . $_POST["category"] . "')";
			$result = $dbh->query($insert);
            //Statement schicken
		
            
            //...
			if($result){
			echo "<div class='panel panel-success'>";
            echo "<div class='panel-heading'>Inserted </div>";
            echo "<div class='panel-body'>Category: $category</div>";
            echo "</div>";	
			}else{
            echo "<div class='panel panel-warning'>";
            echo "<div class='panel-heading'>Not inserted </div>";
            echo "<div class='panel-body'>Category: $category</div>";
            echo "</div>";
        }
		}
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>

</body>
</html>
