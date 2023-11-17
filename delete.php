<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class = "text-center bg-gray-200 w-fit border border-black rounded m-auto p-4 my-8" id = "formInput">
        <div id = "idInput">
            <h1 class = "text-xl">Input an ID to delete:</h1>

            <form action="delete.php" method="post" id="deleteFormID">
                <label for = "id">ID:</label>
                <input class = "border border-black mt-2" type = "number" id = "teamid" name = "teamid">
                <br>

                <button type = "submit" value = "Submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 border border-red-700 rounded-full transition-all mt-4 px-8" id = "personalBtn">
                    Delete
                </button>
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dataware";

$sql = mysqli_connect($servername, $username, $password, $database);

// Employees Table
$table = "SELECT * FROM employee";
$result = mysqli_query($sql, $table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["teamid"];

    $id = mysqli_real_escape_string($sql, $id);

    $delete = "DELETE FROM employee WHERE (id = $id)";

    if (mysqli_query($sql, $delete)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Error: " . $delete . "<br>" . mysqli_error($sql);
    }

    mysqli_close($sql);
}

echo '<table class="float border border-black m-auto" id="employeesTable">';
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
?>