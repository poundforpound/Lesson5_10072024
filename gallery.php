<!DOCTYPE html>
<html>
<head>
    <title>Галерея</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }

        .gallery img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="gallery">
        <?php
     $user= 'root';
		 $password= 'root';
		 $dsn = "mysql:host=localhost;dbname=lesson5";
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
        if ($result->num_rows > 0) {
            while($row = $result) {
                echo '<img src="["filename"]' . $row["image_name"] . '" alt="' . $row["image_alt"] . '">';
            }
        } else {
            echo "0 результатов";
        }

        ?>
    </div>
</body>
</html