<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    #$id = $_GET["id"];
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'select * from department where id = :id';
    $stmt = $conn -> prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($result['is_hiring']){
        $checked = "checked";
    } else{$checked = "";}

    $name = $result["name"];
    $is_hiring = $result["is_hiring"];
    $work_mode = $result["work_mode"];
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
        <input type="hidden" name="id" value="<?=$id?>">
        <label>Name:
            <input type="text" name="name" placeholder="neu Abteilungsname" value="<?=$name?>" >
        </label><br>
        <label>Hiring
            <input type="checkbox" name="is_hiring" value="1" <?=$checked?>>
        </label><br>
        <label>Onsite
            <input type="radio" name="work_mode" value="onsite" <?=$work_mode === "onsite" ? "checked" : ""?>>
        </label><br>
        <label>remote
            <input type="radio" name="work_mode" value="remote" <?=$work_mode === "remote" ? "checked" : ""?>>
        </label><br>
        <label>hybrid
            <input type="radio" name="work_mode" value="hybrid" <?=$work_mode === "hybrid" ? "checked" : ""?>>
        </label><br>
        <input type="submit" value="Submit">
        <a href="read">Züruck</a>

    </form>
    </body>
    </html>
    <?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo 'Hallo dein formular wird bearbeitet und Änderungen wurde vorgenommen !';
    $conn = new pdo('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'update department set name=:name, is_hiring=:is_hiring , work_mode=:work_mode where id=:id';
    $name = $_POST["name"];
    $is_hiring = $_POST["is_hiring"] ?? 0;
    $id = $_POST["id"];
    $work_mode = $_POST["work_mode"];


    $stmt = $conn -> prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':work_mode', $work_mode);

    $stmt->execute();
}
?>