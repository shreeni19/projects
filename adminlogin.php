<?php
include 'connect.php';
if(!isset($_SESSION)){
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}
.form{
    width: 60%;
    margin: auto;
}
button a{
    text-decoration:none ;
    color:white;
}
.heading{
    text-align: center;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 200px;
  height: 200px;
  border-radius: 50%;
}

.container {
  padding: 16px;
  
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 class="heading">Login Form</h2>


  <div class="imgcontainer">
    <img src="images/admin.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <form method="post">
    <label for="email"><b>email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit">Login</button>
    
</form>

</body>
</html>

<?php

    if(isset($_POST['submit'])){
      echo "hiii";
       $amail = $_POST['email'];
       $apassword = $_POST['password'];
      

       $sql_query = "select * from admin where email = '$amail' ";
       $result = mysqli_query($connect,$sql_query);
       $count = mysqli_num_rows($result);

       if($count>0){
         $_SESSION['email']=$amail;
         echo '<script>
        window.location.href = "adminhome.php";
        </script>';
         }
       else{
        echo '<script>
        window.location.href = "adminlogin.php";
        alert("login failed. invalid email or password");
        </script>';
       }
    }
    ?>