<?php 
include('authentication.php');

$page_title = "Dashboard";
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

    .user-info h5 {
        margin-bottom: 1rem; /* Space between info items */
        color: #6f42c1; /* Purple color for text */
    }

    .alert {
        margin-bottom: 20px; /* Space below the alert */
    }
</style>

<div class="py-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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

                <div class="card">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4>Access when you are logged in</h4> 
                        <hr>
                        <div class="user-info">
                            <h5><i class="fas fa-user"></i> Username: <?= $_SESSION['auth_user']['username']; ?></h5>
                            <h5><i class="fas fa-envelope"></i> Email ID: <?= $_SESSION['auth_user']['email']; ?></h5>
                            <h5><i class="fas fa-phone"></i> Phone No: <?= $_SESSION['auth_user']['phone']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php include('includes/footer.php'); ?>
