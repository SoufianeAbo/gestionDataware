<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dataware";

$sql = mysqli_connect($servername, $username, $password, $database);

if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $role = $_POST["role"];
        $team = $_POST["team"];
        $status = $_POST["status"];

        $name = mysqli_real_escape_string($sql, $name);
        $lastName = mysqli_real_escape_string($sql, $lastName);
        $email = mysqli_real_escape_string($sql, $email);
        $phone = mysqli_real_escape_string($sql, $phone);
        $role = mysqli_real_escape_string($sql, $role);
        $team = mysqli_real_escape_string($sql, $team);
        $status = mysqli_real_escape_string($sql, $status);

        $insert = "INSERT INTO employee (name, lastName, email, phone, role, team, status)
                    VALUES('$name', '$lastName', '$email', '$phone', '$role', '$team', '$status')";
        
        if (mysqli_query($sql, $insert)) {
            header("Location: index.php?success=1");
            exit();
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($sql);
        }

        mysqli_close($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class = "text-center mt-24 border border-black rounded bg-gray-200 w-fit m-auto p-8">
        <h1 class = "text-xl font-bold">Enter your information</h1>

        <form action = "add.php" method = "post" id = "addForm" onsubmit = "return validateRegex();">
            <label for = "name">First Name:</label>
            <input class = "border border-black mt-2" type = "text" id = "name" name = "name" required>
            <br>

            <label for = "lastName">Last Name:</label>
            <input class = "border border-black mt-2" type = "text" id = "lastName" name = "lastName" required>
            <br>

            <label for = "email">E-Mail:</label>
            <input class = "border border-black mt-2" type = "email" id = "email" name = "email" required>
            <br>

            <label for = "phone">Phone Number:</label>
            <input class = "border border-black mt-2" type = "text" id = "phone" name = "phone" required>
            <br>

            <label for = "role">Role:</label>
            <input class = "border border-black mt-2" type = "text" id = "role" name = "role" required>
            <br>

            <label for = "team">Team:</label>
            <input class = "border border-black mt-2" type = "number" id = "team" name = "team" required>
            <br>

            <label for = "status">Status:</label>
            <input class = "border border-black mt-2" type = "text" id = "status" name = "status" required>
            <br>

            <button type = "submit" value = "Submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 border border-green-700 rounded-full transition-all mt-4 px-8" id = "personalBtn"">
                Add
            </button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>
</html>