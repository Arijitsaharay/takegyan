<?php session_start(); 
if (empty($_SESSION))
{
    echo "<script>location.href='index'</script>";
}else{
  include_once('db.php');
  $email=$_SESSION['email'];
  $sql=mysqli_query($conn,"SELECT * FROM user where email='$email'");
  $row  = mysqli_fetch_array($sql);
  $_SESSION['id']=$row['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

  

<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" href="assets/css/style.css">
<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logos/icon.png">

<!-- Libs CSS -->


<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="assets/libs/dropzone/dist/dropzone.css"  rel="stylesheet">
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">






<!-- Theme CSS -->
<link rel="stylesheet" href="assets/css/theme.min.css">
    <title>TakeGyan</title>
  </head>

  <body class="bg-light">
   
  <nav class="navbar-classic navbar navbar-expand-lg">
    
    <div class="ms-lg-3 d-lg-block">
      <!-- Form -->
    
      <a href="index"><img src="assets/images/logos/logo.png" alt="Website Logo" width="230" height="60"></a>
    </div>
    <!--Navbar nav -->
    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
     
      <!-- List -->
      <li class="dropdown ms-2">
        <a class="rounded-circle" href="#" role="button" id="dropdownUser"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md avatar-indicators avatar-online" style="margin-right:30px;">
            <img alt="avatar" src="assets/images/logos/stud-icon.jpg"
              class="rounded-circle" />
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownUser" style="margin-right:15px;">
          <div class="px-4 pb-0 pt-2">


            <div class="lh-1 ">
              <h5 class="mb-1"><?php echo $_SESSION['name'] ?></h5>
              <span href="#" class="text-inherit fs-6"><?php echo $_SESSION['email'] ?></span>
            </div>
            <div class=" dropdown-divider mt-3 mb-2"></div>
          </div>

          <ul class="list-unstyled">

           

            <li>
              <a class="dropdown-item text-primary" href="index">
                <i class="me-2 icon-xxs text-primary dropdown-item-icon"
                  data-feather="star"></i>Go To Home
              </a>
            </li>
            
            <li>
              <a class="dropdown-item" href="logout">
                <i class="me-2 icon-xxs dropdown-item-icon"
                  data-feather="power"></i>Sign Out
              </a>
            </li>
          </ul>

        </div>
      </li>
    </ul>
  </nav>
</div>
