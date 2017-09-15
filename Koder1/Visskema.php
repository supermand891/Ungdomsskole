<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
        <head>
    
	<title>Ungdomskolen2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<meta name="decription" content="ungdomskole skema" >
		<meta name="keywords" content="Database, ungdomskole, skema, elever, lære, hold" >
		<meta name="author" content="Joachim Bunger" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<link rel="shortcut icon" href="images/skema.png" >

</head>
<body>
<div id="header">
   <link rel="shortcut icon" href="images/skema.png" >
<!-- ********************************
Logoet til vores <head> er taget fra https://image.flaticon.com/teams/slug/freepik.jpg som et gratis logo. Dette logo er valgt fordi det lignede en robot. ****************************************!-->
<body>
<div id="header"> 
		<div id="logo"><a style="text-decoration:none" href="index.html">
            
            <h3>Se skema</h3></a></div>
</div>

    <?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ungdomsskolen 2";

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
$pdo = new PDO('mysql:host=localhost;dbname=Ungdomsskolen 2', 'root', '');

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
<input type="submit" name="submit" value="Indsæt">
<h1>Skemaet</h1>

    
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
    
  <div id="wrapper">

	<table id="table1" cellspacing="20">
		
			<td style="cursor:pointer" onclick="location.href='index.html'"><h3>Tilbage</h3><img src="images/hjem.png" alt="Hjem" style="width:50px;height:50px;"></td>
        
        
			<td style="cursor:pointer" onclick="location.href='Indtasthold.php'">    
            <h3>hold</h3><img src="images/hold.ico" alt="Hold" style="width:50px;height:50px;"></td>
        
        
			<td style="cursor:pointer" onclick="location.href='personer.php'">    
            <h3>Personer</h3><img src="images/person.png" alt="Person" style="width:50px;height:50px;"></td>
        
        
        
        <tr>
			
		</tr>
	</table>
	
<div id="footer"><br />&copy; Ungdomskolen 2017 af Joachim Bünger </div>  
      
    
</body>
</html>