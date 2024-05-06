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
    <title>ADMIN HOME</title>

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

#booking-header {
  text-align: center;
}

</style>
<h1 >welcome admin:<?php 
if(isset($_SESSION['email'])){
    echo "{$_SESSION['email']}"; 
}
?> </h1>
<h2 class="heading">ADMIN HOME PAGE</h2>
<body>
    <div class="container">
        <div class="navigation-bar">
            <div class="navigation">
                <ul class="navigation-list">
                    <ul class="user-panel-list">
                        <a href="bookings.php"><li>BOOKINGS</li></a>
                        <a href="dritable.php"><li>DRIVERS</li></a>
                        <a href="history.php"><li>SCHEDULE</li></a>
                        <a href="logout.php" onclick="confirmLogout()"><li>LOGOUT<li></a>

                    </ul>
                </ul>
            </div>
        </div>
        <br><br><br><br>
        <table id="bookings">

<h1 id="booking-header">SCHEDULED RIDES</h1>

  <tr>
    <th>id</th>
    <th>username</th>
    <th>email</th>
    <th>contact</th>
    <th>service</th>
    <th>driver</th>
    <th>datetime</th>
    <th>hours</th>  
    <th>status</th>
    

  </tr>
  <?php 
// $select_driver="select name from driver where email='{$_SESSION['email']}'";
// $execute_query=mysqli_query($connect,$select_driver);
// if(mysqli_num_rows($execute_query)>0){
    
$select_bookings="select * from ride ";
$execute_query=mysqli_query($connect,$select_bookings);

while($row=mysqli_fetch_assoc($execute_query)){
    $id=$row['id'];
    $username=$row['username'];
    $umail=$row['email'];
    $contact=$row['contact'];
    $service=$row['service'];
    $driver=$row['driver'];
    $datetime=$row['datetime'];
    $hrs=$row['hours'];
    $status=$row['status'];
    echo "  <tr>
    <td>$id</td>
    <td>$username</td>
    <td>$umail</td>
    <td>$contact</td>
    <td>$service</td>
    <td>$driver</td>
    <td>$datetime</td>
    <td>$hrs</td>
    <td>$status</td>
   
     </tr>  ";
   
}
?>





