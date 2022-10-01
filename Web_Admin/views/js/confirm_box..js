function confirm() {
    if (confirm("Delete user ???")) {
        // txt = "You pressed OK!";
    } else {
        // txt = "You pressed Cancel!";
        cancel();
    }
    document.getElementById("demo").innerHTML = txt;
}