var xhttp = new XMLHttpRequest();
var params;
var getOptSelectedID = function (inputID, datalistID) {
    var input = document.getElementById(inputID);
    var elements = document.getElementById(datalistID);
    for (var index = 0; index < elements.options.length; index++) {
        if (elements.options[index].value === input.value) {
            return elements.options[index].getAttribute("id");
        }
    }
    return "";
};
var getCity = function () {
    params = getOptSelectedID("province", "provinceData");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === xhttp.DONE) {
            if (xhttp.response === "OK")
                // Append result to datalist/select
                console.log(xhttp.response);
        }
    };
    xhttp.open("GET", "server.php?city=" + params);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.send();
};
var getDistrict = function () {
    params = getOptSelectedID("district", "districtData");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === xhttp.DONE) {
            if (xhttp.response === "OK")
                // Append result to datalist/select
                console.log(xhttp.response);
        }
    };
    xhttp.open("GET", "server.php?district=" + params);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.send();
};
var getResident = function () {
    params = getOptSelectedID("resident", "residentData");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === xhttp.DONE) {
            if (xhttp.response === "OK")
                // Append result to datalist/select
                console.log(xhttp.response);
        }
    };
    xhttp.open("GET", "server.php?resident=" + params);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.send();
};
