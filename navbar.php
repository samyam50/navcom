<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

  <title>Navcom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>


<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top ">
<a class="navbar-brand" href="index.php" ><img src="Images/Navlogo.png" alt="Logo" style="height:30px;width:50px;"/></a>

  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="index.php"><i class="fa fa fa-home"> Home</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="product_list.php"><i class="fa fa fa-shopping-bag"> Shop</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php"><i class="fa fa fa-address-card"> About Us</i></a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true">
        <i class="fa fa-cart-arrow-down"> Categories</i>
      </a>
      <div class="dropdown-menu bg-light navbar-light" >

        <?php

        $category = "SELECT * from category order by Category_Name";
        $categoryresult = mysqli_query($conn,$category);

        if (mysqli_num_rows($categoryresult) > 0)
        {

          ?>
          <?php
          while($row=mysqli_fetch_array($categoryresult))
          {
          ?>
            <a class="dropdown-item" style="text-align:center" href="product_list.php?Category_ID=<?php echo stripslashes($row['Category_ID']);?>"> <?php echo stripslashes($row['Category_Name']); ?></a>
          <?php }} ?>


      </div>
    </li>
  </ul>
  <?php

  if (isset($_SESSION["Username"]))
  {
  echo '
<ul class="navbar-nav ml-auto">

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true">
  <i class="fa fa fa-user">'.$_SESSION["Username"].' </i>
  </a>
    <div class="dropdown">

      <ul class="dropdown-menu">

        <li><a class ="account-option" href="logout.php">Log Out</a></li>
      </ul>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="shopcart.php"><i class="fa fa fa-shopping-cart"> Cart</i></a>
  </li>

  </ul>';
} elseif (!isset($_SESSION["Username"])){

    echo
  '<ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" href="signup.php"><i class="fa fa fa-user-plus"> Sign Up</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href ="login.php"><i class="fa fa fa-user-circle-o"> Login</i></a>
    </li>



  </ul>';
}
?>
</nav>


</body>
</html>
