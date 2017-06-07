<!doctype html>
<html>
	<head>
		<title>Kategorie anlegen</title>
	</head>
	<body>
		<h3>Neue Kategorie anlegen</h3>
		<form action="createcategory.php" method="post">
			<input type="text" name="name" maxlength="50" />
			<button name="Send" type="submit">Anlegen</button>
		</form>
		
		<?php
		
			if(isset($_POST["Send"])) {
				
				require_once 'dbconnect.php';
				
				$insert = "INSERT INTO Kategorie(name) VALUES('" . $_POST["name"] . "')";
				$result = $dbh->query($insert);
				
				if($result)
					echo "<br />Die Kategorie \"" . $_POST["name"] . "\" wurde erfolgreich angelegt!";
			
				else
					echo "Die Kategorie wurde nicht angelegt!<br />" . $insert;

			}
		
		?>
	</body>
</html>






