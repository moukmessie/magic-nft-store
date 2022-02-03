<?php
$dsn ="sqlite:magicDB.db";
$db= new \PDO($dsn);
$firstname='mouk';
$lastname="mg";
$mail="test@gmail.com";
$pass="mouki1996";
$sql = "INSERT INTO account (firstname,lastname,mail,password) VALUES ( ?, ?, ?, ?)";
$request= $db->prepare($sql);
$request->execute(array($firstname, $lastname, $mail, $pass));
echo "succès";
