<?php
#echo "<pre>";
#var_dump(explode('/',$_SERVER['REQUEST_URI']));

$request = explode('/',$_SERVER['REQUEST_URI']);
$entity = $request['1'];
$method = $request['2'];
$id = $request['3'] ?? null;
# department
if($entity === 'department' and $method === 'create'){
    require_once "../src/department/create.php";
} elseif ($entity === 'department' and $method === 'read'){
    require_once "../src/department/read.php";
} elseif ($entity === 'department' and $method === 'delete'){
    require_once "../src/department/delete.php";
} elseif ($entity === 'department' and $method === 'update'){
    require_once "../src/department/update.php";
}

# employee
elseif ($entity === 'employee' and $method === 'create'){
    require_once "../src/employee/create.php";
} elseif ($entity === 'employee' and $method === 'read'){
    require_once "../src/employee/read.php";
} elseif ($entity === 'employee' and $method === 'delete'){
    require_once "../src/employee/delete.php";
} elseif ($entity === 'employee' and $method === 'update'){
    require_once "../src/employee/update.php";
}


else{echo '404';}
echo"<pre>";