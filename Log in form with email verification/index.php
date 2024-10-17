<?php 
$page_title = "Home Page";
include('includes/header.php');
include('includes/navbar.php');
?>

<style>
    body {
        background-color: #f3e6ff; /* Light purple background */
    }

    .main-content {
        position: relative;
        background-color: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
        padding: 30px; /* Padding around content */
        margin-top: 20px; /* Space above the content */
        z-index: 2; /* Ensure content is above background */
    }

    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('path/to/your/purple-tulips-icon.png'); /* Path to your tulip icon */
        background-size: 50px; /* Size of the tulip icons */
        background-repeat: repeat; /* Repeat the icons */
        opacity: 0.1; /* Light opacity for background */
        z-index: 1; /* Behind the content */
    }

    h5 {
        color: #6f42c1; /* Purple color for headings */
        font-weight: bold;
    }

    h6 {
        color: #6f42c1; /* Slightly lighter for the subtitle */
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 position-relative">
                <div class="background-image"></div> <!-- Background image div -->
                <div class="main-content text-center">
                    <h5>Login and Registration System in PHP</h5>
                    <h6>With Email Verification</h6>
                </div>
            </div>
        </div>
    </div>    
</div>

<?php include('includes/footer.php'); ?>
