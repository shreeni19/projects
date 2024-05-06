body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.profile {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}

.profile-picture {
    margin-right: 30px;
}

.profile-picture img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 3px solid #333;
}

.profile-info h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.profile-info form {
    margin-top: 20px;
}

.profile-info label {
    font-size: 18px;
    margin-bottom: 5px;
}

.profile-info textarea, .profile-info input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    font-size: 16px;
}

.profile-info input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    font-size: 18px;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile">
        <div class="profile-picture">
            <img src="profile-picture.jpg" alt="Profile Picture">
        </div>
        <div class="profile-info">
            <h1>John Doe</h1>
            <form action="update_profile.php" method="post">
                <label for="bio">Bio:</label><br>
                <textarea id="bio" name="bio" rows="5" cols="30"></textarea><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="phone">Phone:</label><br>
                <input type="text" id="phone" name="phone"><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>


<?php
// Connect to the database
$db = mysqli_connect("localhost", "username", "password", "mydb");

// Check connection
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get user input from the form
$bio = $_POST['bio'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Update user data in the database
$userID = 1; // Assuming the user ID is 1
$query = "UPDATE users SET bio = '$bio', email = '$email', phone = '$phone' WHERE id = '$userID'";
$result = mysqli_query($db, $query);

if ($result) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . mysqli_error($db);
}

// Close database connection
mysqli_close($db);
?>

