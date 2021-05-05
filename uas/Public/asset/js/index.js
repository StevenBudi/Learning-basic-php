var _this = this;
var includeHTML = function () {
    var elements = document.getElementsByTagName("*");
    var _loop_1 = function (index) {
        var element = elements[index];
        var file = element.getAttribute("include");
        if (file) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (_this.readyState === 4) {
                    if (_this.status === "200") {
                        element.innerHTML = _this.responseText;
                    }
                    if (_this.status === "400") {
                        element.innerHTML = "Element Not Found";
                    }
                    else {
                        console.log(_this.status);
                    }
                    element.removeAttribute("include");
                    includeHTML();
                }
            };
            xhttp.open("GET", file, true);
            xhttp.send();
            return { value: void 0 };
        }
    };
    for (var index = 0; index < elements.length; index++) {
        var state_1 = _loop_1(index);
        if (typeof state_1 === "object")
            return state_1.value;
    }
};
includeHTML();
