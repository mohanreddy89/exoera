<?php
session_start();
include 'Partials/_db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM exo WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $row["name"];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #0d0d0d;
        color: #f2f2f2;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .card {
        background-color: #1e1e1e;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        width: 400px;
    }
    input, button {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        border: none;
        font-size: 16px;
    }
    button {
        background-color: #5c6bc0;
        color: white;
        cursor: pointer;
    }
    button:hover {
        background-color: #3f51b5;
    }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="auth.css">
    <title>Login - Talent Sphere</title>
</head>
<body>
    <div style="text-align:center; margin-top:20px;">
        <h1 style="color:#8d8df1; font-family:sans-serif;">ExoEra</h1>
    </div>
    

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/11.3.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/11.3.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/11.3.0/firebase-database-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/11.3.0/firebase-storage-compat.js"></script>

    <script>
        // Firebase Configuration
        const firebaseConfig = {
            apiKey: "AIzaSyB8Yb4oQFzuVh5xRQdp8oW7U7xRn6DwwJI",
            authDomain: "developer-1b4f5.firebaseapp.com",
            databaseURL: "https://developer-1b4f5-default-rtdb.firebaseio.com",
            projectId: "developer-1b4f5",
            storageBucket: "developer-1b4f5.firebasestorage.app",
            messagingSenderId: "325509631041",
            appId: "1:325509631041:web:1796242679479a85a94ac0",
            measurementId: "G-83H9N56LPV"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();
        const database = firebase.database();
        const storage = firebase.storage();
    </script>

    <?php if (!empty($error)) echo "<p style=\"color:red;\">$error</p>"; ?>
<form method="POST" actions="/ClientWork/ExoEra/exoEra-main/ExoEra/login.php">
    <div class="container">
        <div class="form-container">
            <a href="landing.html" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Landing Page</a>
            <h1>Welcome Back!</h1>
            <p class="subtitle">Login to access your account</p>
            
            <div id="loginForm">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input id="pass" type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye-slash toggle-password"></i>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button id="loginBtn">Login</button>

                <div class="social-login">
                    <p>Or login with</p>
                    <div class="social-icons">
                        <button type="button" class="google"><i class="fab fa-google"></i> Google</button>
                        <button type="button" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</button>
                    </div>
                </div>

                <p class="signup-link">
                    Don't have an account? <a href="signup.html">Sign up</a>
                </p>
            </div>
        </div>
        
        <div class="image-container">
            <img src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg" alt="Login">
        </div>
    </div>
    </form>

    <script type="module" src="firebase.js"></script>
    <!-- <script type="module" src="login.js"></script> -->

</body>
</html>
