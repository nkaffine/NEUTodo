<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/28/17
 * Time: 8:31 PM
 */
    require_once('../db.php');
    require_once('../libraries/utils.php');
    $array = array();
    try {
        if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
            throw new Exception("3-1-1");
        }
        try {
            $user_id = apiLoginCheck("3-2", "3-3");
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        if(count($_GET)){
            $list_name = validInputSizeAlpha($_GET['list_name'], 255);
        }
        if(empty($list_name)){
            throw new Exception("3-4-2");
        }
        $query = "select max(list_id) from todo_lists where user_id = {$user_id}";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            throw new Exception("3-5-3");
        }
        $row = @ mysqli_fetch_array($result);
        $list_id = $row['max(list_id)'] + 1;
        $query = "insert into todo_lists (user_id, list_id, list_name) values ($user_id, $list_id, '{$list_name}')";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            throw new Exception("3-6-3");
        }
        if(mysqli_affected_rows($connection) == -1){
            throw new Exception("3-7-4");
        }
        $array['results'] = array('name'=>$list_name, 'id'=>$list_id, 'color'=>'#000000');
        $array['error'] = null;
    } catch (Exception $exception){
        $array['results'] = 0;
        $array['error'] = $exception->getMessage();
    }
    echo json_encode($array);
?>