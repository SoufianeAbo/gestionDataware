<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dataware";

$sql = mysqli_connect($servername, $username, $password, $database);

if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
} else {    
    // Employees Table
    $table = "SELECT * FROM employee";
    $result = mysqli_query($sql, $table);

    echo '<table class="m-auto border border-black hidden" id="employeesTable">';
    echo '<thead>';
    echo '<tr>
            <th class="p-4 border-black border bg-gray-300"></th>
            <th class="p-4 border-black border bg-gray-300">ID</th>
            <th class="p-4 border-black border bg-gray-300">First Name</th>
            <th class="p-4 border-black border bg-gray-300">Last Name</th>
            <th class="p-4 border-black border bg-gray-300">E-Mail</th>
            <th class="p-4 border-black border bg-gray-300">Phone Number</th>
            <th class="p-4 border-black border bg-gray-300">Role</th>
            <th class="p-4 border-black border bg-gray-300">Team</th>
            <th class="p-4 border-black border bg-gray-300">Status</th>
        </tr>';
    echo '</thead>';
    echo '<tbody class>';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">';
            echo "
            <td class='border border-black p-2'>
            <td class='border border-black p-2'>{$row['id']}</td>
            <td class='border border-black p-2'>{$row['name']}</td>
            <td class='border border-black p-2'>{$row['lastName']}</td>
            <td class='border border-black p-2'>{$row['email']}</td>
            <td class='border border-black p-2'>{$row['phone']}</td>
            <td class='border border-black p-2'>{$row['role']}</td>
            <td class='border border-black p-2'>{$row['team']}</td>
            <td class='border border-black p-2'>{$row['status']}</td>";
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }

    echo '</tbody>';
    echo '</table>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <script src="./script.js"></script>
</body>
</html>