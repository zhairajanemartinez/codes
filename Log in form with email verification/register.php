<?php 
session_start();

$page_title = "Registration Form";

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

    .alert {
        margin-bottom: 20px; /* Space below the alert */
    }

    h5 {
        color: #6f42c1; /* Heading color for labels */
    }

    .form-group label {
        color: #6f42c1; /* Label color */
    }
</style>

<div class="py-3"> 
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
                        <h5>Registration Form</h5> 
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3"> 
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="phone">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="email">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
