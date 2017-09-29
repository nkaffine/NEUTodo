/**
 * Created by Nick on 9/28/17.
 */
function getLists(){
    var link = "/lists/getLists.php";
    var html = "";
    $.getJSON('link', function(data){
        for(var i = 0; i < data.results.length; i++){
            html = html + listPanel(data.results[i].color, data.results[i].name, data.results[i].id);
        }
    });
    $(document).ready(function(){
        document.getElementById('lists').innerHTML = html;
    });
}

function listPanel(color, name, id){
    return "<div class='col-lg-12 panel panel-default lists'>" +
        "<h1 class='title' style='color: "+color+"'>"+name+"</h1></div>";
}

function newList(list_name){
    var link = "/lists/newList.php?list_name=" + encodeURIComponent(list_name);
    $.getJSON(link, function(data){
        if(data.results != 0){
            $(document).ready(function() {
                var lists = document.getElementById('lists');
                lists.innerHTML = lists.innerHTML +
                    listPanel(data.results.color, data.results.name, data.results.id)
                titleStyle();
            });

        } else {
            error(data.error);
        }
    });
}

$(document).ready(function(){
    $("#list_name").keyup(function(event){
        if(event.keyCode == 13){
            newList(document.getElementById('list_name').value);
        }
    })
});