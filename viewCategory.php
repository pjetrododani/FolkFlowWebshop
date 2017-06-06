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
		<legend>Kategorien bearbeiten</legend>
		
					<div class="form-group">
					<label class="col-md-4 control-label">Kategorie</label>
				<div class="col-md-4">
				
				
				<select name="pCat" class="form-control input-md" id="category">
			
							<?php
								require_once 'dbconnect.php';
				
								$sql = "SELECT idK, name FROM Kategorie ORDER BY name";
				
								$sth = $dbh->prepare($sql);
								$sth->execute();
				
								$result = $sth->fetchAll(PDO::FETCH_ASSOC);
					
								echo "<table>";
					
			foreach($result as $row) {
			
				echo "<tr>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td><a href=editCategory.php?id=" . $row["idK"] ."&name=" . $row["name"] . ">Edit</a></td>";
				echo "<td><a href=deleteCategory.php?id=" . $row["idK"] .">Delete</a></td>";
				echo "</tr>";
			
			}
			
			echo "</table>"
							?>
		
						</select>
						</div>
				</div>
			
		
           
		
		<div class="form-group">
		 
		  <div class="col-md-4">
		    <a href=editCategory.php value =" . $row[´ID_K´] ."  value=" . $row[´Name´] . " >Edit</a>
		  </div>
		</div>
		
		
		<div class="form-group">
		
		  <div class="col-md-4">
		    <a  href=deleteCategory.php  value =". $row[´ID_K´] ." >Delete</a>
		  </div>
		</div>
		
		</fieldset>
	</form>
      </div>
  </div>
</div><br>

		
<?php
include 'footer.php';
?>

</body>
</html>

