<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dataware";

$sql = mysqli_connect($servername, $username, $password, $database);

if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo '<div class="text-center">';
    echo '<h1 class="text-xl font-bold border-b-2 border-black w-fit m-auto mb-5">Your data:</h1>';
    
    // Teams Table
    $table = "SELECT * FROM teams";
    $result = mysqli_query($sql, $table);

    echo '<table class="m-auto border border-black" id="teamsTable">';
    echo '<thead>';
    echo '<tr>
            <th class="p-4 border-black border bg-gray-300">ID</th>
            <th class="p-4 border-black border bg-gray-300">Name</th>
            <th class="p-4 border-black border bg-gray-300">Date of Creation</th>
        </tr>';
    echo '</thead>';
    echo '<tbody class>';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">';
            echo "<td class='border border-black p-2'>{$row['id']}</td><td class='border border-black p-2'>{$row['name']}</td><td class='border border-black p-2'>{$row['dateCreation']}</td>";
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }
    
    echo '</tbody>';
    echo '</table>';
    
    // Joined Table
    $table = "SELECT employee.id, employee.name AS employee_name, employee.lastName, employee.email, employee.phone, 
                employee.role, employee.team, employee.status, 
                teams.name AS team_name, teams.dateCreation
                FROM employee
                INNER JOIN teams ON employee.team=teams.id";
    $result = mysqli_query($sql, $table);

    echo '<table class="m-auto border border-black hidden" id="joinedTable">';
    echo '<thead>';
    echo '<tr>
            <th class="p-4 border-black border bg-gray-300">ID</th>
            <th class="p-4 border-black border bg-gray-300">First Name</th>
            <th class="p-4 border-black border bg-gray-300">Last Name</th>
            <th class="p-4 border-black border bg-gray-300">E-Mail</th>
            <th class="p-4 border-black border bg-gray-300">Phone Number</th>
            <th class="p-4 border-black border bg-gray-300">Role</th>
            <th class="p-4 border-black border bg-gray-300">Team</th>
            <th class="p-4 border-black border bg-gray-300">Status</th>
            <th class="p-4 border-black border bg-gray-300">Name</th>
            <th class="p-4 border-black border bg-gray-300">Date Creation</th>
        </tr>';
    echo '</thead>';
    echo '<tbody class>';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="text-center">';
            echo "<td class='border border-black p-2'>{$row['id']}</td>
            <td class='border border-black p-2'>{$row['employee_name']}</td>
            <td class='border border-black p-2'>{$row['lastName']}</td>
            <td class='border border-black p-2'>{$row['email']}</td>
            <td class='border border-black p-2'>{$row['phone']}</td>
            <td class='border border-black p-2'>{$row['role']}</td>
            <td class='border border-black p-2'>{$row['team']}</td>
            <td class='border border-black p-2'>{$row['status']}</td>
            <td class='border border-black p-2'>{$row['team_name']}</td>
            <td class='border border-black p-2'>{$row['dateCreation']}</td>";
            echo '</tr>';
        }
    } else {
        echo "0 results";
    }

    echo '</tbody>';
    echo '</table>';
    
    // Employees Table
    $table = "SELECT * FROM employee";
    $result = mysqli_query($sql, $table);

    echo '<table class="m-auto border border-black hidden" id="employeesTable">';
    echo '<thead>';
    echo '<tr>
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
            echo "<td class='border border-black p-2'>{$row['id']}</td>
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
    <div>
        <div class = "flex space-around justify-center mt-4 gap-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded transition-all" id = "personalBtn">
                Employees
            </button>

            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded transition-all" id = "teamsBtn">
                Teams
            </button>

            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 border border-blue-700 rounded transition-all" id = "joinedBtn">
                Joined
            </button>
        </div>
    </div>

    <div class = "border border-black w-fit m-auto p-8 mt-8 bg-slate-200 rounded-full">
        <h2 class = "text-xl font-bold">Select an option</h2>

        <div class = "flex space-around justify-center mt-4 gap-8">
            <button class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 border border-green-700 rounded transition-all" id = "personalBtn">
                Add
            </button>

            <button class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 border border-orange-700 rounded transition-all" id = "teamsBtn">
                Modify
            </button>

            <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 border border-red-700 rounded transition-all" id = "joinedBtn">
                Remove
            </button>
        </div>
    </div>

    <script src="./script.js"></script>
</body>
</html>