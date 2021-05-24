const statusChange = (id) => {
    const element = document.getElementById(id) as HTMLSelectElement
    const opt = element.options[element.selectedIndex] as HTMLOptionElement
    const xmlhttp = new XMLHttpRequest();
    const data = {"ID" : id, "State" : element.value}
    xmlhttp.open("PUT", "./handling.php", true)
    xmlhttp.setRequestHeader('Content-type','application/json; charset=utf-8');
    xmlhttp.send(JSON.stringify(data))

}

let prevValue;
const revertValue = ($id) => {
    console.log(prevValue)
    const element = document.getElementById($id) as HTMLSelectElement
    element.value = prevValue
    location.reload()
}
