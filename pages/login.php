<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'reda' && $password === '123') {
  
        $_SESSION['username'] = $username;
     
        header('Location: index.php');
        exit(); 
    } else {
    
        header('Location: login.php?error=1');
        exit(); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {    background-image: url('https://c0.wallpaperflare.com/path/262/991/578/dna-genetic-material-helix-proteins-9476723407c9429ddd8c405d8a9a9e3a.jpg');
             */
            background-size: cover;
            background-position: center;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-top: 100px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Login</h2>
            <?php
            // Display error message if redirected with an error parameter
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<div class="alert alert-danger" role="alert">Invalid username or password. Please try again.</div>';
            }
            ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
