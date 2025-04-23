<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include "db_conn.php";
$users_sql = "SELECT COUNT(*) as total_users FROM exo";
$users_result = $conn->query($users_sql);
$users_count = $users_result->fetch_assoc()['total_users'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            padding: 2rem;
        }
        .card {
            background: #222;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            text-align: center;
        }
        canvas {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <div class="card">
        <h2>Total Registered Users: <?php echo $users_count; ?></h2>
    </div>

    <canvas id="userChart" width="200" height="100"></canvas>
    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Registered Users', 'Others'],
                datasets: [{
                    label: '# of Users',
                    data: [<?php echo $users_count; ?>, 100],
                    backgroundColor: ['#f33', '#555']
                }]
            }
        });
    </script>

    <div class="card">
        <h2>All Registered Users</h2>
        <iframe src="view_users.php" style="width:100%; height:300px; border:none;"></iframe>
    </div>
</body>
</html>

<script>
    const ctxLine = document.getElementById('userLineChart').getContext('2d');
    const userLineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['2024-01-01', '2024-01-02', '2024-01-03', '2024-01-04'], // example dates
            datasets: [{
                label: 'User Registrations',
                data: [3, 7, 4, 6], // example data
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
    });
</script>
