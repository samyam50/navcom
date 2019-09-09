<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mywebsite";

//creating connection
$conn=new mysqli($servername,$username,$password,$dbname);

//checking connection
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
  
    $FullName=$_POST["fullname"];
    $Email=$_POST["email"];
    $Address=$_POST["address"];
    $City=$_POST["city"];
    $State=$_POST["state"];
    $Zip=$_POST["zip"];
    $NameOnCard=$_POST["cardname"];
    $CreditNumber=$_POST["cardnumber"];
    $ExpiryMonth=$_POST["expmonth"];
    $ExpiryYear=$_POST["expyear"];
    $CVV=$_POST["cvv"];
        

        
         $query="INSERT INTO checkout(FullName,Email, Address, City, State, Zip, NameOnCard, CreditNumber, ExpiryMonth, ExpiryYear, CVV) values ('".$FullName."','".$Email."','".$Address."','".$City."','".$State."','".$Zip."','".$NameOnCard."','".$CreditCard."','".$ExpiryMonth."','".$ExpiryYear."','".$CVV."')";
         
        
        
       $result=mysqli_query($conn, $query);
    
    $_SESSION['Username'] = $Username;
  	$_SESSION['success'] = "Register succcessfully";
  	header('location: checkout.php');
    
  
}

mysqli_close($conn);

?>