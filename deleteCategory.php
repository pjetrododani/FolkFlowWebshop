<?php
		
	require_once 'dbconnect.php';
			
	$sql = "DELETE FROM Kategorie WHERE idK = " . $_GET["idK"];
				
	$sth = $dbh->prepare($sql);
	$sth->execute();
	echo "Deleted succesfully";

	header("location:showall.php");
?>