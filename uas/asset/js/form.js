const lunchDisplay = () => {
    try {
        document.getElementById("toggle-lunch").addEventListener("click", () => {
            const block = document.getElementById("lunch-block");
            if (block.getAttribute("style")) {
                block.removeAttribute("style");
                document.getElementById("dinner-block").setAttribute("style", "display:none;");
            }
            else {
                block.setAttribute("style", "display:none;");
            }
        });
    }
    catch (error) {
        console.error();
    }
};
const dinnerDisplay = () => {
    try {
        document.getElementById("toggle-dinner").addEventListener("click", () => {
            const block = document.getElementById("dinner-block");
            if (block.getAttribute("style")) {
                block.removeAttribute("style");
                document.getElementById("lunch-block").setAttribute("style", "display:none;");
            }
            else {
                block.setAttribute("style", "display:none;");
            }
        });
    }
    catch (error) {
        console.error();
    }
};
const expandCol = () => {
    try {
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
    }
    catch (error) {
        console.error();
    }
};
const limitDate = () => {
    const today = new Date();
    const date = new Date();
    date.setDate(today.getDate() + 1); // Set date to tomorrow
    const minDate = `${date.getFullYear()}-${date.getMonth() < 10 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1)}-${date.getDate() < 10 ? "0" + date.getDate().toString() : date.getDate()}`;
    // const maxDate = () => {
    //     const result = new Date()
    //     result.setDate(date.getDate() + 0) // set how many days from today for max value
    //     return `${result.getFullYear()}-${result.getMonth() < 10 ? "0" + (result.getMonth() + 1).toString() : (result.getMonth() + 1)}-${result.getDate() < 10 ? "0" + result.getDate().toString() : result.getDate()}`
    // }
    try {
        // Set Min value
        document.getElementById("reser_date").setAttribute("min", minDate);
        // Set Max value
        document.getElementById("reser_date").setAttribute("max", minDate);
        // Set value
        const element = document.getElementById("reser_date");
        element.value = minDate;
    }
    catch (error) {
        console.error();
    }
};
window.onload = () => {
    dinnerDisplay();
    lunchDisplay();
    limitDate();
    expandCol();
};
window.addEventListener("resize", expandCol);
//# sourceMappingURL=form.js.map