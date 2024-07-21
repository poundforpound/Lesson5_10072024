<?php
//Get data
$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
$detectedType = exif_imagetype($_FILES['img']['tmp_name']);
if(in_array($detectedType,$allowedTypes)){
	move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $_FILES['img']['name']);
} else{
	echo 'You chose incorrect file ';
}
$userName= $_POST['userName'];
$description = $_POST['description'];
$filesName = $_FILES['img']['name'];
// var_dump($filesName);
$user= 'root';
$password= 'root';
$dsn = "mysql:host=localhost;dbname=lesson5";

//Work with sql
try{
	$pdo= new PDO($dsn,$user,$password);
	if($pdo){
		// echo "connected to the lesson5 successfully";
		$sql = "INSERT INTO images (filename, username, description) VALUES (:filesName,:username,:description)";
		$statment = $pdo->prepare($sql);
		$statment->execute([
			":filesName"=> $filesName,
			":username"=>$userName,
			":description"=>$description,
		]);
 $result = $pdo->lastInsertId();
//  var_dump($result);
	}
} catch(PDOException $e){
	echo $e->getMessage();
}
// get data from sql
try{
	$pdo= new PDO($dsn,$user,$password);
	if($pdo){
		$sql = "SELECT * FROM images";
 		$statment = $pdo->query($sql);
		$result= $statment->fetchAll(PDO::FETCH_ASSOC);
 		var_dump($result);
	}
} catch(PDOException $e){
	echo $e->getMessage();
}

