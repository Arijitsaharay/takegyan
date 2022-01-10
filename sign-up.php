<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logos/icon.png">

  <!-- Libs CSS -->


  <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet">
  <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">



  <!-- Theme CSS -->
  <link rel="stylesheet" href="assets/css/theme.min.css">
  <title>TakeGyan</title>
</head>

<body class="bg-light">
  <!-- container -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              <a href="../index.html"><img src="assets/images/logos/logo.png" class="mb-2" alt="" height="40"></a>
              <p class="mb-6">Please enter your user information.</p>

            </div>
            <!-- Form -->
            <form action="register.php" method="post" enctype="multipart/form-data">
              <!-- Username -->
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="username" class="form-control" name="name" placeholder="Full Name" required="">
              </div>
              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required="">
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" minlength="6" placeholder="Password (Min 6 characters)"  required="">
              </div>


              <!-- Type -->
              <div class="mb-3">
              <label for="role" class="form-label">Role: </label>  
              <br>
              <input type="radio" id="role" name="role" value="Student" required="">
                <label for="role">Student</label>
              <input type="radio" id="role" name="role" value="Mentor">
                <label for="role">Mentor</label>
              </div>




              <!-- Checkbox -->
              <!-- <div class="mb-3">
                <div class="form-check custom-checkbox">
                  <input type="checkbox" class="form-check-input" id="agreeCheck">
                  <label class="form-check-label" for="agreeCheck"><span class="fs-5">I agree to the <a href="terms-condition-page.html">Terms of
                        Service </a>and
                      <a href="terms-condition-page.html">Privacy Policy.</a></span></label>
                </div>
              </div> -->
              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button type="submit" name="save" class="btn btn-primary">
                    Create Account
                  </button>
                </div>

                <div class="d-md-flex justify-content-between mt-4">
                  <div class="mb-2 mb-md-0">
                    <a href="sign-in" class="fs-5">Already
                      member? Sign In </a>
                  </div>
                  <!-- <div>
                    <a href="forget-password.html" class="text-inherit
                        fs-5">Forgot your password?</a>
                  </div> -->

                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="assets/libs/prismjs/prism.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
  <script src="assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
  <script src="assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>




  <!-- Theme JS -->
  <script src="assets/js/theme.min.js"></script>
</body>



</html>