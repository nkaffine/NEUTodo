<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:49 PM
 */
    require_once('db.php');
    require_once('libraries/utils.php');
    if(!($connection = @ mysqli_connect($DB_hostname, $DB_username, $DB_password, $DB_databasename))){
        error("8-1-1");
    }
    $user_id = logincheck("8-2", "8-3");
    $query = "select list_name, list_id, color from todo_lists where user_id = {$user_id} and active = 1";
    if(($lists = @ mysqli_query($connection, $query))==FALSE){
        error("8-4-3");
    }
    $htmlLists = "";
    while($row = @ mysqli_fetch_array($lists)){
        $name = $row['list_name'];
        $id = $row['list_id'];
        $color = $row['color'];
        $htmlLists = $htmlLists . "<div class='col-lg-12 panel panel-default lists'>
                                        <h1 class='title' style='color: {$color}'>{$name}</h1></div>";
    }

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styleSheets/main.css">
        <script src="scripts/main.js"></script>
        <script src="scripts/style.js"></script>
        <script src="scripts/lists.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home.php">NEU Todo</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                </ul>
            </div>
        </nav>
        <div class="col-lg-3 col-lg-offset-2">
            <div class="col-lg-12 panel panel-default lists">
                <h1 class="col-lg-10 noPad title">My Lists</h1>
                <button data-toggle='collapse' data-target='#addList' type="button" class="close addBtn"
                        style="font-size: 40px;" id="newList">+</button>
                <div class="collapse col-lg-12" style="padding-left: 0; padding-right: 0;" id="addList">
                    <label for="list_name">New List Name</label>
                    <input class='form-control' type="text" id="list_name" value="">
                    &nbsp;
                </div>
            </div>
            <div id="lists" class="col-lg-12" style="padding-left: 0; padding-right:0;">
                <?php
                echo $htmlLists;
                ?>
            </div>
        </div>

        <div class="col-lg-5 panel panel-default">
            <h1 class="col-lg-10 noPad title">Items</h1>
            <button type="button" class="close addBtn" style="font-size: 40px;" id="newItem">+</button>
            <div id="items">

            </div>
        </div>
    </body>
</html>
