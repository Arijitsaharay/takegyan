<?php 
include_once('header.php'); 
include_once("db.php");
if(isset($_POST['save']))
{ 
$user_id = $_SESSION['id'];
$queryname=$_POST['queryname'];
$subject=$_POST['subject'];
$class=$_POST['class'];
$message=$_POST['message'];

$dt=$_POST['date'];
$theDate = new DateTime($dt);
$date=date_format($theDate,"d-m-Y"); 

$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$priority=$_POST['priority'];
$progress = "In-Progress";


    $sql = "INSERT INTO query (`user_id`,`queryname`,`subject`,`class`,`message`,`date`,`starttime`,`endtime`,`priority`,`progress`) 
            VALUES ('" . $user_id. "',
            '" . $queryname . "',
            '" . $subject . "',
            '" . $class . "',
            '" . $message . "',
            '" . $date . "',
            '" . $starttime . "',
            '" . $endtime . "',
            '" . $priority . "',
            '" . $progress . "'
            )";
     
        $sql=mysqli_query($conn,$sql);

        if($sql )
        {
          echo "<script>alert('Query created successfully.')</script>";
          echo "<script>location.href='student-dashboard'</script>";
        }
        else
        {
          echo "<script>alert('Query not created.')</script>";
          //echo "<script>location.href='index'</script>";
        }
}
?>
<!-- Container fluid -->
<div class="container-fluid p-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <!-- Page header -->

      <div class="border-bottom pb-4 mb-4">
        <h3 class="mb-0 fw-bold">Raise A Query</h3>

      </div>
      <div class="row mb-8">
        <!-- <div class="col-xl-3 col-lg-4 col-md-12 col-12">
            <div class="mb-4 mb-lg-0">
              <h4 class="mb-1">Preferences</h4>
              <p class="mb-0 fs-5 text-muted">Configure your preferences </p>
            </div>

          </div> -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="card" id="preferences">
            <div class="card-body">
              <div class="mb-6">
                <h4 class="mb-1">Preferences</h4>

              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <!-- row -->
                <div class="mb-3 row">
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">Query Name</label>
                  <div class="col-md-8 col-12">
                    <input type="text" autocomplete="off" name="queryname" class="form-control" id="message" required="" placeholder="Enter query name">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">About Query</label>
                  <div class="col-md-8 col-12">
                    <textarea type="text" name="message" class="form-control" id="message" required="" style="height:80px"></textarea>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="subject" class="col-sm-4 col-form-label
                        form-label">Subject And Class</label>

                  <div class="col-xl-4 col-md-8 mb-4">
                    <label for="dailyDigest" class="form-label">Subject</label>
                    <select class="form-select" id="subject" name="subject">
                    <option selected>Choose One</option>
                    <option value='English'>English</option>
                    <option value="Mathemetics">Mathemetics</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Economics">Economics</option>
                    <option value="Accountancy">Accountancy</option>
                    <option value="BusinessStudies">Business Studies</option>
                    <option value="History">History</option>
                    <option value="Geography">Geography</option>
                    <option value="Psychology">Psychology</option>
                    <option value="Political Science">Political Science</option>
                    <option value="Environmental Science">Environmental Science</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Bengali">Bengali</option>
                    </select>
                  </div>

                  <div class="col-xl-4 col-md-8 mb-4">
                    <label for="dailyDigest" class="form-label">Class</label>
                    <select class="form-select" id="class" name="class">
                      <option selected>Choose One</option>
                      <option value="Class XII">Class XII</option>
                      <option value="Class XI">Class XI</option>
                      <option value="Class X">Class X</option>
                      <option value="Class IX">Class IX</option>
                      <option value="Class VIII">Class VIII</option>
                      <option value="Class VII">Class VII</option>
                      <option value="Class VI">Class VI</option>
                      <option value="Class V">Class V</option>
                      <option value="Class IV">Class IV</option>
                      <option value="Class III">Class III</option>
                      <option value="Class II">Class II</option>
                      <option value="Class I">Class I</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-4 col-md-6 mb-3">
                    <label for="notification" class="form-label">Date and Time</label>

                  </div>
                  <div class="col-xl-2 col-md-4 mb-3">
                    <label for="dailyDigest" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required="">
                  </div>
                  <div class="col-xl-3 col-md-6 mb-3">
                    <label for="dailyDigest" class="form-label">Start Time</label>
                    <select class="form-select" name="starttime" id="starttime">
                      <?php
                      $tNow = strtotime('00:00');
                      $end_time = strtotime('23:59');
                      while ($tNow <= $end_time) {
                        $optionvalue = date("H:i", $tNow);
                        echo '<option value="' . $optionvalue
                          . '">' . $optionvalue . '</option>';
                        $tNow = strtotime('+15 minutes', $tNow);
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-3">
                    <label for="dailyDigest" class="form-label">End Time</label>
                    <select class="form-select" id="endtime" name="endtime">
                      <?php
                      $tNow = strtotime('00:30');
                      $end_time = strtotime('23:59');
                      while ($tNow <= $end_time) {
                        $optionvalue = date("H:i", $tNow);
                        echo '<option value="' . $optionvalue
                          . '">' . $optionvalue . '</option>';
                        $tNow = strtotime('+15 minutes', $tNow);
                      }
                      ?>
                    </select>
                  </div>

                </div>
                <br>
                <!-- row -->
                <div class="mb-3 row">
                  <label class="col-sm-4 col-form-label form-label">Priority</label>
                  <div class="col-md-8 col-12">
                    <div class="form-check custom-radio
                          form-check-inline">
                      <input type="radio" id="customRadioInlineOn" name="priority" class="form-check-input" value="High">
                      <label class="form-check-label" for="customRadioInlineOn" name="priority">High</label>
                    </div>
                    <div class="form-check custom-radio
                          form-check-inline">
                      <input type="radio" id="customRadioInlineOff" name="priority" class="form-check-input" value="Medium">
                      <label class="form-check-label" for="customRadioInlineOff">Medium</label>
                    </div>
                    <div class="form-check custom-radio
                          form-check-inline">
                      <input type="radio" id="customRadioInlineOff" name="priority" class="form-check-input" value="Low">
                      <label class="form-check-label" for="customRadioInlineOff">Low</label>
                    </div>
                  </div>
                </div>
                <!-- row -->
                <div class="mb-3 row">

                  <div class="offset-md-4 col-md-8 col-12 mt-2">
                    <button class="btn btn-primary" name="save">Save
                      Changes</button>
                  </div>
                </div>


              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include_once('footer.php'); ?>