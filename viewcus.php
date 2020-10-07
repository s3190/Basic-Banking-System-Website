<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>view all customers</title>
  
	<style>
		.button {
  		display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: blue;
        border-radius: 6px;
        outline: none;
       }

tr:nth-child(even){background-color: pink;}

tr:hover {background-color: slateblue;}
.bgimg {
	background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSrZrAJiPtglKFo3wIOtV-jq79Jk5EJBTDN4g&usqp=CAU");
	background-position: center;
  background-repeat:repeat-2;
background-size:800px 800px;
}
</style>
</head>
<body class="bgimg">
	<div class="view">
        <div class="container">
  <div class="page-header">
    <h1 style="margin-top: 30px;color:black;"><b><center>Customer information</center></b></h1>      
  </div>
<center>
<?php
echo "<table style='border: solid 3px brown;'>";
 echo "<tr style='font-size:27px;font-family: Arial, Helvetica, sans-serif;color:red;'><th>Name</th><th>Email_id</th><th>Phone Number</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 300px;height: 40px; border: 2px solid blue;font-size:24px;color:darkgreen;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Name,Email_id,Phone_Number FROM Customer_details");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
     <center>
   <form action="Transcon.php" method="POST">
     <div>
     	<h2 style="font-size: 28pt;color:brown;font-family: 'comic Sans MS',cursive,sans-serif;">Transaction</h2>
     	<h3 style="font-family: 'comic Sans MS',cursive,sans-serif;color: #004728;">FROM</h3></br>
    <select type="text" name="sender" Required>
    	<option>--select sender name from these options only--</option>
    	<option value="Varun">Varun</option>
    	<option value="Abhiram">Abhiram</option>
    	<option value="Abhishek">Abhishek</option>
    	<option value="Sruthi">Sruthi</option>
    	<option value="Vishali">Vishali</option>
    	<option value="Ramesh">Ramesh</option>
    	<option value="Sai Vaishnavi">Sai Vaishnavi</option>
    	<option value="Akshay">Akshay</option>
    	<option value="Sushma">Sushma</option>
    	<option value="Madhavi">Madhavi</option>
    </select>
       </br>
	<h3 style="font-family: 'comic Sans MS',cursive,sans-serif;color: #004728;">TO</h3></br>
    <select  type="text" name="receiver" Required>
    	<option>--select receiver name from these options only--</option>
    	<option value="Varun">Varun</option>
    	<option value="Abhiram">Abhiram</option>
    	<option value="Abhishek">Abhishek</option>
    	<option value="Sruthi">Sruthi</option>
    	<option value="Vishali">Vishali</option>
    	<option value="Ramesh">Ramesh</option>
    	<option value="Sai Vaishnavi">Sai Vaishnavi</option>
    	<option value="Akshay">Akshay</option>
    	<option value="Sushma">Sushma</option>
    	<option value="Madhavi">Madhavi</option>
    </select></br></br>
    Credits to be transfered(*must be greater than 0) :<input type="text" name="credits" placeholder="Enter credits" Required>
  <br/></br>
    	<button class="button" type="submit" value="Transfer">Transfer</button></br></br>
    	<a class="button" href="http://localhost/sphtpg/home.html" >back</a>
</form>
</div>
</center>
</body>
</html>