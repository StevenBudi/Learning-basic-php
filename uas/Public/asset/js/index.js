var includeHTML = function () {
    var elements = document.getElementsByTagName("*");
    var _loop_1 = function (index) {
        var element = elements[index];
        var file = element.getAttribute("include");
        if (file) {
            console.log("Element Found : " + file);
            var xhttp_1 = new XMLHttpRequest();
            xhttp_1.onreadystatechange = function () {
                if (xhttp_1.readyState === 4) {
                    if (xhttp_1.statusText == "OK") {
                        element.innerHTML = xhttp_1.responseText;
                    }
                    if (xhttp_1.status === 400) {
                        element.innerHTML = "Not Working";
                    }
                    else {
                        console.log(xhttp_1.status + xhttp_1.statusText + xhttp_1.responseText);
                    }
                    element.removeAttribute("include");
                    includeHTML();
                }
            };
            xhttp_1.open("GET", file, true);
            xhttp_1.send();
            return { value: void 0 };
        }
        else {
            console.log("File Not Found");
        }
    };
    for (var index = 0; index < elements.length; index++) {
        var state_1 = _loop_1(index);
        if (typeof state_1 === "object")
            return state_1.value;
    }
};
includeHTML();
