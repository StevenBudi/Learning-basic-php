const hello = () => {
    alert("Hello");
};
const activeLink = () => {
    const elements = document.getElementsByClassName("nav-link");
    for (let index = 0; index < elements.length; index++) {
        elements[index].addEventListener("click", () => {
            const current = document.getElementsByClassName(" active");
            current[0].className = current[0].className.replace(" active", "");
            elements[index].className += " active";
        });
    }
};
activeLink();
const expandCol = () => {
    const expand = document.getElementsByClassName("expand");
    console.log(window.screen.width);
    const phoneWidth = 414;
    for (let index = 0; index < expand.length; index++) {
        if (window.screen.width <= phoneWidth) {
            expand[index].setAttribute("colspan", "2");
        }
        else {
            expand[index].removeAttribute("colspan");
        }
    }
};
expandCol();
window.addEventListener("resize", expandCol);
//# sourceMappingURL=index.js.map