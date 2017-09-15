<?php
session_start();

?>
<!DOCTYPE html>

<html>
<head>
    <?php
    $servername = "localhost";
$username = "JSKC";
$password = "Swift";
$dbname = "Ungdomskole";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    ?>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
<title>Page Title</title>
    </style>
</head>
<body>
<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=Ungdomskole', 'JSKC', 'Swift');

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT PersonID, Navn FROM person";

//Prepare the select statement.
$stmt = $pdo->prepare($sql);

//Execute the statement.
$stmt->execute();

//Retrieve the rows using fetchAll.
$users = $stmt->fetchAll();

?>

<select>
    <?php foreach($users as $user): ?>
        <option value="<?= $user['PersonID']; ?>"><?= $user['Navn']; ?></option>
    <?php endforeach; ?>
</select>
<input type="submit" name="submit" value="Submit">
<h1>Ungdomskole</h1>
<p><a href="Index.html">Hjem </a></p>
    
    <table>
  <tr>
    <th>Elev</th> <br>
    <th>Hold</th>
    <th>Lektion</th>
  </tr>
  <tr>
    <td><?php $sql = "SELECT Navn\n"
    . " FROM `person` \n"
    . " WHERE PersonID IN (\n"
    . " SELECT PersonID \n"
    . " FROM `personshold` \n"
    . " WHERE PersonID =  10\n"
    . " )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>". $row["Navn"];
    }
}

 ?></td>
    <td><?php $sql = "SELECT HoldNavn\n"
    . " FROM `hold` \n"
    . " WHERE HoldID IN (\n"
    . " SELECT HoldID \n"
    . " FROM `personshold` \n"
    . " WHERE PersonID = 10\n"
    . " )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> ". $row["HoldNavn"];
    }
}
        ?>
        </td>
    <td><?php $sql = "SELECT TidID\n"
    . " FROM `hold` \n"
    . " WHERE HoldID IN (\n"
    . " SELECT HoldID \n"
    . " FROM `personshold` \n"
    . " WHERE PersonID = 10\n"
    . " )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> ". $row["TidID"];
    }
}
        ?></td>
  </tr><!--
        <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
        -->
    
    
    
</body>
</html>