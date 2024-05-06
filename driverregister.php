<?php 
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GetYourDriver</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
.form{
    max-width: 600px;
    margin: auto;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button{
  opacity: 0;
}
/* Full-width input fields */
input[type=text], input[type=password] ,input[type=number]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #c4ced4;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form method="post" style="border:1px solid #ccc" class="form">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <a href="login.php">already registered ? login </a>
    <hr>
    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter your name" name="name" required>

    <label for="Address"><b>Address</b></label>
    <input type="text" placeholder="Enter your Address" name="address" required>

    <label for="Age"><b>Age</b></label>
    <input type="text" placeholder="Enter age" name="age" required>

    <label for="Phone number"><b>Phone</b></label>
    <input type="number"  name="phone_number" max="9999999999" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <!-- <a href="driverregister.html"></a> -->
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" name="register" class="signupbtn">Sign Up</button>
      <a href="login.php">already registered ? login </a>
    </div>
    
  </div>
  
</form>
<?php

       if(isset($_POST['register'])){
          
          $name=$_POST['name'];
          $address=$_POST['address'];
          $age=$_POST['age'];
          $phone_number=$_POST['phone_number'];
          $email=$_POST['email'];
          $password=md5($_POST['password']);
          
          
          $insert_driver="insert into driver(name,address,age,phone,email,password) values('$name','$address','$age','$phone_number','$email','$password')";
          $result=mysqli_query($connect,$insert_driver);
       };
?>
</body>
</html>
