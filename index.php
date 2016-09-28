<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    $db->query("CREATE TABLE IF NOT EXISTS students(id INTEGER PRIMARY KEY, name CHAR(255), mobile CHAR(50), address STRING);");
    $tablesquery = $db->query("SELECT * FROM students");
    //$tables = $tablesquery->fetchArray(SQLITE3_ASSOC);
    $result = $tablesquery->fetchArray();
    
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
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <form action="action.php" method="post">
                <tr>
                    <td><input type="text" name="userName" ></td>
                    <td><input type="text" name="userMobile" ></td>
                    <td><input type="text" name="userAddress" ></td>
                    <td><button type="submit" name="create" value="save">Save</button></td>
                </tr>
            </form>
        </tbody>
    </table>
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
            <?php
                if(count($result) > 0) {
            
                    for ($i = 0; $i <= count($result); $i++){
            ?>
            <tr>
                <td><?=$result[0]?></td>
                <td><?=$result[1]?></td>
                <td><?=$result[2]?></td>
                <td><?=$result[3]?></td>
                <td>Edit | Delete</td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</body>

</html>