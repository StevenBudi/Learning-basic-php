const hello = () => {
    alert("Hello")
}

const activeLink = () => {
    const elements = document.getElementsByClassName("nav-link")
    for (let index = 0; index < elements.length; index++) {
        elements[index].addEventListener("click", () => {
            const current = document.getElementsByClassName(" active")
            current[0].className = current[0].className.replace(" active", "")
            elements[index].className += " active"
        })
        
    }
}
activeLink()


const expandCol = () => {
    const expand = document.getElementsByClassName("expand")
    console.log(window.screen.width)
    const phoneWidth = 414
    for (let index = 0; index < expand.length; index++) {
        if (window.screen.width <= phoneWidth){
            expand[index].setAttribute("colspan", "2")
        }else{
            expand[index].removeAttribute("colspan")
        }
        
    }
}

const lunchDisplay = () => {
    document.getElementById("toggle-lunch").addEventListener("click", () => {
        // document.getElementById("lunch-block").removeAttribute("style")
        // document.getElementById("dinner-block").setAttribute("style", "display:none;")
        const block = document.getElementById("lunch-block")
        if(block.getAttribute("style")){
            block.removeAttribute("style")
            document.getElementById("dinner-block").setAttribute("style", "display:none;")
        }else{
            block.setAttribute("style", "display:none;")
        }
    })
}

const dinnerDisplay = () => {
    document.getElementById("toggle-dinner").addEventListener("click", () => {
        const block = document.getElementById("dinner-block")
                if(block.getAttribute("style")){
            block.removeAttribute("style")
            document.getElementById("lunch-block").setAttribute("style", "display:none;")
        }else{
            block.setAttribute("style", "display:none;")
        }
    })
}

dinnerDisplay()
lunchDisplay()

expandCol()

window.addEventListener("resize", expandCol)