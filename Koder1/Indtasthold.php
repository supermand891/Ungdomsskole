<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
        <head>
    
	<title>Ungdomskolen2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="decription" content="ungdomskole skema" >
		<meta name="keywords" content="Database, ungdomskole, skema, elever, lære, hold" >
		<meta name="author" content="Joachim Bunger" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<link rel="shortcut icon" href="images/hold.ico" >

</head>
<body>
<div id="header">
   <link rel="shortcut icon" href="images/hold.ico" >
<!-- ********************************
Logoet til vores <head> er taget fra https://image.flaticon.com/teams/slug/freepik.jpg som et gratis logo. Dette logo er valgt fordi det lignede en robot. ****************************************!-->
<body>
<div id="header"> 
		<div id="logo"><a style="text-decoration:none" href="index.html">
            
            <h3>Indsæt på hold</h3></a></div>
</div>

       <?php
        
 // Denne kode er skrevet ved brug af  https://www.w3schools.com/php/php_mysql_insert.asp,   
// I den følgende kode har vi tilføjet nogle nye variabler: $ nameErr, $emailErr, $genderErr og $websiteErr. Disse fejlvariabler indeholder fejlmeddelelser for de krævede felter. Vi har også tilføjet et if else-udsagn for hver $_POST-variabel. Dette kontrollerer om variablen $_POST er tom (med funktionen PHP tom ()). Hvis det er tomt, gemmes en fejlmeddelelse i de forskellige fejlvariabler, og hvis den ikke er tom, sender den brugerinddataene gennem test_input () funktionen: 
    
$nameErr =  "";
$name =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
        if (empty($_POST["name"])) 
            {$nameErr = "Navn mangler";} else 
        {
            $name = test_input($_POST["name"]);
// Går navnet igennem, og tjekker om det er skrevet ordenligt. Kun ved brug af Bogstaver fra a-z og A-Z 
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {$nameErr = "Kun bogstaver";}
        }     
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ungdomsskolen 2";

    
    // Skaber forbindelse tl DB
$conn = new mysqli($servername, $username, $password, $dbname);
    // Tjekker forbindelse til DB
if ($conn->connect_error) 
{die("Connection failed: " . $conn->connect_error);}
    
$sql = "INSERT INTO hold (HoldNavn)
VALUES ('$name')";

if ($conn->query($sql) === TRUE) 
{echo "HoldID nr.";} else {echo "Error: " . $sql . "<br>" . $conn->error;}
    
// Printer den autogenerede ID
echo " " . mysqli_insert_id($conn); 

?>

<h2></h2>
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Hold Navn: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error"><?php echo $nameErr;?></span>
    <input type="submit" name="submit" value="Indsæt">
</form>

<?php
echo "<h3>Nyt hold oprettet</h3>";
echo $name;
    
?>   
   
    
    
<div id="wrapper">

	<table id="table1" cellspacing="20">
		
			<td style="cursor:pointer" onclick="location.href='index.html'"><h3>Tilbage</h3><img src="images/hjem.png" alt="Hjem" style="width:50px;height:50px;"></td>
        
        
			<td style="cursor:pointer" onclick="location.href='Indtastperson.php'">    
            <h3>Person</h3><img src="images/person.png" alt="Person" style="width:50px;height:50px;"></td>
        
        
			<td style="cursor:pointer" onclick="location.href='Visskema.php'">    
            <h3>Skema</h3><img src="images/skema.png" alt="Skema" style="width:50px;height:50px;"></td>
        
        
        
        <tr>
			
		</tr>
	</table>
	
<div id="footer"><br />&copy; Ungdomskolen 2017 af Joachim Bünger </div>
</body>
</html>