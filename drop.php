<!doctype html>
<html>
	<head>
		<title>Drop Down Liste</title>
	</head>
	<body>
		<h3>Kategorie w&auml;hlen</h3>
		<form action="fillDDL.php" method="post">
			<select name="Category">
			
			<?php
				require 'dbconnect.php';
				
				$sql = "SELECT idK, name FROM Category ORDER BY name";
				
				$sth = $dbh->prepare($sql);
				$sth->execute();
				
				$result = $sth->fetchAll(PDO::FETCH_ASSOC);
				
				foreach($result as $row)
					echo "<option value=\"" . $row["idK"] . "\">" . $row["name"] . "</option>";
			?>
		
			</select>
			<button name="Send" type="submit">Send</button>
		</form>
		
		<?php
		
			if(isset($_POST["Send"])) {
			
				echo "<br \>Es wurde die Kategorie " . $_POST["Kategorie"] . " gew&auml;hlt!";
			
			}
		
		?>
		
	</body>
</html>