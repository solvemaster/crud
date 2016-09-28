<?php
spl_autoload_register(function ($class) {
    include("$class".".php");
});

$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    
    $actoin = $_POST['create'];
    
    if($actoin == 'save'){
        
        $userName = $_POST['userName'];
        $userMobile = $_POST['userMobile'];
        $userAddress = $_POST['userAddress'];
        
        $insert = $db->exec("INSERT INTO students (name, mobile, address) VALUES ('.$userName.', '.$userMobile.', '.$userAddress.')");
        
        if($insert){
            header('Location: index.php');
        }
    }
    
}

