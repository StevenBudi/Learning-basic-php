const statusChange = (id) => {
    console.log(id);
    const element = document.getElementById(id);
    const opt = element.options[element.selectedIndex];
    alert(opt.value);
};
//# sourceMappingURL=restaurant.js.map