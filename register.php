<?php
$servername="localhost";
$username="root";
$password="";
$dbname="assignment";

//creating connection
$conn=new mysqli($servername,$username,$password,$dbname);

//checking connection
if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}
else
{
    $Username=$_POST["username"];
    $FirstName=$_POST["firstname"];
    $LastName=$_POST["lastname"];
    $Email=$_POST["email"];
    $Gender=$_POST["gender"];
    $Address=$_POST["address"];
    $DOB=$_POST["date"];
    $Contact=$_POST["contact"];
    $Password=$_POST["password"];
    $ConfirmPassword=$_POST["cpassword"];

    $query="INSERT INTO user(Username,FirstName, LastName, Email, Gender, Address, DOB, Contact, Password, ConfirmPassword) values ('".$Username."','".$FirstName."','".$LastName."','".$Email."','".$Gender."','".$Address."','".$DOB."','".$Contact."','".$Password."','".$ConfirmPassword."')";



    $result=mysqli_query($conn, $query);

    $_SESSION['Username'] = $Username;
  	$_SESSION['success'] = "Register succcessfully";
  	header('location: login.php');
  

mysqli_close($conn);

?>
