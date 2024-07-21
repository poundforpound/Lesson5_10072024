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
<form method="get">
    <label for="sort">Сортировка:</label>
    <select name="sort" id="sort">
        <option value="username">По имени пользователя</option>
        <option value="upload_date">По дате загрузки</option>
    </select>
    <input type="submit" value="Сортировать">
    <div class="gallery">
        <?php
     $user= 'root';
		 $password= 'root';
		 $dsn = "mysql:host=localhost;dbname=lesson5";
         $sort = $_GET['sort'];
		 try{
			 $pdo= new PDO($dsn,$user,$password);
			 if($pdo){
				if ($sort == 'username') {
                    $sql = "SELECT * FROM images ORDER BY username ASC";
                } elseif ($sort == 'upload_date') {
                    $sql = "SELECT * FROM images ORDER BY created_at DESC";
                } else {
                    $sql = "SELECT * FROM images"; // Запрос по умолчанию без сортировки
                }
					$statment = $pdo->query($sql);
				 $result= $statment->fetchAll(PDO::FETCH_ASSOC);
					// var_dump($result);
			 }
		 } catch(PDOException $e){
			 echo $e->getMessage();
		 }
        if (count($result) > 0) {
          foreach($result as $row){
            echo "<div class=galery>";
            echo "<img src='uploads/" .$row['filename']."'> <br> ".$row['filename']." <br> ".$row['description']."";
            echo "</div>";
          }
        } else {
            echo "0 результатов";
        }
        ?>
    </div>

</form>
</body>
</html