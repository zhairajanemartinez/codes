<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .bg-purple {
            background: linear-gradient(135deg, #6a0dad, #9b59b6); /* Purple gradient */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-nav .nav-link {
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00; /* Hover color */
            background-color: rgba(255, 255, 255, 0.1); /* Optional: background effect */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem; /* Adjust the size of the brand */
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem; /* Smaller size for mobile */
            }
        }
    </style>
</head>
<body>

<div class="bg-purple">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid"> 
                        <a class="navbar-brand" href="dashboard.php">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php">
                                        <i class="fas fa-home"></i> Home
                                    </a>
                                </li>

                                <?php if(!isset($_SESSION['authenticated'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">
                                        <i class="fas fa-user-plus"></i> Register
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">
                                        <i class="fas fa-sign-in-alt"></i> Login
                                    </a>
                                </li>
                                <?php endif ?>

                                <?php if(isset($_SESSION['authenticated'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
