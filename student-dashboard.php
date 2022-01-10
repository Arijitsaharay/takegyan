

<?php

include_once('header.php');
if ($_SESSION['role'] != 'Student') {
  echo "<script>location.href='index'</script>";
}

include_once("db.php");



if (isset($_POST['meetdel'])) {
  $result = deleteOneRow("query", "id", $_POST['meet_id']);
  if ($result) {
    echo "<script>alert('Query Deleted successfully !!')</script>";
    echo "<script>location.href='mentor-dashboard'</script>";
  } else {
    echo "<script>alert('Some Error Occured !!')</script>";
  }
}



if (isset($_POST['otp'])) {


  $remark = $_POST['remark'];
  $query_id = $_POST['id_query'];
  $otp = random_int(100000,999999);




  // print_r($_POST);
  // die();

  //echo "<script>alert($otp)</script>";


  // $sql = "UPDATE query set (`remark`,`otp`) VALUES( '" . $remark . "' ,'" . $otp . "')  WHERE id = '" . $query_id . "'";

$sql = "UPDATE query set `remark` = '$remark' , `otp` = '$otp' where `id`=$query_id" ;
  $sql = mysqli_query($conn, $sql);

  if ($sql) {
    echo "<script>alert('Token created successfully.')</script>";
    echo "<script>location.href='student-dashboard'</script>";
  } else {
    echo "<script>alert('Query not created.')</script>";
    //echo "<script>location.href='index'</script>";
  }
}




