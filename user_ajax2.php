<!DOCTYPE html>
<html>
<head>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "admin_user2.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>

Username: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>

<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html> 