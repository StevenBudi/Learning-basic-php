const lunchDisplay = () => {
    try {
        document.getElementById("toggle-lunch").addEventListener("click", () => {
            const block = document.getElementById("lunch-block")
            if (block.getAttribute("style")) {
                block.removeAttribute("style")
                document.getElementById("dinner-block").setAttribute("style", "display:none;")
            } else {
                block.setAttribute("style", "display:none;")
            }
        })
    } catch (error) {
        console.error();
    }
}

const dinnerDisplay = () => {
    try {
        document.getElementById("toggle-dinner").addEventListener("click", () => {
            const block = document.getElementById("dinner-block")
            if (block.getAttribute("style")) {
                block.removeAttribute("style")
                document.getElementById("lunch-block").setAttribute("style", "display:none;")
            } else {
                block.setAttribute("style", "display:none;")
            }
        })
    } catch (error) {
        console.error();
    }
}

const expandCol = () => {
    try {
        const expand = document.getElementsByClassName("expand")
        console.log(window.screen.width)
        const phoneWidth = 414
        for (let index = 0; index < expand.length; index++) {
            if (window.screen.width <= phoneWidth) {
                expand[index].setAttribute("colspan", "2")
            } else {
                expand[index].removeAttribute("colspan")
            }
        }
    } catch (error) {
        console.error();
    }
}

const limitDate = () => {
    const date = new Date();
    const month = (date.getMonth() < 10 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString())
    const minDate = `${date.getFullYear()}-${date.getMonth() < 10 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1)}-${date.getDate() < 10 ? "0" + date.getDate().toString() : date.getDate()}`
    const maxDate = () => {
        const result = new Date()
        result.setDate(date.getDate() + 14)
        return `${result.getFullYear()}-${result.getMonth() < 10 ? "0" + (result.getMonth() + 1).toString() : (result.getMonth() + 1)}-${result.getDate() < 10 ? "0" + result.getDate().toString() : result.getDate()}`

    }
    try {
        document.getElementById("reser_date").setAttribute("min", minDate)
        document.getElementById("reser_date").setAttribute("max", maxDate())
    } catch (error) {
        console.error();
    }
}


expandCol()
dinnerDisplay();
lunchDisplay();
limitDate()