<?php
session_start();
?>


 <?php include 'navbar.php';?>

<?php include 'connection.php' ?>

<div class="container-fluid">
<div class="row">
<div class="col-md-12"  >




  <div id="myCarousel" class="carousel slide" data-ride ="carousel">
<ol class="carousel-indicators">
<li data-target = "#myCarousel" data-slide-to="0" class="active"> </li>
<li data-target= "#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
<li data-target="#myCarousel" data-slide-to="3"></li>
</ol>

<div class="carousel-inner">

  <div class="carousel-item active">
    <img src="Images/Image1.jpg" alt="image1" style="width:100%; height:400px">
    <div class="carousel-caption">
        <h3>Buy the latest game from our Store</h3>
        <p>Shipping Cost is on Us.</p>
        <button href="product_list.php">Shop Now</button>
      </div>

  </div>
  <div class="carousel-item">
    <img src="Images/Image2.jpg" alt="image1" style="width:100%; height:400px">
    <div class="carousel-caption">
        <h3>XBOX Game pass. This coming March</h3>
        <p>Don't Miss the opportunity</p>
        <button type="button" href="product_list.php">More Details</button>
      </div>
  </div>
  <div class="carousel-item">
    <img src="Images/Image3.jpg" alt="image1" style="width:100%; height:400px">
    <div class="carousel-caption">
        <h3>We are giving Free games for lucky 100 customer.</h3>
        <p>Be among the lucky one.</p>
      </div>
  </div>
  <div class="carousel-item">
    <img src="Images/Image4.jpg" alt="image1" style="width:100%; height:400px">
  </div>
</div>
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>

  </div>



  <div class="row" style=" background-color:white; margin-left: 20px; margin-right: 20px; margin-top:10px;">
      <div class="col-md-3" style="background-color:white;" >
<form class="input-group" action="product_list.php"method="post">
<input type="text" class="form-control" name="searchproduct" placeholder="Search.........."/>
<div class="input-group-btn">
  <button class="btn btn-default" type="submit" name="searchbutton" href="product_list.php">
    Search
  </button>
</div>
</form>


          <hr/>
<div class="category" style="border:1px solid black;">

<h2 style=" text-align:center; color:coral;"><u>CATEGORIES</u></h2>
<div class="catmenus">

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
      <a class="list-group-item" style="text-align:center" href="product_list.php?Category_ID=<?php echo stripslashes($row['Category_ID']);?>"> <?php echo stripslashes($row['Category_Name']); ?></a>
    <?php }} ?>
</div>



</div>
      </div>




<?php

$sql1 = "SELECT * from product LIMIT 3";
$result1 = mysqli_query($conn,$sql1);

if (mysqli_num_rows($result1) > 0)
{

  ?>

  <div class="col-md-9" style="background-color:black;">
      <h2 class="title text-center" style="background-color:grey;">Featured Products </h2><hr/>
      <div class="row">
<?php

while($row = mysqli_fetch_assoc($result1)){

?>


    <div class="col-md-4">
      <div class="card" style="width:310px; margin-bottom:20px;">
          <img class="card-img-top img-thumbnail img-responsive" style="height:350px; width:310px; " src="Game_Image/<?php echo $row["Image_Name"];?>" alt="<?php echo $row["Image_Alt"];?>" />
         <div class="card-body">
              <h3 class="card-title text-center" style="margin-top:-10px;">
                  <?php echo "<b>".$row["Product_Name"]."</b>";?></h3>
                  <p class="card-text text-center text-bold">
                      <?php echo "$ ". $row["Product_Price"];?> </p>

              <!--<p class="card-text">
                 <?php echo $row["Product_Description"];?></p> -->

                 <form class="input-group" action="product_description.php" method="post">
                 <div class="input-group-btn">
                   <button class="btn btn-default" type="submit" name="shopnow" value="<?php echo $row["Product_ID"]; ?>" />
                     Shop Now
                   </button>
                 </div>
                 </form>

          </div>
      </div>
</div>

<?php }} ?>

</div>


  <?php

  $sql2 = "SELECT * from product order by rand() LIMIT 3,3 ";
  $result2 = mysqli_query($conn,$sql2);

  if (mysqli_num_rows($result2) > 0)
  {

    ?>
  </br>
    <h2 class="title text-center" style="background-color:grey;">New Arrival </h2><hr/>
<div class="row">
<!-- <div class="col-md-9 padding-right" style="background-color:white;"> -->


    <?php

    while($row = mysqli_fetch_assoc($result2)){

    ?>

    <div class="col-md-4">
      <div class="card" style="width:300px; margin-bottom:20px;">

        <img class="card-img-top img-thumbnail img-responsive" style="height:350px; width:350px; " src="Game_Image/<?php echo $row["Image_Name"];?>" alt="<?php echo $row["Image_Alt"];?>" />




         <div class="card-body">
              <h3 class="card-title text-center">
                  <?php echo "<b>".$row["Product_Name"]."</b>";?></h3>
                  <p class="card-text text-center text-bold">
                      <?php echo "$ ". $row["Product_Price"];?> </p>

              <!--<p class="card-text">
                 <?php echo $row["Product_Description"];?></p> -->
                 <form class="input-group" action="product_description.php" method="post">
                 <div class="input-group-btn">
                   <button class="btn btn-default" type="submit" name="shopnow" value="<?php echo $row["Product_ID"]; ?>" />
                     Shop Now
                   </button>
                 </div>
                 </form>


          </div>
      </div>
  </div><?php }} ?>
</div>

</div>

    </div>

<hr/>
<button onclick="goBack()">Go Back</button>

<?php include 'footer.php'?>

    </div>
