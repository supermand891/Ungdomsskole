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

$sql = "SELECT * FROM `person`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> ID ". $row["PersonID"].
            
            " Fornavn ". $row["Fornavn"].
            
            " Efternavn " . $row["Efternavn"].
                        
            " Fødselsdag ". $row["Dato"].
            
            " Køn " . $row["M/D"].
                        
            " Årgang ". $row["Aargang"].
            
            " Telefon " . $row["Telefon"].
                        
            " Adresse ". $row["Adresse"].
            
            " Mail " . $row["Mail"].
            "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>