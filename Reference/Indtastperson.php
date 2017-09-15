<!DOCTYPE html>
<html>
<head>
<title>Ungdomskole</title>
</head>
<body>

<h1>Indtast personer</h1>
<p><a href="Index.html">Hjem </a></p>
    
     <?php
        
 // Denne kode er skrevet med hjælp fra https://www.w3schools.com/php/php_mysql_insert.asp,
// den er dog kraftigt tilpasset til gruppens program.   
// definer variabler og gør dem tomme
$nameErr = $HoldIDErr = $PersonIDErr = $websiteErr = $HighscoreErr = "";
$name = $HoldID = $PersonID = $comment = $website = $Highscore = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Tjek om navnet kun indeholder bogstaver og mellemrum
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }    
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    $servername = "localhost";
$username = "JSKC";
$password = "Swift";
$dbname = "Ungdomskole";

    
    // Skaber forbindelse
$conn = new mysqli($servername, $username, $password, $dbname);
// Tjekker forbindelse
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO person (Navn)
VALUES ('$name')";
    

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully, ID:";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    

// Print auto-generated id
echo " " . mysqli_insert_id($conn);   

?>

<h2></h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Navn: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span> 
  <input type="submit" name="submit" value="Submit">
</form>
    <?php
    
     $servername = "localhost";
$username = "JSKC";
$password = "Swift";
$dbname = "Ungdomskole";

    
    // Skaber forbindelse
$conn = new mysqli($servername, $username, $password, $dbname);
// Tjekker forbindelse
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO personshold (HoldID, PersonID)
VALUES ('$HoldID', '$PersonID')";
 
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
    
    ?>
    <h2></h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  HoldID: <input type="text" name="HoldID" value="<?php echo $HoldID;?>">
  <span class="error">* <?php echo $HoldIDErr;?></span>
     PersonID: <input type="text" name="PersonID" value="<?php echo $PersonID;?>">
  <span class="error">* <?php echo $PersonIDErr;?></span>
  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

