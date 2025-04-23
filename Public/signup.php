<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "exoera"; // adjust as needed

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$signup_success = false;
$signup_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sAdress = $_POST["sAdress"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pcode = $_POST["pcode"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO exo (name, email, sAdress, city, state, pcode, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $sAdress, $city, $state, $pcode, $password);

    if ($stmt->execute()) {
        $signup_success = true;
        header("Location: login.php");
        exit;
    } else {
        $signup_error = "Signup failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up - ExoEra</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      background: url('movie_bg.jpg') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      min-height: 100vh;
      padding: 0 5%;
    }

    .left-panel {
      max-width: 40%;
    }

    .brand-title {
      font-size: 3rem;
      font-weight: bold;
      color: #8f9eff;
      text-shadow: 0px 0px 10px #8f9eff;
    }

    .tagline {
      font-size: 1.2rem;
      margin-top: 10px;
      line-height: 1.5;
    }

    .form-container {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.5);
      width: 40%;
    }

    .form-title {
      font-size: 1.5rem;
      margin-bottom: 20px;
      color: #8f9eff;
      text-align: center;
    }

    form input {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: none;
      border-radius: 6px;
      background-color: #1f1f1f;
      color: white;
      font-size: 1rem;
    }

    form button {
      width: 100%;
      padding: 12px;
      background-color: #6c63ff;
      border: none;
      border-radius: 6px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      font-size: 1rem;
    }

    form button:hover {
      background-color: #5751d6;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <h1 class="brand-title">ExoEra</h1>
      <p class="tagline">Step into the spotlight. Sign up and start your journey in the entertainment industry today.</p>
    </div>
    <div class="form-container">
      <h2 class="form-title">Create your account</h2>
      <form action="signup.php" method="post">
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="text" name="address" placeholder="Street Address" required />
        <input type="text" name="city" placeholder="City" required />
        <input type="text" name="state" placeholder="State" required />
        <input type="text" name="postalcode" placeholder="Postal Code" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Sign Up</button>
      </form>
    </div>
  </div>
</body>
</html>
