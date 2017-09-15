<!DOCTYPE html>
<html>
<head>
<title>Ungdomskole</title>
</head>
<body>

<h1>Indsæt hold</h1>
<p><a href="Index.html">Hjem </a></p>

    
    <?php
        
 // Denne kode er skrevet med hjælp fra https://www.w3schools.com/php/php_mysql_insert.asp,
// den er dog kraftigt tilpasset til gruppens program.   
// definer variabler og gør dem tomme
$nameErr = $emailErr = $genderErr = $websiteErr = $HighscoreErr = "";
$name = $email = $gender = $comment = $website = $Highscore = "";

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
   if (empty($_POST["Highscore"])) {
    $HighscoreErr = "Score is required";
  } else {
    $Highscore = test_input($_POST["Highscore"]);
    
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check tjek om e-mailen indeholder det den skal
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
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
$sql = "INSERT INTO hold (HoldNavn)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    // Print auto-generated id
echo " " . mysqli_insert_id($conn); 

?>

<h2></h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  HoldNavn: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $Highscore;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
    
?>
    
</body>
</html>