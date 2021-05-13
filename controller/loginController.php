
<?php

    include_once "../model/class.login.php"; 
    include_once "../model/class.db.php"; 

    $user = htmlentities($_POST['user']);
    $pass = htmlentities($_POST['pass']);  

    $valida=New Login();

    if ($valida->autentica($user,$pass)){
        echo 1;
    }else {
        echo 2;
    }

?>