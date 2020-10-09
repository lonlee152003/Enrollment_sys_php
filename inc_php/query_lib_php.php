<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of query_lib_php
 *
 * @author Ronald S. Domingo
 */
include './inc_php/db_conn_php.php';

class query_only_php
{
    public function query_only_php_login($var_id_number, $var_password )
    {
    $get_error_msg_query_only_php_login = "OFF";
    $db_pdo = db_config();
    $sql_query = $db_pdo->prepare("SELECT * FROM enrollment_sys_php_user_data WHERE id_number=:id_number_param && password=:password_param");
    $sql_query->execute(array('id_number_param'=>$var_id_number, 'password_param'=>$var_password));
    $count = $sql_query->rowCount();
    $posts = $sql_query->fetchAll();

        if( $count > 0 )
        {
            foreach ($posts as $viewposts)
            {
                if(($viewposts->id_number == $var_id_number) && ($viewposts->password == $var_password))
                {
                $get_error_msg_query_only_php_login = "ON";
                $_SESSION['id_number'] = $var_id_number;
                $_SESSION['password'] = $var_password;                
                }
            }
        }
    return $get_error_msg_query_only_php_login;
    }
    
    public function query_only_php_user_details($var_id_number_1, $var_password_1 )
    {
    $db_pdo = db_config();
    $sql_query = $db_pdo->prepare("SELECT * FROM enrollment_sys_php_user_data WHERE id_number=:id_number_param && password=:password_param");
    $sql_query->execute(array('id_number_param'=>$var_id_number_1, 'password_param'=>$var_password_1));
    $count = $sql_query->rowCount();
    $posts = $sql_query->fetchAll();

        if( $count > 0 )
        {
            foreach ($posts as $viewposts)
            {
                return $viewposts;
            }
        }
    }
}
?>
