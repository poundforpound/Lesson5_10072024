<?php
$user = 'root';
$password = 'root';

$dsn = "mysql:host=localhost;dbname=php_course";



try{
	$pdo = new PDO($dsn, $user, $password);
	if($pdo){
		echo "connected to the php_course database successfully";	
		$email = 'a.zenit2014@yandex.ru';
		$sql = "SELECT *FROM users WHERE email= :email";
		$statment = $pdo->prepare($sql);
		$statment ->bindParam(':email',$email,PDO::PARAM_STR);
		$execResult = $statment->execute();
		$result = $statment->fetch(PDO::FETCH_ASSOC);
		var_dump($result);
		// $result = $statment->fetch(PDO::FETCH_ASSOC);
		// var_dump($result);
}
} catch (PDOException $e){
	echo $e->getMessage();
}