<script src="https://apis.google.com/js/api.js"></script>
<script>
  /**
   * Sample JavaScript code for calendar.events.insert
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://www.googleapis.com/auth/calendar https://www.googleapis.com/auth/calendar.events"})
        .then(function() { console.log("Sign-in successful"); },
              function(err) { console.error("Error signing in", err); });
    
  }
  function loadClient() {
    gapi.client.setApiKey("AIzaSyAoBPtmtfcGGSdHdpzcCNj5-z2E9B4MGe8");
    return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/calendar/v3/rest")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded and sign-in is complete before calling this method.
  function execute() {
    var date = document.getElementById("date").value;
    var starttime=document.getElementById("starttime").value;
    var endtime=document.getElementById("endtime").value;
    var summary=document.getElementById("queryname").value;
    summary='TakeGyan Meeting || '+summary;
    var date = date.split('-');
    var startdate = date[2] +'-'+ date[1] +'-'+ date[0] + "T" + starttime+":00";
    var enddate = date[2] +'-'+ date[1] +'-'+ date[0] + "T" + endtime+":00";


    return gapi.client.calendar.events.insert({
            "calendarId": "primary",
            "conferenceDataVersion": 1,
            "resource": {
                "end": {
                'dateTime': enddate,
                'timeZone': 'Asia/Kolkata'
                },
                "start": {
                'dateTime': startdate,
                'timeZone': 'Asia/Kolkata'
                },
                "conferenceData": {
                "createRequest": {
                    "conferenceSolutionKey": {
                    "type": "hangoutsMeet"
                    },
                    "requestId": "gys-dadq-fsuz"
                }
                },
                "summary": summary
            }
            })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                var link=response['result']['conferenceData']['conferenceId'];
                // console.log(link);
                document.getElementById("meet_link").setAttribute('value', link);
                document.getElementById("meet_url").setAttribute('value', link);
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: "528241827771-edbqpg204t3ti7cdou2sri4koq8pak9u.apps.googleusercontent.com"});
  });
</script>
<script>
  function burst()
  {
    document.getElementById("authorize").click();
  }
</script>
<?php 
include_once('header.php'); 
include_once("db.php");
$query_id=$_GET['query_id'];
global $conn;
$sql=mysqli_query($conn,"SELECT * FROM query where id='".$query_id."'");
$row  = mysqli_fetch_array($sql);
$student_user_id=$row['user_id'];
$date=$row['date'];
$mentor_user_id=$_SESSION['id'];

$sql=mysqli_query($conn,"SELECT * FROM user where id='".$student_user_id."'");
$data  = mysqli_fetch_array($sql);


if(isset($_POST['save']))
{
 
// $student_user_id = $_POST['student_user_id'];
// $mentor_user_id = $_POST['mentor_user_id'];
// $query_id = $_POST['query_id'];
$dt=$date;
$theDate = new DateTime($dt);
$date=date_format($theDate,"d-m-Y"); 
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime'];
$meet_link=$_POST['meet_link'];

if ($_POST['meet_link']=="")
{
  echo '<script>alert("Please generate meet link first!!")</script>';
  echo "<script>location.href='meet?query_id=$query_id'</script>";
}else{

    $sql = "INSERT INTO meet (`mentor_user_id`,`student_user_id`,`query_id`,`date`,`starttime`,`endtime`,`link`) 
            VALUES ('" . $mentor_user_id. "',
            '" . $student_user_id . "',
            '" . $query_id . "',
            '" . $date . "',
            '" . $starttime . "',
            '" . $endtime . "',
            '" . $meet_link . "'
            )";
     
        $sql=mysqli_query($conn,$sql);

        if($sql)
        {
          echo "<script>alert('Meeting created successfully.')</script>";
          echo "<script>location.href='mentor-dashboard'</script>";
        }
        else
        {
          echo "<script>alert('Meeting not created.')</script>";
          //echo "<script>location.href='index'</script>";
        }
    }
}


?>

<!-- Container fluid -->
<div class="container-fluid p-6">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-12">
      <!-- Page header -->

      <div class="border-bottom pb-4 mb-4">
        <h3 class="mb-0 fw-bold">Create A Meeting Link</h3>

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
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-6">
                <h4 class="mb-1">Create Schedule</h4>
              <button class="btn btn-primary col-md-2" name="save" style="float:right">Confirm</button>
              <br>
              <br>
              </div>

                <!-- row -->
                <div class="mb-3 row">
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">Query Name</label>
                  <div class="col-md-8 col-12">
                    <input type="text" autocomplete="off" class="form-control" id="queryname" required="" value="<?php echo $row['queryname'] ?>" disabled>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">Student's Name</label>
                  <div class="col-md-8 col-12">
                    <input type="text" autocomplete="off" class="form-control" id="student_user_id" required="" value="<?php echo $data['name'] ?>" disabled>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">Mentor's Name</label>
                  <div class="col-md-8 col-12">
                    <input type="text" autocomplete="off" name="mentor_user_id" class="form-control" id="mentor_user_id" required="" value="<?php echo $_SESSION['name'] ?>" disabled>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-xl-4 col-md-6 mb-3">
                    <label for="notification" class="form-label">Date and Time</label>

                  </div>
                  <div class="col-xl-2 col-md-4 mb-3">
                    <label for="dailyDigest" class="form-label">Date</label>
                    <input type="input" class="form-control" id="date" value="<?php echo $date ?>" disabled  required="">
                  </div>
                  <div class="col-xl-3 col-md-6 mb-3">
                    <label for="dailyDigest" class="form-label">Start Time</label>
                    <select class="form-select" name="starttime" id="starttime">
                      <?php
                      $tNow = strtotime($row['starttime']);
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
                      $tDate = strtotime('+15 minutes',strtotime($row['starttime']));
                      $optiondate = date("H:i", $tDate);
                      $tNow = strtotime($optiondate);
                      $end_time = strtotime($row['endtime']);
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
                  <label for="addressLine" class="col-sm-4 col-form-label
                          form-label">Meeting Id</label>
                  <div class="col-md-4 col-6">
                    <input type="hidden" autocomplete="off" name="meet_link" class="form-control" id="meet_link" value=""  placeholder="Enter meet link">
                    <input type="text" autocomplete="off" class="form-control"  id="meet_url" value=""  placeholder="Meeting Id will be shown here..." disabled>
                  </div>
              </form>

                                   
                </div>                  
          
                <button class="btn btn-primary" onclick="authenticate().then(loadClient).then(execute)" id="authorize" style="float:right; margin-top:-60px;margin-right:300px" >Get Link</button>

                <!-- row -->
                <div class="mb-3 row">

                  <div class="offset-md-4 col-md-8 col-12 mt-2">
                    <!-- <button class="btn btn-primary" name="save">Create Meet</button> -->
                  </div>
                </div>


            </div>
          </div>
        </div>
      </div>

<!-- <button class="btn btn-primary" onclick="authenticate().then(loadClient).then(execute)" id="authorize">authorize and load</button> -->
<!-- <button onclick="execute()">execute</button> -->

<?php include_once('footer.php'); ?>