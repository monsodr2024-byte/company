<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create</title>
    </head>
    <body>
    <form method="post" action="">
        <label>Name:
        <input type="text" name="name" placeholder="neu Abteilungsname" >
        </label><br>
        <label>Hiring
        <input type="checkbox" name="is_hiring" value="1">
        </label><br>
        <label>Onsite
        <input type="radio" name="work_mode" value="onsite">
        </label><br>
        <label>remote
            <input type="radio" name="work_mode" value="remote">
        </label><br>
        <label>hybrid
            <input type="radio" name="work_mode" value="hybrid">
        </label><br>
        <input type="submit" value="Submit">
        <button><a href="read">Züruck</a></button>
    </form>
    </body>
    </html>
    <?php
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $work_mode = $_POST["work_mode"] ?? false;

    $is_hiring = $_POST["is_hiring"] ?? 0;
    $conn = new pdo('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $stmt = $conn -> prepare('insert into department(name,is_hiring,work_mode) values(:name,:is_hiring,:work_mode)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->bindParam(':work_mode', $work_mode);
    $stmt->execute();
    echo 'Neu Eintrage wurde in DB aufgenommen !';
}
header(realpath("read.php"));
?>