<?php
include('connect.php');
session_start();
?>
</body>
</html>
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
                        <a href="adminhome.php"><li>BOOKINGS</li></a>
                        <a href="dritable.php"><li>DRIVERS</li></a>
                        <a href="rides.php"><li>HISTORY</li></a>
                        <a href="logout.php" onclick="confirmLogout()"><li>LOGOUT<li></a>

                    </ul>
                </ul>
            </div>
        </div>
        <br><br><br><br>
<table id="drivers">

<h1 id="booking-header">DRIVERS</h1>

  <tr>
    <th>id</th>
    <th>name</th>
    <th>address</th>
    <th>age</th>
    <th>phone</th>
    <th>email</th>
    
    

  </tr>
  <?php 
$select_dri="select * from driver ";
$execute_query=mysqli_query($connect,$select_dri);

while($row=mysqli_fetch_assoc($execute_query)){
    $id=$row['sno'];
    $name=$row['name'];
    $address=$row['address'];
    $age=$row['age'];
    $phone=$row['phone'];
    $email=$row['email'];
    
    echo "  <tr>
    <td>$id</td>
    <td>$name</td>
    <td>$address</td>
    <td>$age</td>
    <td>$phone</td>
    <td>$email</td>
   
     </tr>  ";
   
}
?>