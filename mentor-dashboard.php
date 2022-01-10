<?php include_once('header.php');
if ($_SESSION['role'] != 'Mentor') {
  echo "<script>location.href='index'</script>";
}

if (isset($_POST['meetdel'])) {
  $result = deleteOneRow("meet", "id", $_POST['meet_id']);
  if ($result) {
    echo "<script>alert('Meeting Deleted successfully !!')</script>";
    echo "<script>location.href='mentor-dashboard'</script>";
  } else {
    echo "<script>alert('Some Error Occured !!')</script>";
  }
}


if (isset($_POST['confirm'])) {
  $query_id = $_POST['query_id'];
  $meet_id = $_POST['meet_id'];
  $token = $_POST['token'];
  $sql = mysqli_query($conn, "SELECT otp FROM query where id ='" . $query_id . "'");
  $row  = mysqli_fetch_array($sql);
  if($row['otp'] == $token)
  {
    $sql = "UPDATE query set `progress` = 'Completed' where `id` = '$query_id'" ;
    $sql = mysqli_query($conn, $sql);
  
  if ($sql) {
    $sql1 = "UPDATE meet set `tag` = 'Completed' where `id` = '$meet_id'" ;
    $sql1 = mysqli_query($conn, $sql1);
    if($sql1)
    {
    echo "<script>alert('Meeting Completed Successfully .')</script>";
    }else{
    echo "<script>alert('Some error occured.')</script>";
    }
  } else {
    echo "<script>alert('Some error occured.')</script>";
  }
  echo "<script>location.href='mentor-dashboard'</script>";
  }
  else{
    
    echo "<script>alert('Wrong Token')</script>";
    echo "<script>location.href='mentor-dashboard'</script>";
    
  }
  die();
  print_r($row['']);
  die();
  if ($result) {
    echo "<script>alert('Meeting Deleted successfully !!')</script>";
    echo "<script>location.href='mentor-dashboard'</script>";
  } else {
    echo "<script>alert('Some Error Occured !!')</script>";
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
            <h3 class="mb-0  text-white">Mentor's Dashboard</h3>
          </div>
          <!-- <div>
                    <a href="raise-query" class="btn btn-white">Raise A Query</a>
                  </div> -->
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
              <i class="bi bi-lightbulb fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php echo countRows("query", "progress","In-Progress") ?></h1>
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
              <h4 class="mb-0">Active Meetings</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-camera-video fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold"><?php echo countRows("meet", "tag","In-Progress") ?></h1>
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
              <h4 class="mb-0">Ratings (Out Of 5)</h4>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
              <i class="bi bi-award fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="fw-bold">
              <?php
                  $get_product = mysqli_query($conn, "SELECT AVG(q.remark) as remarks FROM meet as m INNER JOIN query as q where m.query_id = q.id  and mentor_user_id ='" . $_SESSION['id'] . "'");
               
              $row_product = mysqli_fetch_array($get_product);
              echo round($row_product['remarks'],1)."⭐";
                ?>
                
          
            </h1>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              global $conn;
              //For local
              $get_product = "SELECT * FROM query";
              $run_products = mysqli_query($conn, $get_product);
              while ($row_product = mysqli_fetch_array($run_products)) {
                $color = colorcheck($row_product['priority']);
                $progress = colorcheck($row_product['progress']);
                $meetcount = countRows("meet", "query_id", $row_product['id']);
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
                                  bg-$progress'>" . $row_product['progress'] . "</span></td>";

                if ($meetcount == 1) {
                  echo " <td class='align-middle'><b style='color:'>Scheduled</b></td>";
                } else {
                  echo  "<td class='align-middle'><button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#val" . $row_product['id'] . "'>View</button></td>";
                }

                echo "</tr>";

                $sql = mysqli_query($conn, "SELECT * FROM user where id='" . $row_product['user_id'] . "'");
                $row  = mysqli_fetch_array($sql);

                echo "<!-- Modal --><div class='modal fade' id='val" . $row_product['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLongTitle'>Query Details</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>×</span>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                  
                                  <b>Student Name:</b>  " . $row['name'] . "<br>
                                  <b>Email Id:</b>  " . $row['email'] . "<br>
                                  <b>Priority:</b> " . $row_product['priority'] . " <br> 
                                  <b>Query Message: </b> " . $row_product['message'] . " <br>                          
                                </div>
                                <div class='modal-footer'>
                                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>   
                                  <a href='meet?query_id=" . $row_product['id'] . "'><button type='button' class='btn btn-primary' >Generate Link</button></a>
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
  <!-- row  -->
  <div class="row my-6">

    <!-- card  -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
      <div class="card h-100">
        <!-- card header  -->
        <div class="card-header bg-white py-4">
          <h4 class="mb-0">Your Upcoming Meetings</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead class="table-light">
              <tr>
                <th>Query Id</th>
                <th>Student's Name</th>
                <th>Meeting Timings</th>
                <th>Meeting Link</th>
                <th>
                  <center>Action</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

              global $conn;
              //For local
              $get_product = "SELECT * FROM meet WHERE mentor_user_id = '".$_SESSION['id']."'";
              $run_products = mysqli_query($conn, $get_product);
              while ($row_product = mysqli_fetch_array($run_products)) {
                $sql = mysqli_query($conn, "SELECT * FROM user where id='" . $row_product['student_user_id'] . "'");
                $row  = mysqli_fetch_array($sql);
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
                
                $sql = mysqli_query($conn, "SELECT * FROM query where id='" . $row_product['query_id'] . "'");
                $queryrow  = mysqli_fetch_array($sql);
               
                if($queryrow['progress']=="Completed")
                {
                  echo " <td class='align-middle'><center><b style='color:green'>Meeting Completed</b></center></td>";
                }else{
                  echo "<td class='align-middle'><center><button type='button' class='btn btn-outline-info' data-toggle='modal' data-target='#edit" . $row_product['id'] . "'>End Meeting</button>&nbsp;&nbsp;<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#delete" . $row_product['id'] . "'>Delete</button></center></td>";
                }
                                             
                echo "</tr>";


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
                          
                                  Are you sure you want to delete this meeting?
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

                echo "<div class='modal fade' id='edit" . $row_product['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLongTitle'>Verify Meeting</h5>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                      </button>
                    </div>
                    <div class='modal-body'>
              
                      <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                        <div class='card' id='preferences'>
                          <div class='card-body'>
                            <div class='mb-6'>
                              <b>
                                <h4 class='mb-1'></h4>
                              </b>
                              <h5>Please ask for the Token from the student in the meeting</h5>
                            </div>
                            <form action='' method='post' enctype='multipart/form-data'>                     
                              <div class='row'>
                                <div class='col-xl-12 col-md-12 mb-3'>
                                  <input type='hidden' class='form-control' id='query_id' name='query_id' value='" . $row_product['query_id'] . "'>
                                  <input type='hidden' class='form-control' id='query_id' name='meet_id' value='" . $row_product['id'] . "'>
                                  <input type='number' class='form-control' id='token' name='token' required='' maxlength='6' placeholder='Enter Your Token'>
                                </div>
                              </div>
                              <br>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='modal-footer'>
                      <button class='btn btn-success' type='submit' name='confirm'>Confirm</button>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
                    </form>
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
<?php include_once('footer.php'); ?>