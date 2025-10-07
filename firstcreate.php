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
    <input type="text" name="fname" placeholder="fname" >
    <input type="text" name="lname" placeholder="lname" >
    <input type="submit" value="Submit">
    <button><a href="firstread.php">Züruck</a></button>
</form>
</body>
</html>
<?php

}
elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $conn = new pdo('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $stmt = $conn -> prepare('insert into employees(fname, lname) values(:fname, :lname)');
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->execute();
    echo 'Neu Eintrage wurde in DB aufgenommen !';
}

?>

