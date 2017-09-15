/**
 * Created by Nick on 9/14/17.
 */
// Create an html form that posts all of the facebook login info to the processing page
function postFbInfo(userId, sessionId, first, last, email) {
    method = "post";

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    form = document.getElementById("fbinfo");
    form.setAttribute("method", method);
    form.setAttribute("action", "/process/fblogin.php");

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "userId");
    hiddenField.setAttribute("value", userId);

    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "sessionId");
    hiddenField.setAttribute("value", sessionId);

    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "first");
    hiddenField.setAttribute("value", first);

    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "last");
    hiddenField.setAttribute("value", last);

    form.appendChild(hiddenField);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "email");
    hiddenField.setAttribute("value", email);

    form.appendChild(hiddenField);

    document.body.appendChild(form);
    form.submit();
}

// Creates a cookie at the current time with an offset of the given number of days
function createCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}

$(document).ready(function(){
    $("#logoutBtn").click(function(){
        window.location = 'logout.php';
    });
});

src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing(){}






