?>
<div class="bg-primary pt-10 pb-21"></div>
<div class="container-fluid mt-n22 px-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <!-- Page header -->
      <div>
        <div class="d-flex justify-content-between align-items-center">
          <div class="mb-2 mb-lg-0">
            <h3 class="mb-0  text-white">Student's Dashboard</h3>
          </div>
          <div>
            <a href="raise-query" class="btn btn-white">Raise A Query</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
      <!-- card -->
      <div class="card ">
        <!-- card body -->
        <div class="card-body">
          <!-- heading -->
          <div class="d-flex justify-content-between align-items-center
                    mb-3">
            <div>
              <h4 class="mb-0">Total Queries</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-stickies"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php echo countRows("query", "user_id", $_SESSION['id']) ?></h1>
            <!-- <p class="mb-0"><span class="text-dark me-2">2</span>Completed</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
      <!-- card -->
      <div class="card ">
        <!-- card body -->
        <div class="card-body">
          <!-- heading -->
          <div class="d-flex justify-content-between align-items-center
                    mb-3">
            <div>
              <h4 class="mb-0">Active Queries</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-lightbulb"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php echo countRows2("query", "user_id", $_SESSION['id'], "progress", "In-Progress") ?></h1>
            <!-- <p class="mb-0"><span class="text-dark me-2">28</span>Completed</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
      <!-- card -->
      <div class="card ">
        <!-- card body -->
        <div class="card-body">
          <!-- heading -->
          <div class="d-flex justify-content-between align-items-center
                    mb-3">
            <div>
              <h4 class="mb-0">Mentors</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-people fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php echo countRows("user", "role", "Mentor") ?></h1>
            <!-- <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p> -->
          </div>
        </div>
      </div>

    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
      <!-- card -->
      <div class="card ">
        <!-- card body -->
        <div class="card-body">
          <!-- heading -->
          <div class="d-flex justify-content-between align-items-center
                    mb-3">
            <div>
              <h4 class="mb-0">Completeness</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-bullseye fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php

                                $active = countRows2("query", "user_id", $_SESSION['id'], "progress", "In-Progress");
                                $total = countRows("query", "user_id", $_SESSION['id']);

                                if ($total != 0) {
                                  echo round(((($total - $active) / $total) * 100),2) . "%";
                                } else {
                                  echo ("N/A");
                                }


                                ?></h1>
            <!-- <p class="mb-0"><span class="text-success me-2">5%</span>Completed</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- row  -->
  <div class="row mt-6">
    <div class="col-md-12 col-12">
      <!-- card  -->
      <div class="card">
        <!-- card header  -->
        <div class="card-header bg-white  py-4">
          <h4 class="mb-0">Your Queries</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="table text-nowrap mb-0">
            <thead class="table-light">
              <tr>
                <th>Query Id</th>
                <th>Query Name</th>
                <th>Class</th>
                <th>Subject</th>
                <th>priority</th>
                <th>Timings</th>
                <th>Progress</th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>

              <?php
              global $conn;
              //For local
              $get_product = "SELECT * FROM query WHERE user_id = '".$_SESSION['id']."'";
              $run_products = mysqli_query($conn, $get_product);
              while ($row_product = mysqli_fetch_array($run_products)) {
                $color = colorcheck($row_product['priority']);
                $progress = colorcheck($row_product['progress']);
                echo "<tr>
                              <td class='align-middle'><div class=''>                            
                                  <div class='ms-3 lh-1'>
                                    <h5 class=' mb-1'> <a href='#'
                                        class='text-inherit'>" . $row_product['id'] . "</a></h5>
                                  </div>
                                </div></td>
                                <td class='align-middle'><div class=''>                            
                                  <div class=''>
                                    <h5 class=' mb-1'> <a href='#'
                                        class='text-inherit'>" . $row_product['queryname'] . "</a></h5>
                                  </div>
                                </div></td>
                              <td class='align-middle'>" . $row_product['class'] . "</td>
                              <td class='align-middle'>" . $row_product['subject'] . "</td>
                              <td class='align-middle'><span class='badge
                                  bg-$color'>" . $row_product['priority'] . "</span></td>
                              <td class='align-middle'> " . $row_product['date'] . ",<br> " . $row_product['starttime'] . " - " . $row_product['endtime'] . "</td>
                              <td class='align-middle'><span class='badge
                                  bg-$progress'>" . $row_product['progress'] . "</span></td>

                                  <td class='align-middle'><center><button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#delete" . $row_product['id'] . "'>Delete</button></center></td>
                            </tr>";



                            echo "<div class='modal fade' id='delete" . $row_product['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLongTitle'>Delete</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>×</span>
                                  </button>
                                </div>
                                <form action='' method='post' enctype='multipart/form-data'>
                                <div class='modal-body'>
                          
                                  Are you sure you want to delete this query?
                                  <input type='hidden' class='form-control' id='fullName' name='meet_id' value='" . $row_product['id'] . "' required=''>
                                  
                                </div>
                                <div class='modal-footer'>
                                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                  <a href='#'><button type='submit' class='btn btn-danger' name='meetdel'>Yes</button></a>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div>";

              }
              ?>

            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
  <!-- row  -->
  <div class="row my-6">
    <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
      <!-- card  -->
      <div class="card h-100">
        <!-- card body  -->
        <div class="card-body">
          <div class="d-flex align-items-center
                    justify-content-between">
            <div>
              <h4 class="mb-0">Tasks Performance </h4>
            </div>
            <!-- dropdown  -->
            <!-- <div class="dropdown dropstart">
                      <a class="text-muted text-primary-hover" href="#"
                        role="button" id="dropdownTask" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="icon-xxs" data-feather="more-vertical"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownTask">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div> -->
          </div>
          <!-- chart  -->
          <div class="mb-8">
            <div id="perfomanceChart"></div>
          </div>
          <!-- icon with content  -->
          <div class="d-flex align-items-center justify-content-around">
            <div class="text-center">
              <i class="icon-sm text-success" data-feather="check-circle"></i>
              <h1 class="mt-3  mb-1 fw-bold">40%</h1>
              <p>All Tasks</p>
            </div>
            <div class="text-center">
              <i class="icon-sm text-warning" data-feather="trending-up"></i>
              <h1 class="mt-3  mb-1 fw-bold">29%</h1>
              <p>Completed</p>
            </div>
            <div class="text-center">
              <i class="icon-sm text-danger" data-feather="trending-up"></i>
              <h1 class="mt-3  mb-1 fw-bold">31%</h1>
              <p>In-Progress</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card  -->
    <div class="col-xl-8 col-lg-12 col-md-12 col-12">
      <div class="card h-100">
        <!-- card header  -->
        <div class="card-header bg-white py-4">
          <h4 class="mb-0">Upcoming Meetings</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead class="table-light">
              <tr>
                <th>Query Id</th>
                <th>Teacher's Name</th>
                <th>Meeting Timings</th>
                <th>Meeting Link</th>
                <th>Token</th>
              </tr>
            </thead>
            <tbody>
              <?php

              global $conn;
              //For local
              $get_product = "SELECT * FROM meet WHERE student_user_id = '".$_SESSION['id']."'";
              $run_products = mysqli_query($conn, $get_product);


              


              while ($row_product = mysqli_fetch_array($run_products)) {
                $sql = mysqli_query($conn, "SELECT * FROM user where id='" . $row_product['mentor_user_id'] . "'");
                $row  = mysqli_fetch_array($sql);


                $meeting = "SELECT * from query where id = ".$row_product['query_id']."";
                $meeting = mysqli_query($conn,$meeting);
  
                $meeting = mysqli_fetch_array($meeting);
  
                echo "<tr>
                              <td class='align-middle'><div class=''>                            
                                  <div class='ms-3 lh-1'>
                                    <h5 class=' mb-1'> <a href='#'
                                        class='text-inherit'>" . $row_product['query_id'] . "</a></h5>
                                  </div>
                                </div></td>
                              <td class=''>
                                  <div class=''>
                                    <h5 class=' mb-1'>" . $row['name'] . "</h5>
                                    <p class='mb-0'>" . $row['email'] . "</p>
                                  </div>
                              
                              </td>
                              <td class='align-middle'> " . $row_product['date'] . ",<br> " . $row_product['starttime'] . " - " . $row_product['endtime'] . "</td>
                              <td class='align-middle'><a href='https://meet.google.com/" . $row_product['link'] . "' target='_blank'>" . $row_product['link'] . "</a></td>";
                             
                              // print_r($meeting);
                              if($meeting['otp'] != 0)
                              {echo "<td><b>" .$meeting['otp']. "</b></td></tr>";}
                              else{
                              echo"<td class='align-middle'><button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#otp". $row_product['query_id'] ."'>Generate Token</button>&nbsp;&nbsp;</td>
                            </tr>";}
                  echo "<div class='modal fade' id='otp". $row_product['query_id'] ."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLongTitle'><b>Feedback</b></h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>×</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                
                        <form action='' method='post' enctype='multipart/form-data'>
                
                
                          
                          <input type='text' id='query' name='id_query' value='". $row_product['query_id'] ."' hidden><br>
                
                
                
                    
                          <b><label for='remark'>How was the session? </label><br>
                          <input type='radio' id='remark' name='remark' value='1' required>
                          <label for='poor'>&nbsp;Poor</label> <br>
                          <input type='radio' id='remark' name='remark' value='2' required>
                          <label for='poor'> &nbsp;Average</label> <br>
                          <input type='radio' id='remark' name='remark' value='3' required>
                          <label for='average'> &nbsp;Good</label> <br>
                          <input type='radio' id='remark' name='remark' value='4' required>
                          <label for='good'> &nbsp;Very Good</label> <br>
                          <input type='radio' id='remark' name='remark' value='5' required>
                          <label for='excellent'> &nbsp;Excellent</label></b>
                
                          <br>
                          <br>
                
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                          <button type='submit' class='btn btn-primary' name='otp'>Generate Token</button>
                
                        </form>
                
                
                      </div>
                      
                    </div>
                  </div>
                </div>";
              }
              ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- OTP Modal -->
<!-- <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Generate Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="" method="post" enctype="multipart/form-data">


          <label for="query">Query Id</label><br>
          <input type="text" id="query" name="query_id" value="1" disabled><br>



          <br>
          <label for="remark">How was the session? </label><br>
          <input type="radio" id="remark" name="remark" value="1">
          <label for="poor">Poor</label>&nbsp;
          <input type="radio" id="remark" name="remark" value="2">
          <label for="poor">Average</label>&nbsp;
          <input type="radio" id="remark" name="remark" value="3">
          <label for="average">Good</label>&nbsp;
          <input type="radio" id="remark" name="remark" value="4">
          <label for="good">Very Good</label>&nbsp;
          <input type="radio" id="remark" name="remark" value="5">
          <label for="excellent">Excellent</label>&nbsp;

          <br>
          <br>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="otp">Generate Token</button>

        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="student-dashboard.php"><button type="button" class="btn btn-primary" name="otp">Generate Token</button></a>
      </div> 
    </div>
  </div>
</div> -->


<?php include_once('footer.php'); ?>