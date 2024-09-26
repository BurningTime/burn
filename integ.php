<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stud_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'stud_id' is set in the URL to determine whether to show details or list
if (isset($_GET['stud_id'])) {
    $stud_id = intval($_GET['stud_id']);
    $sql = "SELECT * FROM stud_info WHERE stud_id = $stud_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch student details
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Details</title>
        </head>
        <body>
        
        <h2>Details for <?php echo htmlspecialchars($row['stud_fname'] . " " . $row['stud_lname']); ?></h2>
        <p>Middle Name: <?php echo htmlspecialchars($row['stud_mname']); ?></p>
        <p>Age: <?php echo htmlspecialchars($row['stud_age']); ?></p>
        <p>Address: <?php echo htmlspecialchars($row['stud_address']); ?></p>
        <p>Course: <?php echo htmlspecialchars($row['stud_course']); ?></p>
        <br>
        <button onclick="window.history.back()">Go Back</button>
        
        </body>
        </html>
        <?php
    } else {
        echo "<p>Student not found.</p>";
        echo '<button onclick="window.history.back()">Go Back</button>';
    }
} else {
    // SQL query to fetch student data
    $sql = "SELECT stud_id, CONCAT(stud_fname, ' ', stud_lname) AS stud_name FROM stud_info";
    $result = $conn->query($sql);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student List</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:hover {background-color: #f5f5f5;}
            button {
                padding: 5px 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>

    <h2>Student List</h2>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if any records were returned by the query
            if ($result->num_rows > 0) {
                // Loop through and output data for each student
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['stud_name']) . "</td>";
                    echo "<td><button onclick=\"viewDetails(" . $row['stud_id'] . ")\">View</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No students found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function viewDetails(stud_id) {
            // Redirect to the same page with the student ID as a query parameter
            window.location.href = "?stud_id=" + stud_id;
        }
    </script>

    </body>
    </html>
    <?php
}

$conn->close();
?>
