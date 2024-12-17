<?php
// Start the session (optional, for larger systems)
session_start();

// Initialize attendance data array (in real use, fetch from a database)
$students = [
    ["id" => 1, "name" => "John Doe"],
    ["id" => 2, "name" => "Jane Smith"],
    ["id" => 3, "name" => "Michael Johnson"]
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance = $_POST['attendance'] ?? [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .submit-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 3px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Student Attendance</h1>

    <!-- Attendance Form -->
    <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['id']; ?></td>
                        <td><?= htmlspecialchars($student['name']); ?></td>
                        <td>
                            <input type="radio" name="attendance[<?= $student['id']; ?>]" value="Present" required> Present
                            <input type="radio" name="attendance[<?= $student['id']; ?>]" value="Absent"> Absent
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <button type="submit" class="submit-btn">Submit Attendance</button>
        </div>
    </form>

    <!-- Display Attendance Results -->
    <?php if (!empty($attendance)): ?>
        <h2>Attendance Results</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['id']; ?></td>
                        <td><?= htmlspecialchars($student['name']); ?></td>
                        <td>
                            <?= isset($attendance[$student['id']]) ? htmlspecialchars($attendance[$student['id']]) : 'Not Marked'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>

