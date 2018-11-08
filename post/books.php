<?php

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json", true); 
// Open connection
try 
{
	$pdo = new PDO('mysql:host=localhost;dbname=varta_battery', 'root', '205205');

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}
// Run Query
$sql 	= 'SELECT * FROM books';
$stmt 	= $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
$stmt->execute();
$json_return = array();
while ($row = $stmt->fetch())
{
	array_push($json_return,
		array(
			"book_id" => $row["ID"],
			"book_name" => $row["name"],
			"book_price" => $row["price"],
			"book_author" => $row["author"],
			"book_rating" => $row["rating"],
			"book_publisher" => $row["publisher"]
		)
	
	);
}
echo json_encode($json_return);
// Close connection
?>