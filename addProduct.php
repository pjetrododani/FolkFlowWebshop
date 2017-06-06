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
          		<form role="form" method="POST" action="addProduct.php">
					<div class="form-group">
					<label for="description">Name:</label>
					<input type="text" class="form-control" id="pName" name="pName">
  </div>
	<div class="form-group">
					<label for="category">Category:</label>
					<td>
						<select name="pCat">
			
							<?php
								require_once 'dbconnect.php';
				
								$sql = "SELECT ID_K, Name FROM Kategorie ORDER BY Name";
				
								$sth = $dbh->prepare($sql);
								$sth->execute();
				
								$result = $sth->fetchAll(PDO::FETCH_ASSOC);
					
								foreach($result as $row)
									echo "<option value=\"" . $row["ID_K"] . "\">" . $row["Name"] . "</option>";
							?>
		
						</select>
					</td>
  </div>
	<div class="form-group">
					<label for="description">Beschreibung:</label>
					<input type="text" class="form-control" id="description" name="pDesc">
  </div>
  <div class="form-group">
					<label for="preis">Preis:</label>
					<input type="text" class="form-control" id="preis" name="pPrice">
  </div>
    <div class="form-group">
					<label for="preis">Gewicht:</label>
					<input type="text" class="form-control" id="gewicht" name="pWeight">
  </div>
    <div class="form-group">
					<label for="preis">InStock:</label>
					<input type="text" class="form-control" id="Instock" name="pStock">
  </div>
 
					<button type="submit" class="btn btn-default" name="add">Submit</button>
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
				$name = $_POST["pName"];
				$desc = $_POST["pDesc"];
				$price = $_POST["pPrice"];
				$weight = $_POST["pWeight"];
				$stock = $_POST["pStock"];
				$catID = $_POST["pCat"];
            //DB einbinden
            require_once 'dbconnect.php';
            //Statement bauen
            $insert = "INSERT INTO Produkt (Name,Beschreibung,Preis,Gewicht,InStock,ID_K) VALUES(?,?,?,?,?,?)";
            //prepare
			$stmt = $dbh->prepare($insert);
			//bindparam
				$stmt->bindParam(1, $name);
				$stmt->bindParam(2, $desc);
				$stmt->bindParam(3, $price);
				$stmt->bindParam(4, $weight);
				$stmt->bindParam(5, $stock);
				$stmt->bindParam(6, $catID);
			//Statement schicken
			$inserted = $stmt->execute();
            
            //...
			if($inserted == true){
            echo "<div class='panel panel-success'>";
            echo "<div class='panel-heading'>Inserted </div>";
            echo "<div class='panel-body'>Produkt: $product</div>";
            echo "</div>";
			}else{
		    echo "<div class='panel panel-warning'>";
            echo "<div class='panel-heading'>Produkt not inserted </div>";
            echo "<div class='panel-body'>Produkt: $product</div>";
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
