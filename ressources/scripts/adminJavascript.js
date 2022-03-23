function afficherSuggestions(str) {
    if (str.length == 0) { 
        document.getElementById("txtSuggestions").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("txtSuggestions").innerHTML =
        this.responseText;
    }
    xhttp.open("GET", "recevoirItems.php?q="+str);
    xhttp.send();   
}

var input = document.getElementById("txt1");
console.log(input);
input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        //console.log("test");
        document.getElementById("bouton-detail-et-modifier").click();
    }
});