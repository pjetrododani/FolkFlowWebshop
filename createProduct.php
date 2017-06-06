<!doctype html>
<html>
	<head>
		<title>Produkt anlegen</title>
	</head>
	<body>
		<h3>Neues Produkt anlegen</h3>
		<form action="createProduct.php" method="post">
			<table>
				<tr>
					<td>Produkt Name</td>
					<td><input type="text" name="pName" maxlength="50" /></td>
				</tr>
				<tr>
					<td>Kategorie</td>
					<td>
						<select name="pCat">
			
							<?php
								require 'dbconnect.php';
				
								$sql = "SELECT ID_K, Name FROM Kategorie ORDER BY Name";
				
								$sth = $dbh->prepare($sql);
								$sth->execute();
				
								$result = $sth->fetchAll(PDO::FETCH_ASSOC);
					
								foreach($result as $row)
									echo "<option value=\"" . $row["ID_K"] . "\">" . $row["Name"] . "</option>";
							?>
		
						</select>
					</td>
				</tr>
				<tr>
					<td>Beschreibung</td>
					<td><textarea name="pDesc" /></textarea></td>
				</tr>
				<tr>
					<td>Preis</td>
					<td><input type="text" name="pPrice" maxlength="50" /></td>
				</tr>
				<tr>
					<td>Gewicht</td>
					<td><input type="text" name="pWeight" maxlength="50" /></td>
				</tr>
				<tr>
					<td>Lagerbestand</td>
					<td><input type="text" name="pStock" maxlength="50" /></td>
				</tr>
				<tr>
					<td><button name="Reset" type="submit">Reset</button></td>
					<td><button name="Send" type="submit">Anlegen</button></td>
				</tr>
			</table>
		</form>
		
		<?php
		
			if(isset($_POST["Send"])) {
				
				include 'dbconnect.php';
				
				$stmt = $dbh->prepare("INSERT INTO Produkt (Name, Beschreibung, Preis, Gewicht, InStock, ID_K) VALUES (?, ?, ?, ?, ?, ?)");
				
				
				$name = $_POST["pName"];
				$desc = $_POST["pDesc"];
				$price = $_POST["pPrice"];
				$weight = $_POST["pWeight"];
				$stock = $_POST["pStock"];
				$catID = $_POST["pCat"];
				
				$stmt->bindParam(1, $name);
				$stmt->bindParam(2, $desc);
				$stmt->bindParam(3, $price);
				$stmt->bindParam(4, $weight);
				$stmt->bindParam(5, $stock);
				$stmt->bindParam(6, $catID);
				
				$result = $stmt->execute();
				
				if($result)
					echo "<br />Das Produkt wurde erfolgreich angelegt!";
			
				else
					echo "Das Produkt konnte nicht angelegt werden!<br />";
			}
		
		?>
	</body>
</html>