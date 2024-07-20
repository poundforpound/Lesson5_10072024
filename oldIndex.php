<?php

$user = 'root';
$password = 'root';

$dsn = 'mysql:host=localhost;dbname=php_course';

try{
	$pdo = new PDO($dsn, $user, $password);
	if($pdo){
		echo "Connected to the php_course database successfully \n";
		$sql = 'CREATE TABLE users(
			id int,
			name varchar(255),
			email varchar(255),
			address varchar(255),
			city varchar(255)
			);';
	$result =$pdo->exec($sql);

	$sql = 'SELECT * FROM users';
	$statment = $pdo->query($sql);
	$result = $statment->fetch(PDO::FETCH_ASSOC);
	var_dump($result);

	$email = 'a.zenit2014@yandex.ru';
	$sql = 'SELECT * FROM users WHERE email = :email';
	$statment = $pdo->prepare($sql);
	$statment->bindParam(":email",$email,PDO::PARAM_STR);//-?
	$execResult = $statment->execute();

	var_dump($execResult);

	$result = $statment->fetch(PDO::FETCH_ASSOC);
	var_dump($result);

	}
} catch (PDOException $e){
	echo $e->getMessage();
} 


