<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'db.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql=mysqli_query($conn,"SELECT * FROM user where email='$email'");
    $row  = mysqli_fetch_array($sql);

    if(is_array($row) && ($password==base64_decode($row['password'])))
    {
        $_SESSION["email"]=$row['email'];
        $_SESSION["name"]=$row['name'];
        $_SESSION["role"]=$row['role'];
        echo '<script>alert("Signed-In Successfully!!")</script>';
	    echo "<script>location.href='index'</script>";
    }
    else
    {
        echo '<script>alert("Invalid Email ID/Password")</script>';
	    echo "<script>location.href='sign-in'</script>";
    }
}
?>