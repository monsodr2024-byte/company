<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

#$id = $_GET["id"];
$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
$sql = 'select * from employees where id = :id';
$stmt = $conn -> prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
$fname = $result["fname"];
$lname = $result["lname"];


    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Update</title>
    </head>
    <body>
    <form method="POST" action="">
        <input type="text" name="fname" placeholder="fname" value = "<?php echo $fname ?>" >
        <input type="text" name="lname" placeholder="lname" value = "<?php echo $lname ?>" >
        <input type="text" name="id" placeholder="id" value="<?php echo $id ?>" >
        <input type="submit" value="Submit">
    </form>
    </body>
    </html>
    <?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo 'Hallo dein formular wird bearbeitet und Änderungen wurde vorgenommen !';
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $id = $_POST["id"];
    $conn = new pdo('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'update employees set fname=:fname, lname=:lname where id=:id';
    $stmt = $conn -> prepare($sql);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

}
?>