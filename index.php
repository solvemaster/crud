<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    $db->query("CREATE TABLE IF NOT EXISTS students(id INTEGER PRIMARY KEY, name CHAR(255), mobile CHAR(50), address STRING);");
    $result = $db->query("SELECT * FROM students");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>

<body>
    <table border='1'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <pre>
            <?php
                //print_r($result->fetchArray());
                //foreach($result->fetchArray() as $value):
            ?>
            </pre>
            <tr>
                <td><?//=$value['id']?></td>
                <td><?//=$value['name']?></td>
                <td><?//=$value['name']?></td>
                <td><?//=$value['name']?></td>
                <td>Edit | Delete</td>
            </tr>
            <?php
                //endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>