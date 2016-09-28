<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    $db->query("CREATE TABLE IF NOT EXISTS students(id INTEGER PRIMARY KEY, name CHAR(255), mobile CHAR(50), address STRING);");
    $results = $db->query('SELECT id, name, mobile, address FROM students');
    
}
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $studentDataQuery = $db->query("SELECT id, name, mobile, address FROM students WHERE id=$id");
    $studentData = $studentDataQuery->fetchArray();
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
                    
                    <td><input type="text" name="userName" value="<?php if(isset($studentData)) echo $studentData['name'];?>" ></td>
                    <td><input type="text" name="userMobile" value="<?php if(isset($studentData)) echo $studentData['mobile'];?>"></td>
                    <td><input type="text" name="userAddress" value="<?php if(isset($studentData)) echo $studentData['address'];?>"></td>
                    <?php if(isset($studentData)){ ?>
                    <input type="hidden" name="userId" value="<?php if(isset($studentData)) echo $studentData['id'];?>" >
                    <td><button type="submit" name="action" value="update">Update</button> | <a href="index.php">Add New</a></td>
                    <?php } else {?>
                    <td><button type="submit" name="action" value="save">Save</button></td>
                    <?php }?>
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
               while ($row = $results->fetchArray()) {
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['mobile']?></td>
                <td><?=$row['address']?></td>
                <td><a href="action.php?id=<?=$row['id']?>&action=edit">Edit</a> | <a href="action.php?id=<?=$row['id']?>&action=delete">Delete</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>

</html>