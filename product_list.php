<?php
session_start();
?>

<?php include 'connection.php' ?>

  <?php include 'navbar.php' ?>

  <script>

function goBack() {
    window.history.back();
}
</script>

<div class="row">
<!-- <div class="col-md-9 padding-right" style="background-color:white;"> -->


  <div class="container-fluid">
  <div class="row" style="margin-left:10px;margin-right:10px;">
  <div class="col-md-12">
    <ul class="list-inline text-center" style="padding:20px;">
   <li class="list-inline-item"><i class=" fa fa-chevron-circle-down">Free Shipping on $100+</i></li>|
   <li class="list-inline-item"><i class=" fa fa-chevron-circle-down">100% Working Gurantee </i></li>|
   <li class="list-inline-item"><i class=" fa fa-chevron-circle-down">30-Days moneyback </i></li>
 </ul>
  <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-100">

  <form class="input-group" action="product_list.php"method="post">
  <input type="text" class="form-control" name="searchproduct" placeholder="Search.........."/>
  <div class="input-group-btn">
    <button class="btn btn-default" type="submit" name="searchbutton" href="product_list.php">
      Search
    </button>
  </div>
  </form>
<h1 class="text-center font-weight-bold" style="font-size:50px"> Product </h1>





<hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-100">
<div class="row ">




  <?php
$where ='';
if(isset($_GET['Category_ID']))
{
 $where = "where Category_ID= '".$_GET['Category_ID']."'";
}

if (isset($_POST['searchproduct'])) {

$where = "where Product_Name like '".$_POST['searchproduct']."%'";
}

  $products = "SELECT * from product $where order by rand()";
  $productresult = mysqli_query($conn,$products);

  ?>
  <?php

if(mysqli_num_rows($productresult) > 0)
  {
    ?>
  </br>

  <?php

  while($row = mysqli_fetch_array($productresult)){

  ?>

  <div class="col-md-3">
  <div class="card" style="width:310px; margin-bottom:20px;">
      <img class="card-img-top img-thumbnail img-responsive" style="height:350px; width:310px; " src="Game_Image/<?php echo $row["Image_Name"];?>" alt="<?php echo $row["Image_Alt"];?>" />
     <div class="card-body">
          <h3 class="card-title text-center font-italic font-weight-bold">
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
<?php
if (mysqli_num_rows($productresult) == 0)
  {
?>
<p> No Products Found for this Category</p>
<?php } ?>



</div>


 </div>
</div>
  <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-100">
  <button onclick="goBack()">Go Back</button>s
<?php include 'footer.php' ?>
</div>

  </div>
