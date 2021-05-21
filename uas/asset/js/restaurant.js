const statusChange = (id) => {
    let opt;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.status === 200 && xmlhttp.readyState === 4) {
            const element = document.getElementById(id);
            opt = element.options[element.selectedIndex];
        }
        xmlhttp.open("POST", `handling.php?id=${id}&state=${opt.value}`, true);
        xmlhttp.send();
    };
};
//# sourceMappingURL=restaurant.js.map