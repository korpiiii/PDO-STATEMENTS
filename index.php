<php? require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); 


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $pdo->prepare("SELECT * FROM Username");
$stmt->execute();

// Fetch all rows as an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($db_user);
echo "</pre>";


$sql = "SELECT * FROM Users WHERE UserID = 1"; 
$stmt = $conn->prepare($sql);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
} else {
    echo "User not found.";
}

$sql = "INSERT INTO Users (Username, FirstName, LastName, DateOfBirth, Password) VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $firstName, $lastName, $dateOfBirth, $password);


$username = "newuser";
$firstName = "John";
$lastName = "Doe";
$dateOfBirth = "1990-01-01";
$password = password_hash("mypassword", PASSWORD_DEFAULT); // Hash the password


$stmt->execute();


if ($stmt->affected_rows > 0) {
    echo "New user inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}



$stmt = $pdo->prepare(query: "DELETE FROM Username WHERE UserID = ?");

$stmt->execute(params: []);

echo "Deleted successfully";


$stmt = $pdo->prepare(query: "UPDATE Username = 'honeyb' WHERE UserID = 6");

$stmt->execute();

echo "Updated successfully";


$stmt = $pdo->query("SELECT UserID, Username, FirstName, LastName FROM Users");

$db_user = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr><th>UserID</th><th>Username</th><th>FirstName</th><th>LastName</th></tr>";

foreach ($db_user as $db_user) {
    echo "<tr>";

    echo "<td>".$db_user['UserID']."</td>";
    echo "<td>".$db_user['Username']."</td>";
    echo "<td>".$db_user['FirstName']."</td>";
    echo "<td>".$db_user['LastName'] . "</td>";

    echo "</tr>";
}

echo "</table>";


?>


?>
	<table>
		<tr>
			<th>Year Level</th>
			<th>Student Count</th>
		</tr>
		<?php foreach ($studentsByYearLevel as $row) { ?>
		<tr>
			<td><?php echo $row['year_level']; ?></td>
			<td><?php echo $row['studentCount']; ?></td>
		</tr>
		<?php } ?>
	</table> 

</php>



</body>
</html>




















