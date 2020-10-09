<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','enrollment_sys_php');
    $dsn;
    $pdo;
            
    function db_config()
    {
        $dsn = 'mysql:host='.HOST.';dbname='.DATABASE;
        $pdo = new PDO( $dsn, USER, PASSWORD );
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
?>