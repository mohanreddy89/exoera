
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users - ExoEra</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #a58bff;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #2c2c2c;
            color: #a58bff;
        }
        tr:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>Email</th><th>Signup Time</th></tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "exoera");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, name, email, dt FROM exo ORDER BY dt DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['dt']}</td>
                  </tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
