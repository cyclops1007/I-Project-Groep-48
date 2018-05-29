var xhttp;

if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
} else {
    // code for old IE browsers
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

function loadDoc(url, Function) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            Function(this);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function updateBidding(xhttp) {
    document.getElementById("hoogsteBod").innerHTML = this.responseText;
}