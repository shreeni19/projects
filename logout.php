<?php
session_start();
unset($_SESSION['email']); // Use "unset" to remove a specific session variable
header('location: index.html'); // Use the correct syntax for the "location" header and provide the correct file path
exit(); // Use "exit()" to terminate the script after the header redirect
?>
<script>
function confirmLogout() {
  var result = confirm("Are you sure you want to log out?");
  if (result) {
    // User confirmed, redirect to logout page
    window.location.href = "logout.php"; // Replace with the correct URL for your logout page
  }
}
</script>