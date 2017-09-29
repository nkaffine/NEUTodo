<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/28/17
 * Time: 9:24 PM
 */
    require_once('../db.php');
    require_once('../libraries/utils.php');
    $array = array();
    try {
        if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
            throw new Exception("5-1-1");
        }
        try {
            $user_id = apiLoginCheck("5-2", "5-3");
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        if(count($_GET)){
            $list_id = validNumbers($_GET['list_id'], 10);
            $list_name = validInputSizeAlpha($_GET['list_name'], 255);
        }
        if(empty($list_id) || empty($list_name)){
            throw new Exception("5-4-2");
        }
        $query = "update todo_lists set list_name = '{$list_name}' where list_id = {$list_id}";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            throw new Exception("5-5-3");
        }
        if(mysqli_affected_rows($connection) == -1){
            throw new Exception("5-6-6");
        }
        $array['result'] = 1;
        $array['error'] = null;
    } catch (Exception $exception) {
        $array['result'] = 0;
        $array['error'] = $exception->getMessage();
    }
    echo json_encode($array);
?>