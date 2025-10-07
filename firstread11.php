<?php
$users = [
    [
        "lastname" => "Abo Shameh",
        "firstname" => "Ahmad",
        "domain" => "www.ahmad.bbq.zz.",
        "ip" => "10.101.105.100",
        "city" => "Berlin",
        "country" => "Germany"
    ],
    [
        "lastname" => "Bafaiz",
        "firstname" => "Zamir",
        "domain" => "www.zamir.bbq.zz.",
        "ip" => "10.101.105.105",
        "city" => "Paris",
        "country" => "France"
    ],
    [
        "lastname" => "Bayar",
        "firstname" => "Gülden",
        "domain" => "www.guelden.bbq.zz.",
        "ip" => "10.101.105.110",
        "city" => "Istanbul",
        "country" => "Turkey"
    ]];


$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
$sql = 'select * from employees';
$stmt = $conn -> prepare($sql);
$stmt->execute();

echo '<pre>';
$user2 = $stmt->fetchAll(Pdo::FETCH_ASSOC);
echo '</pre>';



function createTable(array $data,string $farbe_1='blau',string $farbe_2='rot')
{
    $string = "";
    $string .= "<table>";
    $string .= "<tr>";
    foreach ($data[1] as $key=>$value){
        $string .= "<th>";
        $string .= "$key";
        $string .= "</th>";
    }
    $string .= "</tr>";

    foreach ($data as $index => $user) {
        if ($index % 2 == 0 ){
            $class = $farbe_1;
        }else{
            $class = $farbe_2;
        }

        $string .= "<tr style='background-color:$class'>\n";
        foreach ($data as $item){
            $string .= "<td>";
            $string .= "$item";
            $string .= "</td>";
        }
        $string .= "<td class='link' style='background-color: white'>";
        $id = $data['id'];
        $string .="<a href='firstdelete.php?id=$id'>Delete</a>'" ;
        $string .="</td>" ;
        $string .="</tr>" ;
    }
    $string .="</table>\n";
    return $string;
}

?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <link href='style.css' rel='stylesheet' >
</head>
<body>
<!-- hier kommt noch funktionsaufruf, die funktion wird kode für table liefern-->
<?php
createTable($user2,'lightgreen','lightbrown');
echo "\n\n";
?>

</body>
</html>

