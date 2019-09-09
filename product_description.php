<?php
session_start();
include("controller.php");
include("connection.php");
$db_handle = new DBController();

?>
<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}


function goBack() {
    window.history.back();
}


         <!--
         function Warn() {
             alert ("Successfully added to Cart");

          }
</script>

 <?php include 'navbar.php';?>
<?php

if(isset($_POST["shopnow"]))
{
  $shop_now = $_POST["shopnow"];

 $where = "where Product_ID = '".$shop_now. "'" ;
}

$sql1 = "SELECT * from product $where";

$result1 = mysqli_query($conn,$sql1);

if (mysqli_num_rows($result1) > 0)
{

  ?>
	<div class="container-fluid">
<hr>
  <div class="col-md-12 align-self-center" style="background-color:white;">
      <h2 class="title text-center" style="background-color:white;">Product Description</h2><hr/>
      <div class="row">
<?php

while($row = mysqli_fetch_assoc($result1)){

?>
<div class="column col-md-1">
  <div class="row">
		<img class="card-img-top img-thumbnail img-responsive" ; onclick="myFunction(this);" ; style="height:125px; width:125px; " src="Game_Image/<?php echo $row["Image_Name"];?>" alt="<?php echo $row["Image_Alt"];?>" />
	</div>
  <div class="row">
    <img class="card-img-top img-thumbnail img-responsive" src="Game_Image/fortnight1.png" alt="Snow" style="height:125px; width:125px;" onclick="myFunction(this);">
  </div>
  <div class="row">
    <img class="card-img-top img-thumbnail img-responsive" src="Game_Image/fortnight2.jpg" alt="Mountains" style="height:125px; width:125px;" onclick="myFunction(this);">
  </div>
  <div class="row">
    <img class="card-img-top img-thumbnail img-responsive" src="Game_Image/fortnight3.jpg" alt="Lights" style="height:125px; width:125px;"  onclick="myFunction(this);">
  </div>
</div>

<div class="container col-md-5" >

  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" src="Game_Image/<?php echo $row["Image_Name"];?>" style="height:550px; width:500px;">
</div>

	<?php
	$product_array = $db_handle->runQuery("SELECT * from product $where");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>
		<div class="col-md-6" >
			<form method="post" action="shopcart.php?action=add&Product_ID=<?php echo $product_array[$key]["product_ID"]; ?>">

				<div class="product-information">
					<h2><?php echo $row["Product_Name"];?></h2>
					<?php echo $row["Product_Description"];?><br/>

			<div class="product-title"><?php echo $product_array[$key]["Product_Name"]; ?></div>
			<div class="product-price"><b>Price:</b><?php echo "$".$product_array[$key]["Product_Price"]; ?></div><br/>

      <p><b>Availability:</b> In Stock</p>
      <p><b>Condition:</b> New</p>
      <p><b>Brand:</b> Epic Games</p>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />


        <?php
        if(isset($_SESSION["Username"])){

        echo '<input type="submit" value="Add to Cart" class="btnAddAction" onclick="Warn()"';
}
        ?>
      </div>



			</form>
            <br/>
		</div>
	<?php
		}
	}
	?>


         </div>
          </div>



<?php }} ?>

</div>

</div>
<?php

$sql2 = "SELECT * from product order by rand() LIMIT 3,4 ";
$result2 = mysqli_query($conn,$sql2);

if (mysqli_num_rows($result2) > 0)
{

  ?>
</br>
<div style="margin-top:5px;">

<h4>You may also Like:</h2>


          </div>
<div class="row">



  <?php

  while($row = mysqli_fetch_assoc($result2)){

  ?>

  <div class="col-md-3">
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

<?php include 'footer.php'?>

</div>
