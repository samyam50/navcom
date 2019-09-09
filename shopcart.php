<?php include 'navbar.php';?>


<?php
session_start();
include("controller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE Product_ID='" . $_GET["Product_ID"] . "'");
			$itemArray = array($productByCode[0]["Product_ID"]=>array('Product_Name'=>$productByCode[0]["Product_Name"], 'Product_ID'=>$productByCode[0]["Product_ID"], 'quantity'=>$_POST["quantity"], 'Product_Price'=>$productByCode[0]["Product_Price"], 'Image_name'=>$productByCode[0]["Image_Name"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["Product_ID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["Product_ID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["Product_ID"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
}
}
?>


<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>


<BODY>
	<script>
function goBack() {
    window.history.back();
}
</script>


<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="shopcart.php?action=empty">Empty Cart</a>
<a id="btnEmpty" href="product_list.php">Continue Shopping</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Product_ID</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["Product_Price"];
		?>
				<tr>
				<td><?php echo $item["Product_Name"]; ?></td>
				<td><?php echo $item["Product_ID"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["Product_Price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="shopcart.php?action=remove&Product_ID=<?php echo $item["Product_ID"]; ?>" class="btnRemoveAction"><img src="Images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["Product_Price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>

	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM Product ORDER BY Product_ID ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>

	<?php
		}
	}
	?>
</div>
<?php if (isset($_SESSION["cart_item"])) {
echo '<a class="btn btn-success" style="margin-left:40px;" href="checkout.php">Proceed To Checkout</a>';
}
