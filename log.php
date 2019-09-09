
<?php
include 'connection.php';

?>
<?php
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $query="select * from user where Username = '$Username' && Password='$Password'";
    $result=mysqli_query($conn,$query);

  $row1 = mysqli_fetch_assoc($result);
session_start();
	if(mysqli_num_rows($result) > 0)
    {
        $_SESSION["Username"]= $row1["Username"];

        header("Location: index.php");

    }else
    {
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='login.php'>LOGIN</a></div>";
    }



?>
