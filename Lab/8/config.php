<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Student Records (Sorted by Marks)</h2>

    <?php
    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "school";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch student records from the database
    $sql = "SELECT id, name, marks FROM students";
    $result = $conn->query($sql);

    $students = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    $n = count($students);
    for ($i = 0; $i < $n - 1; $i++) {
        $maxIndex = $i; // Change from minIndex to maxIndex for descending order
        for ($j = $i + 1; $j < $n; $j++) {
            if ($students[$j]['marks'] > $students[$maxIndex]['marks']) { // Change < to >
                $maxIndex = $j;
            }
        }
        // Swap
        $temp = $students[$i];
        $students[$i] = $students[$maxIndex];
        $students[$maxIndex] = $temp;
    }
    // Display sorted records
    if (!empty($students)) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Marks</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student['id']}</td>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['marks']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>No records found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>


CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(100),
    marks INT,
    age INT,
    grade VARCHAR(2)
);


INSERT INTO students (name, marks, age, grade)
     VALUES
     ('John Doe', 85, 16, 'A'),
     ('Jane Smith', 90, 17, 'A+'),
     ('Michael Johnson', 78, 15, 'B'),
     ('Emily Davis', 92, 16, 'A+');
