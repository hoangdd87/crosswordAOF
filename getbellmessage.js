var user_bell_arr = new Array();

var bell = document.getElementById("bell");
/*var container = document.getElementsByClassName("container")[0];*/
var container=document.body;
var ul = document.createElement("ul");
ul.className = "belllist";
container.appendChild(ul);
var evtSource = new EventSource('getmessagenotseen.php');
evtSource.addEventListener("ping", function (e) {
    var arr = JSON.parse(e.data);
    for (var i = 0; i < arr.length; i++) {
        var user_name = arr[i]['user_name'];
        if (!user_bell_arr[user_name]) {
            var li = document.createElement("li");
            li.innerHTML = arr[i]['teamname'];
            li.className = "li-teamname";
            ul.appendChild(li);

            user_bell_arr[user_name]=1;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.responseText==1) {
                    bell.play();
                }
            };
            xhttp.open("POST", "apis/update_user_message_delivered.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("user_name=" + user_name);
            /*document.getElementById("btnRing").disabled = true;*/
        }
    }
}, false);