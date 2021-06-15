"use strict";
const xhttp = new XMLHttpRequest();
let input, elements, params;
const getCity = () => {
    console.log("City");
    input = document.getElementById("province");
    elements = document.getElementById("provinceData"); // ID of selected value / selected value
    for (let index = 0; index < elements.options.length; index++) {
        if (elements.options[index].value === input.value) {
            params = elements.options[index].getAttribute("id");
        }
    }
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === xhttp.DONE) {
            if (xhttp.response === "OK")
                // Append result to datalist/select
                console.log(xhttp.response);
        }
    };
    xhttp.open("CITY", "./server.php");
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.send();
};
const getDistrict = () => {
    console.log("District");
};
const getResident = () => {
    console.log("Resident");
};
