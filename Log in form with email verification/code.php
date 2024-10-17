<?php
session_start();
include('dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token)
{
    $mail = new PHPMailer(true);
        
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host       = 'smtp.gmail.com';                                              
        $mail->Username   = 'zhairajanemartinez@gmail.com';                    
        $mail->Password   = 'lnazffnwndemzeax';                               
       
        $mail->SMTPSecure =  "ssl" ;            
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS


        //Attachments
        $mail->setFrom('zhairajanemartinez@gmail.com',$name);         //Add attachments
        $mail->addAddress($email);    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Email verification from Ms. Luna";

        $email_template = "
           <h2>You have Registered with Ms. Luna</h2>
           <h5>Verify your email address to login with the below given link</h5>
           <br/><br/>
           <a href='http://localhost/zhaira%20jane/Log%20in%20form%20with%20email%20verification/verify-email.php?token=$verify_token'> Click Me </a>
        ";
       
   
        $mail->Body = $email_template;
        $mail->send();
        echo "Message has been sent";
}
        
    
    

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    

    // Email Exists or not
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) 
    {
        $_SESSION['status'] = "Email ID Already Exists";
        header("Location: register.php");
    }
    else
    {
        // Insert user / Registered Data
        $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name','$phone','$email','$password','$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            sendemail_verify("$name","$email","$verify_token");

            $_SESSION['status'] = "Registration successfull. ! Please verify your Email Address.";
            header("Location: register.php");
        }
        else
        {
            $_SESSION['status'] = "Registration failed";
            header("Location: register.php");
        }
    }
}

?>