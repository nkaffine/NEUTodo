<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:35 PM
 */
    require_once('db.php');
    if(count($_GET)){
        $message = validInputSizeAlpha($_GET['message'], 1000000);
    }
    if(empty($message)){
        error("2-1-2");
    }
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Error</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styleSheets/main.css">
        <script src="scripts/main.js"></script>
        <style>
            .box {
                background-color: white;
                padding-bottom: 2%;
            }
            textarea.form-control{
                height: 15vh;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('#backbtn').click(function(){
                    console.log("thing");
                    window.location.href = '/alpha/home.php';
                });
            });
        </script>
    </head>
    <body>
        <?php
        if(isset($message)){
            echo"<div class='col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1' style='margin-top:2%; padding-left: 0; padding-right:0;'>
                                <div class='panel panel-danger'>
                                    <div class='panel-heading'>Alert:</div>
                                    <div class='panel-body'>{$message}</div>
                                </div>
                            </div>";
        }
        ?>
    </body>
</html>
