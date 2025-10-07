<?php
$conn = new pdo('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
$sql = 'delete from employees where id = :id';
$id = $_GET['id'];
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':id', $id);
$stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
</head>
<body>
   <p>Ausgewählte Eintrag wurde von dem DB gelöscht !</p>
</body>
</html>
