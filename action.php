<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    
    $actoin = $_REQUEST['action'];
    
    if($actoin == 'save'){
        
        $userName = $_REQUEST['userName'];
        $userMobile = $_REQUEST['userMobile'];
        $userAddress = $_REQUEST['userAddress'];
        
        $insert = $db->exec("INSERT INTO students (name, mobile, address) VALUES ('$userName', '$userMobile', '$userAddress')");
        
        if($insert){
            header('Location: index.php');
        }
    }
    if($actoin == 'edit'){
        
        $id = $_REQUEST['id'];
        
        header("Location: index.php?id=$id");
    }
    if($actoin == 'update'){
        
        $userId = $_REQUEST['userId'];
        $userName = $_REQUEST['userName'];
        $userMobile = $_REQUEST['userMobile'];
        $userAddress = $_REQUEST['userAddress'];
        $update = $db->exec("UPDATE students SET name='$userName', mobile='$userMobile', address='$userAddress' WHERE id=$userId");
        
        if($update){
            header('Location: index.php');
        }
    }
    if($actoin == 'delete'){
        
        $id = $_REQUEST['id'];
        $delete = $db->exec("DELETE FROM students WHERE id=$id");
        
        if($delete){
            header('Location: index.php');
        }
        
    }
   
    
}

