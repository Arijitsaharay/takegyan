<?php
session_start();
// print_r($_SESSION);
if (!empty($_SESSION))
{
    if($_SESSION['role']=='Mentor')
    {
        echo "<script>location.href='mentor-dashboard'</script>";
    }else{
        echo "<script>location.href='student-dashboard'</script>";
    }
}else{
    echo "<script>location.href='sign-in'</script>";
}
?>