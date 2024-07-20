<?php

$img = $_POST['img'];
$img_info = getimagesize($img);
$userName= $_POST['userName'];
$description = $_POST['description'];


var_dump($img_info);

