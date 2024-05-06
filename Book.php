<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'poppins''sans-serif';
}

.popup{
    width: 400px;
    background:#fff;
    border-radius:6px;
    position: absolute;
    top:0;
    left:50%;
    transform: translate(-50%,-50%)scale(0.1);
    text-align:center;
    padding: 0 30px 30px;
    color:#333;
    visibility: hidden;
    transition:transform 0.4s,top 0.4s; 
}
.open-popup{
    visibility: visible;
    top:50%;
    transform: translate(-50%,-50%)scale(1);

}

.popup img{
    width:100px;
    margin-top: -50px;
    border-radius:50%;
    box-shadow: 0 2px 5px rgba(red,green,blue,alpha);
 }

.popup h2{
 font-size: 30px;
 font-weight:500;
 margin:30px 0 10px;
}

.popup button{
    width: 100%;
    margin-top: 50px;
    padding:10px 0;
    background:#6fd649;
    color:#fff;
    border:0;
    outline:none;
    font-size:18px;
    border-radius:4px;
    cursor:pointer;
    box-shadow: 0 2px 5px rgba(red,green,blue,alpha);
}
</style>
<!DOCTYPE html>
<html>
<head>
    <meta name ="viewport" content=" width=device-width,innitial-scale=1.0" > 
    <title> Popup</title>
    </head>
    <body>
     <div class="container">
      <div class = 'popup'id="popup">
        <img src="images/tick.png" >
        <h2>Thank You!</h2>
        <p>Your details have been sucessfully submitted.Wait for the email confirmation.</p>
        <button type = "button"onclick="closepopup()">OK</button>>
     </div>>
     </body>
   <script>
    let popup = document.getElementById("popup");

    function openpopup(){
      popup.classList.add("open-popup")
    }
    function closepopup(){
      popup.classList.remove("open-popup")
    }
   </script>  
</html>     
<?php 
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookYourDriver</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>



    <div class="booking-form">
        <div class="formheader"><h3>Driver Booking Details</h3></div>
        <form  method="post" >
            <label for="name" >Name</label>
            <input type="text" id="name" name="name" placeholder="Name" required>
            <label for="email" >E-mail</label>
            <input type="email" id='email' placeholder="example@gmail.com" name="email" required>
            <label for="contact">Contact(10 digits)</label>
            <input type="text" id="contact" placeholder="9xxxxxxxx1" name="contact" required>
            <label for="driver">Driver</label>
            <select name="driver"  id="driver"  required>

                    <option value="" >Select-Driver</option>
                    <option value="Shreenidhi">Shreenidhi</option>
                    <option value="Lakshmi">Lakshmi</option>
                    <option value="Ram">Ram</option>
                    <option value="Ramesh">Ramesh</option>
                    <option value="Suresh">Suresh</option>
                    <option value="Yash">Yash</option>
                    

            </select>
            <label for="service">Service</label>
            <select name="service" id="service"  >

                    <option value="" >Select-Category</option>
                    <option value="Outstation">Outstation</option>
                    <option value="Hourly">Hourly</option>
                    <option value="Airport">Airport</option>
                    <option value="Drink & Drive">Drink & Drive</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Monthly">Monthly</option>

            </select>
            <label for="datetime">Date-Time</label>
            <input type="datetime-local" id="datetime" name="datetime">
            <label for="hours" ></label>
            <input type="number" step="1" min="4" name="hours" id="hours" placeholder="minimum 4 hours">
            <input type="submit" name="book_btn"onclick="1.html" value="Submit">

        </form>
    </div>
    <?php

    
    
       if(isset($_POST['book_btn'])){
               $name=$_POST['name'];
               $email=$_POST['email'];
               $contact=$_POST['contact'];
               $service=$_POST['service'];
               $driver=$_POST['driver'];
               $datetime=$_POST['datetime'];
               $hrs=$_POST['hours'];
               $insert_booking="insert into booking(username,email,contact,service,driver,datetime,hrs) values('$name','$email','$contact','$service','$driver','$datetime','$hrs')";
               $result = mysqli_query($connect,$insert_booking);
            if($result) 
            {
                echo "Good";
            }
            else {
                echo "Bad!";
            }
        
       }
  ?>
  </body>
<html>

