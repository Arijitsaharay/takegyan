<?php
extract($_POST);
include_once("db.php");
$email=$_POST['email'];
$sql=mysqli_query($conn,"SELECT * FROM user where email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo '<script>alert("Email Id Already Exists")</script>';
	echo "<script>location.href='sign-up'</script>";
}
else
if(isset($_POST['save']))
{
    $hashed_password=base64_encode($_POST['password']);
    $sql = "INSERT INTO user (`name`,`email`,`password`,`role`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $hashed_password . "','" . $_POST['role'] . "')";
     
        $sql=mysqli_query($conn,$sql)or die("Could Not Perform the Query");
        session_start();
        $_SESSION["email"]=$_POST['email'];
        $_SESSION["name"]=$_POST['name'];
        $_SESSION["role"]=$_POST['role'];
        echo '<script>alert("Signed-Up Successfully!!")</script>';
	    echo "<script>location.href='index'</script>";
    }
    else 
    {
        echo '<script>alert("Error.Please try again")</script>';
	    echo "<script>location.href='sign-up'</script>";
	}

?>