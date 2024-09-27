<?php
session_start();
includes('db.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token){
    $mail = new PHPMailer(true);
        
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';                                             
        $mail->Username   = 'zhairajanemartinez@gmail.com';                    
        $mail->Password   = 'lnazffnwndemzeax';                               
       
        $mail->SMTPSecure = "ssl";            
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        //Attachments
        $mail->setFrom('zhairajanemartinez@gmail.com',$name);         //Add attachments
        $mail->addAddress($email);    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification from Luna';

        $mail->template    = "
           <h2>You have Registered with Luna</h2>
           <h5>Verify your email address to login with the below given link</h5>
           <br/><br/>
           <a href='http://localhost/zhaira%20jane/Log%20in%20form%20with%20email%20verification/$verify_token'> Click Me </a>";
       
   
        $mail->Body = $email_template;
        $mail->send();
        echo 'Message has been sent';
}
        
    
    

if(isset($POST['register_btn']))
{
    $name = $_POST['name'];
    $name = $_POST['phone'];
    $name = $_POST['email'];
    $name = $_POST['password'];
    $name = $_POST['confirm password'];
    $verify_token = md5(rand());

    //Email Exists or not
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) 
    {
        $_SESSION['status'] = "Email ID already exists";
        header("Location: register.php");
    }
    else
    {
        // Insert user / Registered Data
        $quert = "INSERT INTO users () VALUES (name,phone,email,password,confirmpassword,verify_token) VALUES ('$name','$phone','$email','$password','$confirmpassword','$verify_token')";
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