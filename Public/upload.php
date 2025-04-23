
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// Use absolute path to prevent path errors
$uploadDir = __DIR__ . "/uploads/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["mediaFile"])) {
    $file = $_FILES["mediaFile"];
    $fileName = basename($file["name"]);
    $targetFile = $uploadDir . $fileName;

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ["mp4", "mp3", "wav", "txt", "jpg", "png", "jpeg"];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            echo "Upload successful!";
        } else {
            echo "Error uploading file. Check permissions on uploads/ directory.";
        }
    } else {
        echo "Unsupported file type.";
    }
}
?>
