<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:21 PM
 */
    require_once('../db.php');
    if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
        error("1-1-1");
    }
    if(count($_POST)){
        $id = validNumbers($_POST['userId'], 30);
        $sessionId = validInputSizeAlpha($_POST['sessionId'], 255);
        $first = validInputSizeAlpha($_POST['first'], 255);
        $last = validInputSizeAlpha($_POST['last'], 255);
        if($_POST['email'] != 'undefined'){
            $email = validInputSizeAlpha($_POST['email'], 255);
        }
    }
    if(empty($id) || empty($sessionId) || empty($first) || empty($last)){
        error("1-2-2");
    }
    // Check to see if the facebook id is already affiliated with a user account
    $query = "select facebook_id from users where facebook_id = {$id}";
    if(($result = @ mysqli_query($connection, $query))==FALSE){
        error("1-3-3");
    }
    if(mysqli_num_rows($result) == 0){
        // The facebook id is not affiliated with a user account so input the user's information
        // Get the next user_id that is open
        $query = "select max(user_id) from users";
        if(($result = @ mysqli_query($connection, $query))==FALSE){
            error("1-4-3");
        }
        $row = mysqli_fetch_array($result);
        $newId = $row['max(user_id)'] + 1;

        // Insert the user's information into the database with the new user_id
        $query = "insert into users (user_id, facebook_id, first_name, last_name, email) values ({$newId}, ".
            "{$id}, '{$first}', '{$last}', '{$email}')";
        if(($result = mysqli_query($connection,$query))==FALSE){
            error("1-5-3");
        }
        if(mysqli_affected_rows($connection) == -1){
            error("1-6-4");
        }
    } else if(mysqli_num_rows($result) > 1) {
        // There was more than one row with the facebook id so there is a problem
        error("1-7-5");
    }
    // Starts the session of the user and redirects them to the home page.
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['key'] = $sessionId;
    header("Location: ../home.php");
    exit;
?>