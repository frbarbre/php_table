<?php
require_once 'get_json.php';

loadEnv(__DIR__ . '/.env');

$jsonData = getData();

// Decode the JSON data
$students = json_decode($jsonData, true);

// Check for decoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error decoding JSON: " . json_last_error_msg();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Table</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1 class="title">Student Information</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if the decoded data is valid
                    if (is_array($students)) {
                        // Loop through the students array and display the data
                        foreach ($students as $student) {
                            echo "<tr>";
                            foreach ($student as $key => $value) {
                                echo "<td>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No student data found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <?php
            $i = 0;
            while ($i < 101) {
                echo $i . "<br>";
                $i++;
            }
            ?>
        </div>
    </div>
</body>

</html>