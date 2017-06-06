<!DOCTYPE html>
<html>
<head>
  <title>Webshop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link href="css/custom.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
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
                <form class="form-horizontal" action="editCategory.php" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Edit Category</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Category name: </label>  
                            <div class="col-md-4">
                                <input id="textinput" name="editcategory" type="editcategory" value=" <?php echo $_GET["name"]; ?> " required="required" placeholder="Category name" class="form-control input-md"> 
								<input type="hidden" name="catID" value=" <?php echo $_GET["idK"]; ?> ">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                                <button id="singlebutton" name="edit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>


            <br>

            <div class="row">   
                <div class="col-sm-6 col-sm-offset-3">

                    <?php
                    //pruefen ob add gedrueckt wurde
                    if (isset($_POST['edit'])) {
                        // EIngabe von Formular speichern
                        $category = $_POST['editcategory'];

                        // DB einbinden
                        require 'dbconnect.php';
                        // Statement bauen
                        $insert = "UPDATE Kategorie SET name = '" . $category . "' WHERE idK = " . $_POST['catID'];

                                
                        // prepare
                        $stmt = $dbh->prepare($insert);
                        
                        // bind Param
                        //$stmt->bindParam(1, $editcategory);
                        
                        // Statement schicken
                        $inserted = $stmt->execute();
                        
                        
                        if ($inserted) {
                            echo "<div class='panel panel-success'>";
                            echo "<div class='panel-heading'>Category was sucessfully edited!</div>";
                            echo "</div>";
                        } else {
                            echo "<div class='panel panel-success'>";
                            echo "<div class='panel-heading'>Category was NOT sucessfully edited!" . $insert . "</div>";
                            echo "<div class='panel-body'>Category: $editcategory</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

<?php
include 'footer.php';
?>

    </body>
</html>