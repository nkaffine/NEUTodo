<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/28/17
 * Time: 9:12 PM
 */
    require_once('../db.php');
    require_once('../libraries/utils.php');
    $array = array();
    try {
        if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
            throw new Exception("4-1-1");
        }
        try {
            $user_id = apiLoginCheck("4-2", "4-3");
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        if(count($_GET)){
            $list_id = validNumbers($_GET['list_id'], 10);
        }
        if(empty($list_id)){
            throw new Exception("4-4-2");
        }
        $query = "update todo_lists set active = 0 where user_id = {$user_id} and list_id = {$list_id}";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            throw new Exception("4-5-3");
        }
        if(mysqli_affected_rows($connection) == -1){
            throw new Exception("4-6-6");
        }
        $array['result'] = 1;
        $array['error'] = null;
    } catch (Exception $exception) {
        $array['result'] = 0;
        $array['error'] = $exception->getMessage();
    }
    echo json_encode($array);
?>