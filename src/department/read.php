<?php

$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
$sql = 'select * from department';
$stmt = $conn -> prepare($sql);
$stmt->execute();

echo '<pre>';
$user2 = $stmt->fetchAll(Pdo::FETCH_ASSOC);
echo '</pre>';



function createTable(array $data, array|false $ueberschrifeten=false, string $farbe_1='blau',string $farbe_2='rot')
{
    echo "<table>\n";
    echo "<tr>\n";
    if($ueberschrifeten==false){
        foreach ($data[0] as $key=>$value){
            echo "<th>$key</th>\n";
        }
    }
    else{
        foreach ($ueberschrifeten as $key_uber) {
            echo "<th>$key_uber</th>\n";
        }
    }
    echo "</tr>\n";

    for ($i = 0; $i < count($data); $i++) {
        if ($i % 2 == 0 ){
            $class = $farbe_1;
        }else{
            $class = $farbe_2;
        }
        echo "<tr style='background-color:$class'>\n";
        foreach ($data[$i] as $key=>$value){
            if($key === "is_hiring"){$value="ja";}
            echo "<td>$value</td>\n";
        }
        $id = $data[$i]['id'];
        echo "<td><a href='delete_department.php?id=$id'>Delete</a></td>";
        echo "<td><a href='update_department.php?id=$id'>Update</a></td>";
        echo "</tr>\n";
    }

    echo "</table>\n";
}

?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Read</title>
    <link href='style.css' rel='stylesheet' >
</head>
<style>
    td{border-top: 2px solid blue;
        border-left: 2px solid blue;
    }
    table{border-top: 2px solid blue;
        border-left: 2px solid blue;
    }
    tr{border-top: 2px solid blue;
        border-left: 2px solid blue;
    }

</style>
<body>
<!-- hier kommt noch funktionsaufruf, die funktion wird kode für table liefern-->
<?php
createTable($user2,false,'lightblue','rosybrown');
echo "\n\n";
?>
<br>
<button><a href="create">Neue Entrag</a></button>
</body>
</html>

