

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Contact</a></li>
	
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Categories
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="addCategory.php">add</a></li>
            <li><a href="showall.php">show all</a></li> 
            </ul>
       
       
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Products
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="addProduct.php">add</a></li>
            <li><a href="editCategorie.php">edit</a></li>
            <li><a href="showall.php">show all</a></li> 
            </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="signup.php"><span class="glyphicon glyphicon-shopping-cart"></span> Sign up</a></li>
      </ul>
    </div>
  </div>
</nav>
