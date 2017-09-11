<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ungdomskole";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `person` ( Fornavn, Efternavn, Dato, M/D, Aargang, Telefon, Adresse, Mail)

VALUES ('John', 'Doe', '01/01-2001', 'M', '2017-2020', '00000000', 'vejen 1', 'example@email.com')";



$sql = "INSERT INTO `person` (PersonID, Fornavn, Efternavn, Dato, M/D, Aargang, Telefon, Adresse, Mail)

VALUES ('Sofia', 'Al-Jorani', '02/01-2001', 'D', '2017-2020', '12345678', 'vejen 2', 'example@email.com')";






if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>