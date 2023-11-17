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
            <h1 class = "text-xl">Input an ID to modify:</h1>

            <form action="modify.php" method="post" id="modifyFormID" onsubmit="return validateID();">
                <label for = "id">ID:</label>
                <input class = "border border-black mt-2" type = "number" id = "teamid" name = "teamid">
                <br>

                <label for = "firstName">First name:</label>
                <input class = "border border-black mt-2" type = "text" id = "firstName" name = "firstName">
                <br>

                <label for = "lastName">Last name:</label>
                <input class = "border border-black mt-2" type = "text" id = "lastName" name = "lastName">
                <br>

                <label for = "email">E-mail:</label>
                <input class = "border border-black mt-2" type = "email" id = "email" name = "email">
                <br>

                <label for = "phone">Phone Number:</label>
                <input class = "border border-black mt-2" type = "text" id = "phone" name = "phone">
                <br>

                <label for = "role">Role:</label>
                <input class = "border border-black mt-2" type = "text" id = "role" name = "role">
                <br>

                <label for = "team">Team:</label>
                <input class = "border border-black mt-2" type = "number" id = "team" name = "team">
                <br>

                <label for = "status">Status:</label>
                <input class = "border border-black mt-2" type = "text" id = "status" name = "status">
                <br>

                <button type = "submit" value = "Submit" class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 border border-orange-700 rounded-full transition-all mt-4 px-8" id = "personalBtn">
                    Modify
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
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];
    $team = $_POST["team"];
    $status = $_POST["status"];

    $id = mysqli_real_escape_string($sql, $id);
    $firstName = mysqli_real_escape_string($sql, $firstName);
    $lastName = mysqli_real_escape_string($sql, $lastName);
    $email = mysqli_real_escape_string($sql, $email);
    $phone = mysqli_real_escape_string($sql, $phone);
    $role = mysqli_real_escape_string($sql, $role);
    $team = mysqli_real_escape_string($sql, $team);
    $status = mysqli_real_escape_string($sql, $status);

    $modify = "UPDATE employee SET 
                                    name = '$firstName',
                                    lastName = '$lastName',
                                    email = '$email',
                                    phone = '$phone',
                                    role = '$role',
                                    team = $team,
                                    status = '$status' 
                                WHERE (id = $id)";

    if (mysqli_query($sql, $modify)) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Error: " . $modify . "<br>" . mysqli_error($sql);
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