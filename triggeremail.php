

DELIMITER //
CREATE TRIGGER mail_trigger
AFTER INSERT ON ride FOR EACH ROW
BEGIN
    DECLARE user_email VARCHAR(255);
    DECLARE driver_name VARCHAR(255);
    DECLARE driver_email VARCHAR(255);
    DECLARE email_body TEXT;

    
    SELECT email INTO user_email FROM ride WHERE id = NEW.id;
    SELECT name INTO driver_name FROM driver WHERE name = NEW.driver;
    SELECT email INTO driver_email FROM driver WHERE name = NEW.driver;

    
    SET email_body = CONCAT('Hello ', NEW.username, ',<br><br>',
                            'Thank you for booking a ride with us!<br><br>',
                            'Driver Information:<br>',
                            'Driver Name: ', driver_name, '<br>',
                            'Driver Email: ', driver_email, '<br>',
                            'Contact Number: ', NEW.contact, '<br>',
                            'Service: ', NEW.service, '<br>',
                            'Date and Time: ', NEW.datetime, '<br>',
                            'Duration (hours): ', NEW.hours, '<br><br>',
                            'We hope you have a safe and enjoyable ride!<br><br>',
                            'Best regards,<br>',
                            'Admin');
 <?php
// Include connect.php for database connection

use PHPMailer\PHPMailer\PHPMailer;

include 'connect.php';
$mail=new PHPMailer(true);
    //-- Include the PHPMailer library
    //-- Replace the placeholders below with the actual path to your PHPMailer library files
    INCLUDE 'C:\Users\cheeni\Desktop\gls\PHPMailer-master\PHPMailer.php';
    INCLUDE 'C:\Users\cheeni\Desktop\gls\PHPMailer-master\SMTP.php';

    //-- Create a new instance of PHPMailer
    //DECLARE mail PHPMailer\PHPMailer\PHPMailer;
    

    //-- Configure the SMTP settings for your email server
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 587; 
    $mail->SMTPAuth = true;  
    $mail->Username = 'drivers4mee@gmail.com';  //Replace with your admin email address
    $mail->Password = 'lotus@123';  //-- Replace with your admin email password
    $mail->SMTPSecure = 'tls';  //-- Use TLS encryption for SMTP
    $mail->SMTPDebug = 2;  //-- Set SMTP debug level (optional)

    //-- Compose the email
    $mail->From = 'drivers4mee@gmail.com';  
    $mail->FromName = 'Admin';
    $mail->addAddress($user_email); 
    $mail->isHTML(true);
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = $email_body;

   
    $mail->send();
    ?>
END;
//
DELIMITER ;
