function showPass() {
    var x = document.getElementById("password");
    var y = document.getElementById("confirm");
    var z = document.getElementById("new_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
    if (z.type === "password") {
        z.type = "text";
    } else {
        z.type = "password";
    }
}