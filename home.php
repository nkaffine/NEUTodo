<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:49 PM
 */
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
        <div class="col-lg-3 col-lg-offset-2 panel panel-default">
            <h1 class="col-lg-10 noPad title">My Lists</h1>
            <button type="button" class="close addBtn" style="font-size: 40px;" id="newList">+</button>
            <div id="lists">

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
