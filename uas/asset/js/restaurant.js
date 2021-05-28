const xmlhttp = new XMLHttpRequest();
const statusChange = (id) => {
    const element = document.getElementById(id);
    const opt = element.options[element.selectedIndex];
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
    xmlhttp.open("DELETE", "./handling.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xmlhttp.send();
};
