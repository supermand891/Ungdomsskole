INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Per', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Hans', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Peter', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Ole', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Jens', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Poul', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Ib', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Bo', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Pasta', '2017-08-03')
INSERT INTO `person` (`PersonID`, `Navn`, `Fødselsdag`) VALUES (NULL, 'Autistic screeching', '2017-08-03')


INSERT INTO `hold` (`HoldID`, `HoldNavn`, `PersonID`, `TidID`) VALUES (NULL, 'IT', NULL, NULL)
INSERT INTO `hold` (`HoldID`, `HoldNavn`, `PersonID`, `TidID`) VALUES (NULL, 'Tysk', NULL, NULL)
INSERT INTO `hold` (`HoldID`, `HoldNavn`, `PersonID`, `TidID`) VALUES (NULL, 'MAT', NULL, NULL)
INSERT INTO `hold` (`HoldID`, `HoldNavn`, `PersonID`, `TidID`) VALUES (NULL, 'Dansk', NULL, NULL)

INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('5', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('6', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('14', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('10', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('9', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('7', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('12', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('11', '3');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('7', '4');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('6', '4');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('9', '4');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('11', '4');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('14', '4');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('5', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('6', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('14', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('10', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('9', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('7', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('12', '5');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('11', '6');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('7', '6');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('6', '6');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('9', '6');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('11', '6');
INSERT INTO `personshold` (`PersonID`, `HoldID`) VALUES ('14', '6');



 SELECT HoldNavn, TidID
    FROM `hold` 
    WHERE HoldID IN (
        SELECT HoldID 
        FROM `personshold` 
        WHERE PersonID = 5
    );
    
    
    
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Ungdomskole</h1>
<p><a href="Index.html">Hjem </a></p>
    
    
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
$sql = "SELECT HoldNavn, TidID\n"
    . " FROM `hold` \n"
    . " WHERE HoldID IN (\n"
    . " SELECT HoldID \n"
    . " FROM `personshold` \n"
    . " WHERE PersonID = 5\n"
    . " )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> HoldNavn: ". $row["HoldNavn"]. " - Tid: ". $row["TidID"]. " ";
    }
} else {
    echo "0 results";
}
?>

</body>
</html>


    
    <?php 
    $ID="";
    if ($ID!=NULL){
        $ID=5;
    } 
        
   
    $IDErr = ""; 
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
    
$sql = "SELECT HoldNavn, TidID\n"
    . " FROM `hold` \n"
    . " WHERE HoldID IN (\n"
    . " SELECT HoldID \n"
    . " FROM `personshold` \n"
    . " WHERE PersonID " . $_SESSION["ID"] . ".\n"
    . " )";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> HoldNavn: ". $row["HoldNavn"]. " - Tid: ". $row["TidID"]. " ";
    }
} else {
    echo "0 results";
}
?>



