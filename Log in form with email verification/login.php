<?php 
session_start();
if(isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "You are already Logged In";
    header('Location: Dashboard.php');
    exit(0);
}

$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    body {
        background-color: #f3e6ff; /* Light purple background */
    }

    .card {
        background-color: #ffffff; /* White card background */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
        transition: transform 0.2s; /* Animation for hover effect */
    }

    .card:hover {
        transform: scale(1.02); /* Slight zoom effect on hover */
    }

    .input-group-text {
        background-color: #e6d6f2; /* Light purple input group background */
        color: #6f42c1; /* Purple color for icons */
    }

    .btn-primary {
        background-color: #6f42c1; /* Primary button color */
        border: none;
    }

    .btn-primary:hover {
        background-color: #5a36a5; /* Darker shade on hover */
    }

    h5 {
        color: #6f42c1; /* Heading color */
    }

    .alert {
        margin-bottom: 20px; /* Space below the alert */
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">

                            <div class="form-group mb-3"> 
                                <label for="email">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" required> 
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="login_now_btn" class="btn btn-primary">Login Now</button> 
                            </div>

                        </form>

                        <hr>
                        <h5>
                            Did not receive your Verification Email?
                            <a href="resend-email-verification.php">Resend</a>
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
