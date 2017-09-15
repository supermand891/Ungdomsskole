<!DOCTYPE html >
    <html>
        <head>
    
	<title>Ungdomskolen2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="decription" content="ungdomskole skema" >
		<meta name="keywords" content="Database, ungdomskole, skema, elever, lære, hold" >
		<meta name="author" content="Joachim Bunger" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<link rel="shortcut icon" href="images/person.png" >

</head>
<body>
<div id="header">
   <link rel="shortcut icon" href="images/person.png" >
<!-- ********************************
Logoet til vores <head> er taget fra https://image.flaticon.com/teams/slug/freepik.jpg som et gratis logo. Dette logo er valgt fordi det lignede en robot. ****************************************!-->
<body>
<div id="header"> 
		<div id="logo"><a style="text-decoration:none" href="index.html">
            
            <h3>Indsæt personer</h3></a></div>
</div>

     <?php
        
 // Denne kode er skrevet ved brug af  https://www.w3schools.com/php/php_mysql_insert.asp,   
// I den følgende kode har vi tilføjet nogle nye variabler: $ nameErr, $emailErr, $genderErr og $websiteErr. Disse fejlvariabler indeholder fejlmeddelelser for de krævede felter. Vi har også tilføjet et if else-udsagn for hver $_POST-variabel. Dette kontrollerer om variablen $_POST er tom (med funktionen PHP tom ()). Hvis det er tomt, gemmes en fejlmeddelelse i de forskellige fejlvariabler, og hvis den ikke er tom, sender den brugerinddataene gennem test_input () funktionen:   
    
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
$username = "root";
$password = "";
$dbname = "Ungdomsskolen 2";

    
// Skaber forbindelse
$conn = new mysqli($servername, $username, $password, $dbname);
// Tjekker forbindelse
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `persontabel`(`Navn`) VALUES ('$name')";
    

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
$username = "root";
$password = "";
$dbname = "Ungdomsskolen 2";

    
    // Skaber forbindelse
$conn = new mysqli($servername, $username, $password, $dbname);
// Tjekker forbindelse
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `personhold`(`PersonID`, `HoldID`) VALUES ('$PersonID', '$HoldID')";
 
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
