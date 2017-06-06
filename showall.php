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
		
		<?php
		
                    require_once 'dbconnect.php';


                    $sql = "SELECT idK, name FROM Kategorie ORDER BY name";

                    $sth = $dbh->prepare($sql);
                    $sth->execute();

                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
		  
                    echo "<table>";
					
                    foreach ($result as $row){
			
						echo "<tr>";
						echo "<td>" . $row["name"] . "</td>";
						echo "<td><a href=editCategory.php?id=" . $row["idK"] ."&name=" . $row["name"] . ">Edit</a></td>";
						echo "<td><a href=deleteCategory.php?id=" . $row["idK"] .">Delete</a></td>";
						echo "</tr>";
					}
                    echo "</table>"
                    
                ?>
		
<?php
    include 'footer.php';
?>
    </body>
</html>