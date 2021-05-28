const xmlhttp = new XMLHttpRequest();
const statusChange = (id) => {
    const element = document.getElementById(id);
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState === xmlhttp.DONE) {
            if (xmlhttp.response === "OK") {
                window.location.reload();
            }
        }
    };
    const data = { "ID": id, "State": element.value };
    xmlhttp.open("PUT", "./handling.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xmlhttp.send(JSON.stringify(data));
};
let prevValue;
const revertValue = ($id) => {
    console.log(prevValue);
    const element = document.getElementById($id);
    element.value = prevValue;
    location.reload();
};
const flushData = () => {
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState === xmlhttp.DONE) {
            if (xmlhttp.response === "OK") {
                window.location.reload();
            }
        }
    };
    xmlhttp.open("DELETE", "./handling.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xmlhttp.send();
};
