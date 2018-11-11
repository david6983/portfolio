<?php 
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    chargeClasse("../phpClasses/user");
    chargeClasse("../phpClassesManagers/usersManager");

    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();

    $userMan->addUser($_POST["username"]);

    header("location: ../../index.php")
?>