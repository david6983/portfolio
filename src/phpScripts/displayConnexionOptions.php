<?php 
    /* display user_name as option in the select  */

    /* get classes for users management */
    function chargeClasse($classe){
        require $classe.'.php';
    }
    spl_autoload_register('chargeClasse');  
    /* even if the script is stored in src/phpScript, the script is called in index.php */
    chargeClasse("src/phpClasses/User"); /* that justify the link */
    chargeClasse("src/phpClassesManagers/usersManager");

    /* new user manager */
    $userMan = new usersManager("localhost","2key","root","");
    $userMan->connect();
    /* call to the function to display option in the select */
    $userMan->createOptionFromUserName();
?>