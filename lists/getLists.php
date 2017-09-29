<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/28/17
 * Time: 9:44 PM
 */
    require_once('../db.php');
    require_once('../libraries/utils.php');
    $array = array();
    try {
        if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
            throw new Exception("7-1-1");
        }
        try {
            $user_id = apiLoginCheck("7-2", "7-3");
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        $query = "select list_name, list_id, color from todo_lists where user_id = {$user_id} and active = 1";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            throw new Exception("7-4-3");
        }
        $lists = array();
        while($row = @ mysqli_fetch_array($result)){
            $name = $row['list_name'];
            $id = $row['list_id'];
            $color = $row['color'];
            array_push($lists, array('name'=>$name, 'id'=>$id, 'color'=>$color));
        }
        $array['results'] = $lists;
        $array['error'] = null;
    } catch (Exception $exception) {
        $array['result'] = 0;
        $array['error'] = $exception->getMessage();
    }
    echo json_encode($array)
?>