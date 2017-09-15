<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:24 PM
 */
    //Initializing all of the global variables needed
    $DB_hostname = "tododb.todo.kaffine.tech";
    $DB_username = "reg_todo_user";
    $DB_password = fgets(fopen($_SERVER['DOCUMENT_ROOT'] .'/thing', 'r'));
    $DB_databasename = "neutodo";
?>