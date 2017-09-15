<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 9/14/17
 * Time: 10:02 PM
 */
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Turtle Shirts</title>
        <meta charset="utf-8">
        <!--Stuff required for bootstrap-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--importing javascript file and style sheets from the server-->
        <script src="scripts/main.js"></script>
        <link rel="stylesheet" href="styleSheets/main.css">
        <style>
            #main h1 {
                color: white;
                font-size: 50px;
            }
            #main {
                background-color: black;
                padding: 4%;
            }
            .btn-facebook {
                background-color: #4867AA;
                color: white;
                padding: 1%;
                padding-right: 2%;
            }
            img {
                width: 2em;
            }
        </style>
        <script>
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    login(response, response.authResponse.accessToken);
                } else {
                    // The person is not logged into this app or we are unable to tell.
                }
            }

            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '271033293410379',
                    cookie     : true,  // enable cookies to allow the server to access
                                        // the session
                    xfbml      : true,  // parse social plugins on this page
                    version    : 'v2.10' // use graph api version 2.8
                });

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function login(response, accessToken) {
                FB.api('/me', { locale: 'en_US', fields: 'first_name, last_name, email, age_range, gender' },
                    function(response) {
                        createCookie("sessionId", accessToken, 30);
                        postFbInfo(response.id, accessToken, response.first_name, response.last_name, response.email);
                    });

            }

            $(document).ready(function(){
                $('#fbbutton').click(function(){
                    FB.login(function(response) {
                        checkLoginState();
                    }, { scope: 'email,public_profile' });
                });
            });
        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <div class="valign container-fluid">
            <div class="row col-xs-12 col-xs-offset-1 col-lg-4 col-lg-offset-4">
                <div id='main' class="col-xs-12 row col-lg-10 col-lg-offset-1">
                    <h1 class="h1-responsive text-center">NEU Todo</h1>
                    <button id="fbbutton" class="btn btn-lg btn-primary btn-facebook col-xs-12 col-lg-10 col-lg-offset-1">
                        <img src="https://www.facebook.com/rsrc.php/v3/y-/r/q5WSVI6B16O.png">Login with Facebook</button>
                </div>
            </div>
        </div>
        <form id='fbinfo' style="display: none;">
        </form>
    </body>
</html>

