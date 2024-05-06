<?php
include('connect.php');
session_start();
?>
<html>
<head>
  <title>Logout Confirmation</title>
  <script>
    function confirmLogout() {
      var result = confirm("Are you sure you want to log out?");
      if (result) {
        // User confirmed, redirect to logout page
        window.location.href = "logout.php"; // Replace with the correct URL for your logout page
      }else {
        // User cancelled, do nothing
        return false;
      }
    }
  </script>
</head>
<body>




</body>
</html>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>DRIVER HOME</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 1200px;
  max-width: 70%;
  margin: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<h1 >welcome driver:<?php 
if(isset($_SESSION['email'])){
    echo "{$_SESSION['email']}"; 
}
?> </h1>
<h2 class="heading">HOME PAGE</h2>
<body>
    <div class="container">
        <div class="navigation-bar">
            <div class="navigation">
                <ul class="navigation-list">
                    <ul class="user-panel-list">
                        <a href="#bookings"><li>PENDING BOOKINGS</li></a>
                        <a href="drischedule.php"><li>SCHEDULE</li></a>
                        <!-- <a href="profile.php"><li>PROFILE</li></a> -->
                        <a href="logout.php" onclick="confirmLogout()">LOGOUT</a>

                    </ul>
                </ul>
            </div>
        </div>
        <br><br><br><br>

<table id="bookings">

<h1>PENDING BOOKINGS</h1>
  <tr>
    <th>username</th>
    <th>email</th>
    <th>contact</th>
    <th>service</th>
    <th>datetime</th>
    <th>hours</th>  
    <th>status</th>
    <th>update</th>

  </tr>
  <?php 
$select_driver="select name from driver where email='{$_SESSION['email']}'";
$execute_query=mysqli_query($connect,$select_driver);
if(mysqli_num_rows($execute_query)>0){
    $driver_name=mysqli_fetch_assoc($execute_query)['name'];

$select_bookings="select * from booking where driver='$driver_name'";
$execute_query=mysqli_query($connect,$select_bookings);

while($row=mysqli_fetch_assoc($execute_query)){
    $booking_id=$row['sno'];
    $username=$row['username'];
    $umail=$row['email'];
    $contact=$row['contact'];
    $service=$row['service'];
    $datetime=$row['datetime'];
    $hrs=$row['hrs'];
    echo "  <tr>
    <td>$username</td>
    <td>$umail</td>
    <td>$contact</td>
    <td>$service</td>
    <td>$datetime</td>
    <td>$hrs</td>
    <td>
    <form method='post'>
    <input type='text' name='booking_id' value=$booking_id style='display:none'>
    <select id='status' name='status' required>
        <option value=''>--Select--</option>
        <option value='accepted'>accept</option>
        <option value='rejected'>reject</option>
    </select>
   </td>
   <td><input type='submit' style='background-color:blue;padding:8px;color:white' name='update' value='Update'></td>
   </form>
     </tr>  ";
   
}
} 
if(isset($_POST['update'])){
  $select_booking="select * from booking where sno={$_POST['booking_id']}";
  $result=mysqli_query($connect,$select_booking);

    if(mysqli_num_rows($result)>0){
      $row=mysqli_fetch_assoc($result);

      if(isset($_SESSION['email'])){
      $dmail=$_SESSION['email']; 
    }

    $booking_id=$row['sno'];
    $username=$row['username'];
    $umail=$row['email'];
    $contact=$row['contact'];
    $service=$row['service'];
    $datetime=$row['datetime'];
    $hrs=$row['hrs'];
    $status=$_POST['status'];

  $insert_ride="insert into ride(username,email,contact,service,driver,datetime,hours,status) values('$username','$umail','$contact','$service','$dmail','$datetime',$hrs,'$status')";
  $execute=mysqli_query($connect,$insert_ride);

  $delete_query="delete from booking where sno={$_POST['booking_id']}";
  $exec_query=mysqli_query($connect,$delete_query);
    }
}
?>

